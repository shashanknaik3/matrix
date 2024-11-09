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
 input[type="submit"]{
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
  .button{
   height: 45px;
   margin: 35px 0;
   width: 100%;
 }

 .button input:hover{
  /* transform: scale(0.99); */
  background-color: rgba(0, 136, 169, 0.8);
  }

  </style>
</head>
<body>
    <?php
     // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
        if(isset($_GET['editaccount'])){
            $select_id=$_GET['editaccount'];
            $select_product="SELECT * from tblproduct where product_id =$select_id";
            $result_product=mysqli_query($con,$select_product);
            $row=mysqli_fetch_assoc($result_product);
            $product_title=$row['product_name'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_price=$row['product_price'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_image4=$row['product_image4'];
            $outofstock_image=$row['outofstock_image'];
            $category_id=$row['category_id'];
            $stock=$row['stock'];

            $select_category="SELECT * from tblcategories where category_id=$category_id";
            $result_category=mysqli_query($con,$select_category);
           $row=mysqli_fetch_assoc($result_category);
              $category_title=$row['category_name'];
              
        }
    ?>
  <div class="container">
    <div class="title">
        <h2>ADD PRODUCT</h2>
    </div>
      <div class="content">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Product Name</span>
              <input type="text" name="product_name" placeholder="Enter your username" value="<?php echo $product_title; ?>" required maxlength="40" autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Product Description</span>
              <input type="text" name="product_description" placeholder="Enter Product Description" value="<?php echo $product_description; ?>"  required autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Product Keyword</span>
              <input type="text" name="product_keyword" placeholder="Enter Product Keyword" maxlength="50" value="<?php echo $product_keywords; ?>"  required  autocomplete="off">
            </div>
            <div class="input-box">
              <span class="details">Product price</span>
              <input type="text" name="product_price" placeholder="Enter Product Price" maxlength="10" value="<?php echo $product_price; ?>" required autocomplete="off">
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
              <input type="number" name="$Prod_stock" value="<?php echo $stock; ?>" max="100"  placeholder="Enter total stock">
            </div>
            <div class="input-box">
              <span class="details">Product Category</span>
              <select name="producr_category">
              
              <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
               <!-- php code for category -->
            <?php
               $con=mysqli_connect('localhost','root','','matrix');
               if(!$con){
                   echo "not connected to database";
               }

              $select_querry_category="SELECT * from tblcategories";
              $result_querry=mysqli_query($con,$select_querry_category);
              while($row=mysqli_fetch_assoc($result_querry)){
                $category_titles=$row['category_name'];
                $category_id=$row['category_id'];
                if($category_titles!=$category_title){
                echo "<option value='$category_id'>$category_titles</option>";
                }
              }
            ?>
              <!-- php code ends -->
            </select>
            </div>
          </div>
          <div class="button">
              <input type="submit" value="Update" name="Update_products">
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php
    if(isset($_POST['Update_products'])){
    $updated_name=$_POST['product_name'];
    $updated_description=$_POST['product_description'];
    $updated_keyword=$_POST['product_keyword'];
    $updated_price=$_POST['product_price'];
    $updated_stock=$_POST['$Prod_stock'];
    $updated_category=$_POST['producr_category'];

    // accessing image
    $updated_img1=$_FILES['$Prod_img1']['name'];
    $updated_img2=$_FILES['$Prod_img2']['name']; 
    $updated_img3=$_FILES['$Prod_img3']['name'];
    $updated_img4=$_FILES['$Prod_img4']['name'];
    $outofstock_imagez=$_FILES['outofstock_image']['name'];
   

    // accesing temp name
    $updated_image1_tmp=$_FILES['$Prod_img1']['tmp_name'];
    $updated_image2_tmp=$_FILES['$Prod_img2']['tmp_name'];
    $updated_image3_tmp=$_FILES['$Prod_img3']['tmp_name'];
    $updated_image4_tmp=$_FILES['$Prod_img4']['tmp_name'];
    $outofstock_imagez_tmp=$_FILES['outofstock_image']['tmp_name'];

    move_uploaded_file($updated_image1_tmp,"./products/$updated_img1");
    move_uploaded_file($updated_image2_tmp,"./products/$updated_img2");
    move_uploaded_file($updated_image3_tmp,"./products/$updated_img3");
    move_uploaded_file($updated_image4_tmp,"./products/$updated_img4");
    move_uploaded_file($outofstock_imagez_tmp,"./products/$outofstock_imagez");

    
      $update_products="UPDATE tblproduct set product_name='$updated_name',product_description='$updated_description',product_keywords='$updated_keyword',product_price='$updated_price',product_image1='$updated_img1',product_image2='$updated_img2',product_image3='$updated_img3',product_image4='$updated_img4',outofstock_image='$outofstock_imagez',category_id='$updated_category',stock=$updated_stock where product_id='$select_id'";
    $update_result=mysqli_query($con,$update_products);
    if($update_result){
      echo "<script>alert('data Updated')</script>";
      echo "<script>window.location.assign('../../BackEnd/bindex.php');</script>";
    }
  }
?>



