<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Petugas | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>EDIT DATA PETUGAS</h3>
					</div>
					<div class="table table-striped">
						<div class="col-mx-5">
							<?php 
							echo form_open('petugas/update/'.$this->uri->segment(3));
							echo validation_errors();
							?>
							<div class="form-group">
								<label>Nama Petugas<font color="red">*</font></label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Petugas" value="<?= $petugas[0]->nama ?>">
							</div>
							<div class="form-group">
								<label>Username<font color="red">*</font></label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama Username" value="<?= $petugas[0]->username ?>">
							</div>
							<div class="form-group">
								<label>Password<font color="red">*</font></label>
								<input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" >
							</div>

							<p align="center"><button type="submit" class="btn btn-primary">Update</button></p>
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