<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
  h2{
    text-align: center;
    margin-top: 10px;
  }
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
  .mid{
    align-items: center;
    justify-content: center;
    display: flex;
}
td{
    background-color: whitesmoke;
    color: black;
}
td a{
    color: black;
}
h3{
    text-align: center;
    margin-top: 20px;
    color: #2c3e50;
}
      </style>  
</head>
<body>
    <h2>All Orders</h2>
    
    <?php
         // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
     if(!$con){
         echo "not connected to database";
     }
        $get_order="SELECT * from tblorder";
        $result=mysqli_query($con,$get_order);
        $count_rows=mysqli_num_rows($result);
        if($count_rows==0){
            echo "<h3>No Orders To Display</h3>";
        }
        else{
        echo "<div class='mid'>
        <table>
        <thead>
        <tr>
            <th>Oeder Id</th>
            <th>Due Amount</th>
            <th>Invoice No</th>
            <th>Total Product</th>
            <th>Status</th>
            <th>Edit Status</th>
            <th>Order Date</th>
        </tr>
        </thead>";
        }
        
        
        while($row=mysqli_fetch_assoc($result)){
            $orderid=$row['orderid'];
            $due_ammount=$row['due_ammount'];
            $invoice_no=$row['invoice_no'];
            $total_products=$row['total_products'];
            $order_date=$row['order_date'];
            $order_status=$row['order_status'];
            echo " <tr>
            <td>$orderid</td>
            <td>$due_ammount</td>
            <td>$invoice_no</td>
            <td>$total_products</td>
            <td>$order_status</td>
            <td><a href='order/editstatus.php?editpayment=$orderid'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td>$order_date</td> 
 
    </tr>";
        }
    
        ?>
        
    
   
   
</table>
    </div>
</body>
</html>
