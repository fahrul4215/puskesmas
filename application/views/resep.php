<?php  ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Daftar resep</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<table id="myTable" class="table table-bordered table-striped">
			<body>
				<h1 class="center">DATA RESEP</h1>	
			</body>
			
				<thead>
					<tr>
						<th>ID Resep</th>
						<th>ID Detail Resep</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($resep_list as $row) {
						echo "<tr><td>";
						echo $row['id_resep'];
						echo "</td><td>";
						echo $row['id_detail_resep'];
						echo "</td><td>";
						echo $row['tanggal'];
						echo "</td><td>";
						echo " ";
						echo "<a href='".base_url('index.php/resep/delete/'.$row['id_resep'])."' class='btn btn-danger'>Hapus</a>";
						echo " ";
						echo "<a href='".base_url('index.php/resep/update/'.$row['id_resep'])."' class='btn btn-danger'>edit</a>";
						echo "</td></tr>";

					}
					?>
				</tbody>
			</table>
			<?php echo "<a href='".base_url('index.php/resep/create')."' class='btn btn-primary' >Tambah</a>"; ?>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>