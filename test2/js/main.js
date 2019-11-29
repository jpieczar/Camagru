/* Global variables. */
let width = 500,
	heaight = 0,
	stream = false;

/* DOM elements. */
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');

// navigator.mediaDevices.getUserMedia({video: true, audio: false}	
// )
// 	.then(function(stream){
// 		/* Link to the video source. */
// 		video.srcObject = stream;
// 		/* Play video. */
// 		video.play();
// 	})
// 	.catch(function(err){
// 		console.log(`Error: ${err}`);
// 	});