<?php
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
    session_start();

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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
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
.buttons{
    outline: none;
    text-decoration: none;
    border: none;
	margin-top: 10px;
}
/* profile css */
.image{
    width: 100%;
   
    display: flex;
    justify-content: center;
   

}
.image img{
    height: 200px;
    width: 200px;
    border-radius: 50%;
    /* border: 10px solid black; */
}
.headline{
    margin-top: 20px;
}
.all_content{
    display: flex;
    flex-direction: column;
    align-items: center;

}
.buttonss button{
    margin-top: 40px;
    margin-right: 20px;
    margin-left: 20px;
    text-decoration: none;
    border: none;
}
.buttonss a{
    text-decoration: none;
    color: #ececec;
    transition: all 0.2s;
    background-color: #2c3e50;
    outline: none;
    border: none;
    padding: 10px 40px ;
    border-radius: 10px;
    display: inline-block;
	font-size: 10px;
	width: 150px;
    height: auto;
}
.buttonss a:hover{
    transform: scale(1.1);
}
.pending{
    text-align: center;
    margin-top: 40px;
    color: green;
}
.pending span{
    color: #21201e;
}
/* edit profile */
.title h3{
    text-align: center;
    margin-top: 50px;
}
 .middle{
    align-items: center;
    justify-content: center;
    display: flex;
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
    
</div>
</nav>
<!-- script for login redirect -->
<script>
    function login(){
        window.location.assign("./usser_area/login.php");
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
            
             else {      
            ?>
		<!-- php code ends	 -->
        
		</div>
        
	</section>
    <section class="profile">
        <div class="all_content">
            <div class="headline">
            <h2>
                User Profile
            </h2>
            </div>
            <?php
            if(!isset($_SESSION['email'])){
                echo "<script>alert('plese log in')</script>";
                echo "<script>window.location.assign('user_area/login.php');</script>"; 
            }
            else{
                $user_email=$_SESSION['email'];
                $user_image="SELECT * from tblregister where email='$user_email'";
                $result_image=mysqli_query($con,$user_image);
                $fech_image=mysqli_fetch_array($result_image);
                $user_image=$fech_image['profilepic'];
                echo "<div class='image'>
                <img src='../FrontEnd/user_area/tempimages/$user_image'>
                </div>";
            }
                
            ?>
            
            <div class="buttonss">
                <button type="submit"><a href="profile.php?pending_order">Pending Order</a></button>
                <button type="submit"><a href="user_area/editaccount.php?edit_acc">Edit Account</a></button>
                <button type="submit"><a href="profile.php?myorders">My order</a></button>
                <button type="submit"><a href="profile.php?delete_acc">Delete account</a></button>
                <button type="submit"><a href="./user_area/logout.php">Log Out</a></button>
            </div>
        
        
        </div>
    </section>
    <section>
    <?php 
    $user_email=$_SESSION['email'];
    $user_details="SELECT * from tblregister where email='$user_email'";
    $result_details=mysqli_query($con,$user_details);
    while($row_querry=mysqli_fetch_array($result_details)){
        $user_id=$row_querry['userid'];
        if(!isset($_GET['edit_acc'])){
            if(!isset($_GET['myorders'])){
                if(!isset($_GET['delete_acc'])){
                    $get_orders="SELECT * from tblorder where userid='$user_id' and order_status='pending'";
                    $result_order=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_order);
                    if($row_count>0){
                        echo " <div class='pending'>
                        <p>You Have <span>$row_count</span> Pending Orders</p>
                        <a href='profile.php?myorders'>My Orders</a>
                    </div'";
                    }
                }
            }

        }
    }
    }
    ?>
   </section>
   
   
        <?php
    if(isset($_GET['myorders'])){
        echo "<section>
        <div class='title'>
        <h3>My Orders</h3>
        </div>
       
        <div class='middle'>";
        include('user_area/myorder.php');
        echo "</div>
        </section>";
    }
    if(isset($_GET['delete_acc'])){
        include('user_area/delete_acc.php');
    }
    ?>
    
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
