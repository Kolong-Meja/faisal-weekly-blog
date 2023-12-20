const navigationBar = document.querySelector('nav#guest__navigation');
const guestNavigationLink = document.querySelectorAll('a#guest__navigation__link');
const maxAmountTransitionPositionY = 50;
let scrollPosition = 0;

window.addEventListener('scroll', function() {
	scrollPosition = this.window.scrollY;

	if (scrollPosition > maxAmountTransitionPositionY) {
		if (!navigationBar.className.includes("bg-zinc")) {
			navigationBar.class.add("bg-gray-50");
			guestNavigationLink.forEach(link => link.classList.replace('text-gray-50', 'text-gray-900'));
		} else {
			navigationBar.classList.remove("bg-zinc-900");
      	  	navigationBar.classList.add("bg-gray-50");
      	  	guestNavigationLink.forEach(link => link.classList.replace('text-gray-50', 'text-gray-900'));
		}
	} else {
		navigationBar.classList.remove('bg-gray-50');
      	navigationBar.classList.add("bg-zinc-900");
      	guestNavigationLink.forEach(link => link.classList.replace('text-gray-900', 'text-gray-50'));
	}
});