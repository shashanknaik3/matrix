<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
        .form{
            justify-content: center;
            align-items: center;
            display: flex;
        }
        form input[type="submit"]{
        margin-bottom: 20px;
        width: 100%;
        padding: 10px;
        }
        .text{
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
       
    </style>
</head>
<body>
    <h3 class="text">Delete Account</h3>
    
    <form action="" class="form" method="post">
        <div class="formcon">
            <input type="submit" value="Delete Account" name="detele" class="form-control">
            <input type="submit" value="Don't Delete Account" name="dont_delete" class="form-control">
        </div>

    </form>
</body>
</html>
<?php
    $user_email_sesson=$_SESSION['email'];
    if(isset($_POST['detele'])){
        $delete_querry="DELETE from tblregister where email='$user_email_sesson'";
        $result_delete=mysqli_query($con,$delete_querry);
        if($result_delete){
            session_destroy();
            echo "<script>alert('Account Deleted Succesfully')</script>";
            echo "<script>window.location.assign('../index.php');</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.location.assign('profile.php');</script>";
    }
?>