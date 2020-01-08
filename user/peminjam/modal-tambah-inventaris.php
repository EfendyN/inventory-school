<?php 
$hasil = $lib->getId();
$id = $hasil->fetch(PDO::FETCH_OBJ);
$ids = $id->maxKode;
$huruf_depan = "II";
$urutan = substr($ids, 3,8);
$urutan = (int) $urutan;
$urutan++;
$newID = $huruf_depan . sprintf("%03s", $urutan);

$hasill = $lib->getKi();
$idd = $hasill->fetch(PDO::FETCH_OBJ);
$idss = $idd->maxKode;
$huruf_depann = "KI";
$urutann = substr($ids, 3,8);
$urutann = (int) $urutann;
$urutann++;
$newKi = $huruf_depann . sprintf("%03s", $urutann);

?>
<style>
	.modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: -40;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
			padding: 0;
			left: 10%;s
            border: 1px solid #888;
            width: 40%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
		}

		.modal-content table tr td{
			border-top: none;
			border-bottom: none;
			padding-top: 1px;
		}
		
		.modal-content input[type = "text"]{
			width: 230px;
			border-bottom: 1px solid black;
			border-left: none;
			border-right: none;
			border-top: none;
		}

		.modal-content input[type = "date"]{
			border: none;
		}

		.modal-content select{
			border : none;
		}
        
        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0} 
            to {top:0; opacity:1}
        }
        
        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }
        
        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        
        .modal-header {
            padding: 2px 16px;
            background-color: #29bdda;
            color: white;
        }
        
		.modal-body {padding: 10px 10px;}
		
		a{
            color: black;
            text-decoration: none;
            transition: .3s ease;
            padding: 7px;
        }
        a:hover{
            color: #2b9dff;
		}
		
		.td-tambah{
			padding: 10px 10px;
			text-align: left;
			border-bottom: ;
		}

		#myBtn{
			background-color: #2C3E50;
			color: white;
			border-radius: 10px;
			font-weight: 100;
			font-size: 25px;
		}
		#myBtn:hover{
			background-color: #FF9900;
		}
	</style>
<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
					<h2>Tambah Inventaris</h2>
			</div>
						<div class="modal-body">
					<table>
						<form action="proses/inventaris.php?proses=Add" method="POST">
								<input type="hidden" name="id_inventaris" value="<?php echo $newID; ?>" readonly>
						<tr>
							<td class="td-tambah">ruangan</td>
							<td class="td-tambah">:</td> 
							<td class="td-tambah"><select name="id_ruang" >
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

										</select></td>
						</tr>
						<tr>
							<td class="td-tambah">jenis</td>
							<td class="td-tambah">:</td> 
							<td class="td-tambah"><select name="id_jenis" >
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

										</select></td>
						</tr>
						<tr>
							<td class="td-tambah">Operator</td>
							<td class="td-tambah">:</td> 
							<td class="td-tambah"><select name="id_op" >
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

										</select></td>
						</tr>
						<tr>
							<td class="td-tambah">nama barang</td>
							<td class="td-tambah">:</td>
							<td class="td-tambah"><input type="text" name="nama_barang"></td>
						</tr>
						<tr>
							<td class="td-tambah">info</td>
							<td class="td-tambah">:</td>
							<td class="td-tambah"><input type="text" name="info"></td>
						</tr>
						<tr>
							<td class="td-tambah">kuantity</td>
							<td class="td-tambah">:</td>
							<td class="td-tambah"><input type="number" name="kuantity"></td>
						</tr>
						<tr>
							<td class="td-tambah">Kondisi</td>
							<td class="td-tambah">:</td>
							<td class="td-tambah"><select name="kondisi">
											<option value="Baik">Baik</option>
											<option value="Rusak">Rusak</option>
										</select></td>
						</tr>
						<input type="hidden" name="kode_inventaris" value="<?php echo $newKi; ?>" readonly>
						<tr><td class="td-tambah"><input type="submit" value="Tambah" name="proses"></td></tr>
							</form>
						</table>
						</div>
	<!-- <div class="modal-footer">
	<h3>Modal Footer</h3>
	</div> -->
			</div>
		</div>
		<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>