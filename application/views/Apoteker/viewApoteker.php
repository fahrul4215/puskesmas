<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Apoteker | Puskesmas</title>

		<?php $this->load->view('templates/css'); ?>
	</head>
	<body>
		<?php $this->load->view('templates/section1'); ?>
		<section id="main-content" class="container">
	      <section class="wrapper">
	        <div class="row mt">
	          <div class="col-lg-12 content-panel">
	            <div class="border-head">
	              <h3>LIST APOTEKER</h3>
	            </div>
	            <table id="myTable" class="table table-hover font-13px">
	            	<thead>
	            		<tr>
	            			<th>No Antrian</th>
	            			<th>Nama Pasien</th>
	            			<th>Resep</th>
	            			<th>Aksi</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no = 1; ?>
	            		<?php foreach ($registrasi as $r): ?>
		            		<?php if ($r->resep != ''): ?>
		            			<tr>
			            			<td><?= $r->no_antrian ?></td>
			            			<td><?= $r->nama ?></td>
			            			<td><img width="300" height="150" src="<?= base_url('assets/gambar/resep/'.$r->resep) ?>"></td>
			            			<td>
			            				<?= anchor('Apoteker/tambah/'.$r->id_rekam_medis, 'Tambah Obat', 'class="btn btn-primary"'); ?>
			            				<?= anchor('Apoteker/selesai/'.$r->id_registrasi, 'Selesai', 'class="btn btn-success"'); ?>
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