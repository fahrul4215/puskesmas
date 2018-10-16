<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Rekam Medis | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>TAMBAH REKAM MEDIS</h3>
					</div>
					<?= form_open($this->uri->segment(3)); ?>
					<table class="table table-hover">
						<tr>
							<td>Pasien</td>
							<td><input type="text" name="id_pasien" id="inputId_pasien" class="form-control" value="" required="required" placeholder=""></td>
						</tr>
						<tr>
							<td>Dokter</td>
							<td><input type="text" name="id_dokter" id="inputId_dokter" class="form-control" value="" required="required" placeholder=""></td>
						</tr>
						<tr>
							<td>Resep</td>
							<td><input type="text" name="id_resep" id="inputId_resep" class="form-control" value="" required="required" placeholder=""></td>
						</tr>
						<tr>
							<td>Diagnosa</td>
							<td><input type="text" name="diagnosa" id="inputDiagnosa" class="form-control" value="" required="required" placeholder=""></td>
						</tr>
						<tr>
							<td colspan="2" class="text-center">
								<span class="input-group-btn">
									<input class="btn btn-primary" type="submit" name="submit" value="Tambah">
									<input class="btn btn-warning" type="reset" name="reset" value="Reset">
									<a class="btn btn-danger" href="<?= site_url('RekamMedis') ?>">Batal</a>
								</span>
							</td>
						</tr>
					</table>
					<?= form_close(); ?>
				</div>
			</div>
		</section>
	</section>
	<?php $this->load->view('templates/section2'); ?>

	<?php $this->load->view('templates/javascript'); ?>
</body>
</html>