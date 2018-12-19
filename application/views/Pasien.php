<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PASIEN | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>LIST PASIEN</h3>
					</div>
					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID Pasien</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>Pekerjaan</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kartu</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($pasien_list as $row) {
								echo "<tr><td>";
								echo $row['id_pasien'];
								echo "</td><td>";
								echo $row['nama'];
								echo "</td><td>";
								echo $row['alamat'];
								echo "</td><td>";
								echo $row['jenis_kelamin'];
								echo "</td><td>";
								echo $row['pekerjaan'];
								echo "</td><td>";
								echo date('d-m-Y', strtotime($row['tgl_lahir']));
								echo "</td><td>";
								echo $row['id_jenis_kartu'];
								echo "</td><td>";
								echo " ";
								echo "<a href='".base_url('index.php/pasien/update/'.$row['id_pasien'])."' class='btn btn-warning'>edit</a>";
								echo " ";
								echo "<a href='".base_url('index.php/pasien/delete/'.$row['id_pasien'])."' class='btn btn-danger'>Hapus</a>";
								echo "</td></tr>";

							}
							?>
						</tbody>
					<?php echo "<a href='".base_url('index.php/pasien/create')."' class='btn btn-primary' >Tambah</a>"; ?>
					</table>

				</div>
			</div>
		</section>
	</section>
	<?php $this->load->view('templates/section2'); ?>

	<?php $this->load->view('templates/javascript'); ?>
</body>
</html>