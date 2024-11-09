<?php
    // Databse connection
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
    if(isset($_GET['userid'])){
        $user_id=$_GET['userid'];
        $ip=getIP();
        $totsl_price=0;
        $select_cart_price="SELECT * from tblcart where ip_address='$ip'";
        $result_cart_price=mysqli_query($con,$select_cart_price);
        $result_count=mysqli_num_rows($result_cart_price);
        $invoice_no=mt_rand();
        $status='pending';
        while($row_price=mysqli_fetch_array($result_cart_price)){
            $product_id=$row_price['product_id'];
            $select_querry_product="SELECT * from tblproduct where product_id='$product_id'";
            $result_product=mysqli_query($con,$select_querry_product);
            while($row_product_price=mysqli_fetch_array($result_product)){
                $product_price=array($row_product_price['product_price']);
                // $available_quantity=$row_product_price['stock'];
                $product_subtotal=array_sum($product_price);
                $totsl_price+=$product_subtotal;
            }
        }
    }
    $select_cart_qty="SELECT * from tblcart";
    $result_cart_qty=mysqli_query($con,$select_cart_qty);
    $get_qty=mysqli_fetch_array($result_cart_qty);
    $qty=$get_qty['quantity'];
    if($qty>0){
        $quatity=$qty;
        $subtotal=$totsl_price * $quatity;
    }
    $insert_order="INSERT INTO tblorder(userid,due_ammount,invoice_no,total_products,order_date,order_status) values ('$user_id','$subtotal','$invoice_no','$result_count',now(),'$status')";
    $sql_execute=mysqli_query($con,$insert_order);
    if($sql_execute){
        $select_cart_price="SELECT * from tblcart where ip_address='$ip'";
        $result_cart_price=mysqli_query($con,$select_cart_price);
        $result_count=mysqli_num_rows($result_cart_price);
        while($row_price=mysqli_fetch_array($result_cart_price)){
            $product_id=$row_price['product_id'];
            $select_querry_product="SELECT * from tblproduct where product_id='$product_id'";
            $result_product=mysqli_query($con,$select_querry_product);
            while($row_product_price=mysqli_fetch_array($result_product)){
            $available_quantity=$row_product_price['stock'];
            $available=$available_quantity-$qty;
            $update_querry="UPDATE tblproduct set stock='$available' WHERE product_id='$product_id'";
            $sql_execute=mysqli_query($con,$update_querry);
            }
        }
        
        echo "<script>alert('orderd succefully')</script>";
        echo "<script>window.location.assign('../profile.php');</script>";
    
    $insert_prnding_order="INSERT INTO tblorder_pending(userid,invoice_no,product_id,quantity,order_status) values ('$user_id','$invoice_no','$product_id','$quatity','$status')";
    $sql_execute_pending=mysqli_query($con,$insert_prnding_order);

    $empty_cart="DELETE from tblcart where ip_address='$ip'";
    $empty_execute=mysqli_query($con,$empty_cart);
    }
?>
