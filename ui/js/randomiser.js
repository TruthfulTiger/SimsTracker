// General functions
function getRandomInt(min, max) {
	return Math.floor(Math.random() * (max - min + 1) ) + min;
}

// https://stackoverflow.com/questions/2380019/generate-unique-random-numbers-between-1-and-100
function shuffle(max, len) {
	let a = [];
	while (a.length < len) {
		let randomnumber = Math.floor(Math.random() * max) + 1;
		if (a.indexOf(randomnumber) > -1) continue;
		a[a.length] = randomnumber;
	}
	return a;
}