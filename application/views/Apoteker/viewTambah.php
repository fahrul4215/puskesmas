<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Detail Obat | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>Tambah Obat Untuk Pasien</h3>
					</div>
					<?= form_open('Apoteker/tambah/'.$this->uri->segment(3)); ?>
					<table class="table table-hover">
						<tr>
							<td>Obat</td>
							<td>
								<select name="id_obat" class="form-control">
									<?php foreach ($obat as $o): ?>
										<?php if ((int)$o->jumlah > 0): ?>
											<option value="<?= $o->id_obat ?>"><?= $o->nama ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td><input class="form-control" type="number" name="jumlah" placeholder="Jumlah Obat" min="1"></td>
						</tr>
						<tr>
							<td>
								<input class="btn btn-success" type="submit" name="submit" value="Tambah">
								<a href="<?= site_url('Apoteker') ?>" class="btn btn-danger">Kembali</a>
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