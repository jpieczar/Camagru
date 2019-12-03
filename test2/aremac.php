<!-- 
	* When snap is pressed, a photo is taked and then
	- sent to an editing page.
	* Perhaps try having two canvases.
	* You can super impose the two canvases on the new
	- page. Perhaps this can be done before in the camera
	- app page and then the final product sent to a
	- submit page (Villager hhmmmm...).
-->

<!--
	* When snap, take and save the picture. The snap
	- button with serve its task as well as that of the
	- save function.
-->
<html>
	<head>
		<title>Camagru test</title>
		<link rel="stylesheet" href="/Camagru/test2/css/istyle.css">
	</head>
	<body>
		<div class="top-container">
			<video id="video" style="position: absolute; top: 390px; left: 250px; width: 500px ;">No video</video>
			<button id="photo-button">>>>>SNAP<<<<</button>
			<button id="clear-button">>>>>CLEAR<<<<</button>
			<button id="save-button">>>>>SAVE<<<<</button>
			<canvas id="canvas" style="position: absolute; top: 390px; left: 250px; width: 500px;"></canvas>
			<canvas id="overlay" style="position: absolute; top: 390px; left: 250px; width: 500px;"></canvas>
		</div>
		<!-- <div class="bottom-container">
			<div id="photos"></div>
		</div> -->
		<div>
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/recycle.png" id="recycle" onclick="addSticker(this.id)" alt="404_recycle" title="recycle">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/comedy.png" id="comedy" onclick="addSticker(this.id)" alt="404_comedy" title="comedy">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/beans.png" id="beans" onclick="addSticker(this.id)" alt="404_beans" title="beans">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/pepe.png" id="pepe" onclick="addSticker(this.id)" alt="404_pepe" title="pepe">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/pepe2.png" id="pepe2" onclick="addSticker(this.id)" alt="404_pepe" title="pepe2">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/pepe3.png" id="pepe3" onclick="addSticker(this.id)" alt="404_pepe" title="pepe3">
		</div>
		<script src="/Camagru/test2/js/main.js"></script>
	</body>
</html>