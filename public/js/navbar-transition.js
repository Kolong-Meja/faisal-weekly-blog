const navbar = document.querySelector('.home__navbar');
const homeNavbarLinks = document.querySelectorAll('.home__navbar a#home__navbar__link');

/**
 * 
 * @param {Element} link = element of the link in navbar 
 */
function whenDoScrollBottom(link) {
	link.addEventListener('mouseover', function() {
		this.style.color = "rgba(17, 24, 39, 1)";
	});

	link.addEventListener('mouseout', function() {
		this.style.color = "rgba(17, 24, 39, 1)";
	});
}

/**
 * 
 * @param {Element} link = element of the link in navbar 
 */
function whenDoScrollTop(link) {
	link.addEventListener('mouseover', function() {
		this.style.color = "rgba(17, 24, 39, 1)";
	});

	link.addEventListener('mouseout', function() {
		this.style.color = "rgba(255, 255, 255, 1)";
	});
}

window.addEventListener('scroll', function() {
	if (window.scrollY > 10) {
		navbar.style.backgroundColor = "rgba(255, 255, 255, 1)";
		homeNavbarLinks.forEach(link => {
			link.style.color = "rgba(17, 24, 39, 1)";
			whenDoScrollBottom(link);
		});
	} else {
		navbar.style.backgroundColor = "rgba(24, 24, 27, 1)";
		homeNavbarLinks.forEach(link => {
			link.style.color = "rgba(255, 255, 255, 1)";
			whenDoScrollTop(link);
		});
	}
});