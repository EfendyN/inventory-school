<?php
session_start();
if(!in_array($_GET['id'], $_SESSION['cart'])){
    if(array_push($_SESSION['cart'], $_GET['id']))
        {
            echo "<script>alert('barang berhasil masuk ke keranjang!');</script>";
            echo "<script>url:location='../cart.php';</script>";
        }
}
else{
    $_SESSION['message'] = 'produk sudah didalam cart';
}
?>