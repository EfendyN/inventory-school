<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang</title>
</head>
    <link rel="icon" type="image/png" href="../../assets/icon/logo.png">
    <link rel="stylesheet" href="../../assets/css/barang.css">
    <link rel="stylesheet" href="../../assets/css/editInventaris.css">
<body>
<style>
table.dataTable tbody td {
    padding: 10px 0px;
}    
</style>
<div class="content">
        <div class="">
            <nav class="nav-navbar">
                <ul class="ul-navbar">
                    <li id="li-navbar"><img class="li-logo" src="../../assets/icon/logo.png" alt=""></li>
                    <li id="li-navbar">INSECT</li>
                    <div class="dropdown">
                        <li id="li-navbar" class="dropbtn" onclick="myFunction()">Welcome, Operator ▼</li>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#profile">Profile</a>
                                <a onclick="return confirm('Apakah Anda Yakin Ingin Logout?');" href="../../index.php">Logout</a>
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
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="dashboard-operator.php">Dashboard</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="peminjaman.php">Peminjaman</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="pengembalian.php">Pengembalian</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar" id="button-selected"><a id="a-selected" href="barang.php">Barang</a></button></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="content-kanan">
            <h1>Edit Inventaris</h1>
            <table>
            <?php
            require('class/inventaris.php');
            $lib = new inventaris();
            $data = $lib->editInventaris($_GET['id']);
            foreach($data as $inventaris){
        ?>
						<form action="proses/inventaris.php?proses=Update" method="POST">
                        <tr>	
							<td>id inventaris</td> 
							<td>:</td> 
							<td><input type="text" name="id_inventaris" value="<?php echo $inventaris['id_inventaris'];?>" readonly></td>
						</tr>
                        <tr>
							<td>ruangan</td>
							<td>:</td> 
							<td><select name="id_ruang" >
										<?php
											require_once('class/inventaris.php');
											$lib = new inventaris();
											$data = $lib->getRuang();
											foreach($data as $ruang){
										?>
										<option value="<?=$ruang[0]?>"><?=$ruang[1]?></option>
										<?php
											}
										?>

										</select>
                            </td>
						</tr>
						<tr>
							<td>jenis</td>
							<td>:</td> 
							<td><select name="id_jenis" >
										<?php
											require_once('class/inventaris.php');
											$lib = new inventaris();
											$data = $lib->getJenis();
											foreach($data as $jenis){
										?>
										<option value="<?=$jenis[0]?>"><?=$jenis[1]?></option>
										<?php
											}
										?>

										</select>
                            </td>
						</tr>
						<tr>
							<td>Operator</td>
							<td>:</td> 
							<td><select name="id_op" >
										<?php
											require_once('class/inventaris.php');
											$lib = new inventaris();
											$data = $lib->getOperator();
											foreach($data as $operator){
										?>
										<option value="<?=$operator[0]?>"><?=$operator[3]?></option>
										<?php
											}
										?>

										</select>
                            </td>
						</tr>
						<tr>
							<td>nama barang</td>
							<td>:</td>
							<td><input type="text" name="nama_barang" value="<?php echo $inventaris['nama_barang'];?>"></td>
						</tr>
						<tr>
							<td>info</td>
							<td>:</td>
							<td><input type="text" name="info" value="<?php echo $inventaris['info'];?>"></td>
						</tr>
						<tr>
							<td>kuantity</td>
							<td>:</td>
							<td><input type="number" name="kuantity" value="<?php echo $inventaris['kuantity'];?>"></td>
						</tr>
						<tr>
							<td>Kondisi</td>
							<td>:</td>
							<td><select name="kondisi">
											<option value="Baik">Baik</option>
											<option value="Rusak">Rusak</option>
										</select></td>
						</tr>
                        <tr>
							<td>kode inventaris</td>
							<td>:</td>
							<td><input type="text" name="kode_inventaris" value="<?php echo $inventaris['kode_inventaris'];?>" readonly></td>
						</tr>
						<?php } ?>
                        <tr>
                            <td><input type="submit" value="Edit" name="proses" class="button"> <button class="button"><a href="barang.php">Batal</a></button></td>
                        </tr>
							</form>
						</table>
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
</script>
</html>