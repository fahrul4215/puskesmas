<?php  ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Petugas</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>
	<body>
		<h1 class="text-center">Halaman Data Petugas</h1>
		<br>
		
		<table class="table table-bordered table-striped">
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
			<p align="center"><?php echo "<a href='".base_url('index.php/petugas/create')."' class='btn btn-primary'.>Tambah</a>"; ?></p>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>