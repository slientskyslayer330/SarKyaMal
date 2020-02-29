var toggle = document.getElementById('toggle');
var nav = document.getElementById('nav');
var links = document.getElementsByTagName('a');

toggle.addEventListener("click", toggleAction);

function toggleAction() {
	// Toggle Animation
	toggle.classList.toggle("toggle-animation");

	// Nav Animation
	nav.classList.toggle("nav-animation");

	// Links Animation
	// links.forEach((li, index) => {
	// 		if (li.style.animation) {
	// 			li.style.animation = "";
	// 		}
	// 		else {
	// 			li.style.animation = `fadeIn 0.6s ease ${index/5}s forwards`;
	// 		}
	// });
}

function includeHTML() {
	
}

