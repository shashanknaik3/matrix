<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
  
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
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
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
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
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
 }
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
}
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
    </style>
</head>
<body>
<?php
 $con=mysqli_connect('localhost','root','','matrix');
 if(!$con){
     echo "not connected to database";
 }
    if(isset($_GET['edit_acc'])){
        
        $selct_user_info="SELECT * from tblregister";
        
        $result_user_info=mysqli_query($con,$selct_user_info);
        $row_fech=mysqli_fetch_assoc($result_user_info);
        $userid=$row_fech['userid'];
        $username=$row_fech['username'];
        $email=$row_fech['email'];
        $mblno=$row_fech['mblno'];
        $address=$row_fech['address'];
        $pincode=$row_fech['pincode'];
        $old_image=$row_fech['profilepic'];
        
    }
    if(isset($_POST['edit_accs'])){
      $userid_update=$userid;
      $user_name=$_POST['user_name'];
      $user_email=$_POST['user_email'];
      $user_phone=$_POST['user_phone'];
      $user_address=$_POST['user_address'];
      $user_pincode=$_POST['user_pincode'];
      $user_profilepic=$_FILES['user_profilepic']['name'];
      $user_profilepic_tmp=$_FILES['user_profilepic']['tmp_name'];
      

      $select_querry_email="SELECT * from tblregister where email='$user_email'";
      $select_querry1_mobile="SELECT * from tblregister where mblno='$user_phone'";
      $result_email=mysqli_query($con,$select_querry_email);
      $result_mobile=mysqli_query($con,$select_querry1_mobile);
  
      // checking for existing user
      $rows_count_email=mysqli_num_rows($result_email);
      $rows_count_mobile=mysqli_num_rows($result_mobile);
  
      if($rows_count_email>1){
        echo "<script>alert('user alredy exist')</script>";
      }
      elseif($rows_count_mobile>1){
        echo "<script>alert('mobile no alredy exist')</script>";
      }
      elseif($username==$user_name && $email==$user_email && $user_phone==$mblno && $address==$user_address && $pincode==$user_pincode && $user_profilepic==$old_image){
        echo "<script>alert('no changes made')</script>";
      }
      else{
       // uploding image in tem folder
      unlink('user_area/tempimages/$old_image');
      $folder="tempimages/".$user_profilepic;
    move_uploaded_file($user_profilepic_tmp,$folder);
    //update querry
    $update_querry="UPDATE tblregister set username='$user_name',email='$user_email',mblno='$user_phone',address='$user_address',pincode='$user_pincode',profilepic='$user_profilepic'";
    
    $sql_execute=mysqli_query($con,$update_querry);
    if($sql_execute){
    echo "<script>alert('profile updated')</script>";
    if($email!=$user_email){
    echo "<script>window.location.assign('user_area/logout.php','_self');</script>";
    }
    else{
      echo "<script>window.location.assign('../profile.php','_self');</script>";
    }
  }
    }
  }
?>
<div class="container">
    <div class="title">Edit Account</div>
      <div class="content">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Name</span>
              <input type="text" name="user_name" value="<?php echo $username;?>" required maxlength="15" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="user_email" value="<?php echo $email;?>" required autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" name="user_phone" value="<?php echo  $mblno;?>" required pattern="[0-9]{10}" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" name="user_address" value="<?php echo  $address;?>" required maxlength="50" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Pincode</span>
              <input type="text" name="user_pincode" value="<?php echo $pincode;?>" pattern="[0-9]{6}" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Profile Picture</span>
              <input type="file" name="user_profilepic" required>
            </div>
            <div>
              <input type="hidden" name="user_type" value="user">
            </div>
          </div>
            <div class="button">
              <input type="submit" value="Update" name="edit_accs">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>



