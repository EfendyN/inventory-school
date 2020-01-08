<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<link rel="stylesheet" href="assets/css/dashboard.css">
<link rel="icon" type="image/png" href="assets/icon/logo.png">
<body>

<div class="content1" id="awal">
    <div class="container">
        <nav id="navbar">
            <ul>
                <li><img class="img1" src="assets/icon/logo.png"></li>
                <li><a href="#feature">Feature</a></li>
                <li><a href="#barang">Barang</a></li>
                <li class="login"><a href="view/login.php">Login</a></li>
            </ul>
        </nav>
    </div>
</div>  

<div class="content2" id="feature">
    <div class="container">
        <div class="sampul">
            <div class="garis"></div>
            <h1 class="h1-c2">Apa yg bisa dilakukan?</h1>
            <span>⦁ Pinjam barang lebih mudah</span><br>
            <span>⦁ Cari barang yang anda butuhkan disini</span><br>
            <span>⦁ Memudahkan anda melakukan transaksi peminjaman barang</span>
        </div>
        <img class="img2" src="assets/img/delivery.png">
    </div>
</div>

<div class="content3">
    <div class="container">

        <img class="img3" src="assets/img/inventory-management.png">

        <div class="sampul2">
            <span>Inventory adalah persediaan dalam bahasa Indonesia. 
                Persediaan, kaitannya dengan aktivitas logistik sebuah perusahaan, 
                merupakan suatu kegiatan yang menyediakan stok bahan baku atau barang 
                setengah jadi ataupun barang jadi demi kelancaran proses produksi dan/atau 
                pemenuhan permintaan pelanggan.</span>
        </div>
        <div class="sampul2-1" id="barang">
            <h1 class="h1-barang">Barang</h1>
            <div class="card">
                <div class="contentCard">
                    <div class="tempat-img-barang">
                        <img class="img-barang" src="assets/img/mouse.png" alt="">
                    </div>
                    <h4>Mouse</h4>
                    <span>Stok: 24</span>
                </div>
            </div>
            <div class="card">
                <div class="contentCard">
                    <div class="tempat-img-barang">
                        <img class="img-barang" src="assets/img/laptop.png" alt="">
                    </div>
                    <h4>Laptop</h4>
                    <span>Stok: 32</span>
                </div>
            </div>
            <div class="card">
                <div class="contentCard">
                    <div class="tempat-img-barang">
                        <img class="img-barang" src="assets/img/proyektor.png" alt="">
                    </div>
                    <h4>Proyektor</h4>
                    <span>Stok: 24</span>
                </div>
            </div>
            <div class="card">
                <div class="contentCard">
                    <div class="tempat-img-barang">
                        <img class="img-barang" src="assets/img/table.png" alt="">
                    </div>
                    <h4>meja</h4>
                    <span>Stok: 24</span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script>
jQuery(function($){
    var $navbar = $('.content1');
    $(window).scroll(function(event) {
    var $current = $(this).scrollTop();
         if( $current > 0 ){
              $navbar.addClass('navbar-color');
         } else {
              $navbar.removeClass('navbar-color');
         }
    });
 });
</script>
</html>