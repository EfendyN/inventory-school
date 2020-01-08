<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengembalian</title>
</head>
    <link rel="stylesheet" href="../../assets/css/pengembalian.css">
    <link rel="icon" type="image/png" href="../../assets/icon/logo.png">
    <link rel="icon" type="image/png" href="../../assets/icon/logo.png">
    <link rel="stylesheet" href="../../assets/css/peminjaman.css">
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.css"> 
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"> 
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/jquery.dataTables.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<body>
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
                        <li class="li-sidebar"><button ><a href="dashboard-operator.php">Dashboard</a></button></li>
                        <li class="li-sidebar"><button><a href="peminjaman.php">Peminjaman</a></button></li>
                        <li class="li-sidebar"><button class="button-selected"><a class="a-selected" href="#">Pengembalian</a></button></li>
                        <li class="li-sidebar"><button><a href="barang.php">Barang</a></button></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="content-kanan">
            <h1>List Pengembalian</h1>
            <table class="datat">
                    <thead>		
                        <tr>
                            <th>no</th>
                            <th>tanggal pinjam</th>
                            <th>tanggal kembali</th>
                            <th>status peminjaman</th>
                            <th>id pegawai</th>
                        </tr>
                    </thead>
                        <tr>
                            <td>1</td>
                            <td>5 maret 2019</td>
                            <td>7 maret 2019</td>
                            <?php
                                $status = "selesai";
                                if($status == "selesaii"){
                                    $color = "#f39c12";
                                }else{
                                    $color = "green";
                                }
                            ?>
                            <td>
                                <span style="color: <?=$color?>"><?php echo $status ?></span></a>
                            </td>
                            <td>p001</td>
                        </tr>
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
$(document).ready(function(){
    $('.datat').DataTable();
});
</script>
</html>