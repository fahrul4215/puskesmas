<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Rekam Medis | Puskesmas</title>

		<?php $this->load->view('templates/css'); ?>
	</head>
	<body>
		<?php $this->load->view('templates/section1'); ?>
		<section id="main-content" class="container">
	      <section class="wrapper">
	        <div class="row mt">
	          <div class="col-lg-12 content-panel">
	            <div class="border-head">
	              <h3>LIST REKAM MEDIS</h3>
	            </div>
	            <table id="myTable" class="table table-hover">
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<th>Tanggal</th>
	            			<th>Nama Pasien</th>
	            			<th>Nama Dokter</th>
	            			<th>ID Resep</th>
	            			<th>Diagnosa</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no = 1; ?>
	            		<?php foreach ($RekamMedis as $rm): ?>
		            		<tr>
		            			<td><?= $no ?></td>
		            			<td><?= $rm->tanggal ?></td>
		            			<td><?= $rm->id_pasien ?></td>
		            			<td><?= $rm->id_dokter ?></td>
		            			<td><?= $rm->id_resep ?></td>
		            			<td><?= $rm->diagnosa ?></td>
		            		</tr>
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