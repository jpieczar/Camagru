saveButton.addEventListener('click', function() {
	const canURL = canvas.toDataURL('image/png');
	const ovlURL = overlay.toDataURL('image/png');

	var xhttp = new XMLHttpRequest();
	// var urlValues = ("imgURL="+canURL+"&ovlURL="+ovlURL);

	xhttp.open("POST", "/Camagru/app/controllers/camera.controllers.php", true);
	/*
	 * Server request should be asynchronous, this is why the 3rd variable is true.
	 * This means that the js does not have to wait for server response.
	*/
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhttp.onreadystatechange = function(){
		if(xhttp.status == 200){
			console.log(this.responseText);
		}
	};
	xhttp.send("imgURL=" + canURL + "&ovlURL=" + ovlURL);
}