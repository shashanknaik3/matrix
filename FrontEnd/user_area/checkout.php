<?php
    // Databse connection
     $con=mysqli_connect('localhost','root','','matrix');
    if(!$con){
        echo "not connected to database";
    }
session_start();

?>



<?php

              
                    if(!isset($_SESSION['email'])){
                        echo "<script>alert('plese log in')</script>";
                        echo "<script>window.location.assign('login.php');</script>"; 
                    }
                    else{
                        echo "<script>window.location.assign('payment.php');</script>"; 
                    }
                
                ?>
                			
    <!-- product card ends -->
    </body>
    </html>