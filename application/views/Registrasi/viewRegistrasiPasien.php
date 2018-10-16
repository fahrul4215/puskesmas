<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registrasi Pasien | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>REGISTRASI PASIEN</h3>
					</div>
					<?= form_open('Registrasi/pasien'); ?>
					<table class="table table-hover">
						<tr>
							<td>Nama</td>
							<td><input type="text" name="nama" class="form-control" value="" required="required" placeholder="Masukkan nama anda"></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>
								<div class="">
									<div class="col-md-2 dated">
										<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
											<input type="text" name="tgl_lahir" readonly="" value="dd-mm-YYYY" size="16" class="form-control">
											<span class="input-group-btn add-on">
												<button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" name="alamat" class="form-control" value="" required="required" placeholder="Masukkan alamat anda" multiple=""></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<div class="radio">
									<label>
										<input type="radio" name="jenis_kelamin" value="L" checked="checked">
										Laki-Laki
									</label>
									<br>
									<label>
										<input type="radio" name="jenis_kelamin" value="P">
										Perempuan
									</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td><input type="text" name="pekerjaan" class="form-control" value="" required="required" placeholder="Masukkan pekerjaan anda"></td>
						</tr>
						<tr>
							<td>Jenis Kartu</td>
							<td>
								<select name="id_jenis_kartu" class="form-control" required="required">
									<option value="">--- Pilih Jenis Kartu ---</option>
									<?php foreach ($jenisKartu as $jk): ?>
										<option value="<?= $jk->id_jenis_kartu ?>"><?= $jk->nama_kartu ?></option>										
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="text-center">
								<span class="input-group-btn">
									<input class="btn btn-primary" type="submit" name="submit" value="Tambah">
									<input class="btn btn-warning" type="reset" name="reset" value="Reset">
									<a class="btn btn-danger" href="<?= site_url('home') ?>">Batal</a>
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