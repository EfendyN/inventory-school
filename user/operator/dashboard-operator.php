<?php

// Start Session
session_start();

// check user login
if(empty($_SESSION['user_id']))
{ 	
    header("Location: ../../view/login.php");
}


// Application library ( with DemoLib class )
require('loginClass.php');
$lib = new Validations();
$app = $lib->getUser($_SESSION['user_id']);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Operator</title>
</head>
<link rel="icon" type="image/png" href="../../assets/icon/logo.png">
<link rel="stylesheet" href="../../assets/css/dashboard-operator.css">
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
                        <li class="li-sidebar"><button class="button-selected"><a href="#" class="a-selected">Dashboard</a></button></li>
                        <li class="li-sidebar"><button><a href="peminjaman.php">Peminjaman</a></button></li>
                        <li class="li-sidebar"><button><a href="pengembalian.php">Pengembalian</a></button></li>
                        <li class="li-sidebar"><button><a href="barang.php">Barang</a></button></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="tempat-card">
            <h1 class="h1-selamatdatang">Selamat Datang!</h1>
            <div class="card">
                <div class="tempat-text-card">
                    <h1 class="h1-card">Peminjaman</h1>
                    <p class="p-card">1</p>
                </div>
            </div>
            <div class="card">
                <div class="tempat-text-card">
                    <h1 class="h1-card">Pengembalian</h1>
                    <p class="p-card">1</p>
                </div>
            </div>
            <div class="card">
                <div class="tempat-text-card">
                    <h1 class="h1-card">Barang</h1>
                    <p class="p-card">20</p>
                </div>
            </div>
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