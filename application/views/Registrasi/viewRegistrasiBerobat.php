<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registrasi Berobat | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>REGISTRASI BEROBAT</h3>
					</div>
					<?= form_open('Registrasi/berobat'); ?>
					<table class="table table-hover">
						<tr>
							<td>Nama Pasien</td>
							<td>
								<select id="cariSelectBox" name="id_pasien" class="form-control" required="required">
									<option value="">--- Pilih Pasien ---</option>
									<?php foreach ($pasien as $p): ?>
										<option value="<?= $p->id_pasien ?>"><?= $p->nama ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Nama Poli</td>
							<td>
								<select name="id_poli" class="form-control" required="required">
									<option value="">--- Pilih Poli ---</option>
									<?php foreach ($poli as $po): ?>
										<option value="<?= $po->id_poli ?>"><?= $po->nama ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>No Antrian</td>
							<td><input type="number" name="no_antrian" class="form-control" value="<?= $no_antrian ?>" required="required" readonly></td>
						</tr>
						<tr>
							<td colspan="2" class="text-center">
								<span class="input-group-btn">
									<input class="btn btn-primary" onclick="printAntrian()" type="submit" name="submit" value="Tambah">
									<!-- <button class="btn btn-primary" onclick="printAntrian()">Print</button> -->
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
	<script src="https://cdn.jsdelivr.net/npm/recta/dist/recta.js"></script>
	<script type="text/javascript">
		var printer = new Recta('bsjdal124125', '1811');

		function printAntrian(){
			printer.open().then(function () {
				printer.align('center')
				.text('================================')
				.text('Antrian Puskesmas')
				.bold(true)
				.feed(1)
				.text(<?= $no_antrian ?>)
				.mode('A', true, true, false, false)
				.feed(1)
				.text('Mohon Sabar Menunggu')
				.text('Terima Kasih')
				.text('================================')
				.cut()
				.print()
			});
		}

		// window.print();
	</script>
</body>
</html>