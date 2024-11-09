<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-MATRIX</title>
    <style>

.container{
  padding: 25px 30px;
  border-radius: 5px;
  
 
}
.content{
  width: 50%;
  margin: auto;
} 
.container .title{
  font-size: 25px;
  font-weight: 500;
  text-align: center;
}  
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
  
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: 100%;
  
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  
}

.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 
 
 form .button{
   height: 45px;
   
   
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background-color: rgba(0, 136, 169, 1);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background-color: rgba(0, 136, 169, 0.8);
  }
  .details{
    text-align: center;
  }
 

</style>
</head>
<body>
    <?php
        if(isset($_GET['editcat'])){
            $cat_id=$_GET['editcat'];
            $get_cat="SELECT * from tblcategories where category_id=$cat_id";
            $result_cat=mysqli_query($con,$get_cat);

            $rowz=mysqli_fetch_assoc($result_cat);
            $cat_title=$rowz['category_name'];
        }
        if(isset($_POST['update_cat'])){
            $updated_title=$_POST['category_name'];
            $update_cat="UPDATE tblcategories set category_name='$updated_title' where category_id=$cat_id";
            $result_updte=mysqli_query($con,$update_cat);
            if($result_updte){
                echo "<script>alert('data Updated')</script>";
      echo "<script>window.location.assign('bindex.php');</script>";
            }
        }
    ?>
<div class="container">
    <div class="title"><h2>EDIT CATEGORY</h2></div>
      <div class="content">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Name</span>
              <input type="text" name="category_name" value="<?php echo $cat_title; ?>" required maxlength="15" autocomplete="off">
            </div>
          </div>
            <div class="button">
              <input type="submit" value="UPDATE" name="update_cat">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>