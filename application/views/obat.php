<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OBAT | Puskesmas</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div class="border-head">
						<h3>LIST OBAT</h3>
					</div>
					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID Obat</th>
								<th>Tanggal Kadaluarsa</th>
								<th>Jumlah</th>
								<th>Nama Obat</th>
								<th>Jenis Obat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($obat_list as $row) {
								echo "<tr><td>";
								echo $row->id_obat;
								echo "</td><td>";
								echo date('d-m-Y', strtotime($row->exp_date));
								echo '</td><td>';
								echo $row->jumlah;
								echo "</td><td>";
								echo $row->nama;
								echo "</td><td>";
								echo $row->jenis_obat;
								echo "</td><td>";
								echo "<a href='".base_url('index.php/obat/update/'.$row->id_obat)."' class='btn btn-warning'>Update</a>";
								echo " ";
								echo "<a href='".base_url('index.php/obat/delete/'.$row->id_obat)."' class='btn btn-danger'>Hapus</a>";
								echo " ";
								echo "</td></tr>";
							}
							?>
						</tbody>
						<p align="center"><?php echo "<a href='".base_url('index.php/obat/create')."' class='btn btn-primary'.>Tambah</a>"; ?></p>
					</table>
				</div>
			</div>
		</section>
	</section>
	<?php $this->load->view('templates/section2'); ?>

	<?php $this->load->view('templates/javascript'); ?>
</body>
</html>