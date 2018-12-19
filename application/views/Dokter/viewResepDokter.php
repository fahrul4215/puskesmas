<!DOCTYPE html>
<html>
<head>
	<title>Dokter</title>

	<?php $this->load->view('templates/css'); ?>
	<style type="text/css">
	body {
		overflow-x: hidden;
	}
	.isi {
		margin-bottom: 5%;
	}
	.content-panel {
		padding: 20px;
	}
	#canvasDiv{
		border: 1px solid #000
	}
</style>
</head>
<body>
	<?php $this->load->view('templates/section1'); ?>
	<section id="main-content" class="container">
		<section class="wrapper">
			<div class="row mt">
				<div class="content-panel">
					<div id="container" class="text-center isi">
						<div class="border-head">
							<h3 style="text-align: left">Resep</h3>
						</div>
						<div style="margin-bottom: 10px">
							<p>Pilih Tool : </p>
							<button class="btn btn-dark" type="button" id="pilihMarker"><span class="fa fa-pencil"></span> Marker</button>
							<button class="btn btn-dark" type="button" id="pilihEraser"><span class="fa fa-eraser"></span> Penghapus</button>
						</div>
						<!-- <canvas class="border border-dark rounded" id="diagnosa" width="1000" height="450">
							Browser anda tidak support Canvas, silahkan upgrade browser anda atau gunakan browser lain
						</canvas> -->
						
						<div id="canvasDiv"></div>

						<br>
						<form method="POST" accept-charset="utf-8" onsubmit="prepareImg()" action="<?= site_url('dokterDiagnosa/simpanResep/'.$this->uri->segment(3)) ?>">
							<input id="inp_img" name="img" type="hidden" value="">
							<input class="btn btn-primary" id="bt_upload" type="submit" value="Upload">
							<input class="btn btn-danger" type="button" id="clearCanvas" value="Reset" />
						</form>
					</div>
				</div>
			</div>
		</section>
	</section>

	<?php $this->load->view('templates/section2'); ?>
	<script>
		// Copyright 2010 William Malone (www.williammalone.com)
		//
		// Licensed under the Apache License, Version 2.0 (the "License");
		// you may not use this file except in compliance with the License.
		// You may obtain a copy of the License at
		//
		//   http://www.apache.org/licenses/LICENSE-2.0
		//
		// Unless required by applicable law or agreed to in writing, software
		// distributed under the License is distributed on an "AS IS" BASIS,
		// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
		// See the License for the specific language governing permissions and
		// limitations under the License.

		/*jslint browser: true */
		/*global G_vmlCanvasManager */

		var drawingApp = (function () {

			"use strict";

			var canvas,
			context,
			canvasWidth = 1000,
			canvasHeight = 450,
			colorBlack = "#000",
			clickX = [],
			clickY = [],
			clickColor = [],
			clickTool = [],
			clickSize = [],
			clickDrag = [],
			paint = false,
			curColor = colorBlack,
			curTool = "marker",
			curSize = "normal",

				// Clears the canvas.
				clearCanvas = function () {
					context.clearRect(0, 0, canvasWidth, canvasHeight);
				},

				clrCanvas = function () {
					clickX = [];
					clickY = [];
					clickDrag = [];
					context.clearRect(0, 0, canvasWidth, canvasHeight);
				},

				pilihMarker = function () {
					curTool = 'marker';
				},

				pilihEraser = function () {
					curTool = 'eraser';
				},

				// Redraws the canvas.
				redraw = function () {
					var locX,
					locY,
					radius,
					i,
					selected;

					clearCanvas();

					// For each point drawn
					for (i = 0; i < clickX.length; i += 1) {

						radius = 5;

						// Set the drawing path
						context.beginPath();
						// If dragging then draw a line between the two points
						if (clickDrag[i] && i) {
							context.moveTo(clickX[i - 1], clickY[i - 1]);
						} else {
							// The x position is moved over one pixel so a circle even if not dragging
							context.moveTo(clickX[i] - 1, clickY[i]);
						}
						context.lineTo(clickX[i], clickY[i]);
						
						// Set the drawing color
						if (clickTool[i] === "eraser") {
							//context.globalCompositeOperation = "destination-out"; // To erase instead of draw over with white
							context.strokeStyle = 'white';
						} else {
							//context.globalCompositeOperation = "source-over";	// To erase instead of draw over with white
							context.strokeStyle = clickColor[i];
						}
						context.lineCap = "round";
						context.lineJoin = "round";
						context.lineWidth = radius;
						context.stroke();
					}
					context.closePath();
					//context.globalCompositeOperation = "source-over";// To erase instead of draw over with white
					context.restore();

					context.globalAlpha = 1; // No IE support
				},

				// Adds a point to the drawing array.
				// @param x
				// @param y
				// @param dragging
				addClick = function (x, y, dragging) {
					clickX.push(x);
					clickY.push(y);
					clickTool.push(curTool);
					clickColor.push(curColor);
					clickSize.push(curSize);
					clickDrag.push(dragging);
				},

				// Add mouse and touch event listeners to the canvas
				createUserEvents = function () {

					var press = function (e) {
						// Mouse down location
						var mouseX = (e.changedTouches ? e.changedTouches[0].pageX : e.pageX) - this.offsetLeft,
						mouseY = (e.changedTouches ? e.changedTouches[0].pageY : e.pageY) - this.offsetTop;

						paint = true;
						addClick(mouseX, mouseY, false);
						redraw();
					},

					drag = function (e) {
						// Mouse Drag
						var mouseX = (e.changedTouches ? e.changedTouches[0].pageX : e.pageX) - this.offsetLeft,
						mouseY = (e.changedTouches ? e.changedTouches[0].pageY : e.pageY) - this.offsetTop;
						
						if (paint) {
							addClick(mouseX, mouseY, true);
							redraw();
						}
						// Prevent the whole page from dragging if on mobile
						e.preventDefault();
					},

					release = function () {
						paint = false;
						redraw();
					},

					cancel = function () {
						paint = false;
					};

					// Add mouse event listeners to canvas element
					canvas.addEventListener("mousedown", press, false);
					canvas.addEventListener("mousemove", drag, false);
					canvas.addEventListener("mouseup", release);
					canvas.addEventListener("mouseout", cancel, false);

					// Add touch event listeners to canvas element
					canvas.addEventListener("touchstart", press, false);
					canvas.addEventListener("touchmove", drag, false);
					canvas.addEventListener("touchend", release, false);
					canvas.addEventListener("touchcancel", cancel, false);
				},

				// Creates a canvas element, loads images, adds events, and draws the canvas for the first time.
				init = function () {

					// Create the canvas (Neccessary for IE because it doesn't know what a canvas element is)
					canvas = document.createElement('canvas');
					canvas.setAttribute('width', canvasWidth);
					canvas.setAttribute('height', canvasHeight);
					canvas.setAttribute('id', 'canvas');
					document.getElementById('canvasDiv').appendChild(canvas);
					if (typeof G_vmlCanvasManager !== "undefined") {
						canvas = G_vmlCanvasManager.initElement(canvas);
					}
					context = canvas.getContext("2d"); // Grab the 2d canvas context
					// Note: The above code is a workaround for IE 8 and lower. Otherwise we could have used:
					//     context = document.getElementById('canvas').getContext("2d");

					// Load images
					redraw();
					createUserEvents();

					var btnReset = document.getElementById('clearCanvas');
					btnReset.addEventListener("mousedown", clrCanvas, false);

					var btnMarker = document.getElementById('pilihMarker');
					btnMarker.addEventListener("mousedown", pilihMarker, false);

					var btnEraser = document.getElementById('pilihEraser');
					btnEraser.addEventListener("mousedown", pilihEraser, false);

				};

				return {
					init: init
				};
			}());
		</script>

		<script type="text/javascript">
			drawingApp.init();

			function prepareImg() {
				var canvas = document.getElementById('canvas');
				document.getElementById('inp_img').value = canvas.toDataURL();
			}
		</script>
	</body>
	</html>