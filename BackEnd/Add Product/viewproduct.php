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
      </style>  
</head>
<body>
    <h2>All Products</h2>
    <div class="mid">
    <table>
    <thead>
    <tr>
        <th>Product Id</th>
        <th>Product Title</th>
        <th>Product Price</th>
        <th>Product Sold</th>
        <th>Available Stock</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <?php
         // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
     if(!$con){
         echo "not connected to database";
     }
        $get_product="SELECT * from tblproduct";
        $result=mysqli_query($con,$get_product);
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_name=$row['product_name'];
            $product_price=$row['product_price'];
            $stock=$row['stock'];
            $status=$row['status'];
        
        ?>
        <tr>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $product_name; ?></td>
            <td><?php echo $product_price; ?></td>
            <?php
        $get_count="SELECT * from tblorder_pending where product_id=$product_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        
    ?>
            <td><?php echo $rows_count; ?></td>
            <td><?php echo $stock; ?></td>
            <td><?php echo $status; ?></td>
            <td><a href='Add Product/editproduct.php?editaccount=<?php echo $product_id; ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='bindex.php?delete_product=<?php echo $product_id; ?>'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
      <?php
      }
      ?>  
    
   
   
</table>
    </div>
</body>
</html>
