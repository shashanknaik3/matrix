<?php
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  
.table{
   
    margin-top: 15px;
    text-align: center;
    
}
table{
    margin-top: 20px;
    border-collapse: collapse;
}
 table,td,th{
    border: 1px solid black;
} 
td,th{
   padding: 10px  20px 10px 20px;
   text-align: center;
   font-size: 20px;
}
thead{
    background-color: #2c3e50;
     color:white;
     font-size: 20px;
}
    </style>
</head>
<body>
    <?php
    
        $user_email=$_SESSION['email'];
        $get_user="SELECT * from tblregister where email='$user_email'";
        $result_user=mysqli_query($con,$get_user);
        $row_fech=mysqli_fetch_assoc($result_user);
        $userid=$row_fech['userid'];

    ?>
<table >
    <thead>
    <tr>
        <th>SL NO.</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <?php
        $getuser_order="SELECT * from tblorder where userid=$userid";
        $result_order=mysqli_query($con,$getuser_order);
        while($row_orders=mysqli_fetch_assoc($result_order)){
            $order_id=$row_orders['orderid'];
            $due_ammount=$row_orders['due_ammount'];
            $invoice_no=$row_orders['invoice_no'];
            $total_products=$row_orders['total_products'];
            $order_status=$row_orders['order_status'];
            $oder_date=$row_orders['order_date'];
            $nunber=1;
            echo "<tr>
            <td>$nunber</td>
            <td>$due_ammount</td>
            <td>$total_products</td>
            <td>$invoice_no</td>
            <td>$oder_date</td>";
            
            ?>
            <?php
            if($order_status=='pending'){
                echo "<td><a href='user_area/confirmpayment.php?orderid=$order_id'>Pay</a></td>";
            }
            else{
                echo"<td>$order_status</td>";
            }
        
            
        
        $nunber++;
        }
    ?>
</table>
</body>
</html>

