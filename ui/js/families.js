$(function () {
	// Form options
	let uni = $("#uni");
	let nl = $("#nl");
	let ofb = $("#ofb");
	let pets = $("#pets");
	let sns = $("#sns");
	let bv = $("#bv");
	let ft = $("#ft");
	let al = $("#al");

	let numberSims = $("#numberSims");
	let minAge = '';
	let sim1 = $("#sim1");
	let sim2 = $("#sim2");
	let sim3 = $("#sim3");
	let sim4 = $("#sim4");
	let sim5 = $("#sim5");
	let sim6 = $("#sim6");
	let sim7 = $("#sim7");
	let sim8 = $("#sim8");

	let age = $("#age");
	let gender = $("#gender");
	let skintone = $("#skin");
	let hair = $("#hair");
	let eyes = $("#eyes");
	let zodiac = $("#zodiac");
	let personality = $("#personality");
	let points = [0, 0, 0, 0, 0];

	let fitness = $("#fitness");
	let facialHair = $("#facialHair");
	let glasses = $("#glasses");
	let hats = $("#hats");
	let makeUp = $("#makeUp");
	let supernatural = $("#supernatural");
	let fatnessChance = $("#fatnessChance");
	let facialHairChance = $("#facialHairChance");
	let glassesChance = $("#glassesChance");
	let hatsChance = $("#hatsChance");
	let makeUpChance = $("#makeUpChance");
	let supernaturalChance = $("#supernaturalChance");

	let zombie = $("#zombie");
	let vampire = $("#vampire");
	let werewolf = $("#werewolf");
	let plantSim = $("#plantSim");
	let witch = $("#witch");

	let aspiration = $("#aspiration");
	let secondAsp = $("#secondAsp");
	let career = $("#career");
	let hobby = $("#hobby");
	let tocheck = $("#tocheck");
	let preference = $("#preference");
	let straightChance = $("#straight");
	let gayChance = $("#gay");
	let biChance = $("#bi");

	// Results
	let age1 = $("#age1");
	let gender1 = $("#gender1");
	let skintone1 = $("#skintone1");
	let hair1 = $("#hair1");
	let eyes1 = $("#eyes1");
	let zodiac1 = $("#zodiac1");
	let personality1 = $("#personality1");

	let body1 = $("#body1");
	let facialHair1 = $("#facialHair1");
	let glasses1 = $("#glasses1");
	let hats1 = $("#hat1");
	let makeUp1 = $("#makeUp1");
	let lifeState1 = $("#lifeState1");

	let aspiration1 = $("#aspiration1");
	let secondAsp1 = $("#secondAsp1");
	let career1 = $("#career1");
	let hobby1 = $("#hobby1");
	let preference1 = $("#preference1");

	let ton11 = $("#ton11");
	let ton21 = $("#ton21");
	let toff1 = $("#toff1");

	// Checks for Sims 2 EP checkboxes
	$(".s2eps").change(function(){
		// If only Uni (or no EPs) checked, don't randomise turn-ons
		if (nl.prop('checked') === false && ofb.prop('checked') === false && pets.prop('checked') === false && sns.prop('checked') === false && bv.prop('checked') === false && ft.prop('checked') === false && al.prop('checked') === false) {
			ton11.attr("src",s2path+'Null.png');
			ton11.attr("alt",'');
			ton21.attr("src",s2path+'Null.png');
			ton21.attr("alt",'');
			toff1.attr("src",s2path+'Null.png');
			toff1.attr("alt",'');
			// If turn-ons not applicable, disable TO option
			tocheck.prop("checked", false);
			tocheck.prop("disabled", true);
		} else {
			// If relevant EPs checked, enable TO option and see if it's checked
			tocheck.prop("disabled", false);
		}
		// If EP is checked, enable supernaturals
		if (uni.prop('checked')) {
			zombie.prop("disabled", false);
		} else {
			zombie.prop("checked", false);
			zombie.prop("disabled", true);
		}
		if (nl.prop('checked')) {
			vampire.prop("disabled", false);
		} else {
			vampire.prop("checked", false);
			vampire.prop("disabled", true);
		}
		if (pets.prop('checked')) {
			werewolf.prop("disabled", false);
		} else {
			werewolf.prop("checked", false);
			werewolf.prop("disabled", true);
		}
		if (sns.prop('checked')) {
			plantSim.prop("disabled", false);
		} else {
			plantSim.prop("checked", false);
			plantSim.prop("disabled", true);
		}
		if (ft.prop('checked')) {
			hobby.prop("disabled", false);
			secondAsp.prop("disabled", false);
		} else {
			hobby.prop("checked", false);
			hobby.prop("disabled", true);
			secondAsp.prop("checked", false);
			secondAsp.prop("disabled", true);
		}
		if (al.prop('checked')) {
			witch.prop("disabled", false);
		} else {
			witch.prop("checked", false);
			witch.prop("disabled", true);
		}
	});

	supernatural.change(function() {
		let checked = $(this).prop('checked');
		$('.supernaturals').find('input:checkbox').prop('checked', checked);
	});

	// Sims 2 specific functions
	$("button#sims2gen").click(function(){
		// Randomise age
		if (age.prop("checked")) {
			minAge = $("input[name='minAge']:checked").val();
			ageRand(minAge);
		} else {
			age1.attr("src", s2path + 'AgeNull.png');
			age1.attr("alt", '');
			age1.attr("title", '');
		}
		// Randomise gender
		if (gender.prop("checked")) {
			genderRand();
		} else {
			gender1.attr("src", s2path + 'Null.png');
			gender1.attr("alt", '');
			gender1.attr("title", '');
		}
		// Randomise skin
		if (skintone.prop("checked")) {
			skinRand();
		} else {
			skintone1.attr("src", s2path + 'Null.png');
			skintone1.attr("alt", '');
			skintone1.attr("title", '');
		}
		// Randomise hair
		if (hair.prop("checked")) {
			hairRand();
		} else {
			hair1.attr("src", s2path + 'Null.png');
			hair1.attr("alt", '');
			hair1.attr("title", '');
		}
		// Randomise eyes
		if (eyes.prop("checked")) {
			eyesRand();
		} else {
			eyes1.attr("src", s2path + 'Null.png');
			eyes1.attr("alt", '');
			eyes1.attr("title", '');
		}
		// Randomise zodiac
		if (zodiac.prop("checked")) {
			zodiacRand();
		} else {
			zodiac1.attr("src", s2path + 'Null.png');
			zodiac1.attr("alt", '');
			zodiac1.attr("title", '');
		}
		// Randomise personality
		if (personality.prop("checked")) {
			personalityRand();
		} else {
			personality1.attr("src", s2path + 'Null.png');
			personality1.attr("alt", '');
			personality1.attr("title", '');
		}

		// Randomise fitness
		if (fitness.prop("checked")) {
			fitnessRand();
		} else {
			body1.attr("src", s2path + 'Null.png');
			body1.attr("alt", '');
			body1.attr("title", '');
		}
		// Randomise facial hair
		if (facialHair.prop("checked")) {
			facialHairRand();
		} else {
			facialHair1.attr("src", s2path + 'Null.png');
			facialHair1.attr("alt", '');
			facialHair1.attr("title", '');
		}
		// Randomise glasses
		if (glasses.prop("checked")) {
			glassesRand();
		} else {
			glasses1.attr("src", s2path + 'Null.png');
			glasses1.attr("alt", '');
			glasses1.attr("title", '');
		}
		// Randomise hats
		if (hats.prop("checked")) {
			hatsRand();
		} else {
			hats1.attr("src", s2path + 'Null.png');
			hats1.attr("alt", '');
			hats1.attr("title", '');
		}
		// Randomise make-up
		if (makeUp.prop("checked")) {
			makeUpRand();
		} else {
			makeUp1.attr("src", s2path + 'Null.png');
			makeUp1.attr("alt", '');
			makeUp1.attr("title", '');
		}
		// Randomise supernatural
		if (supernatural.prop("checked")) {
			supernaturalRand();
		} else {
			lifeState1.attr("src", s2path + 'Null.png');
			lifeState1.attr("alt", '');
			lifeState1.attr("title", '');
		}

		// Randomise aspirations
		aspirationRand();

		// Randomise career
		if (career.prop("checked")) {
			careerRand();
		} else {
			career1.attr("src", s2path + 'Null.png');
			career1.attr("alt", '');
			career1.attr("title", '');
		}
		// Randomise hobby
		if (hobby.prop("checked")) {
			hobbyRand();
		} else {
			hobby1.attr("src", s2path + 'Null.png');
			hobby1.attr("alt", '');
			hobby1.attr("title", '');
		}

		// Randomise preference
		if ((preference.prop('checked'))) {
			prefRand();
		} else {
			preference1.attr("src", s2path + 'Null.png');
			preference1.attr("alt", '');
			preference1.attr("title", '');
		}
		// If TO checked, randomise turn-ons
		if (tocheck.prop("checked")) {
			tofrandom();
		} else {
			ton11.attr("src", s2path + 'Null.png');
			ton11.attr("alt", '');
			ton11.attr("title", '');
			ton21.attr("src", s2path + 'Null.png');
			ton21.attr("alt", '');
			ton21.attr("title", '');
			toff1.attr("src", s2path + 'Null.png');
			toff1.attr("alt", '');
			toff1.attr("title", '');
		}
	});

	// Age randomiser
	//TODO: Account for multiple sims
	function ageRand(n) {
		let ageimg = '';
		let agealt = '';
		let ageRnd = 0;

		switch (n) {
			case 'minTeen':
				ageRnd = getRandomInt(3, 5);
				break;
			case 'minAdult':
				ageRnd = getRandomInt(4, 5);
				break;
			case 'minElder':
				ageRnd = ageRnd = 5;
				break;
			default:
				ageRnd = getRandomInt(1, 5);
				break;
		}

		switch (ageRnd) {
			case 1:
				ageimg = "Age1.png";
				agealt = "Toddler";
				break;
			case 2:
				ageimg = "Age2.png";
				agealt = "Child";
				break;
			case 3:
				ageimg = "Age3.png";
				agealt = "Teen";
				break;
			case 4:
				ageimg = "Age4.png";
				agealt = "Adult";
				break;
			case 5:
				ageimg = "Age5.png";
				agealt = "Elder";
				break;
			default:
				ageimg = "AgeNull.png";
				agealt = "";
				break;
		}
		age1.attr("src", s2path + ageimg);
		age1.attr("alt", agealt);
		age1.attr("title", agealt);
	}

	// Gender randomiser
	function genderRand() {
		let genderimg = '';
		let genderalt = '';
		let genderRnd = getRandomInt(1, 2);

		switch (genderRnd) {
			case 1:
				genderimg = "Female.png";
				genderalt = "Female";
				break;
			case 2:
				genderimg = "Male.png";
				genderalt = "Male";
				break;
			default:
				genderimg = "Null.png";
				genderalt = "";
				break;
		}
		gender1.attr("src", s2path + genderimg);
		gender1.attr("alt", genderalt);
		gender1.attr("title", genderalt);
	}

	// Skin randomiser
	function skinRand() {
		let skinimg = '';
		let skinalt = '';
		let skinRnd = getRandomInt(1, 4);

		switch (skinRnd) {
			case 1:
				skinimg = "S1.png";
				skinalt = "Light";
				break;
			case 2:
				skinimg = "S2.png";
				skinalt = "Tan";
				break;
			case 3:
				skinimg = "S3.png";
				skinalt = "Mid";
				break;
			case 4:
				skinimg = "S4.png";
				skinalt = "Dark";
				break;
			default:
				skinimg = "Null.png";
				skinalt = "";
				break;
		}
		skintone1.attr("src", s2path + skinimg);
		skintone1.attr("alt", skinalt);
		skintone1.attr("title", skinalt);
	}

	// Hair randomiser
	function hairRand() {
		let hairimg = '';
		let hairalt = '';
		let hairRnd = getRandomInt(1, 4);

		switch (hairRnd) {
			case 1:
				hairimg = "turnon15.png";
				hairalt = "Blond";
				break;
			case 2:
				hairimg = "turnon17.png";
				hairalt = "Brunette";
				break;
			case 3:
				hairimg = "turnon18.png";
				hairalt = "Black";
				break;
			case 4:
				hairimg = "turnon16.png";
				hairalt = "Redhead";
				break;
			default:
				hairimg = "Null.png";
				hairalt = "";
				break;
		}
		hair1.attr("src", s2path + hairimg);
		hair1.attr("alt", hairalt);
		hair1.attr("title", hairalt);
	}

	// Eyes randomiser
	function eyesRand() {
		let eyesimg = '';
		let eyesalt = '';
		let eyesRnd = getRandomInt(1, 5);

		switch (eyesRnd) {
			case 1:
				eyesimg = "brown_eyes.png";
				eyesalt = "Brown eyes";
				break;
			case 2:
				eyesimg = "dark_blue_eyes.png";
				eyesalt = "Dark blue eyes";
				break;
			case 3:
				eyesimg = "green_eyes.png";
				eyesalt = "Green eyes";
				break;
			case 4:
				eyesimg = "light_blue_eyes.png";
				eyesalt = "Light blue eyes";
				break;
			case 5:
				eyesimg = "grey_eyes.png";
				eyesalt = "Grey eyes";
				break;
			default:
				eyesimg = "Null.png";
				eyesalt = "";
				break;
		}
		eyes1.attr("src", s2path + eyesimg);
		eyes1.attr("alt", eyesalt);
		eyes1.attr("title", eyesalt);
	}

	// Zodiac randomiser
	function zodiacRand() {
		let zodiacimg = '';
		let zodiacalt = '';
		let zodiacRnd = getRandomInt(1, 12);

		switch (zodiacRnd) {
			case 1:
				zodiacimg = "Zodiac1.png";
				zodiacalt = "Capricorn";
				points = [7, 4, 1, 8, 5];
				break;
			case 2:
				zodiacimg = "Zodiac2.png";
				zodiacalt = "Sagittarius";
				points = [2, 3, 9, 7, 4];
				break;
			case 3:
				zodiacimg = "Zodiac3.png";
				zodiacalt = "Libra";
				points = [2, 8, 2, 6, 7];
				break;
			case 4:
				zodiacimg = "Zodiac4.png";
				zodiacalt = "Aquarius";
				points = [4, 4, 4, 7, 6];
				break;
			case 5:
				zodiacimg = "Zodiac5.png";
				zodiacalt = "Aries";
				points = [5, 8, 6, 3, 3];
				break;
			case 6:
				zodiacimg = "Zodiac6.png";
				zodiacalt = "Cancer";
				points = [6, 3, 6, 4, 6];
				break;
			case 7:
				zodiacimg = "Zodiac7.png";
				zodiacalt = "Gemini";
				points = [4, 7, 8, 3, 3];
				break;
			case 8:
				zodiacimg = "Zodiac8.png";
				zodiacalt = "Leo";
				points = [4, 10, 4, 4, 3];
				break;
			case 9:
				zodiacimg = "Zodiac9.png";
				zodiacalt = "Pisces";
				points = [5, 3, 7, 3, 7];
				break;
			case 10:
				zodiacimg = "Zodiac10.png";
				zodiacalt = "Scorpio";
				points = [6, 5, 8, 3, 3];
				break;
			case 11:
				zodiacimg = "Zodiac11.png";
				zodiacalt = "Taurus";
				points = [5, 5, 3, 8, 4];
				break;
			case 12:
				zodiacimg = "Zodiac12.png";
				zodiacalt = "Virgo";
				points = [9, 2, 6, 3, 5];
				break;
			default:
				zodiacimg = "Null.png";
				zodiacalt = "";
				break;
		}
		zodiac1.attr("src", s2path + zodiacimg);
		zodiac1.attr("alt", zodiacalt);
		zodiac1.attr("title", zodiacalt);
		if (!personality.prop("checked"))
			personality1.text("Personality: " + points.join('-'));
	}

	// Personality randomiser
	function personalityRand() {
		let pointsRnd = 0;

		for (i = 0; i < points.length; i++) {
			 pointsRnd = getRandomInt(1, 10);
			 points[i] = pointsRnd;
		}

		personality1.text("Personality: " + points.join('-'));
	}

	// Body randomiser
	function fitnessRand() {
		let fitnessimg = '';
		let fitnessalt = '';
		let fat = fatnessChance.val() / 100;
		let thin = (100 - fatnessChance.val()) / 100;

		let list = ['thin', 'fat'];
		let weight = [thin, fat];
		let random_item = getWeightedRandom(list, weight);

		if (random_item === 'thin') {
			fitnessimg = "skinny.png";
			fitnessalt = "Skinny";
		}

		if (random_item === 'fat') {
			fitnessimg = "fat.png";
			fitnessalt = "Fat";
		}

		body1.attr("src", s2path + fitnessimg);
		body1.attr("alt", fitnessalt);
		body1.attr("title", fitnessalt);
	}

	// Facial hair randomiser
	function facialHairRand() {
		let fhimg = '';
		let fhalt = '';

		let hair = facialHairChance.val() / 100;
		let nohair = (100 - facialHairChance.val()) / 100;

		let list = ['nohair', 'hair'];
		let weight = [nohair, hair];
		let random_item = getWeightedRandom(list, weight);

		if (random_item === 'nohair') {
			fhimg = "turnoff10.png";
			fhalt = "No facial hair";
		}

		if (random_item === 'hair') {
			fhimg = "turnon10.png";
			fhalt = "Has facial hair";
		}

		facialHair1.attr("src", s2path + fhimg);
		facialHair1.attr("alt", fhalt);
		facialHair1.attr("title", fhalt);
	}

	// Glasses randomiser
	function glassesRand() {
		let glassesimg = '';
		let glassesalt = '';

		let glasses = glassesChance.val() / 100;
		let noglasses = (100 - glassesChance.val()) / 100;

		let list = ['noglasses', 'glasses'];
		let weight = [noglasses, glasses];
		let random_item = getWeightedRandom(list, weight);

		if (random_item === 'noglasses') {
			glassesimg = "turnoff11.png";
			glassesalt = "No glasses";
		}

		if (random_item === 'glasses') {
			glassesimg = "turnon11.png";
			glassesalt = "Has glasses";
		}
		glasses1.attr("src", s2path + glassesimg);
		glasses1.attr("alt", glassesalt);
		glasses1.attr("title", glassesalt);
	}

	// Hats randomiser
	//TODO: Use percentages
	function hatsRand() {
		let hatimg = '';
		let hatalt = '';

		let hats = hatsChance.val() / 100;
		let nohats = (100 - hatsChance.val()) / 100;

		let list = ['nohats', 'hats'];
		let weight = [nohats, hats];
		let random_item = getWeightedRandom(list, weight);

		if (random_item === 'nohats') {
			hatimg = "turnoff14.png";
			hatalt = "No hat";
		}

		if (random_item === 'hats') {
			hatimg = "turnon14.png";
			hatalt = "Has hat";
		}
		hats1.attr("src", s2path + hatimg);
		hats1.attr("alt", hatalt);
		hats1.attr("title", hatalt);
	}

	// Makeup randomiser
	function makeUpRand() {
		let makeUpimg = '';
		let makeUpalt = '';

		let makeUp = makeUpChance.val() / 100;
		let nomakeUp = (100 - makeUpChance.val()) / 100;

		let list = ['nomakeUp', 'makeUp'];
		let weight = [nomakeUp, makeUp];
		let random_item = getWeightedRandom(list, weight);

		if (random_item === 'nomakeUp') {
			makeUpimg = "turnoff12.png";
			makeUpalt = "No make-up";
		}

		if (random_item === 'makeUp') {
			makeUpimg = "turnon12.png";
			makeUpalt = "Has make-up";
		}
		makeUp1.attr("src", s2path + makeUpimg);
		makeUp1.attr("alt", makeUpalt);
		makeUp1.attr("title", makeUpalt);
	}

	// Supernatural randomiser
	function supernaturalRand() {
		let lifeStateimg = '';
		let lifeStatealt = '';

		let supernatural = supernaturalChance.val() / 100;
		let human = (100 - supernaturalChance.val()) / 100;

		let list = ['human', 'supernatural'];
		let weight = [human, supernatural];
		let random_item = getWeightedRandom(list, weight);

		if (random_item === 'human') {
			lifeStateimg = "human.png";
			lifeStatealt = "Human";
		}

		if (random_item === 'supernatural') {
			let checked = [];
			if (zombie.prop("checked"))
				checked.push("zombie");
			if (vampire.prop("checked"))
				checked.push("vampire");
			if (werewolf.prop("checked"))
				checked.push("werewolf");
			if (plantSim.prop("checked"))
				checked.push("plantSim");
			if (witch.prop("checked"))
				checked.push("witch");

			let snWeight = [];
			let snPercent = 1 / checked.length;

			for (let i = 0; i < checked.length; i++) {
				snWeight.push(snPercent);
			}

			let snRandom = getWeightedRandom(checked, snWeight);
			if (snRandom === 'zombie') {
				lifeStateimg = "turnon29.png";
				lifeStatealt = "Zombie";
			}
			if (snRandom === 'vampire') {
				lifeStateimg = "turnon9.png";
				lifeStatealt = "Vampire";
			}
			if (snRandom === 'werewolf') {
				lifeStateimg = "turnon33.png";
				lifeStatealt = "Werewolf";
			}
			if (snRandom === 'plantSim') {
				lifeStateimg = "turnon32.png";
				lifeStatealt = "Plant Sim";
			}
			if (snRandom === 'witch') {
				lifeStateimg = "turnon34.png";
				lifeStatealt = "Witch";
			}
		}
		lifeState1.attr("src", s2path + lifeStateimg);
		lifeState1.attr("alt", lifeStatealt);
		lifeState1.attr("title", lifeStatealt);
	}

	// Career randomiser
	function careerRand() {
		// Sims 2 careers
		let careerRnd = 0;
		let careerimg = '';
		let careeralt = '';
		let excludedCareers = [];

		if (!uni.prop("checked") && !sns.prop('checked') && !ft.prop('checked')) {
			careerRnd = getRandomInt(1, 10);
		} else if (uni.prop("checked") && !sns.prop('checked') && !ft.prop('checked')) {
			careerRnd = getRandomInt(1, 14);
		} else if (uni.prop("checked") && sns.prop('checked') && !ft.prop('checked')) {
			careerRnd = getRandomInt(1, 20);
		} else if (uni.prop("checked") && sns.prop('checked') && ft.prop('checked')) {
			careerRnd = getRandomInt(1, 25);
		}
		else if (!uni.prop("checked") && sns.prop('checked') && !ft.prop('checked')) {
			excludedCareers = [11, 12, 13, 14];
			careerRnd = getRandomInt(1, 20);
			while(excludedCareers.includes(careerRnd)){
				careerRnd = Math.round(Math.random() * (20 - 1));
			}
		} else if (!uni.prop("checked") && !sns.prop('checked') && ft.prop('checked')) {
			excludedCareers = [11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
			careerRnd = getRandomInt(1, 25);
			while(excludedCareers.includes(careerRnd)){
				careerRnd = Math.round(Math.random() * (25 - 1));
			}
		}
		else {
			careerimg.attr("src", s2path + 'Null.png');
			careeralt.attr("alt", '');
		}

		switch (careerRnd) {
			case 1:
				careerimg = "Athletic_career.png";
				careeralt = "Athletic";
				break;
			case 2:
				careerimg = "Business_career.png";
				careeralt = "Business";
				break;
			case 3:
				careerimg = "Criminal_career.png";
				careeralt = "Criminal";
				break;
			case 4:
				careerimg = "Culinary_career.png";
				careeralt = "Culinary";
				break;
			case 5:
				careerimg = "Law_Enforcement_career.png";
				careeralt = "Law Enforcement";
				break;
			case 6:
				careerimg = "Medicine_career.png";
				careeralt = "Medicine";
				break;
			case 7:
				careerimg = "Military_career.png";
				careeralt = "Military";
				break;
			case 8:
				careerimg = "Politics_career.png";
				careeralt = "Politics";
				break;
			case 9:
				careerimg = "Science_career.png";
				careeralt = "Science";
				break;
			case 10:
				careerimg = "Slacker_career.png";
				careeralt = "Slacker";
				break;
			case 11:
				careerimg = "Art_career.png";
				careeralt = "Artist";
				break;
			case 12:
				careerimg = "Natural_Science_career.png";
				careeralt = "Natural Science";
				break;
			case 13:
				careerimg = "Paranormal_career.png";
				careeralt = "Paranormal";
				break;
			case 14:
				careerimg = "Show_Business_career.png";
				careeralt = "Show Business";
				break;
			case 15:
				careerimg = "Law_career.png";
				careeralt = "Law";
				break;
			case 16:
				careerimg = "Gamer_career.png";
				careeralt = "Gamer";
				break;
			case 17:
				careerimg = "Adventurer_career.png";
				careeralt = "Adventurer";
				break;
			case 18:
				careerimg = "Music_career.png";
				careeralt = "Music";
				break;
			case 19:
				careerimg = "Journalism_career.png";
				careeralt = "Journalism";
				break;
			case 20:
				careerimg = "Education_career.png";
				careeralt = "Education";
				break;
			case 21:
				careerimg = "Entertainment_career.png";
				careeralt = "Entertainment";
				break;
			case 22:
				careerimg = "Dance_career.png";
				careeralt = "Dance";
				break;
			case 23:
				careerimg = "Architecture_career.png";
				careeralt = "Architecture";
				break;
			case 24:
				careerimg = "Intelligence_career.png";
				careeralt = "Intelligence";
				break;
			case 25:
				careerimg = "Oceanography_career.png";
				careeralt = "Oceanography";
				break;
			default:
				careerimg = "Null.png";
				careeralt = "";
				break;
		}
		career1.attr("src", s2path + careerimg);
		career1.attr("alt", careeralt);
		career1.attr("title", careeralt);
	}

	// Aspiration randomiser
	function aspirationRand() {
		// Sims 2 aspirations
		let sims2asp = 0;
		let sims2secAsp = 0;
		let aspimg = '';
		let aspalt = '';
		let asp2img = '';
		let asp2alt = '';
		let result = [];

		// Randomise aspiration
		if (secondAsp.prop("checked")) {
			if (aspiration.prop("checked")) {
				if (nl.prop('checked')) {
					result = shuffle(6, 2);
					sims2asp = result[0];
					sims2secAsp = result[1];
				} else {
					result = shuffle(5, 2);
					sims2asp = result[0];
					sims2secAsp = result[1];
				}
			} else {
				sims2secAsp = getRandomInt(1, 7);
			}
		} else {
			if (aspiration.prop("checked")) {
				if (nl.prop('checked')) {
					sims2asp = getRandomInt(1, 6);
				} else {
					sims2asp = getRandomInt(1, 5);
				}
			} else {
				aspiration1.attr("src", "src", s2path + 'Null.png');
				aspiration1.attr("alt", "");
				aspiration1.attr("title", "");
				secondAsp1.attr("src", "src", s2path + 'Null.png');
				secondAsp1.attr("alt", "");
				secondAsp1.attr("title", "");
			}
		}

		switch (sims2asp) {
			case 1:
				aspimg = "Aspiration1.png";
				aspalt = "Family";
				break;
			case 2:
				aspimg = "Aspiration2.png";
				aspalt = "Wealth";
				break;
			case 3:
				aspimg = "Aspiration3.png";
				aspalt = "Knowledge";
				break;
			case 4:
				aspimg = "Aspiration4.png";
				aspalt = "Romance";
				break;
			case 5:
				aspimg = "Aspiration5.png";
				aspalt = "Popularity";
				break;
			case 6:
				aspimg = "Aspiration6.png";
				aspalt = "Pleasure";
				break;
			default:
				aspimg = "Null.png";
				aspalt = "";
				break;
		}
		switch (sims2secAsp) {
			case 1:
				asp2img = "Aspiration1.png";
				asp2alt = "Family";
				break;
			case 2:
				asp2img = "Aspiration2.png";
				asp2alt = "Wealth";
				break;
			case 3:
				asp2img = "Aspiration3.png";
				asp2alt = "Knowledge";
				break;
			case 4:
				asp2img = "Aspiration4.png";
				asp2alt = "Romance";
				break;
			case 5:
				asp2img = "Aspiration5.png";
				asp2alt = "Popularity";
				break;
			case 6:
				asp2img = "Aspiration6.png";
				asp2alt = "Pleasure";
				break;
			case 7:
				asp2img = "Aspiration7.png";
				asp2alt = "Grilled Cheese";
				break;
			default:
				asp2img = "Null.png";
				asp2alt = "";
				break;
		}

		aspiration1.attr("src", s2path + aspimg);
		aspiration1.attr("alt", aspalt);
		aspiration1.attr("title", aspalt);
		secondAsp1.attr("src", s2path + asp2img);
		secondAsp1.attr("alt", asp2alt);
		secondAsp1.attr("title", asp2alt);
	}

	function hobbyRand() {
		let hobbyimg = '';
		let hobbyalt = '';
		let hobbyRnd = getRandomInt(1, 10);

		switch (hobbyRnd) {
			case 1:
				hobbyimg = "hobby1.png";
				hobbyalt = "Art";
				break;
			case 2:
				hobbyimg = "hobby2.png";
				hobbyalt = "Film and Literature";
				break;
			case 3:
				hobbyimg = "hobby3.png";
				hobbyalt = "Fitness";
				break;
			case 4:
				hobbyimg = "hobby4.png";
				hobbyalt = "Cuisine";
				break;
			case 5:
				hobbyimg = "hobby5.png";
				hobbyalt = "Games";
				break;
			case 6:
				hobbyimg = "hobby6.png";
				hobbyalt = "Music and Dance";
				break;
			case 7:
				hobbyimg = "hobby7.png";
				hobbyalt = "Nature";
				break;
			case 8:
				hobbyimg = "hobby8.png";
				hobbyalt = "Science";
				break;
			case 9:
				hobbyimg = "hobby9.png";
				hobbyalt = "Sports";
				break;
			case 10:
				hobbyimg = "hobby10.png";
				hobbyalt = "Tinkering";
				break;
			default:
				hobbyimg = "Null.png";
				hobbyalt = "";
				break;
		}
		hobby1.attr("src", s2path + hobbyimg);
		hobby1.attr("alt", hobbyalt);
		hobby1.attr("title", hobbyalt);
	}

	function prefRand() {
		let prefimg = '';
		let prefalt = '';

		if (gender.prop("checked")) {
			let straight = straightChance.val() / 100;
			let gay = gayChance.val() / 100;
			let bi = biChance.val() / 100;

			let list = ['straight', 'gay', 'bi'];
			let weight = [straight, gay, bi];
			let random_item = getWeightedRandom(list, weight);

			if (gender1.attr("alt") === "Female" && random_item === "straight") {
				prefimg = "pref_male.png";
				prefalt = "Prefers males";
			}
			if (gender1.attr("alt")  === "Male" && random_item === "straight") {
				prefimg = "pref_female.png";
				prefalt = "Prefers females";
			}
			if (gender1.attr("alt")  === "Female" && random_item === "gay") {
				prefimg = "pref_female.png";
				prefalt = "Prefers females";
			}
			if (gender1.attr("alt") === "Male" && random_item === "gay") {
				prefimg = "pref_male.png";
				prefalt = "Prefers males";
			}
			if (random_item === "bi") {
				prefimg = "pref_both.png";
				prefalt = "Likes both";
			}
		} else {
			let random_item = getRandomInt(1, 3);

			switch (random_item) {
				case 1:
					prefimg = "pref_male.png";
					prefalt = "Prefers males";
					break;
				case 2:
					prefimg = "pref_female.png";
					prefalt = "Prefers females";
					break;
				case 3:
					prefimg = "pref_both.png";
					prefalt = "Likes both";
					break;
				default:
					prefimg = "Null.png";
					prefalt = "";
					break;
			}
		}
		preference1.attr("src", s2path + prefimg);
		preference1.attr("alt", prefalt);
		preference1.attr("title", prefalt);
	}

	// Turn on / off randomiser
	function tofrandom() {
		let result = [];
		let rnd1 = 0; // Used for setting 1st turn-on
		let rnd2 = 0; // Used for setting 2nd turn-on
		let rnd3 = 0; // Used for setting turn-off
		let to1img = ''; // Relative path for 1st turn-on
		let to1alt = ''; // Alt text for 1st turn-on
		let to2img = ''; // Relative path for 2nd turn-on
		let to2alt = ''; // Alt text for 2nd turn-on
		let toffimg = ''; // Relative path for turn-off
		let toffalt = ''; // Alt text for turn-off

		// If AL is false, don't include witches
		if (al.prop('checked') === false) {
			// If BV and FT are false, don't include new turn-ons
			if (bv.prop('checked') === false && ft.prop('checked') === false) {
				result = shuffle(19, 3);
				rnd1 = result[0];
				rnd2 = result[1];
				rnd3 = result[2];
			} else {
				result = shuffle(33, 3);
				rnd1 = result[0];
				rnd2 = result[1];
				rnd3 = result[2];
			}
		} else {
			result = shuffle(34, 3);
			rnd1 = result[0];
			rnd2 = result[1];
			rnd3 = result[2];
		}

		// Check against randomly generated numbers and set image etc. to corresponding variables
		if (rnd1 === 1) {
			to1img = 'turnon1.png';
			to1alt = 'Cologne';
		} else if (rnd2 === 1) {
			to2img = "turnon1.png";
			to2alt = "Cologne";
		} else if (rnd3 === 1) {
			toffimg = "turnoff1.png";
			toffalt = "Cologne";
		}

		if (rnd1 === 2) {
			to1img = 'turnon2.png';
			to1alt = 'Stink';
		} else if (rnd2 === 2) {
			to2img = "turnon2.png";
			to2alt = "Stink";
		} else if (rnd3 === 2) {
			toffimg = "turnoff2.png";
			toffalt = "Stink";
		}

		if (rnd1 === 3) {
			to1img = 'turnon3.png';
			to1alt = 'Fat';
		} else if (rnd2 === 3) {
			to2img = "turnon3.png";
			to2alt = "Fat";
		} else if (rnd3 === 3) {
			toffimg = "turnoff3.png";
			toffalt = "Fat";
		}

		if (rnd1 === 4) {
			to1img = 'turnon4.png';
			to1alt = 'Fit';
		} else if (rnd2 === 4) {
			to2img = "turnon4.png";
			to2alt = "Fit";
		} else if (rnd3 === 4) {
			toffimg = "turnoff4.png";
			toffalt = "Fit";
		}

		if (rnd1 === 5) {
			to1img = 'turnon5.png';
			to1alt = 'Grey hair';
				} else if (rnd2 === 5) {
			to2img = "turnon5.png";
			to2alt = "Grey hair";
		} else if (rnd3 === 5) {
			toffimg = "turnoff5.png";
			toffalt = "Grey hair";
		}

		if (rnd1 === 6) {
			to1img = 'turnon6.png';
			to1alt = 'Formal wear';
		} else if (rnd2 === 6) {
			to2img = "turnon6.png";
			to2alt = "Formal wear";
		} else if (rnd3 === 6) {
			toffimg = "turnoff6.png";
			toffalt = "Formal wear";
		}


		if (rnd1 === 7) {
			to1img = 'turnon7.png';
			to1alt = 'Swimwear';
		} else if (rnd2 === 7) {
			to2img = "turnon7.png";
			to2alt = "Swimwear";
		} else if (rnd3 === 7) {
			toffimg = "turnoff7.png";
			toffalt = "Swimwear";
		}

		if (rnd1 === 8) {
			to1img = 'turnon8.png';
			to1alt = 'Underwear';
		} else if (rnd2 === 8) {
			to2img = "turnon8.png";
			to2alt = "Underwear";
		} else if (rnd3 === 8) {
			toffimg = "turnoff8.png";
			toffalt = "Underwear";
		}

		if (rnd1 === 9) {
			to1img = 'turnon9.png';
			to1alt = 'Vampirism';
		} else if (rnd2 === 9) {
			to2img = "turnon9.png";
			to2alt = "Vampirism";
		} else if (rnd3 === 9) {
			toffimg = "turnoff9.png";
			toffalt = "Vampirism";
		}

		if (rnd1 === 10) {
			to1img = 'turnon10.png';
			to1alt = 'Facial hair';
		} else if (rnd2 === 10) {
			to2img = "turnon10.png";
			to2alt = "Facial hair";
		} else if (rnd3 === 10) {
			toffimg = "turnoff10.png";
			toffalt = "Facial hair";
		}

		if (rnd1 === 11) {
			to1img = 'turnon11.png';
			to1alt = 'Glasses';
		} else if (rnd2 === 11) {
			to2img = "turnon11.png";
			to2alt = "Glasses";
		} else if (rnd3 === 11) {
			toffimg = "turnoff11.png";
			toffalt = "Glasses";
		}

		if (rnd1 === 12) {
			to1img = 'turnon12.png';
			to1alt = 'Makeup';
		} else if (rnd2 === 12) {
			to2img = "turnon12.png";
			to2alt = "Makeup";
		} else if (rnd3 === 12) {
			toffimg = "turnoff12.png";
			toffalt = "Makeup";
		}

		if (rnd1 === 13) {
			to1img = 'turnon13.png';
			to1alt = 'Face paint';
		} else if (rnd2 === 13) {
			to2img = "turnon13.png";
			to2alt = "Face paint";
		} else if (rnd3 === 13) {
			toffimg = "turnoff13.png";
			toffalt = "Face paint";
		}

		if (rnd1 === 14) {
			to1img = 'turnon14.png';
			to1alt = 'Hats';
		} else if (rnd2 === 14) {
			to2img = "turnon14.png";
			to2alt = "Hats";
		} else if (rnd3 === 14) {
			toffimg = "turnoff14.png";
			toffalt = "Hats";
		}

		if (rnd1 === 15) {
			to1img = 'turnon15.png';
			to1alt = 'Blond hair';
		} else if (rnd2 === 15) {
			to2img = "turnon15.png";
			to2alt = "Blond hair";
		} else if (rnd3 === 15) {
			toffimg = "turnoff15.png";
			toffalt = "Blond hair";
		}

		if (rnd1 === 16) {
			to1img = 'turnon16.png';
			to1alt = 'Red hair';
		} else if (rnd2 === 16) {
			to2img = "turnon16.png";
			to2alt = "Red hair";
		} else if (rnd3 === 16) {
			toffimg = "turnoff16.png";
			toffalt = "Red hair";
		}

		if (rnd1 === 17) {
			to1img = 'turnon17.png';
			to1alt = 'Brown hair';
		} else if (rnd2 === 17) {
			to2img = "turnon17.png";
			to2alt = "Brown hair";
		} else if (rnd3 === 17) {
			toffimg = "turnoff17.png";
			toffalt = "Brown hair";
		}

		if (rnd1 === 18) {
			to1img = 'turnon18.png';
			to1alt = 'Black hair';
		} else if (rnd2 === 18) {
			to2img = "turnon18.png";
			to2alt = "Black hair";
		} else if (rnd3 === 18) {
			toffimg = "turnoff18.png";
			toffalt = "Black hair";
		}

		if (rnd1 === 19) {
			to1img = 'turnon19.png';
			to1alt = 'Custom hair';
		} else if (rnd2 === 19) {
			to2img = "turnon19.png";
			to2alt = "Custom hair";
		} else if (rnd3 === 19) {
			toffimg = "turnoff19.png";
			toffalt = "Custom hair";
		}

		if (rnd1 === 20) {
			to1img = 'turnon20.png';
			to1alt = 'Works Hard';
		} else if (rnd2 === 20) {
			to2img = "turnon20.png";
			to2alt = "Works Hard";
		} else if (rnd3 === 20) {
			toffimg = "turnoff20.png";
			toffalt = "Works Hard";
		}

		if (rnd1 === 21) {
			to1img = 'turnon21.png';
			to1alt = 'Unemployed';
		} else if (rnd2 === 21) {
			to2img = "turnon21.png";
			to2alt = "Unemployed";
		} else if (rnd3 === 21) {
			toffimg = "turnoff21.png";
			toffalt = "Unemployed";
		}

		if (rnd1 === 22) {
			to1img = 'turnon22.png';
			to1alt = 'Logical';
		} else if (rnd2 === 22) {
			to2img = "turnon22.png";
			to2alt = "Logical";
		} else if (rnd3 === 22) {
			toffimg = "turnoff22.png";
			toffalt = "Logical";
		}

		if (rnd1 === 23) {
			to1img = 'turnon23.png';
			to1alt = 'Charismatic';
		} else if (rnd2 === 23) {
			to2img = "turnon22.png";
			to2alt = "Charismatic";
		} else if (rnd3 === 23) {
			toffimg = "turnoff23.png";
			toffalt = "Charismatic";
		}

		if (rnd1 === 24) {
			to1img = 'turnon24.png';
			to1alt = 'Good Cook';
		} else if (rnd2 === 24) {
			to2img = "turnon24.png";
			to2alt = "Good Cook";
		} else if (rnd3 === 24) {
			toffimg = "turnoff24.png";
			toffalt = "Good Cook";
		}

		if (rnd1 === 25) {
			to1img = 'turnon25.png';
			to1alt = 'Mechanic';
		} else if (rnd2 === 25) {
			to2img = "turnon25.png";
			to2alt = "Mechanic";
		} else if (rnd3 === 25) {
			toffimg = "turnoff25.png";
			toffalt = "Mechanic";
		}

		if (rnd1 === 26) {
			to1img = 'turnon26.png';
			to1alt = 'Creative';
		} else if (rnd2 === 26) {
			to2img = "turnon26.png";
			to2alt = "Creative";
		} else if (rnd3 === 26) {
			toffimg = "turnoff26.png";
			toffalt = "Creative";
		}

		if (rnd1 === 27) {
			to1img = 'turnon27.png';
			to1alt = 'Athletic';
		} else if (rnd2 === 27) {
			to2img = "turnon27.png";
			to2alt = "Athletic";
		} else if (rnd3 === 27) {
			toffimg = "turnoff27.png";
			toffalt = "Athletic";
		}

		if (rnd1 === 28) {
			to1img = 'turnon28.png';
			to1alt = 'Good Cleaner';
		} else if (rnd2 === 28) {
			to2img = "turnon28.png";
			to2alt = "Good Cleaner";
		} else if (rnd3 === 28) {
			toffimg = "turnoff28.png";
			toffalt = "Good Cleaner";
		}

		if (rnd1 === 29) {
			to1img = 'turnon29.png';
			to1alt = 'Zombie';
		} else if (rnd2 === 29) {
			to2img = "turnon29.png";
			to2alt = "Zombie";
		} else if (rnd3 === 29) {
			toffimg = "turnoff29.png";
			toffalt = "Zombie";
		}

		if (rnd1 === 30) {
			to1img = 'turnon30.png';
			to1alt = 'Jewelry';
		} else if (rnd2 === 30) {
			to2img = "turnon30.png";
			to2alt = "Jewelry";
		} else if (rnd3 === 30) {
			toffimg = "turnoff30.png";
			toffalt = "Jewelry";
		}

		if (rnd1 === 31) {
			to1img = 'turnon31.png';
			to1alt = 'Servo';
		} else if (rnd2 === 31) {
			to2img = "turnon31.png";
			to2alt = "Servo";
		} else if (rnd3 === 31) {
			toffimg = "turnoff31.png";
			toffalt = "Servo";
		}

		if (rnd1 === 32) {
			to1img = 'turnon32.png';
			to1alt = 'Plant Sim';
		} else if (rnd2 === 32) {
			to2img = "turnon32.png";
			to2alt = "Plant Sim";
		} else if (rnd3 === 32) {
			toffimg = "turnoff32.png";
			toffalt = "Plant Sim";
		}

		if (rnd1 === 33) {
			to1img = 'turnon33.png';
			to1alt = 'Werewolf';
		} else if (rnd2 === 33) {
			to2img = "turnon33.png";
			to2alt = "Werewolf";
		} else if (rnd3 === 33) {
			toffimg = "turnoff33.png";
			toffalt = "Werewolf";
		}

		if (rnd1 === 34) {
			to1img = 'turnon34.png';
			to1alt = 'Witch';
		} else if (rnd2 === 34) {
			to2img = "turnon34.png";
			to2alt = "Witch";
		} else if (rnd3 === 34) {
			toffimg = "turnoff34.png";
			toffalt = "Witch";
		}

		// Once all checks are done, set the appropriate image and alt text
		ton11.attr("src",s2path+to1img);
		ton11.attr("alt",to1alt);
		ton11.attr("title",to1alt);
		ton21.attr("src",s2path+to2img);
		ton21.attr("alt",to2alt);
		ton21.attr("title",to2alt);
		toff1.attr("src",s2path+toffimg);
		toff1.attr("alt",toffalt);
		toff1.attr("title",toffalt);
	}
});