function getDocumentHeight() {
	const html = document.documentElement;
	const body = document.body;
	return Math.max(body.scrollHeight,
		body.offsetHeight, html.clientHeight,
		html.scrollHeight, html.offsetHeight);
}

function pixelsScrolled() {
	return window.pageYOffset;
}

function loadMore () {
	let loadposts = new XMLHttpRequest;
	postdisplayed = document.getElementById("postCount").value;
	loadposts.open("POST", "/Camagru/app/controllers/feed.controllers.php", true);
	loadposts.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	loadposts.onload = function() {
		document.documentElement.innerHTML = this.response;
	}
	loadposts.send("displayed_posts="+displayedPosts);
}

window.addEventListener('scroll', scrolling);

function moving() {
	if (pixelsScrolled() < getDocumentHeight() - window.innerHeight)
		return;
	loadMore();
}