<!DOCTYPE html>
<html>
<head>
	<title>Dokter</title>

	<?php $this->load->view('templates/css'); ?>
	<style type="text/css">
		/* #diagnosa { */
			/* width: 70vw; */
		/* } */
		body {
			overflow-x: hidden;
		}
		.isi {
			margin-bottom: 5%;
		}
	</style>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="col-lg-12 content-panel">
					<div id="container" class="text-center isi">
						<div class="border-head">
							<h3 style="text-align: left">Diagnosa</h3>
						</div>
						<div style="margin-bottom: 10px">
							<p>Pilih Tool : </p>
							<button class="btn btn-dark" type="button" id="markerTool"><span class="fa fa-pencil"></span> Marker</button>
							<button class="btn btn-dark" type="button" id="clearTool"><span class="fa fa-eraser"></span> Penghapus</button>
						</div>
						<canvas class="border border-dark rounded" id="diagnosa" width="700" height="450">
							Browser anda tidak support Canvas, silahkan upgrade browser anda atau gunakan browser lain
						</canvas>
						<div>
							<input class="btn btn-primary" type="button" onclick="uploadGambar()" value="Simpan" />
							<input class="btn btn-danger" type="button" id="clearCanvas" value="Reset" />
						</div>
						<form method="post" accept-charset="utf-8" name="formUpload">
							<input name="hidden_data" id='hidden_data' type="hidden"/>
						</form>
						<br>
						<div class="border-head">
							<h3 style="text-align: left">Resep</h3>
						</div>
						<!-- <div style="margin-bottom: 10px">
							<p>Pilih Tool : </p>
							<button class="btn btn-dark" type="button" id="markerTool"><span class="fa fa-pencil"></span> Marker</button>
							<button class="btn btn-dark" type="button" id="clearTool"><span class="fa fa-eraser"></span> Penghapus</button>
						</div>
						<canvas class="border border-dark rounded" id="diagnosa">
							Browser anda tidak support Canvas, silahkan upgrade browser anda atau gunakan browser lain
						</canvas>
						<div>
							<input class="btn btn-primary" type="button" onclick="uploadGambar()" value="Simpan" />
							<input class="btn btn-danger" type="button" id="clearCanvas" value="Reset" />
						</div>
						<form method="post" accept-charset="utf-8" name="formUpload">
							<input name="hidden_data" id='hidden_data' type="hidden"/>
						</form> -->
					</div>
				</div>
			</div>
		</section>
	</section>

	<?php $this->load->view('templates/section2'); ?>
	<?php $this->load->view('templates/javascript'); ?>
	<script>
		// aksi menggambar di canvas
		context = document.getElementById('diagnosa').getContext("2d");

		$('#diagnosa').mousedown(function(e){
			var mouseX = e.pageX - this.offsetLeft;
			var mouseY = e.pageY - this.offsetTop;

			paint = true;
			addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
			redraw();
		});

		$('#diagnosa').mousemove(function(e){
			if(paint){
				addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
				redraw();
			}
		});

		$('#diagnosa').mouseup(function(e){
			paint = false;
		});

		$('#diagnosa').mouseleave(function(e){
			paint = false;
		});

		var clickX = new Array();
		var clickY = new Array();
		var clickDrag = new Array();
		var paint;

		function addClick(x, y, dragging)
		{
			clickX.push(x);
			clickY.push(y);
			clickDrag.push(dragging);
		}

		// Reset Canvas
		$('#clearCanvas').mousedown(function(e)
		{
			clickX = new Array();
			clickY = new Array();
			clickDrag = new Array();
			clrCanvas(); 
		});

		function clrCanvas(){
			context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
		}

		function redraw(){
			clrCanvas();

			context.strokeStyle = "#000000";
			context.lineJoin = "round";
			context.lineWidth = 2;

			for(var i=0; i < clickX.length; i++) {		
				context.beginPath();
				if(clickDrag[i] && i){
					context.moveTo(clickX[i-1], clickY[i-1]);
				}else{
					context.moveTo(clickX[i]-1, clickY[i]);
				}
				context.lineTo(clickX[i], clickY[i]);
				context.closePath();
				context.stroke();
			}
		}

		// Simpan Gambar ke Folder
		function uploadGambar(){
			var canvas = document.getElementById("diagnosa");
			var dataURL = canvas.toDataURL("image/png");
			// alert(dataURL);
			document.getElementById('hidden_data').value = dataURL;
			var fd = new FormData(document.forms["formUpload"]);

			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'dokter/uploadGambar', true);

			xhr.upload.onprogress = function(e) {
				if (e.lengthComputable) {
					var percentComplete = (e.loaded / e.total) * 100;
					console.log(percentComplete + '% uploaded');
					alert('Succesfully uploaded');
				}
			};

			xhr.onload = function() {

			};
			xhr.send(fd);
		}
	</script>
</body>
</html>