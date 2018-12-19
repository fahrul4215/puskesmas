<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PETUGAS | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>LIST PETUGAS</h3>
					</div>
					<p align="center"><?php echo "<a href='".base_url('index.php/petugas/create')."' class='btn btn-primary'.>Tambah</a>"; ?></p>
					<table id="myTable" class="table table-hover font-13px">
						<thead>
							<tr>
								<th>ID Petugas</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($petugas_list as $row) {
									echo "<tr><td>";
									echo $row->id_petugas;
									echo "</td><td>";
									echo $row->nama;
									echo '</td><td>';
									echo $row->username;
									echo '</td><td>';
									echo "<a href='".base_url('index.php/petugas/update/'.$row->id_petugas)."' class='btn btn-warning'>Update</a>";
									echo " ";
									echo "<a href='".base_url('index.php/petugas/delete/'.$row->id_petugas)."' class='btn btn-danger'>Hapus</a>";
									echo " ";
									echo "</td></tr>";
								}
							?>
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