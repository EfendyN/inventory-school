<?php
session_start();
if(empty($_SESSION['user_id']))
{
    header("Location: ../../view/login.php");
}
else{
    require('../class/inventaris.php');
    $lib = new inventaris();
    $data = array(
        @$_POST['id_inventaris'],
        @$_POST['id_ruang'],
        @$_POST['id_jenis'],
        @$_POST['id_op'],
        @$_POST['nama_barang'],
        @$_POST['info'],
        @$_POST['kuantity'],
        @$_POST['kondisi'],
        @$_POST['kode_inventaris']
    );
    $id = @$_REQUEST['id'];

    if($_GET['proses'] == "Add"){
        $proc = $lib->tambahInventaris($data);
        if($proc == true){
            echo "<script>url:location='../barang.php';</script>";
        }
        else{
            echo "<script>alert('Gagal tambah Data');</script>";
            echo "<script>url:location='../barang.php';</script>";
        }
    }
    elseif($_GET['proses'] == "Update"){
        $proc = $lib->updateInventaris($data);
        if($proc){
            echo "<script>url:location='../barang.php';</script>";
        }
        else{
            echo "<script>alert('Gagal Update Data');</script>";
            echo "<script>url:location='../editinventaris.php';</script>";
        }
    }
    elseif($_GET['proses'] == "Delete"){
        $proc = $lib->deleteSurat($id);
        if($proc == true){
            echo "<script>url:location='../barang.php';</script>";
        }
        else{
            echo "<script>alert('Gagal Menghapus Data');</script>";
            echo "<script>url:location='../barang.php';</script>";
        }
    }
}
?>