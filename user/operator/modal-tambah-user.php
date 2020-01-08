<?php 
$hasill = $lib->getIdUser();
$ids = $hasill->fetch(PDO::FETCH_OBJ);
$idss = $ids->maxKode;
$huruf_depann = "IS";
$urutann = substr($idss, 3,8);
$urutann = (int) $urutann;
$urutann++;
$newIdUser = $huruf_depann . sprintf("%03s", $urutann);

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
			left: 0%;s
            border: 1px solid #888;
            width: 40%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
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
            text-decoration: none;
            transition: .3s ease;
            padding: 0px 5px 0px 5px;
    		border-radius: 10px;
        }
		
		.td-tambah{
			padding: 10px 10px;
			text-align: left;
			border-bottom: ;
		}

		#myBtn{
			background-color: #2C3E50;
			color: white;
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
					<h2>Tambah User</h2>
			</div>
						<div class="modal-body">
					<table class="table-modal">
						<form action="proses/peminjaman.php?proses=AddUser" method="POST">
								<input type="hidden" name="id_user" value="<?php echo $newIdUser; ?>" readonly>
						<tr class="tr-modal">
							<td class="td-modal">level</td>
							<td class="td-modal">:</td> 
							<td class="td-modal"><?php
											require_once('class/peminjaman.php');
											$lib = new peminjaman();
											$data = $lib->getNamaLevel();
											foreach($data as $level){
										?><?php echo $level[0]; ?>
							<?php } ?>
							</td>
						</tr>
						<tr class="tr-modal">
							<td class="td-modal">username</td>
							<td class="td-modal">:</td>
							<td class="td-modal"><input type="text" name="username"></td>
						</tr>
						<tr class="tr-modal">
							<td class="td-modal">password</td>
							<td class="td-modal">:</td>
							<td class="td-modal"><input type="text" name="password"></td>
						</tr>
						<tr class="tr-modal">
							<td class="td-modal">email</td>
							<td class="td-modal">:</td>
							<td class="td-modal"><input type="text" name="email"></td>
						</tr>
						<tr class="tr-modal"><td class="td-modal"><input type="submit" value="Tambah" name="proses"></td></tr>
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