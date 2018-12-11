<?php

?>

<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Data Obat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 		</head>
 		<body>
 			<div class="table table-bordered table-striped">
 				<div class="col-mx-5"></div>
 				<div class="col-mx-5">
 					<h1>Input Data Obat</h1>
 					<?php 
 						echo form_open_multipart('obat/create'); 
 						echo validation_errors();

 					?>
 					<div class="form-group">
 						<label>Tanggal Kadaluarsa<font color="red">*</font></label>
 						<input type="text" class="form-control" id="exp_date" name="exp_date" placeholder="Masukkan Tanggal Kadaluarsa (YYYY-MM-DD)">
 					</div>
 					<div class="form-group">
 						<label>Jumlah<font color="red">*</font></label>
 						<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
 					</div>
 					<div class="form-group">
 						<label>Nama Obat<font color="red">*</font></label>
 						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Obat">
 					</div>
 					<div class="form-group">
 						<label>Jenis Obat<font color="red">*</font></label>
 						<input type="text" class="form-control" id="jenis_obat" name="jenis_obat" placeholder="Masukkan Jenis Obat">
 					</div>
					
					<p align="center"><button type="submit" class="btn btn-primary">Submit</button></p>
 					<?php echo form_close(); ?>
 				</div>
 				<div class="col-md-4"></div>
 			</div>

 			<!-- jQuery -->
 			<script src="//code.jquery.com/jquery.js"></script>
 			<!-- Bootstrap JavaScript -->
 			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 			<script src="Hello World"></script>
 		</body>
 		</html>