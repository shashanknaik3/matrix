<?php
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
    session_start();
    if(isset($_GET['orderid'])){
        $orderid=$_GET['orderid'];
        $select_data="SELECT * from tblorder where orderid=$orderid";
        $result_order=mysqli_query($con,$select_data);
        $row_data=mysqli_fetch_assoc($result_order);
        $invoice_no=$row_data['invoice_no'];
        $due_amount=$row_data['due_ammount'];
    }
    if(isset($_POST['confirm_payment'])){
        $invoice_no=$_POST['invoice_no'];
        $amount=$_POST['amount'];
        $pay_mode=$_POST['payment_mode'];
        
        $insert_querry="INSERT into tblpayment (order_id,invoice_no,ammount,payment_mode) values($orderid,$invoice_no,$amount,'$pay_mode')";
        $result_querry=mysqli_query($con,$insert_querry);
        if($result_querry){
            echo "<script>alert('payment succesful')</script>";
                echo "<script>window.location.assign('../profile.php');</script>"; 
                $update_order="UPDATE tblorder set order_status='Processing' where orderid=$orderid";
        $result_complete=mysqli_query($con,$update_order);
        }
        
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
    <h3 class="text-center text-light">Confirm Payment</h3>
        <form action="" method="POST" action="">
            <div class="from-outline my-4 text-center w-50 m-auto">
                <input type="text" name="invoice_no" class="from-control w-50 m-auto" readonly value="<?php echo $invoice_no; ?>">
            </div>
            <div class="from-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light d-block">Amount</label>
                <input type="text" name="amount" class="from-control w-50 m-auto" readonly value="<?php echo $due_amount; ?>">
            </div>
            <div class="from-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="from-select w-50 m-auto">
                    <option>Select Payment mode</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="from-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirm" class="bg-info py-2 px-3 border-0" name="confirm_payment">
            </div>
           
        </form>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
