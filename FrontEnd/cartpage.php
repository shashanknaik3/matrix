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
        <!-- <link rel="stylesheet" href="cartnavbar.css">
        <link rel="stylesheet" href="cartpage.css"> -->
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
.containers{
    margin-left: 20%;
}
h2{
    margin-left: 20%;
    font-size: 35px;
    margin-top: 15px;
} 
.cart{
     margin: 20px 0;
      margin-top: 27px; 
	background-color: #F6F5FA;;
    width: 75%;

    z-index: -1; 
}
.total-price{
	padding-bottom: 15px;
}
.cart-item{
	background-color: #fff;
	border-radius: 10px;
	padding: 15px 20px;
	margin-bottom: 20px;
}
.center-item{
    display: flex;
    align-items: center;
    justify-content: flex-start;
}
.cart-item img{
	width: 80px;
    margin-left: 7px;
}
.cart-item h6{
    padding: 0 30px;
    
    width: 200px;
    margin-bottom: 10px;
}
 


.btn-default{
	background-color: #fff;
}
.cart-item .form-control{
	background-color: #F6F5FA;
	border: none;
    width: 65px;
    border-radius: 10px!important;
    font-weight: 700;
    font-size: 20px;
    width: 45px;
   
}
.input-group{
	width: unset;
	flex-wrap: nowrap;
}
.status{
	text-align: right;
}
.check-out{
    float: right;
    padding: 10px 30px;
	font-size: 19px;
	background-color: #2FBE70;
	border: none;
}
.cart-items{
	background-color: #fff;
    height: 55px;
	border-radius: 10px;
	padding: 15px 20px;
	width: 75%;
}
.col-6 h6{
    position: relative;
    bottom: 20px;
}
.buttons button{
    margin-top: 20px;
    display: block;
    margin-bottom: 20px;
    color: #fff;
    width: 90px;
    height: 27px;
    margin-left: 400px;
    background-color: rgba(0, 136, 169, 1);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}

.buttons button:hover{
    background-color: rgba(0, 136, 169, 0.8);
} 
.chechout{
    margin-right: 25%;
    margin-top: 10px;
}
@import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');




.prod h2{
	margin-left: 41%;
	margin-bottom: 30px;
	font-size: 35px;
    margin-top: 10px;
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
.empty h6{
    margin-left: 30%;
    margin-top: 20px;
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
        
            <!-- php code  -->
            <?php
                
                
               if(isset($_GET['searchdata'])){
                    echo"<section class='products'>
                    <div class='prod'>
                    <h2>Our Products</h2>
                    </div>";
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

                        echo "
                        
		                <div class='all-products'>
                        <div class='product'>
                            <img src='../BackEnd/Add Product/products/$Prod_img1'>
                            <div class='product-info'>
                                <h4 class='product-title'>$product_name</h4>
                                <p class='product-price'>₹$product_price</p>
                                <div class='btns'>
                                    <button class='link'><a href='cartpage.php?add_to_cart=$product_id'>Add To Cart</a></button>
                                    <button class='link'><a href='productdetail.php?product_id=$product_id'>View More</a></button>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    echo"</div>
        
	                </section>";
                }
               

                
                else{
                    ?>
                    <?php
                     $con=mysqli_connect('localhost','root','','matrix');
                     if(!$con){
                     echo "not connected to database";
                     }
                    $ip = getIP();
                    $select_querry_cart="SELECT * from tblcart where ip_address='$ip'";
                    $result_cart=mysqli_query($con,$select_querry_cart);
                    $result_count=mysqli_num_rows($result_cart);
                    if($result_count==0){
                    echo"<section>
                    <div class='containers'>
                      <h2 class='carttilte'>My shopping cart</h2>
                      <div class='empty'>
                      <h6 class='carttilte'>cart is empty</h6>
                      </div>
                      </div>
                      </section>";
                    }
                    else{
                    ?>
                    
                    
                   
                    <section>
                    <div class='containers'>
                      <h2 class='carttilte'>My shopping cart</h2>
                  
                 <?php
                   $con=mysqli_connect('localhost','root','','matrix');
                   if(!$con){
                   echo "not connected to database";
                   }
                   $ip = getIP();
                   if(isset($_POST['update_cart'])){
                    $productz_id=$_POST['update_cart'];
                       $quantity=$_POST['qty'];
                       
                       $select_querry_cart="SELECT * from tblcart where ip_address='$ip'";
                    $result_cart=mysqli_query($con,$select_querry_cart);
                    $result_count=mysqli_num_rows($result_cart);
                    while($row=mysqli_fetch_array($result_cart)){
                        $cart_qty=$row['quantity'];
                        $product_id=$row['product_id'];
                        $select_querry_product="SELECT * from tblproduct where product_id='$product_id'";
                        $result_product=mysqli_query($con,$select_querry_product);
                        $row_product_price=mysqli_fetch_array($result_product);
                        $available_quantity=$row_product_price['stock'];
                        }
                       if($quantity>$available_quantity){
                        echo "<script>alert('selected quantity not available')</script>";
                       }else{
                        // $upadet_cart="UPDATE tblcart set quantity=$quantity where ip_address='$ip'";
                        $upadet_cart="UPDATE tblcart set quantity=$quantity where product_id='$productz_id'";
                        $result_cart_qty=mysqli_query($con,$upadet_cart);
                       }
                       
                      
                       
                   }


                    $con=mysqli_connect('localhost','root','','matrix');
                    if(!$con){
                    echo "not connected to database";
                    }
                    
                    $ip = getIP();
                    $total=0;
                    $select_querry_cart="SELECT * from tblcart where ip_address='$ip'";
                    $result_cart=mysqli_query($con,$select_querry_cart);
                    $result_count=mysqli_num_rows($result_cart);
                    while($row=mysqli_fetch_array($result_cart)){
                        $cart_qty=$row['quantity'];
                        $product_id=$row['product_id'];
                        $select_querry_product="SELECT * from tblproduct where product_id='$product_id'";
                        $result_product=mysqli_query($con,$select_querry_product);
                        while($row_product_price=mysqli_fetch_array($result_product)){
                            $product_price=array($row_product_price['product_price']);
                            $price_table=$row_product_price['product_price'];
                            $product_title=$row_product_price['product_name'];
                            $available_quantity=$row_product_price['stock'];
                            $product_image1=$row_product_price['product_image1'];
                            $product_subtotal=array_sum($product_price);
                            $product_total=$product_subtotal*$cart_qty;
                            $total+=$product_total;
                            echo "
                            <div class='cart'>
                                <div class='col-md-12 col-lg-10 mx-auto'>
                                    <div class='cart-item'>
                                        <div class='row'>
                                        
                                            <div class='col-md-7 center-item'>
                                                <img src='../BackEnd/Add Product/products/$product_image1'>
                                                <div class='title'>
                                                    <h6>$product_title </h6>
                                                    <h6><span>₹$product_total</span></h6>
                                                </div>
                                                <div class='col-md-5 center-item'>
                                                <div class='input-group number-spinner'>
                                                <form action='' method='post'>
                                                <input id='phone-number' type='number' min='1' max='100' class='form-control text-center' value='$cart_qty' name='qty'>
                                               
                                            </div>       
                                                <div class='buttons'>
                                                <button type='submit' name='update_cart' value='$product_id'>Update</button>
                                                <button type='submit' name='remove_cart' value='$product_id'>Remove</button>
                                                </div>
                                            </div>
                                            </form>
                                           
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                        }
                    }
                                     
                ?>
                
                    
                    <div class='cart-items'>
                        <div class='rows g-2'>
                            <div class='col-6'>
                                <h5>Subtotal: </h5>
                            </div>
                            <div class='col-6 status'>
                                <h6>₹<span id='sub-total'><?php echo "$total"; ?></span></h6>
                            </div>
                        </div>
                    </div> 
                    <div class='chechout'>
                        <a href="./user_area/checkout.php"><button type='button' class='btn btn-success check-out'>Check Out</button></a>
                    </div>
                    </div>
                    </section>
                   
                <?php
                }
            }
                ?>
              
               
       
          
</body>
</html>

<?php
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
 $ip = getIP();
if(isset($_POST['remove_cart'])){
   $product_id=$_POST['remove_cart'];
   $dele_cart="DELETE from tblcart where product_id=$product_id";
   $run_delete=mysqli_query($con,$dele_cart);
   if($run_delete){
    echo "<script>alert('product removed from cart')</script>";
    echo "<script>window.location.assign('cartpage.php');</script>";
   }
}
?>
<?php
    if(isset($_GET['add_to_cart'])){
      
     $con=mysqli_connect('localhost','root','','matrix');
     if(!$con){
         echo "not connected to database";
     }
    
        $ip=getIP();
       $product_id=$_GET['add_to_cart'];
       $select_querry_cart="SELECT * from tblcart where ip_address='$ip' and product_id=$product_id";
        $result_cart=mysqli_query($con,$select_querry_cart);
        $no_of_rows=mysqli_num_rows($result_cart);
        if($no_of_rows>0){
            echo "<script>alert('product alredy exist')</script>";
            echo "<script>window.location.assign('index.php');</script>";
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

