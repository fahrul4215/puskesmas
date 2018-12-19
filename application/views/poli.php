<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Poli | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>LIST POLI</h3>
					</div>
					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID Poli</th>
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($poli_list as $row) {
									echo "<tr><td>";
									echo $row->id_poli;
									echo "</td><td>";
									echo $row->nama;
									echo '</td><td>';
									echo "<a href='".base_url('index.php/poli/update/'.$row->id_poli)."' class='btn btn-warning'>Update</a>";
									echo " ";
									echo "<a href='".base_url('index.php/poli/delete/'.$row->id_poli)."' class='btn btn-danger'>Hapus</a>";
									echo " ";
									echo "</td></tr>";
								}
							?>
						</tbody>
						<p align="center"><?php echo "<a href='".base_url('index.php/poli/create')."' class='btn btn-primary'.>Tambah</a>"; ?></p>
					</table>
				</div>
			</div>
		</section>
	</section>
	<?php $this->load->view('templates/section2'); ?>

	<?php $this->load->view('templates/javascript'); ?>
</body>
</html>