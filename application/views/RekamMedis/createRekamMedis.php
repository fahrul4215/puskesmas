<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Rekam Medis</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables.min.css') ?>"/>
</head>
<body>
	<div class="container-fluid">
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
							<input class="btn btn-danger" type="submit" name="reset" value="Batal">
						</span>
					</td>
				</tr>
			</table>
		<?= form_close(); ?>
	</div>

	<script type="text/javascript" src="<?= base_url('assets/datatables.min.js') ?>"></script>
</body>
</html>