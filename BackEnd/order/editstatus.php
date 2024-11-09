<?php
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
    session_start();
    if(isset($_GET['editpayment'])){
        $order_id=$_GET['editpayment'];
    }
    if(isset($_POST['upStatus'])){
        
        $status=$_POST['status'];
        $update_order="UPDATE tblorder set order_status='$status' where orderid=$order_id";
        $result_complete=mysqli_query($con,$update_order);
            echo "<script>alert('Status changed')</script>";
            echo "<script>window.location.assign('../bindex.php');</script>";
                
        }
        
    
?>
<!DOCTYPE html>
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
    <h3 class="text-center text-light">Order Status</h3>
        <form action="" method="POST">
            <div class="from-outline my-4 text-center w-50 m-auto">
                <select name="status" class="from-select w-50 m-auto">
                    <option>Select Status</option>
                    
                    <option>Paid</option>
                </select> 
            </div>
            <div class="from-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Update Status" class="bg-info py-2 px-3 border-0" name="upStatus">
            </div>
           
        </form>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
