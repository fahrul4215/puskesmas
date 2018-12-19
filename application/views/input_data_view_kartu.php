<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JENIS KARTU | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>INPUT JENIS KARTU</h3>
					</div>
					<div class="table table-striped">
						<div class="col-mx-5">
							<?php 
							echo form_open_multipart('kartu/create'); 
							echo validation_errors();
							?>
							<div class="form-group">
								<label>Nama Kartu<font color="red">*</font></label>
								<input type="text" class="form-control" id="nama_kartu" name="nama_kartu" placeholder="Masukkan Nama Jenis Kartu">
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