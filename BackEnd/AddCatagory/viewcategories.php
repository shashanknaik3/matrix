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
    <h2>All Categories</h2>
    <div class="mid">
    <table>
    <thead>
    <tr>
        <th>Category Id</th>
        <th>Category Title</th>
        <th>Edit</th>
        <!-- <th>Delete</th> -->
    </tr>
    </thead>
    <?php
         // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
     if(!$con){
         echo "not connected to database";
     }
        $get_category="SELECT * from tblcategories";
        $result=mysqli_query($con,$get_category);
        while($row=mysqli_fetch_assoc($result)){
            $category_name=$row['category_name'];
            $category_id=$row['category_id'];
            echo " <tr>
            <td>$category_id</td>
            <td>$category_name
            </td>
            <td><a href='./bindex.php?editcat=$category_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
            
    </tr>";
        }
        ?>
       <!-- <td><a href=''><i class='fa-solid fa-trash'></i></a></td> -->
        
    
   
   
</table>
    </div>
</body>
</html>
