<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>DIAGNOSA DOKTER | Puskesmas</title>

		<?php $this->load->view('templates/css'); ?>
	</head>
	<body>
		<?php $this->load->view('templates/section1'); ?>
		<section id="main-content" class="container">
	      <section class="wrapper">
	        <div class="row mt">
	          <div class="col-lg-12 content-panel">
	            <div class="border-head">
	              <h3>List Registrasi</h3>
	            </div>
	            <table id="myTable" class="table table-hover font-13px">
	            	<thead>
	            		<tr>
	            			<th>No Antrian</th>
	            			<th>Nama Pasien</th>
	            			<th>Aksi</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no = 1; ?>
	            		<?php foreach ($registrasi as $reg): ?>
		            		<?php if ($reg->status_diagnosa=='belum' || $reg->status_resep=='belum'): ?>
		            			<tr>
			            			<td><?= $reg->no_antrian ?></td>
			            			<td><?= $reg->nama ?></td>
			            			<td>
			            				<?php if ($reg->status_diagnosa=='belum'): ?>
			            					<?= anchor('DokterDiagnosa/Diagnosa/'.$reg->id_registrasi, 'Tambah Diagnosa', 'class="btn btn-success"'); ?>
			            				<?php endif ?>
			            				<?php if ($reg->status_diagnosa=='sudah'): ?>
			            					<?= anchor('DokterDiagnosa/Resep/'.$reg->id_registrasi, 'Tambah Resep', 'class="btn btn-primary"'); ?>
			            				<?php endif ?>
			            			</td>
			            		</tr>
		            		<?php endif ?>
		            	<?php $no++; ?>
	            		<?php endforeach ?>
	            	</tbody>
	            </table>
		      </div>
		    </div>
	      </section>
	    </section>
		<?php $this->load->view('templates/section2'); ?>

		<?php $this->load->view('templates/javascript'); ?>
	</body>
</html>