<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>REGISTRASI | Puskesmas</title>

		<?php $this->load->view('templates/css'); ?>
	</head>
	<body>
		<?php $this->load->view('templates/section1'); ?>
		<section id="main-content" class="container">
	      <section class="wrapper">
	        <div class="row mt">
	          <div class="col-lg-12 content-panel">
	            <div class="border-head">
	              <h3>LIST REGISTRASI</h3>
	            </div>
	            <table id="myTable" class="table table-hover font-13px">
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<th>Tanggal</th>
	            			<th>No Antrian</th>
	            			<th>Nama Pasien</th>
	            			<th>Poli</th>
	            			<th>Status</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no = 1; ?>
	            		<?php foreach ($registrasi as $r): ?>
		            		<tr>
		            			<td><?= $no ?></td>
		            			<td><?= date('d-m-Y', strtotime($r->tanggal)) ?></td>
		            			<td><?= $r->no_antrian ?></td>
		            			<td><?= $r->nama_pasien ?></td>
		            			<td><?= $r->nama_poli ?></td>
		            			<td><?= $r->status_antrian ?></td>
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