<?php
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
    @session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix-Electronicss</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="product.css"> -->
   <style>
    *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	
}

body{
	font-size: 1.7rem;
	font-family: 'Merriweather Sans', sans-serif;
	background: whitesmoke;
	overflow: scroll;

}


.upperNav{
    height: 7vh;
    background-color: #2c3e50;
    padding: 5px;
}
.upperNav .container{
    width: 80vw;
    margin: auto;
    height: 5vh;
    display: flex;
    align-items: center;
   
}
.upperNav .container .searchbox{
    width: 45%;
     /* height: 100%; */
    margin-left: 34px;
    background-color: #fff;
    padding: auto;
    
}
.upperNav .container .searchbox input{
    width: 92%;
    height: 80%;
    border: 0;
    padding-left: 35px;
    padding-bottom: 2px;
    outline: none;
    position: relative;
    bottom: 5px;
}
.upperNav .container .searchbox input::placeholder{
    color: #474747;
    
}
.upperNav .container .searchbox .search i{
    color: #3E72E8;
    font-size: 18px;
    position: relative;
    bottom: 5px;
}
.login button{
    margin-left: 20px;
    padding: 6px 25px; 
    color: #3E72E8;
    background-color: #fff;
    border: none;
    font-size: 15px;
    margin-bottom: 4px;
}
.upperNav .container .rightContainer{
    display: flex;
    width: 30%;
    justify-content: space-between;
    margin-left: 35px;
}
.upperNav .container .rightContainer a{
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    margin-top: 5px;
}
button:hover{
    cursor: pointer;
}

.upperNav .container .rightContainer i{
    
    font-size: 18px;
}
.lowerNav{
    height: 10vh;
}
.lowerNav .container{
    margin: auto;
    width: 90%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.container h3{
    color: rgb(255, 255, 255);
    font-size: 30px;
}


.lowerNav .container .cat a{
    color: black;
    text-decoration: none;
    font-size: 15px;
    cursor: pointer;
}
.search {
    outline: none;
    border: none;
}
.rightContainer sup{
   /* background: #fff; */
   color: white;
   border-radius: 10px;
  
   margin-left: 5px;
   font-size: small;
}

/* product css */

@import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');




h2{
	text-align: center;
	margin-bottom: 30px;
	font-size: 35px;
    margin-top: 4px;
}

.all-products{
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
}

.product{
	overflow: hidden;
	background: #ffffff;
	color: #21201e;
	text-align: center;
	/* width: 240px;
	height: 400px; */
    width: 220px;
    height: 325px;
	
	padding-bottom: 12px;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	
	border-radius: 10px;
	margin: 5px;
}

.product .product-title, .product .product-price{
	font-size: 15px;
	margin-top: 5px;
}



.product:hover {
	box-shadow: 5px 15px 25px #eeeeee;
}

.product img {
	height: 175px;
	margin: 20px;
	transition: all 0.3s;
}

   


.btns button{
    outline: none;
    text-decoration: none;
    border: none;
	margin-top: 10px;

}
.link a{
    text-decoration: none;
    color: #ececec;
    transition: all 0.2s;
    background-color: #2c3e50;
    outline: none;
    border: none;
    padding: 10px 10px ;
    border-radius: 10px;
    display: inline-block;
	font-size: 10px;
	width: 90px;
}
.link a:hover{
    transform: scale(1.1);
}

   </style>
</head>
<body>

<!-- Nvabar start -->
<nav>
<div class="main">
        <div class="upperNav">
            <div class="container">
                <h3 class="logomat">Matrix</h3>
                <div class="searchbox">
                    <form method="GET" action="" enctype="multipart/form-data">
                        <input type="text" placeholder="Search for products,brands and more" name="search_data">
                        <button class="search" type="submit" name="searchdata"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="login">
                <?php
                    if(!isset($_SESSION['email'])){
                        echo "<button onclick='login()'>Login</button>";
                    }else{
                        echo "<button onclick='logout()'>Logout</button>";
                    }

                ?>
                </div>
             
                <div class="rightContainer">
                    <a href="./index.php">Home</a>
                    <a href="profile.php">User Profile</a>
                    <?php
                     $select_querry_cart="SELECT * from tblcart";
                     $result_cart=mysqli_query($con,$select_querry_cart);
                     $no_of_rows=mysqli_num_rows($result_cart);
                     if($no_of_rows>0){
                     echo "<a href='cartpage.php'><i class='fa-sharp fa-solid fa-cart-shopping' style='margin-right: 8px'>
                     <sup>$no_of_rows</sup></i></a>";
                     }else{
                        echo "<a href='cartpage.php'><i class='fa-sharp fa-solid fa-cart-shopping' style='margin-right: 8px'>
                     <sup></sup></i></a>";
                     }

                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="lowerNav">
        <div class="container">
            <!-- php code for getting category from database -->
            <?php
                $select_brands="SELECT * from tblcategories";
                $result_category=mysqli_query($con,$select_brands);
                while($row_data=mysqli_fetch_assoc($result_category)){
                    $category_name=$row_data['category_name'];
                    $category_id=$row_data['category_id'];
                     echo " 
                    <div class='cat'>
                        <a href='index.php?category=$category_id'>$category_name</a>
                    </div>";
                }
            ?>
        </div>
    </div>
</div>
</nav>
<!-- script for login redirect -->
<script>
    function login(){
        window.location.assign("./user_area/login.php");
    }
    function logout(){
        window.location.assign("./user_area/logout.php");
    }
</script>
<!-- navbar end -->

<!-- product card start -->
    <section class="products">
		<h2>Our Products</h2>
		<div class="all-products">
        
            <!-- php code  -->
            <?php
                
                // grtting unique category
                if(isset($_GET['category'])){
                    $category_id=$_GET['category'];
                    $select_querry_product="SELECT * from tblproduct WHERE category_id=$category_id";
                    $result_product=mysqli_query($con,$select_querry_product);
                    $no_of_rows=mysqli_num_rows($result_product);
                    if($no_of_rows==0){
                        echo "<h6>No Stock Available</h6>";
                    }
                    while($row_data=mysqli_fetch_assoc($result_product)){
                        $product_id=$row_data['product_id'];
                        $product_name=$row_data['product_name'];
                        $product_description=$row_data['product_description'];
                        $producr_category=$row_data['category_id'];
                        $Prod_img1=$row_data['product_image1'];
                        $product_price=$row_data['product_price'];
                        $available_stock=$row_data['stock'];
                        $outofstock_image=$row_data['outofstock_image'];
                        if($available_stock>1){
                            echo "
                            <div class='product'>
                                <img src='../BackEnd/Add Product/products/$Prod_img1'>
                                <div class='product-info'>
                                    <h4 class='product-title'>$product_name</h4>
                                    <p class='product-price'>₹$product_price</p>
                                    <div class='btns'>
                                        <button class='link'><a href='index.php?add_to_cart=$product_id'>Add To Cart</a></button>
                                        <button class='link'><a href='productdetail.php?product_id=$product_id'>View More</a></button>
                                    </div>
                                </div>
                            </div>";
                        }
                        // else{
                            // echo "
                            // <div class='product'>
                            //     <img src='../BackEnd/Add Product/products/$outofstock_image'>
                            //     <div class='product-info'>
                            //         <h4 class='product-title'>$product_name</h4>
                            //         <p class='product-price'>₹$product_price</p>
                            //         <div class='btns'>
                            //             <button class='link'><a href='index.php?add_to_cart=$product_id'>Add To Cart</a></button>
                            //             <button class='link'><a href='productdetail.php?product_id=$product_id'>View More</a></button>
                            //         </div>
                            //     </div>
                            // </div>";
                        // }
                       
                    }
                }
                
                elseif(isset($_GET['searchdata'])){
                    $search_value=$_GET['search_data'];
                    $select_querry_product="SELECT * from tblproduct WHERE product_keywords like '%$search_value%'";
                    $result_product=mysqli_query($con,$select_querry_product);
                    while($row_data=mysqli_fetch_assoc($result_product)){
                        $product_id=$row_data['product_id'];
                        $product_name=$row_data['product_name'];
                        $product_description=$row_data['product_description'];
                        $producr_category=$row_data['category_id'];
                        $Prod_img1=$row_data['product_image1'];
                        $product_price=$row_data['product_price'];
                        $available_stock=$row_data['stock'];
                        $outofstock_image=$row_data['outofstock_image'];
                        if($available_stock>1){
                            echo "
                            <div class='product'>
                                <img src='../BackEnd/Add Product/products/$Prod_img1'>
                                <div class='product-info'>
                                    <h4 class='product-title'>$product_name</h4>
                                    <p class='product-price'>₹$product_price</p>
                                    <div class='btns'>
                                        <button class='link'><a href='index.php?add_to_cart=$product_id'>Add To Cart</a></button>
                                        <button class='link'><a href='productdetail.php?product_id=$product_id'>View More</a></button>
                                    </div>
                                </div>
                            </div>";
                        }
                        // else{
                        //     echo "
                        //     <div class='product'>
                        //         <img src='../BackEnd/Add Product/products/$outofstock_image'>
                        //         <div class='product-info'>
                        //             <h4 class='product-title'>$product_name</h4>
                        //             <p class='product-price'>₹$product_price</p>
                        //             <div class='btns'>
                        //                 <button class='link'><a href='index.php?add_to_cart=$product_id'>Add To Cart</a></button>
                        //                 <button class='link'><a href='productdetail.php?product_id=$product_id'>View More</a></button>
                        //             </div>
                        //         </div>
                        //     </div>";
                        // }
                    }
                }

                // condition for category sorting
                else{
                    $select_querry_product="SELECT * from tblproduct";
                    $result_product=mysqli_query($con,$select_querry_product);
                    while($row_data=mysqli_fetch_assoc($result_product)){
                        $product_id=$row_data['product_id'];
                        $product_name=$row_data['product_name'];
                        $product_description=$row_data['product_description'];
                        $producr_category=$row_data['category_id'];
                        $Prod_img1=$row_data['product_image1'];
                        $product_price=$row_data['product_price'];
                        $available_stock=$row_data['stock'];
                        $outofstock_image=$row_data['outofstock_image'];
                        if($available_stock>0){
                            echo "
                            <div class='product'>
                                <img src='../BackEnd/Add Product/products/$Prod_img1'>
                                <div class='product-info'>
                                    <h4 class='product-title'>$product_name</h4>
                                    <p class='product-price'>₹$product_price</p>
                                    <div class='btns'>
                                        <button class='link'><a href='index.php?add_to_cart=$product_id'>Add To Cart</a></button>
                                        <button class='link'><a href='productdetail.php?product_id=$product_id'>View More</a></button>
                                    </div>
                                </div>
                            </div>";
                        }
                        // else{
                        //     echo "
                        //     <div class='product'>
                        //         <img src='../BackEnd/Add Product/products/$outofstock_image'>
                        //         <div class='product-info'>
                        //             <h4 class='product-title'>$product_name</h4>
                        //             <p class='product-price'>₹$product_price</p>
                        //             <div class='btns'>
                        //                 <button class='link'><a href='index.php?add_to_cart=$product_id'>Add To Cart</a></button>
                        //                 <button class='link'><a href='productdetail.php?product_id=$product_id'>View More</a></button>
                        //             </div>
                        //         </div>
                        //     </div>";
                        // }
                    }
                }
            
                
            ?>
		<!-- php code ends	 -->
        
		</div>
        
	</section>
<!-- product card ends -->

</body>
</html>

<?php
    if(isset($_GET['add_to_cart'])){
      
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
        
        $select_querry_product="SELECT * from tblproduct";
        $result_product=mysqli_query($con,$select_querry_product);
        while($row_data=mysqli_fetch_assoc($result_product)){
            $available_stock=$row_data['stock'];
        }

       $product_id=$_GET['add_to_cart'];
       $select_querry_product="SELECT * from tblproduct where product_id=$product_id";
        $result_product=mysqli_query($con,$select_querry_product);
        $row_data=mysqli_fetch_assoc($result_product);
        $available_stock=$row_data['stock'];

       $select_querry_cart="SELECT * from tblcart where ip_address='$ip' and product_id=$product_id";
        $result_cart=mysqli_query($con,$select_querry_cart);
        $no_of_rows=mysqli_num_rows($result_cart);
        if($no_of_rows>0){
            echo "<script>alert('product alredy exist')</script>";
            echo "<script>window.location.assign('index.php');</script>";
        }
        elseif($available_stock<1){
            echo "<script>alert('product is out of stock')</script>";
        }
        else{
            $inser_cart="INSERT INTO tblcart(product_id,ip_address,	quantity) values($product_id,'$ip',1)";
            $result_cart=mysqli_query($con,$inser_cart);
            if($result_cart){
            echo "<script>alert('product added to cart')</script>";
            echo "<script>window.location.assign('index.php');</script>";
            }
        }
    }
?>