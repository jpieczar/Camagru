<?php
	require "header.html";
?>
<html>
	<head>
		<title>ERROR!!!</title>
		<link rel="stylesheet" type= "text/css" href="/Camagru/css/style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="main_centre_small">
			<h1 class="main_top_logo" >Um... There was an error!</h1>
			<h3 class="main_top_logo">### The following could be a reason that you got an error:</h3>
			<p class="main_top_logo">-> Entered an incorrect username.</p>
			<p class="main_top_logo">-> Entered an incorrect password.</p>
			<p class="main_top_logo">-> Entered an incorrect email address.</p>
			<h3 class="main_top_logo">### Please make note of the following:</h3>
			<p class="main_top_logo">-> No spaces in your username.</p>
			<p class="main_top_logo">-> Atleast one uppercase letter in your password.</p>
			<p class="main_top_logo">-> Atleast one lowercase letter in your password.</p>
			<p class="main_top_logo">-> Atleast one digit in your password.</p>
			<p class="main_top_logo">-> Have a valid email address.</p>
		</div>
	</body>
</html>
<?php
	require "footer.php";
?>