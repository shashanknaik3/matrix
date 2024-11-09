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
    <!-- <link rel="stylesheet" href="productdetail.css">
    <link rel="stylesheet" href="prodetailnav.css"> -->
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
    margin-top: 100px;
    width: 100%;
    

}
.wrapper{
    width: 90%;
    height: 100vh;
    margin: auto;
    display: flex;
}
.text{
    flex-basis: 45%;
}
.all-images{
    height: 80vh;
    display: flex;
}
.small-images{
    display: flex;
    flex-direction: column;
}
.small-images img{
    height: 50px;
    margin: 9px;
    margin-right: 50px;
    cursor: pointer;
    opacity: 0.6;
    width: 25px;
}
.small-images img:hover{
    opacity: 1;
}
.main-image img{
    height: 255px;
    margin-top: 10px;
}

.contents{
    display: flex;
    flex-direction: column;
    margin-left: 100px;
    margin-top: 30px;
}
  a{
    border: none;
    text-decoration: none;
    color: #fff;
 }  
 .buttn button{
    padding: 9px 25px;
background-color: rgba(0, 136, 169, 1);
border: none;
border-radius: 50px;
cursor: pointer;
transition: all 0.3s ease 0s;
margin-top: 20px;
margin-left: -5px;
margin-right: 10px;
}

.buttn button:hover {
background-color: rgba(0, 136, 169, 0.8);
} 

.price{
    margin-top: 10px;
    font-size: large;
    color: #555;
    font-weight: bold;
}
.description{
    font-size: large;
    margin-top: 10px;
}
.login button{
    margin-bottom: 7px;
}

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
.links a{
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
.links a:hover{
    transform: scale(1.1);
}
.contents p{
    width: 50%;
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
                     echo "<a href='cartpage.php'><i class='fa-sharp fa-solid fa-cart-shopping' style='margin-right: 8px'>
                     <sup>$no_of_rows</sup></i></a>";
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
                
                
            ?>
              
		
		<!-- php code ends	 -->
        
		
<!-- product card ends -->

<!-- product detail php code -->
<?php
    if(isset($_GET['product_id'])){
        $product_id=$_GET['product_id'];
        $select_querry_product="SELECT * from tblproduct where product_id=$product_id";
        $result_product=mysqli_query($con,$select_querry_product);
        while($row_data=mysqli_fetch_assoc($result_product)){
            $product_id=$row_data['product_id'];
            $product_name=$row_data['product_name'];
            $product_description=$row_data['product_description'];
            $producr_category=$row_data['category_id'];
            $Prod_img1=$row_data['product_image1'];
            $Prod_img2=$row_data['product_image2'];
            $Prod_img3=$row_data['product_image3'];
            $Prod_img4=$row_data['product_image4'];
            $product_price=$row_data['product_price'];

            echo "
            <div class='containers'>
            <div class='wrapper'>
                <div class='product-box'>
                    <div class='all-images'>
                        <div class='small-images'>
                            <img src='../BackEnd/Add Product/products/$Prod_img1' onclick='clickimg(this)'>
                            <img src='../BackEnd/Add Product/products/$Prod_img2' onclick='clickimg(this)'>
                            <img src='../BackEnd/Add Product/products/$Prod_img3' onclick='clickimg(this)'>
                            <img src='../BackEnd/Add Product/products/$Prod_img4' onclick='clickimg(this)'>
                        </div>
                        <div class='main-image'>
                            <img src='../BackEnd/Add Product/products/$Prod_img1' onclick='clickimg(this)' id='imagebbox'>
                        </div>
                    </div>
                    
                </div>
                <div class='contents'>    
                        <div class='text'>
                            <div class='conttent'>
                                <h4 class='brand'>$product_name</h4> 
                                <div class='price-box'>
                                    <p class='price'>₹$product_price</p>
                                </div>
                                <p class='description'>$product_description</p>
    
                            </div>
                            <div class='buttn'>
                                <button class='link'><a href='index.php?add_to_cart=$product_id'>Add To Cart</a></button>
                                <button class='link'><a href='index.php'>Go Back</a></button>
                                </div>
                        </div>
                        
                </div>
            </div>
        </div> ";
        }
    }
?>

<!-- product detail code end -->



<script>
    function clickimg(smallimg){
        var fullimg = document.getElementById("imagebbox");
        fullimg.src = smallimg.src;
    }
</script> 
</body>
</html>

<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia doloremque saepe nostrum error laborum quas dicta! Labore commodi numquam asperiores dolorem cumque ut repudiandae laudantium, id corporis est ipsum error perspiciatis voluptatibus ipsa libero quidem. Quod, et eligendi corporis dicta mollitia iure incidunt cumque sed exercitationem accusamus? Doloribus, laudantium perferendis.</p> -->