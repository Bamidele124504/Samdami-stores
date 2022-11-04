<?php
session_start();
foreach($_SESSION['cart']as $key => $value){
    if($value['id']==$_GET['id']){
        unset($_SESSION['cart'][$key]);
        echo"<script>alert('product has been removed..')</script>";
        echo"<script>window.location='cart.php'</script>";
    }
}


?>