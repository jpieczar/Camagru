<?php
session_start();
if (isset($_SESSION['id']))
	echo "<img onclick='say1()' src='/Camagru/img_resources/stickers/Smiley.gif' width='75px'>";
else
	echo "<img onclick='say2()' src='/Camagru/img_resources/stickers/Frownie.gif' width='75px'>";
?>
<html>
	<script>
		function say1() {
			alert("You are logged in.");
		}
		function say2() {
			alert("Please log in.");
		}
	</script>
</html>