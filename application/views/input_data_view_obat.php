<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Poli | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>INPUT DATA OBAT</h3>
					</div>
					<div class="table table-striped">
						<div class="col-mx-5">
							<?php 
							echo form_open_multipart('obat/create'); 
							echo validation_errors();
							?>
							<div class="form-group">
								<label>Tanggal Kadaluarsa<font color="red">*</font></label>
								<input type="date" class="form-control" id="exp_date" name="exp_date" placeholder="Masukkan Tanggal Kadaluarsa (YYYY-MM-DD)">
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
				</div>
			</div>
		</section>
	</section>
	<?php $this->load->view('templates/section2'); ?>

	<?php $this->load->view('templates/javascript'); ?>
</body>
</html>