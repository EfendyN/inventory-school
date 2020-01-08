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
                        <li class="li-sidebar"><button class="button-sidebar" id="button-selected"><a id="a-selected" href="peminjaman.php">Peminjaman</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav" href="pengembalian.php">Pengembalian</a></button></li>
                        <li class="li-sidebar"><button class="button-sidebar"><a id="a-nav"
                         href="barang.php">Barang</a></button></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="content-kanan">
            <h1>Edit Status</h1>
            <table>
            <?php
            require('class/peminjaman.php');
            $lib = new peminjaman();
            $data = $lib->editPeminjaman($_GET['id']);
            foreach($data as $peminjaman){
        ?>
						<form action="proses/peminjaman.php?proses=Update" method="POST">
                        <tr>	
							<td>Status saat ini : </td>
						</tr>
                        <tr>
							<td>⦁ <?php echo $peminjaman['status_peminjaman']; ?></td>
						</tr>
						<tr>
							<td>Ubah Status</td>
						</tr>
						<tr> 
                        <input type="hidden" name="id" value="<?=$peminjaman['id_peminjaman']?>">
							<td><select name="status_peminjaman">
									<option value="Pending">Pending</option>
                                    <option value="Dikonfirmasi">Dikonfirmasi</option>
                                    <option value="Dikembalikan">Dikembalikan</option>
                                    <option value="Ditolak">Ditolak</option>
								</select>
                            </td>
						</tr>
                        <?php } ?>
                        <tr>
                            <td><input type="submit" value="Edit" name="proses" class="button"> <button class="button"><a href="peminjaman.php">Batal</a></button></td>
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