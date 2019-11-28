/* Global variables. */
let width = 500,
    heaight = 0,
    streaming = false;

/* DOM elements. */
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');

/* Get video stream. */
navigator.mediaDevices.getUserMedia({video: true, aduto: false}
    )
    .then(function(stream)
    {
        /* Link to the video source. */
        video.srcObject(stream);
        /* Play video. */
        video.onplay();
    })
    .catch(function(err)
    {
        console.log('Error: ${err}');
    })