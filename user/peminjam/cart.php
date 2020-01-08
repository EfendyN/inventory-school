<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
    <link rel="icon" type="image/png" href="../../assets/icon/logo.png">
    <link rel="stylesheet" href="../../assets/css/barang-peminjam.css">
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.css"> 
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"> 
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/jquery.dataTables.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
<body>
<style>
table.dataTable tbody td {
    padding: 25px 25px;
}    
</style>
<div class="content">
        <div class="">
            <nav class="nav-navbar">
                <ul class="ul-navbar">
                    <li id="li-navbar"><img class="li-logo" src="../../assets/icon/logo.png" alt=""></li>
                    <li id="li-navbar">INSECT</li>
                    <div class="dropdown">
                        <li id="li-navbar" class="dropbtn" onclick="myFunction()">Welcome, Peminjam ▼</li>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#profile">Profile</a>
                                <a onclick="return confirm('Apakah Anda Yakin Ingin Logout?');" href="../../view/logout.php">Logout</a>
                            </div>
                    </div>
                </ul>
            </nav>
        </div>
        <div class="sidebar">
            <div class="tempat-foto-profile">
                <img class="icon-sidebar" src="../../assets/icon/userr.png" alt="">
            </div>
            <div class="tempat-nav-sidebar">
                <nav class="nav-sidebar">
                    <ul class="ul-sidebar">
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="dashboard-peminjam.php">Dashboard</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="barang.php">Barang</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="peminjaman.php">Peminjaman</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="riwayat.php">Riwayat</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar" id="button-selected"><a id="a-selected" href="#">Cart</a></button></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="content-kanan">
            <h1>Keranjang Barang</h1>
            <table class="datat">
				<thead>		
					<tr>
						<th>no</th>
						<th>nama barang</th>
						<th colspan="2">aksi</th>
						<!-- <th>aksi</th> -->
					</tr>
				</thead>
					<?php
                    session_start();
                    require_once('class/inventaris.php');
                    if(!empty($_SESSION['cart'])){
                        $lib = new inventaris();
                        $i = 1;
						foreach($_SESSION['cart'] AS $inventaris){
                            $cart = $lib->detailInventaris($inventaris);
                            foreach ($cart AS $data){
                        
                    ?>
					<tr>
						<td class="td-list"><?php echo $i ?></td>
						<td class="td-list"><?php echo $data['nama_barang'] ?></td>
						<td class="td-list"><button class="button-table"><a href="simpan_cart.php?id=<?php echo $data['id_inventaris']; ?>" id="a-table">Simpan</a></button></td>
						<!-- <td class="td-list">
                            <button class="button-table"><a href="editInventaris.php?id=<?php echo $inventaris['id_inventaris'] ?>" id="a-table">edit</a>
                            <button class="button-table"><a href="proses/inventaris.php?id=<?php echo $inventaris['id_inventaris'] ?>&proses=Delete" id="a-table">delete</a>
                            <button class="button-table"><a href="detailInventaris.php?id=<?php echo $inventaris['id_inventaris'] ?>" id="a-table">detail</a>
						</td> -->
					</tr>
						<?php 
						$i++;
                            }
                        }
                    }
						?>
            </table>
            <a href="proses/delete_all_cart.php">Delete All</a> <a href="lanjutkan.php">Lanjutkan</a>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.datat').DataTable();
                });
                
            </script>
        </div>
</div>
</body>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
$(document).ready(function(){
    $('.datat').DataTable();
});
</script>
</html>