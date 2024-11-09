<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
body{
  overflow: hidden;
}
.container{
  padding: 25px 30px;
  border-radius: 5px;
  padding-top: 10px;
  
 
} 
.container .title{
  font-size: 25px;
  font-weight: 500;
  text-align: center;
}  
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}



.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0;
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background-color: rgba(0, 136, 169, 1);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background-color: rgba(0, 136, 169, 0.8);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
 }
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
}
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
  </style>
</head>
<body>
  <div class="container">
    <div class="title">
        <h2>ADD PRODUCT</h2>
    </div>
      <div class="content">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Product Name</span>
              <input type="text" name="product_name" placeholder="Enter your username" required maxlength="50" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Product Description</span>
              <input type="text" name="product_description" placeholder="Enter Product Description" required autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Product Keyword</span>
              <input type="text" name="product_keyword" maxlength="50" placeholder="Enter Product Keyword" required  autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Product price</span>
              <input type="text" name="product_price" maxlength="10" placeholder="Enter Product Price" required autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Product image1</span>
              <input type="file" name="$Prod_img1" required>
            </div>
            <div class="input-box">
              <span class="details">Product image2</span>
              <input type="file" name="$Prod_img2" required>
            </div>
            <div class="input-box">
              <span class="details">Product image3</span>
              <input type="file" name="$Prod_img3" required>
            </div>
            <div class="input-box">
              <span class="details">Product image4</span>
              <input type="file" name="$Prod_img4" required>
            </div>
            <div class="input-box">
              <span class="details">Product for OUt Of Stock</span>
              <input type="file" name="outofstock_image" required>
            </div>
            <div class="input-box">
              <span class="details">Total Stock</span>
              <input type="number" name="$Prod_stock" max="100" required placeholder="Enter total stock">
            </div>

            <div class="input-box">
              <span class="details">Product Category</span>
              <select name="producr_category">
              <option value="$category_id">Select Category</option>
               <!-- php code for category -->
            <?php
               $con=mysqli_connect('localhost','root','','matrix');
               if(!$con){
                   echo "not connected to database";
               }

              $select_querry_category="SELECT * from tblcategories";
              $result_querry=mysqli_query($con,$select_querry_category);
              while($row=mysqli_fetch_assoc($result_querry)){
                $category_title=$row['category_name'];
                $category_id=$row['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
              }
            ?>
              <!-- php code ends -->
             </select>
            </div>
          </div>
          <div class="button">
              <input type="submit" value="Insert" name="insert_products">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php
  
  

  // accesing data from form
  if(isset($_POST['insert_products'])){

    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_price=$_POST['product_price'];
    $total_stock=$_POST['$Prod_stock'];
    // accessing image
    $Prod_img1=$_FILES['$Prod_img1']['name'];
    $Prod_img2=$_FILES['$Prod_img2']['name']; 
    $Prod_img3=$_FILES['$Prod_img3']['name'];
    $Prod_img4=$_FILES['$Prod_img4']['name'];
    $outofstock_image=$_FILES['outofstock_image']['name'];
   

    // accesing temp name
    $Product_image1_tmp=$_FILES['$Prod_img1']['tmp_name'];
    $Product_image2_tmp=$_FILES['$Prod_img2']['tmp_name'];
    $Product_image3_tmp=$_FILES['$Prod_img3']['tmp_name'];
    $Product_image4_tmp=$_FILES['$Prod_img4']['tmp_name'];
    $outofstock_image_tmp=$_FILES['outofstock_image']['tmp_name'];

    // up-loading image
    
   

    $producr_category=$_POST['producr_category'];
    

    $product_status='true';
   
     $select_querry_product="SELECT * from tblproduct where product_name='$product_name'";
     $result_product=mysqli_query($con,$select_querry_product);
 
     // checking for existing product
     $rows_count_product=mysqli_num_rows($result_product);
     
     if($rows_count_product>0){
       echo "<script>alert('product alredy exist')</script>";
     }
     else{

      move_uploaded_file($Product_image1_tmp,"./products/$Prod_img1");
      move_uploaded_file($Product_image2_tmp,"./products/$Prod_img2");
      move_uploaded_file($Product_image3_tmp,"./products/$Prod_img3");
      move_uploaded_file($Product_image4_tmp,"./products/$Prod_img4");
      move_uploaded_file($outofstock_image_tmp,"./products/$outofstock_image");
  
    $sql="INSERT INTO tblproduct(product_name,product_description,product_keywords,product_price,product_image1,product_image2,product_image3,product_image4,outofstock_image,category_id,date,status,stock) values ('$product_name','$product_description','$product_keyword','$product_price','$Prod_img1','$Prod_img2','$Prod_img3','$Prod_img4','$outofstock_image','$producr_category',NOW(),'$product_status',$total_stock)";

    $sql_execute=mysqli_query($con,$sql);

    if($sql_execute){
      echo "<script>alert('data inserted')</script>";
      echo "<script>window.location.assign('../bindex.php');</script>";
      
    }
    else{
      echo "<script>alert('data not inserted')</script>";
    }
  }
  }
?>
