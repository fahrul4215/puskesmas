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
	            <table id="myTable" class="table table-hover font-13px">
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<th>Tanggal</th>
	            			<th>Nama Pasien</th>
	            			<th>Nama Dokter</th>
	            			<th>Diagnosa</th>
	            			<th>Resep</th>
	            			<!-- <th>Aksi</th> -->
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no = 1; ?>
	            		<?php foreach ($RekamMedis as $rm): ?>
		            		<tr>
		            			<td><?= $no ?></td>
		            			<td><?= date('d-m-Y', strtotime($rm->tanggal)) ?></td>
		            			<td><?= $rm->id_pasien ?></td>
		            			<td><?= $rm->id_dokter ?></td>
		            			<td><img width="300" height="150" src="<?= base_url('assets/gambar/diagnosa/'.$rm->diagnosa) ?>"></td>
		            			<td>
		            				<?php if ($rm->resep != ''): ?>
		            					<img width="300" height="150" src="<?= base_url('assets/gambar/resep/'.$rm->resep) ?>">
		            				<?php endif ?>
		            			</td>
		            			<!-- <td>
		            				<?= anchor('RekamMedis/edit/'.$rm->id_rekam_medis, 'Edit', 'class="btn btn-success"'); ?>
		            			</td> -->
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