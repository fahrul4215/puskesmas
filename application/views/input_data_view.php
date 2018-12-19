<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PASIEN | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>INPUT DATA PASIEN</h3>
					</div>
					<div class="table table-striped">
						<div class="col-mx-5">
							<?php 
								echo form_open_multipart('Pasien/create'); 
								echo validation_errors();
							?>
							<div class="form-group">
								<label>Nama Pasien<font color="red">*</font></label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Input field">
							</div>
							<div class="form-group">
								<label>Alamat<font color="red">*</font></label>
								<input type="text" class="form-control" id="alamat" name="alamat">
							</div>
							<div class="form-group">
								<label>Jenis KElamin<font color="red">*</font></label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Pekerjaan<font color="red">*</font></label>
								<input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir<font color="red">*</font></label>
								<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
							</div>
							<div class="form-group">
								<label>Jenis Kartu<font color="red">*</font></label>
								<select class="form-control" id="id_jenis_kartu" name="id_jenis_kartu">
									<option value="" selected="selected"></option>
									<?php foreach($jenis_kartu as $jk) { ?>
										<option value="<?php echo $jk->id_jenis_kartu; ?>"><?php echo $jk->nama_kartu; ?></option>
									<?php } ?>
								</select>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
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