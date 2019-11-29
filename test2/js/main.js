/* Global variables. */
let width = 500,
	height = 0,
	streaming = false;

/* DOM elements. */
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');

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

/* Clear event. */
clearButton.addEventListener('click', function(e) {
	/* Clean photos. Note that this clears all the photos taken*/
	photos.innerHTML = '';
});

/* Take a picture from canvas. */
function takePicture() {
	/* Create canvas. */
	const context = canvas.getContext('2d');
	if(width && height) {
		/* Set canvas props. */
		canvas.width = width;
		canvas.height = height;
		/* Draw video onto the canvas. */
		context.drawImage(video, 0, 0, width, height);

		/* Create image from the canvas. */
		const imgUrl = canvas.toDataURL('image/png');

		// console.log(imgUrl); /* This displays the image data as text in the console. */

		/* Create img element. */
		const img = document.createElement('img');
	
		/* Set img src. */
		img.setAttribute('src', imgUrl);
	
		/* Take more than one picture. Adds to the bottom. */
		photos.appendChild(img);
	}
}
