// General functions
function getRandomInt(min, max) {
	return Math.floor(Math.random() * (max - min + 1) ) + min;
}

// http://codetheory.in/weighted-biased-random-number-generation-with-javascript-based-on-probability/
function rand(min, max) {
	return Math.random() * (max - min) + min;
}

function getWeightedRandom(list, weight) {
	let total_weight = weight.reduce(function (prev, cur) {
		return prev + cur;
	});

	let random_num = rand(0, total_weight);
	let weight_sum = 0;
	//console.log(random_num)

	for (let i = 0; i < list.length; i++) {
		weight_sum += weight[i];
		weight_sum = +weight_sum.toFixed(2);

		if (random_num <= weight_sum) {
			return list[i];
		}
	}
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