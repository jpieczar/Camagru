/* Global variables. */
let width = 500,
	height = 0,
	streaming = false;

/* DOM elements. */
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
// const photos = document.getElementById('photos');
const overlay = document.getElementById('overlay');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');
const saveButton = document.getElementById('save-button');

navigator.mediaDevices.getUserMedia({video: true, audio: false}	
)
	.then(function(stream){
		/* Link to the video source. */
		video.srcObject = stream;
		/* Play video. */
		video.play();
	})
	.catch(function(err){
		console.log(`Error: ${err}`);
	});

/* Play when ready. */
video.addEventListener('canplay', function(e) {
	if(!streaming) {
		/* Set video/canvas height. */
		height = video.videoHeight / (video.videoWidth / width);

		video.setAttribute('width', width);
		video.setAttribute('height', height);
		canvas.setAttribute('width', width);
		canvas.setAttribute('height', height);

		streaming = true;
	}
}, false);

/* Photo button event. */
photoButton.addEventListener('click', function(e) {
	takePicture();

	e.preventDefault();
}, false);

// saveButton.addEventListener('click', function(e) {
// 	/* Save the image. */
// })

/* Clear event. */
clearButton.addEventListener('click', function(e) {
	/* Clean photos. Note that this clears all the photos taken and stickers too. */
	// photos.innerHTML = '';
	canvas.style.display = 'none';
	const stick = overlay.getContext('2d');
	// overlay.style.display = 'none';
	stick.clearRect(0, 0, width, height);
});

/* Take a picture from canvas. */
function takePicture() {
	/* Create canvas. */
	const context = canvas.getContext('2d');
	if(width && height) {
		/* Set canvas props. */
		canvas.width = width;
		canvas.height = height;

		/* "Demirrors" the output. */
		// context.setTransform(-1, 0, 0, 1, canvas.width, 0);

		/* Draw video onto the canvas. */
		context.drawImage(video, 0, 0, width, height);

		/* Create image from the canvas. */
		const imgUrl = canvas.toDataURL('image/png');

		// console.log(imgUrl); /* This displays the image data as text in the console. */

		/* The bottom few create an actual image that you can see. */
			/* Create img element. */
			// const img = document.createElement('img');
	
			/* Set img src. */
			// img.setAttribute('src', imgUrl);

			/* Makes canvas visible. */ /* This is independent from the other 3. */
			canvas.style.display = "block";
	
			/* Take more than one picture. Adds to the bottom. */
			// photos.appendChild(img);
	}
};

function addSticker(sid) {
	// document.getElementById(sid);
	// sticker = new Image; /* Creates a blank image template. */
	// sticker.src = "/Camagru/img_resources/stickers/"+sid+".png";
	// overlay.getContext('2d').drawImage(sticker, 0, 0, width, height);

	const stick = overlay.getContext('2d');

	overlay.width = width;
	overlay.height = height;

	sticker = new Image; /* Creates a blank image template. */
	sticker.src = "/Camagru/img_resources/stickers/"+sid+".png";

	if (sid == "beans")
		stick.drawImage(sticker, 0, 0, 250, 250);
	else if (sid == "comedy")
		stick.drawImage(sticker, 190, 110, 180, 180);
	else
		stick.drawImage(sticker, 0, 0, width, height);
}

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
});