<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./userCss/login.css">
</head>
<body>
<div class="center">
      <h1>Login</h1>
      <form method="post" action="">
        <div class="txt_field">
          <input type="email" required name="user_email" required autocomplete="off" maxlength="25">
          <span></span>
          <label>Email Id</label>
        </div>
        <div class="txt_field">
          <input type="password" maxlength="10" required name="user_pass" required autocomplete="off">
          <span></span>
          <label>Password</label>
        </div>
        
        <input type="submit" value="Login" name="user_login">
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
        </div>
      </form>
    </div>
<script>
  
</script>
</body>
</html>

<?php
   $con=mysqli_connect('localhost','root','','matrix');
   if(!$con){
       echo "not connected to database";
   }
   
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
$user_ip=getIP();

   if(isset($_POST['user_login'])){
    $user_email=$_POST['user_email'];
    $user_pass=$_POST['user_pass'];
   
    $select_cart_items="SELECT * from tblcart where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count_cart=mysqli_num_rows($result_cart);
    //  select querry
     $select_querry="SELECT * from tblregister where email='$user_email'";
     $result=mysqli_query($con,$select_querry);
     $rows_count=mysqli_num_rows($result);
      $row_data=mysqli_fetch_assoc($result);
    
    if($rows_count>0 && $row_data['user_type']=="user"){
        if($user_pass==$row_data['password']){
          $_SESSION['email']=$user_email;
            if($rows_count==1 && $rows_count_cart==0){
              $_SESSION['email']=$user_email;
             echo "<script>alert('login succeful')</script>";
            echo "<script>window.location.assign('../profile.php');</script>";
            }else{
              $_SESSION['email']=$user_email;
              echo "<script>alert('login succeful')</script>";
              echo "<script>window.location.assign('../cartpage.php');</script>";
               
            }
        }
        else{
            echo "<script>alert('wrong password')</script>";
        }
      }
    elseif($rows_count>0 && $row_data['user_type']=="admin" ){
      if($user_pass==$row_data['password']){
        echo "<script>alert('admin login succeful')</script>";
        echo "<script>window.location.assign('../../BackEnd/bindex.php');</script>";

      }
      else{
        echo "<script>alert('wrong password')</script>";
      }
    }
    else{
        echo "<script>alert('Invalid credentials')</script>";
    }
  }
?>

