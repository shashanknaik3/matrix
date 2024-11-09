<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-MATRIX</title>
    <link rel="stylesheet" href="./CSS for Index/navbar.css">
    
</head>
<body>
    <!-- navbar start -->
<header>
    <h2 class="welcome">Welcome Admin</h2>
    <h1 class="logo">ADMIN PAGE</h1>
    <a href="../FrontEnd/index.php" class="bt"><button>LOG OUT</button></a> 
</header>
</div>
        <div class="lowerNav">
            <div class="container">
                
                <div>
                    <button> <a href="./bindex.php?insertcat">Insert Catagory</a>  </button>
                </div>

                <div>    
                <button><a href="./bindex.php?viewproduct">View Product</a></button>
                </div>

                <div>
                <button> <a href="./Add Product/addproduct.php" target="_parent">Insert Products</a></button>
                </div>

                <div>
                <button><a href="./bindex.php?viewcat" target="_parent">View Category</a></button> 
                </div>

                <div>
                <button><a href="./bindex.php?allorder" target="_parent">All Orders</a></button> 
                   
                </div>

                <div>    
                <button><a href="./bindex.php?allpayment" target="_parent">All Payments</a></button> 
                
                
                </div>

                <div>  
                <button><a href="./bindex.php?allusers" target="_parent">All Users</a></button>  
                </div>
                
            </div>
        </div>
    </div>
</nav>
   <div class="container">
        <?php
            $con=mysqli_connect('localhost','root','','matrix');
            if(!$con){
                echo "not connected to database";
            }
            if(isset($_GET['insertcat'])){
                include('./AddCatagory/addcatagory.php');
            }
            if(isset($_GET['viewproduct'])){
                
                include('Add Product/viewproduct.php');
            }
            if(isset($_GET['delete_product'])){
                
                include('Add Product/delete_product.php');
            }
            if(isset($_GET['viewcat'])){
                
                include('AddCatagory/viewcategories.php');
            }
            if(isset($_GET['editcat'])){
                    
                include('AddCatagory/editcategories.php');
            }
                if(isset($_GET['allorder'])){
                
                    include('order/vieworder.php');
                }
                if(isset($_GET['allpayment'])){
                
                    include('payments/viewpayment.php');
                }
                if(isset($_GET['allusers'])){
                
                    include('listuser/listuser.php');
                }
        ?>
   </div>
</script>
</body>
</html>