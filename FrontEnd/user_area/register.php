<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./userCss/register.css">
</head>
<body>
  <div class="container">
    <div class="title">Registration</div>
      <div class="content">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Name</span>
              <input type="text" name="user_name" placeholder="Enter your username" required maxlength="15" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="user_email" placeholder="Enter your email" required autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" name="user_phone" placeholder="Enter your number" required pattern="[0-9]{10}" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" name="user_address" placeholder="Confirm your address" required maxlength="50" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="user_pass" placeholder="Enter your password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*<>,.?/:;]).{8}$" required autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" name="user_cpass" placeholder="Confirm your password" required maxlength="8" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Pincode</span>
              <input type="text" name="user_pincode" placeholder="Enter your pin code" pattern="[0-9]{6}" autocomplete="off">
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
              <input type="submit" value="Register" name="user_register">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>


<?php
session_start();
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
    // get ip addres function
    function getIP(){
      if(!empty($_SERVER['HTTP_CLIENT_IP'])){
          $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
      elseif(!empty($_SERVER['HTTP_X_FORWORDED_FOR'])){
          $ip=$_SERVER['HTTP_X_FORWORDED_FOR'];
      }
      else{
          $ip=$_SERVER['REMOTE_ADDR'];
      }
      return $ip;
  }

  // accesing data from form
  if(isset($_POST['user_register'])){
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_phone=$_POST['user_phone'];

    // passwors hashing
    $user_pass=$_POST['user_pass'];
    // $hash_pass=password_hash($user_pass,PASSWORD_DEFAULT);

    
    $user_cpass=$_POST['user_cpass'];
    $user_address=$_POST['user_address'];
    $user_pincode=$_POST['user_pincode'];
    $user_profilepic=$_FILES['user_profilepic']['name'];
    $user_profilepic_tmp=$_FILES['user_profilepic']['tmp_name'];
    $user_type=$_POST['user_type'];
    $user_ip=getIP();

   

    // select querry
    $select_querry_email="SELECT * from tblregister where email='$user_email'";
    $select_querry1_mobile="SELECT * from tblregister where mblno='$user_phone'";
    $result_email=mysqli_query($con,$select_querry_email);
    $result_mobile=mysqli_query($con,$select_querry1_mobile);

    // checking for existing user
    $rows_count_email=mysqli_num_rows($result_email);
    $rows_count_mobile=mysqli_num_rows($result_mobile);

    if($rows_count_email>0){
      echo "<script>alert('user alredy exist')</script>";
    }
    elseif($rows_count_mobile>0){
      echo "<script>alert('mobile no alredy exist')</script>";
    }
    // Password matching
     elseif($user_pass!=$user_cpass){
       echo "<script>alert('password do not matched')</script>";
     }
    else{
       // uploding image in tem folder
    $folder="tempimages/".$user_profilepic;
    move_uploaded_file($user_profilepic_tmp,$folder);
    // insert querry 
    $sql="INSERT INTO tblregister(username,email,mblno,password,address,pincode,profilepic,userip,user_type) values ('$user_name','$user_email','$user_phone','$user_pass','$user_address','$user_pincode','$user_profilepic','$user_ip','$user_type')";
    $sql_execute=mysqli_query($con,$sql);
  
    // selecting cart items
    $select_cart_items="SELECT * from tblcart where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count_cart=mysqli_num_rows($result_cart);
    if($rows_count_cart>0){
      $_SESSION['email']=$user_email;
      echo "<script>alert('you have items in side cart')</script>";
      echo "<script>window.location.assign('checkout.php');</script>"; 
    }
    else{
      echo "<script>window.location.assign('login.php');</script>"; 
    }
  }
  // iser querry ends
}
?>




