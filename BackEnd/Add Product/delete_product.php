<?php
    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
        $delete_product="DELETE from tblproduct where product_id='$delete_id'";
        $result_products=mysqli_query($con,$delete_product);
        if($result_products){
            echo "<script>alert('Product Deleted')</script>";
            echo "<script>window.location.assign('bindex.php');</script>";
        }
    }
?>