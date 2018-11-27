<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables.min.css') ?>"/>
	<style type="text/css">
		.container-fluid {
			display: grid;
			width: 100%;
			grid-template-columns: repeat(3, 1fr);
			grid-template-rows: repeat(3, 1fr);
			height: 100vh;
			background-image: url(<?= base_url('assets/gambar/bg1.jpg') ?>);
			color: #fff;
		}
		.judul{
			grid-column: 1/4;
			align-self: center;
		}
		.kiri {
			align-self: center;
		}
		.tengah {
			align-self: center;
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			padding: 10%;
			border-radius: 10px;
			background: rgba(0, 0, 0, 0.3);
		}
		.kanan {
			align-self: center;
		}
		.button{
			grid-column: 1/3;
			margin-top: 10%;
			text-align: center;
		}
		img {
			width: 50%;
		}
	</style>
</head>
<body>
	<?= form_open('login/dokter'); ?>
		<div class="container-fluid">
			<div class="judul">
				<div class="" id="pesan">
					<?php if ($gagal = $this->session->flashdata('gagal')): ?>
						<p class="alert alert-danger"><?= $gagal ?></p>
					<?php endif ?>
				</div>
				<h1 class="text-center">Login as Dokter</h1>
			</div>
			<div class="kiri text-center">
				<img src="<?= base_url('assets/gambar/LogoDepkes.png') ?>" alt="Logo Depkes">
			</div>
			<div class="tengah">
				<div class="text-center">
					<h4>Username</h4>
					<br>
					<h4>Password</h4>
				</div>
				<div>
					<input type="text" name="username" class="form-control" required>
					<br>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="button">
					<input class="btn btn-primary" name="login" type="submit" value="Login">
					<input class="btn btn-danger" name="reset" type="reset" value="Batal">
				</div>
			</div>
			<div class="kanan text-center">
				<img src="<?= base_url('assets/gambar/LogoPuskesmas.png') ?>" alt="Logo Depkes">
			</div>
		</div>
	<?= form_close(); ?>
	
	<script type="text/javascript" src="<?= base_url('assets/datatables.min.js') ?>"></script>
	<script type="text/javascript">
		setTimeout(function(){
			document.getElementById('pesan').style.display = 'none';
		}, 5000);
	</script>
</body>
</html>