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
<div class="container">
    <div class="title"><h2>INSERT CATEGORY</h2></div>
      <div class="content">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Name</span>
              <input type="text" name="category_name" placeholder="Enter category name" required maxlength="15" autocomplete="off">
            </div>
          </div>
            <div class="button">
              <input type="submit" value="INSERT" name="insert_cat">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
    if(isset($_POST['insert_cat'])){
        $category_name=$_POST['category_name'];
        $select_querry_category="SELECT * from tblcategories where category_name='$category_name'";
        $result_category=mysqli_query($con,$select_querry_category);

        // checking for existing category
        $rows_count_category=mysqli_num_rows($result_category);

        if($rows_count_category>0){
            echo "<script>alert('category alredy exist')</script>";
        }
        else{
            $sql="INSERT INTO tblcategories(category_name) values ('$category_name')";
            $sql_execute=mysqli_query($con,$sql);

            if($sql_execute){
                echo "<script>alert('category inserted succesfully')</script>";
            }
            else{
                die(mysqli_error($con));
            }
        }
    }
?>