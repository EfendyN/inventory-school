<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman</title>
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
                        <li class="li-sidebar"><button class="button-sidebar" id="button-selected"><a id="a-selected" href="#">Peminjaman</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="riwayat.php">Riwayat</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="cart.php">Cart</a></button></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="content-kanan">
            <h1>List Peminjaman</h1>
            <table class="datat">
                    <thead>		
                        <tr>
                            <th>no</th>
                            <th>id peminjaman</th>
                            <th>tanggal peminjaman</th>
                            <th>tanggal pengembalian</th>
                            <th>status peminjaman</th>
                            <!-- <th>id peminjam</th> -->
                        </tr>
                    </thead>
                    <?php
					$i = 1;
						require_once('class/peminjaman.php');
						$lib = new peminjaman();
                        $data = $lib->bacaPeminjaman2();
						foreach($data as $peminjaman){
					?>
					<tr>
						<td class="td-list"><?php echo $i ?></td>
						<td class="td-list"><?php echo $peminjaman['id_peminjaman'] ?></td>
						<td class="td-list"><?php echo $peminjaman['tanggal_peminjaman'] ?></td>
						<td class="td-list"><?php echo $peminjaman['tanggal_pengembalian'] ?></td>
						<td class="td-list"><button style="color:white;" class="button-table"><?php echo $peminjaman['status_peminjaman'] ?></button></td>
                        <!-- <td class="td-list"><button class="button-table"><a href="detailPeminjaman.php?id=<?php echo $peminjaman['id_peminjaman'] ?>" id="a-table"><?php echo $peminjaman['id_peminjam'] ?></a></button></td> -->
						<!-- <td class="td-list">
                            <button class="button-table"><a href="editInventaris.php?id=<?php echo $peminjaman['id_inventaris'] ?>" id="a-table">edit</a>
                            <button class="button-table"><a href="proses/peminjaman.php?id=<?php echo $peminjaman['id_inventaris'] ?>&proses=Delete" id="a-table">delete</a>
                            <button class="button-table"><a href="detailInventaris.php?id=<?php echo $peminjaman['id_inventaris'] ?>" id="a-table">detail</a>
						</td> -->
					</tr>
						<?php 
						$i++;
        					}
						?>
            </table>
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