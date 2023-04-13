const searchInput = document.querySelector("input");
const li = [...document.querySelectorAll("ul li")];
const ul = document.querySelector("ul");
const searchWord = e => {
	const currentWord = e.target.value.toUpperCase();
	let result = li;
	result = result.filter(li => li.textContent.toUpperCase().includes(currentWord));
	ul.textContent = '';
	result.forEach(name => ul.appendChild(name));
}
searchInput.addEventListener('input', searchWord);