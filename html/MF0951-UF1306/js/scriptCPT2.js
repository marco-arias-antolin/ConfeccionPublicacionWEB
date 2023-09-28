const dropdownMenu = document.querySelector(".dropdown-menu");
const dropdownToggle = document.querySelector(".dropdown-toggle");
const dropdownToggleIcon = document.querySelectorAll(".dropdown-toggle .more");

dropdownToggle.onclick = (event) => {
	dropdownMenu.classList.toggle("open");
	for (let icon of dropdownToggleIcon) {
		icon.classList.toggle("hide");
	}
	event.preventDefault();
};