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
						<h3>EDIT DATA PASIEN</h3>
					</div>
					<div class="table table-striped">
						<div class="col-mx-5">
							<?php 
							echo form_open('pasien/update/'.$this->uri->segment(3));
							echo validation_errors();
							?>

							<div class="form-group">
								<label>Nama Pasien<font color="red">*</font></label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Input field" value="<?php echo $pasien[0]->nama ?>">
							</div>
							<div class="form-group">
								<label>Alamat<font color="red">*</font></label>
								<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $pasien[0]->alamat ?>">
							</div>
							<div class="form-group">
								<label>Jenis KElamin<font color="red">*</font></label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $pasien[0]->jenis_kelamin ?>">
									<option value="L">L</option>
									<option value="P">P</option>
								</select>
							</div>
							<div class="form-group">
								<label>Pekerjaan<font color="red">*</font></label>
								<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $pasien[0]->pekerjaan ?>">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir<font color="red">*</font></label>
								<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $pasien[0]->tgl_lahir ?>">
							</div>
							<div class="form-group">
								<label>Jenis Kartu<font color="red">*</font></label>
								<select class="form-control" id="id_jenis_kartu" name="id_jenis_kartu" value="<?php echo $pasien[0]->id_jenis_kartu ?>">
									<option value="" selected="selected"></option>
									<?php foreach($jenis_kartu as $jk) { ?>
										<option value="<?php echo $jk->id_jenis_kartu; ?>"><?php echo $jk->nama_kartu; ?></option>
									<?php } ?>
								</select>
							</div>

<!-- 							<div class="form-group">
								<label>Password pasien<font color="red">*</font></label>
								<input type="text" class="form-control" id="password_pasien" name="password_pasien" value="<?php echo $pasien[0]->password ?>">
							</div>
 -->							<p align="center"><button type="submit" class="btn btn-primary">Update</button></p>
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