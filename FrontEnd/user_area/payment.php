
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
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
            $ip=getIP();
            $get_user="SELECT * from tblregister where userip='$ip'";
            $result_user=mysqli_query($con,$get_user);
            $run_user=mysqli_fetch_array($result_user);
            $user_id=$run_user['userid'];
    ?>
    <!-- <h1>payment option</h1>
   <h2><a href="../index.php">continue shoping</a></h2> 
   <h2><a href="order.php?userid=<?php echo $user_id; ?>">pay offline</a></h2> 
</body>
</html> -->


<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container my-5">
    <h3 class="text-center text-light">Payment Option</h3>
       
            
            <div class=" my-4 text-center w-50 m-auto">
            <h2><a href="../index.php">continue shoping</a></h2> 
   <h2><a href="order.php?userid=<?php echo $user_id; ?>">pay offline</a></h2>
            </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
