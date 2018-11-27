<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Print</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<button onclick="printAntrian()">Print</button>

	<script src="https://cdn.jsdelivr.net/npm/recta/dist/recta.js"></script>
	<script type="text/javascript">
		var printer = new Recta('bsjdal124125', '1811');

		function printAntrian(){
			printer.open().then(function () {
				printer.align('center')
				.text('====================================')
				.text('Antrian Puskesmas')
				.bold(true)
				.feed(1)
				.text('2')
				.mode('A', true, true, false, false)
				.feed(1)
				.text('Mohon Sabar Menunggu')
				.text('Terima Kasih')
				.text('====================================')
				.cut()
				.print()
			});
		}

		// window.print();
	</script>
</body>
</html>