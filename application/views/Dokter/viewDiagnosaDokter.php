<!DOCTYPE html>
<html>
<head>
	<title>Dokter</title>

	<?php $this->load->view('templates/css'); ?>
</head>
<body>
	<div id="container" class="text-center">
		<canvas class="border border-dark" id="diagnosa" width="500" height="250">
			Your Browser does not support Canvas, please upgrade
		</canvas>
		<div>
			<input type="button" onclick="uploadGambar()" value="Simpan" />
			<input type="button" id="clearCanvas" value="Reset" />
		</div>
		<form method="post" accept-charset="utf-8" name="formUpload">
			<input name="hidden_data" id='hidden_data' type="hidden"/>
		</form>
	</div>

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
			clearCanvas_simple(); 
		});

		function clearCanvas_simple(){
			context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
		}

		function redraw(){
			clearCanvas_simple();

			context.strokeStyle = "#000";
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