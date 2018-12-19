<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DOKTER | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>LIST DOKTER</h3>
					</div>
					<table id="myTable" class="table table-striped">
					<?php echo "<a href='".base_url('index.php/dokter/create')."' class='btn btn-primary' >Tambah</a>"; ?>
						<thead>
							<tr>
								<th>ID dokter</th>
								<th>Nama</th>
								<th>Spesialis</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($dokter_list as $row) {
								echo "<tr><td>";
								echo $row['id_dokter'];
								echo "</td><td>";
								echo $row['nama'];
								echo "</td><td>";
								echo $row['spesialis'];
								echo "</td><td>";
						// echo $row['username'];
						// echo "</td><td>";	
								echo " ";
								echo "<a href='".base_url('index.php/dokter/update/'.$row['id_dokter'])."' class='btn btn-warning'>edit</a>";
								echo " ";
								echo "<a href='".base_url('index.php/dokter/delete/'.$row['id_dokter'])."' class='btn btn-danger'>Hapus</a>";
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