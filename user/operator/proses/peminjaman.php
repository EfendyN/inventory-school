<?php
session_start();
if(empty($_SESSION['user_id']))
{
    header("Location: ../../view/login.php");
}
else{
    require('../class/peminjaman.php');
    $lib = new peminjaman();

    $dataPeminjaman = array(
        @$_POST['id_peminjaman'],
        @$_POST['tanggal_peminjaman'],
        @$_POST['tanggal_pengembalian'],
        @$_POST['status_peminjaman'],
        @$_POST['id_peminjam'],
        "1"
    );

    $data = array(
        @$_POST['status_peminjaman']
    );

    $id = @$_REQUEST['id'];

    if($_GET['proses'] == "Update"){
        $proc = $lib->updateStatus($data,$id);
        if($proc){
            echo "<script>alert('Status Berhasil Diubah!');</script>";
            echo "<script>url:location='../peminjaman.php';</script>";
        }
        else{
            echo "<script>alert('Gagal Update status');</script>";
            echo "<script>url:location='../editPeminjaman.php';</script>";
        }
    }
    elseif($_GET['proses'] == "AddPeminjaman"){
        $proc = $lib->tambahPeminjaman($dataPeminjaman);
        if($proc){
            echo "<script>url:location='../peminjaman.php';</script>";
        }
        else{
            echo "<script>alert('Gagal Update status');</script>";
            echo "<script>url:location='../editPeminjaman.php';</script>";
        }
    }
}
?>