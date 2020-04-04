			/* Initialise values */
            // Personality
			var neat = document.getElementById('neatPoints');
			var neatValueElement = document.getElementById('nP');
			var outgoing = document.getElementById('outgoingPoints');
			var outgoingValueElement = document.getElementById('oP');
			var active = document.getElementById('activePoints');
			var activeValueElement = document.getElementById('aP');
			var playful = document.getElementById('playfulPoints');
			var playfulValueElement = document.getElementById('pP');
			var nice = document.getElementById('nicePoints');
			var niceValueElement = document.getElementById('ncP');

            // Interests
			var politics = document.getElementById('politics');
			var polsValueElement = document.getElementById('pols');
			var crime = document.getElementById('crime');
			var crimeValueElement = document.getElementById('crim');
			var food = document.getElementById('food');
			var foodValueElement = document.getElementById('fudz');
			var sports = document.getElementById('sports');
			var sportsValueElement = document.getElementById('spts');
			var work = document.getElementById('work');
			var workValueElement = document.getElementById('wk');
			var school = document.getElementById('school');
			var schoolValueElement = document.getElementById('sch');
			var money = document.getElementById('money');
			var moneyValueElement = document.getElementById('mny');
			var entertainment = document.getElementById('entertainment');
			var entsValueElement = document.getElementById('ents');
			var health = document.getElementById('health');
			var healthValueElement = document.getElementById('hth');
			var paranormal = document.getElementById('paranormal');
			var paraValueElement = document.getElementById('para');
			var weather = document.getElementById('weather');
			var weatherValueElement = document.getElementById('wth');
			var toys = document.getElementById('toys');
			var toysValueElement = document.getElementById('ty');
			var environment = document.getElementById('environment');
			var envValueElement = document.getElementById('env');
			var culture = document.getElementById('culture');
			var cultureValueElement = document.getElementById('clt');
			var fashion = document.getElementById('fashion');
			var fashionValueElement = document.getElementById('fash');
			var travel = document.getElementById('travel');
			var travelValueElement = document.getElementById('tvl');
			var animals = document.getElementById('animals');
			var animalsValueElement = document.getElementById('amls');
			var scifi = document.getElementById('scifi');
			var scifiValueElement = document.getElementById('sci');

            // Skills
			var cooking = document.getElementById('cooking');
			var cookingValueElement = document.getElementById('ckP');
			var mechanical = document.getElementById('mechanical');
			var mechValueElement = document.getElementById('mP');
			var charisma = document.getElementById('charisma');
			var charismaValueElement = document.getElementById('chP');
			var body = document.getElementById('body');
			var bodyValueElement = document.getElementById('bP');
			var logic = document.getElementById('logic');
			var logicValueElement = document.getElementById('lP');
			var creativity = document.getElementById('creativity');
			var creativityValueElement = document.getElementById('cvP');
			var cleaning = document.getElementById('cleaning');
			var cleaningValueElement = document.getElementById('clP');

            // Hobbies
			var cuisine = document.getElementById('cuisine');
			var cuisineValueElement = document.getElementById('cus');
			var film = document.getElementById('film');
			var filmValueElement = document.getElementById('lit');
			var games = document.getElementById('games');
			var gamesValueElement = document.getElementById('gms');
			var tinkering = document.getElementById('tinkering');
			var tinkeringValueElement = document.getElementById('tnk');
			var science = document.getElementById('science');
			var scienceValueElement = document.getElementById('ftsci');
			var arts = document.getElementById('arts');
			var artsValueElement = document.getElementById('crafts');
			var sport = document.getElementById('sport');
			var sportValueElement = document.getElementById('ftspt');
			var nature = document.getElementById('nature');
			var natureValueElement = document.getElementById('nat');
			var fitness = document.getElementById('fitness');
			var fitnessValueElement = document.getElementById('fit');
			var music = document.getElementById('music');
			var musicValueElement = document.getElementById('dance');

            // AL
            var reputation = document.getElementById('reputation');
            var alignment = document.getElementById('alignment'); 
            var magicLevel = document.getElementById('magicLevel');
            var magicValueElement = document.getElementById('magic');

            /* Personality */
		$('#neatPoints').customSlider({
			start: [neatVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		neat.noUiSlider.on('update', function (values, handle) {
			neatValueElement.innerHTML = values[handle];
		});

		$('#outgoingPoints').customSlider({
			start: [outgoingVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		outgoing.noUiSlider.on('update', function (values, handle) {
			outgoingValueElement.innerHTML = values[handle];
		});

		$('#activePoints').customSlider({
			start: [activeVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		active.noUiSlider.on('update', function (values, handle) {
			activeValueElement.innerHTML = values[handle];
		});

		$('#playfulPoints').customSlider({
			start: [playfulVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		playful.noUiSlider.on('update', function (values, handle) {
			playfulValueElement.innerHTML = values[handle];
		});

		$('#nicePoints').customSlider({
			start: [niceVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		nice.noUiSlider.on('update', function (values, handle) {
			niceValueElement.innerHTML = values[handle];
		});


            /* Skills */
		$('#cooking').customSlider({
			start: [cookVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		cooking.noUiSlider.on('update', function (values, handle) {
			cookingValueElement.innerHTML = values[handle];
		});

		$('#mechanical').customSlider({
			start: [mechVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		mechanical.noUiSlider.on('update', function (values, handle) {
			mechValueElement.innerHTML = values[handle];
		});

		$('#charisma').customSlider({
			start: [charVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

        charisma.noUiSlider.on('update', function (values, handle) {
			charismaValueElement.innerHTML = values[handle];
		});

		$('#body').customSlider({
			start: [bodyVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

        body.noUiSlider.on('update', function (values, handle) {
			bodyValueElement.innerHTML = values[handle];
		});

		$('#logic').customSlider({
			start: [logicVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

        logic.noUiSlider.on('update', function (values, handle) {
			logicValueElement.innerHTML = values[handle];
		});

		$('#creativity').customSlider({
			start: [createVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

        creativity.noUiSlider.on('update', function (values, handle) {
			creativityValueElement.innerHTML = values[handle];
		});

		$('#cleaning').customSlider({
			start: [cleanVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

        cleaning.noUiSlider.on('update', function (values, handle) {
			cleaningValueElement.innerHTML = values[handle];
		});

            /* Interests */
		$('#politics').customSlider({
			start: [politicsVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		politics.noUiSlider.on('update', function (values, handle) {
			polsValueElement.innerHTML = values[handle];
		});

		$('#crime').customSlider({
			start: [crimeVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		crime.noUiSlider.on('update', function (values, handle) {
			crimeValueElement.innerHTML = values[handle];
		});

		$('#food').customSlider({
			start: [foodVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		food.noUiSlider.on('update', function (values, handle) {
			foodValueElement.innerHTML = values[handle];
		});

		$('#sports').customSlider({
			start: [sportsVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		sports.noUiSlider.on('update', function (values, handle) {
			sportsValueElement.innerHTML = values[handle];
		});

		$('#work').customSlider({
			start: [workVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		work.noUiSlider.on('update', function (values, handle) {
			workValueElement.innerHTML = values[handle];
		});

		$('#school').customSlider({
			start: [schoolVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		school.noUiSlider.on('update', function (values, handle) {
			schoolValueElement.innerHTML = values[handle];
		});

		$('#money').customSlider({
			start: [moneyVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		money.noUiSlider.on('update', function (values, handle) {
			moneyValueElement.innerHTML = values[handle];
		});

		$('#entertainment').customSlider({
			start: [entVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		entertainment.noUiSlider.on('update', function (values, handle) {
			entsValueElement.innerHTML = values[handle];
		});

		$('#health').customSlider({
			start: [healthVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		health.noUiSlider.on('update', function (values, handle) {
			healthValueElement.innerHTML = values[handle];
		});

		$('#paranormal').customSlider({
			start: [paraVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		paranormal.noUiSlider.on('update', function (values, handle) {
			paraValueElement.innerHTML = values[handle];
		});

		$('#weather').customSlider({
			start: [weatherVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		weather.noUiSlider.on('update', function (values, handle) {
			weatherValueElement.innerHTML = values[handle];
		});

		$('#toys').customSlider({
			start: [toysVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		toys.noUiSlider.on('update', function (values, handle) {
			toysValueElement.innerHTML = values[handle];
		});

		$('#environment').customSlider({
			start: [envVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		environment.noUiSlider.on('update', function (values, handle) {
			envValueElement.innerHTML = values[handle];
		});

		$('#culture').customSlider({
			start: [cultureVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		culture.noUiSlider.on('update', function (values, handle) {
			cultureValueElement.innerHTML = values[handle];
		});

		$('#fashion').customSlider({
			start: [fashionVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		fashion.noUiSlider.on('update', function (values, handle) {
			fashionVal.innerHTML = values[handle];
		});

		$('#travel').customSlider({
			start: [travelVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		travel.noUiSlider.on('update', function (values, handle) {
			travelValueElement.innerHTML = values[handle];
		});

		$('#animals').customSlider({
			start: [animalsVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		animals.noUiSlider.on('update', function (values, handle) {
			animalsValueElement.innerHTML = values[handle];
		});

		$('#scifi').customSlider({
			start: [scifiVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		scifi.noUiSlider.on('update', function (values, handle) {
			scifiValueElement.innerHTML = values[handle];
		});

            /* Hobbies */
		$('#cuisine').customSlider({
			start: [cuisineVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		cuisine.noUiSlider.on('update', function (values, handle) {
			cuisineValueElement.innerHTML = values[handle];
		});

		$('#film').customSlider({
			start: [filmVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		film.noUiSlider.on('update', function (values, handle) {
			filmValueElement.innerHTML = values[handle];
		});

		$('#games').customSlider({
			start: [gamesVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		games.noUiSlider.on('update', function (values, handle) {
			gamesValueElement.innerHTML = values[handle];
		});

		$('#tinkering').customSlider({
			start: [tinkeringVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		tinkering.noUiSlider.on('update', function (values, handle) {
			tinkeringValueElement.innerHTML = values[handle];
		});

		$('#science').customSlider({
			start: [scienceVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		science.noUiSlider.on('update', function (values, handle) {
			scienceValueElement.innerHTML = values[handle];
		});

		$('#arts').customSlider({
			start: [artsVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		arts.noUiSlider.on('update', function (values, handle) {
			artsValueElement.innerHTML = values[handle];
		});

		$('#sport').customSlider({
			start: [sportVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		sport.noUiSlider.on('update', function (values, handle) {
			sportValueElement.innerHTML = values[handle];
		});

		$('#nature').customSlider({
			start: [natureVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		nature.noUiSlider.on('update', function (values, handle) {
			natureValueElement.innerHTML = values[handle];
		});

		$('#fitness').customSlider({
			start: [fitnessVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		fitness.noUiSlider.on('update', function (values, handle) {
			fitnessValueElement.innerHTML = values[handle];
		});

		$('#music').customSlider({
			start: [musicVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

		music.noUiSlider.on('update', function (values, handle) {
			musicValueElement.innerHTML = values[handle];
		});

        // Reputation
        $('#reputation').customSlider({
			start: [repVal],
			step: 1,
            tooltips: [true],
			range: {
			'min': -100,
			'max': 100
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
            pips: {
            mode: 'positions',
            values: [0, 25, 50, 75, 100],
            density: 5
            }
		});

        reputation.noUiSlider.on('update', function (values, handle) {
            repUpdate(reputation.noUiSlider.get());
		});

        // Alignment
        $('#alignment').customSlider({
			start: [alignVal],
			step: 1,
            tooltips: [true],
			range: {
			'min': -100,
			'max': 100
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
            pips: {
            mode: 'positions',
            values: [0, 25, 50, 75, 100],
            density: 5
            }
		});

        alignment.noUiSlider.on('update', function (values, handle) {
            alignUpdate(alignment.noUiSlider.get());
		});

        // Magic level
			$('#magicLevel').customSlider({
			start: [magicVal],
			step: 1,
			range: {
			'min': 0,
			'max': 10
			},
			format: wNumb({
				decimals: 0
			}),
		    ariaFormat: wNumb({
				decimals: 0
			}),
			pips: {
				mode: 'steps',
				stepped: true,
				density: 10
			}
		});

        magicLevel.noUiSlider.on('update', function (values, handle) {
			magicValueElement.innerHTML = values[handle];
		});