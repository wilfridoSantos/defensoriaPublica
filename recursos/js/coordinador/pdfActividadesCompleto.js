function getNumAsesoriasTO(jsonInforme) {
	var asesorias = {};
	var numAseT = 0;
	var numAseO = 0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			if (VALOR.sistema === 'TRADICIONAL') {
				numAseT++;
			}
			if (VALOR.sistema === 'ORAL') {
				numAseO++;
			}
		}
	});
	asesorias['asesTradicional'] = numAseT;
	asesorias['asesOral'] = numAseO;

	return asesorias;
}
function getNumSexoUsuarios(jsonInforme) {
	var sexos = {};
	var numMascT = 0;
	var numFemT = 0;
	var numMascO = 0;
	var numFemO = 0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			if (VALOR.sistema == 'TRADICIONAL') {

				if (VALOR.sexo == 'MASCULINO') {
					numMascT++;
				} else if (VALOR.sexo == 'FEMENINO') {
					numFemT++;
				}
			}
			if (VALOR.sistema == 'ORAL') {
				if (VALOR.sexo == 'MASCULINO') {
					numMascO++;
				} else if (VALOR.sexo == 'FEMENINO') {
					numFemO++;
				}
			}
		}
	});
	sexos['numMascT'] = numMascT;
	sexos['numFemT'] = numFemT;
	sexos['numMascO'] = numMascO;
	sexos['numFemO'] = numFemO;
	return sexos;
}
function getNumDiscapacidadUsuarios(jsonInforme) {
	var discapacidades = {};
	var numSensorialesT = 0,numMotricesT = 0, numMentalesT = 0, numMultiplesT=0;
	var numSensorialesO = 0,numMotricesO = 0, numMentalesO = 0, numMultiplesO=0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			if (VALOR.sistema == 'TRADICIONAL') {
				switch(VALOR.discapacidadU){
					case 'SENSORIALES': 
						numSensorialesT++;
					break;
					case 'MOTRICES': 
						numMotricesT++;
					break;
					case 'MENTALES': 
						numMentalesT++;
					break;
					case 'MULTIPLES': 
						numMultiplesT++;
					break;																										
				}

			}
			if (VALOR.sistema == 'ORAL') {
				switch(VALOR.discapacidadU){
					case 'SENSORIALES': 
						numSensorialesO++;
					break;
					case 'MOTRICES': 
						numMotricesO++;
					break;
					case 'MENTALES': 
						numMentalesO++;
					break;
					case 'MULTIPLES': 
						numMultiplesO++;
					break;
																								
				}
			}
		}
	});
	discapacidades['numSensorialesT'] = numSensorialesT;
	discapacidades['numMotricesT'] = numMotricesT;
	discapacidades['numMentalesT'] = numMentalesT;
	discapacidades['numMultiplesT'] = numMultiplesT;
	
	discapacidades['numSensorialesO'] = numSensorialesO;
	discapacidades['numMotricesO'] = numMotricesO;
	discapacidades['numMentalesO'] = numMentalesO;
	discapacidades['numMultiplesO'] = numMultiplesO;
	
	
	
	return discapacidades;
}
function getNumGeneroUsuarios(jsonInforme) {
	var generos = {};
	var numLesbicoT = 0;
	var numLesbicoO = 0;
	var numGayT = 0, numGayO = 0;
	var numBisexualT = 0, numBisexualO = 0;
	var numTransexualT = 0, numTransexualO = 0;
	var numTransgeneroT = 0, numTransgeneroO = 0;
	var numTravestiT = 0, numTravestiO = 0;
	var numIntersexualT = 0, numIntersexualO = 0;
	//console.log(jsonInforme);
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			if (VALOR.sistema == 'TRADICIONAL') {
				//console.log(' entro filtro TRADICIONAL');
				if (VALOR.generoU == 'LESBICO') {
					numLesbicoT++;
					console.log(numLesbicoT, ' numLesbicoTradicional');
				}
				if (VALOR.generoU == 'GAY') {
					numGayT++;
				}
				if (VALOR.generoU == 'BISEXUAL') {
					numBisexualT++;
					//console.log(numBisexualT, ' numbisexualTradicional')
				}
				if (VALOR.generoU == 'TRANSEXUAL') {
					numTransexualT++;
				}
				if (VALOR.generoU == 'TRANSGENERO') {
					numTransgeneroT++;
				}
				if (VALOR.generoU == 'TRAVESTI') {
					numTravestiT++;
				}
				if (VALOR.generoU == 'INTERSEXUAL') {
					numIntersexualT++;
				}
			}
			if (VALOR.sistema == 'ORAL') {
				console.log(' entro a ORAL');
				if (VALOR.generoU == 'LESBICO') {
					numLesbicoO++;
					console.log(numLesbicoO, ' numLesbicoOral');
				}
				if (VALOR.generoU == 'GAY') {
					numGayO++;
				}
				if (VALOR.generoU == 'BISEXUAL') {
					numBisexualO++;
				}
				if (VALOR.generoU == 'TRANSEXUAL') {
					numTransexualO++;
				}
				if (VALOR.generoU == 'TRANSGENERO') {
					numTransgeneroO++;
				}
				if (VALOR.generoU == 'TRAVESTI') {
					numTravestiO++;
				}
				if (VALOR.generoU == 'INTERSEXUAL') {
					numIntersexualO++;
				}
			}
		}
	});
	generos['numLesbicoT'] = numLesbicoT;
	generos['numGayT'] = numGayT;
	generos['numBisexualT'] = numBisexualT;
	generos['numTransexualT'] = numTransexualT;
	generos['numTransgeneroT'] = numTransgeneroT;
	generos['numTravestiT'] = numTravestiT;
	generos['numIntersexualT'] = numIntersexualT;

	generos['numLesbicoO'] = numLesbicoO;
	generos['numGayO'] = numGayO;
	generos['numBisexualO'] = numBisexualO;
	generos['numTransexualO'] = numTransexualO;
	generos['numTransgeneroO'] = numTransgeneroO;
	generos['numTravestiO'] = numTravestiO;
	generos['numIntersexualO'] = numIntersexualO;

	return generos;
}
function getNumEdadUsuarios(jsonInforme) {
	var edades = {};
	var num07T = 0, num07O = 0;
	var num812T = 0, num812O = 0;
	var num1318T = 0, num1318O = 0;
	var num1925T = 0, num1925O = 0;
	var num2630T = 0, num2630O = 0;
	var num3190T = 0, num3190O = 0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			if (VALOR.sistema == 'TRADICIONAL') {
				//console.log('TRADICIONAL EDAD-> '+VALOR.edadU);
				if (VALOR.edadU >= 0 && VALOR.edadU <= 7) {
					num07T++;
				}
				if (VALOR.edadU >= 8 && VALOR.edadU <= 12) {
					num812T++;
				}
				if (VALOR.edadU >= 13 && VALOR.edadU <= 18) {
					num1318T++;
				}
				if (VALOR.edadU >= 19 && VALOR.edadU <= 25) {
					num1925T++;
				}
				if (VALOR.edadU >= 26 && VALOR.edadU <= 30) {
					num2630T++;
				} if (VALOR.edadU >= 31 && VALOR.edadU <= 90) {
					num3190T++;
				}
			}
			if (VALOR.sistema == 'ORAL') {
				
				if (VALOR.edadU >= 0 && VALOR.edadU <= 7) {
					num07O++;
				}
				if (VALOR.edadU >= 8 && VALOR.edadU <= 12) {
					num812O++;
				}
				if (VALOR.edadU >= 13 && VALOR.edadU <= 18) {
					num1318O++;
				}
				if (VALOR.edadU >= 19 && VALOR.edadU <= 25) {
					
					num1925O++;
					console.log('ORAL EDAD-> '+VALOR.edadU, num1925O);
				}
				if (VALOR.edadU >= 26 && VALOR.edadU <= 30) {
					num2630O++;
				} if (VALOR.edadU >= 31 && VALOR.edadU <= 90) {
					num3190O++;
				}
			}
		}
	});
	edades['edades1T'] = num07T;
	edades['edades2T'] = num812T;
	edades['edades3T'] = num1318T;
	edades['edades4T'] = num1925T;
	edades['edades5T'] = num2630T;
	edades['edades6T'] = num3190T;

	edades['edades1O'] = num07O;
	edades['edades2O'] = num812O;
	edades['edades3O'] = num1318O;
	edades['edades4O'] = num1925O;
	edades['edades5O'] = num2630O;
	edades['edades6O'] = num3190O;
	return edades;
}
function getArrayIdiomasSystem(jsonInforme) {
	var arrIdiomas = [];
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['idioma'] = VALOR.idiomaU;
		obj['pos'] = 0;
		arrIdiomas[KEY] = obj;

	});
	var hash = {};
	arrIdiomas = arrIdiomas.filter(function (current) {
		var exists = !hash[current.idioma] || false;
		hash[current.idioma] = true;
		return exists;
	});
	return arrIdiomas;
}
function getArrayEtniasSystem(jsonInforme) {
	var arrEtnias = [];
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['etnia'] = VALOR.etniaU;
		obj['pos'] = 0;
		arrEtnias[KEY] = obj;

	});
	var hash = {};
	arrEtnias = arrEtnias.filter(function (current) {
		var exists = !hash[current.etnia] || false;
		hash[current.etnia] = true;
		return exists;
	});
	return arrEtnias;
}
function getIdiomasBySistema(arrIdiomas, jsonInforme) {
	var arr = []; //contendra la cantidad de etnias por sistema arr['TRADICIONAL'] arr['ORAL']
	var arrTradicional = {};
	var arrOral = {};
	//console.log(arrEtnias, jsonInforme);
	for (var i = 0; i < arrIdiomas.length; i++) {
		arrTradicional[arrIdiomas[i]['idioma']] = 0;
		arrOral[arrIdiomas[i]['idioma']] = 0;
		$.each(jsonInforme, function (KEY, VALOR) {
			if (VALOR.sistema == 'TRADICIONAL') {
				if (arrIdiomas[i]['idioma'] == VALOR.idiomaU) {

					arrTradicional[arrIdiomas[i]['idioma']] += 1;
				}
			} else if (VALOR.sistema == 'ORAL') {
				if (arrIdiomas[i]['idioma'] == VALOR.idiomaU) {
					arrOral[arrIdiomas[i]['idioma']] += 1;
				}
			}
		});
	}
	arr.push(arrTradicional);
	arr.push(arrOral);
	return arr;
}

function getEtniasBySistema(arrEtnias, jsonInforme) {
	var arr = []; //contendra la cantidad de etnias por sistema arr['TRADICIONAL'] arr['ORAL']
	var arrTradicional = {};
	var arrOral = {};
	//console.log(arrEtnias, jsonInforme);
	for (var i = 0; i < arrEtnias.length; i++) {
		arrTradicional[arrEtnias[i]['etnia']] = 0;
		arrOral[arrEtnias[i]['etnia']] = 0;
		$.each(jsonInforme, function (KEY, VALOR) {
			if (VALOR.sistema == 'TRADICIONAL') {
				if (arrEtnias[i]['etnia'] == VALOR.etniaU) {

					arrTradicional[arrEtnias[i]['etnia']] += 1;
				}
			} else if (VALOR.sistema == 'ORAL') {
				if (arrEtnias[i]['etnia'] == VALOR.etniaU) {

					arrOral[arrEtnias[i]['etnia']] += 1;
				}
			}
		});
	}
	arr.push(arrTradicional);
	arr.push(arrOral);
	return arr;
}
function getNumIdiomasUsers(arrIdiomas, jsonInforme) {
	var arr = [];
	//console.log(arrEtnias, ' arr etnias');
	for (var i = 0; i < arrIdiomas.length; i++) {
		$.each(jsonInforme, function (KEY, VALOR) {
			//console.log(i, arrEtnias[i]['etnia'], arrEtnias[i]['pos']);
			//console.log(VALOR.etniaU, ' etnias json');
			if (arrIdiomas[i]['idioma'] == VALOR.idiomaU) {
				//console.log(arrEtnias[i]['pos'], ' arretniasvalor Pos');
				var obj = {};
				arrIdiomas[i]['pos'] += 1;
				obj[arrIdiomas[i]['idioma']] = arrIdiomas[i]['pos'];
				arr[i] = obj;

			}
		});
	}
	//console.log(arr, ' valor arr');
	return arr;//contiene las filas pero solo nombre de la etnia y su cantidad total en ambos sistemas
	// falta por sistema
}
function getNumEtniasUsers(arrEtnias, jsonInforme) {
	var arr = [];
	var ite = 0;
	//console.log(arrEtnias, ' arr etnias');
	for (var i = 0; i < arrEtnias.length; i++) {
		$.each(jsonInforme, function (KEY, VALOR) {
			//console.log(i, arrEtnias[i]['etnia'], arrEtnias[i]['pos']);
			//console.log(VALOR.etniaU, ' etnias json');
			if (arrEtnias[i]['etnia'] == VALOR.etniaU) {
				//console.log(arrEtnias[i]['pos'], ' arretniasvalor Pos');
				var obj = {};
				arrEtnias[i]['pos'] += 1;
				obj[arrEtnias[i]['etnia']] = arrEtnias[i]['pos'];
				arr[i] = obj;

			}
		});
	}
	//console.log(arr, ' valor arr');
	return arr;//contiene las filas pero solo nombre de la etnia y su cantidad total en ambos sistemas
	// falta por sistema
}
function getNumIdiomasUsuarios(jsonInforme) {
	var arrIdiomas = [];
	var idiomas;
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['idioma'] = VALOR.idiomaU;
		obj['pos'] = 0;
		arrIdiomas[KEY] = obj;

	});
	//console.log(arrEtnias, ' VALOR ETNIA');

	var hash = {};
	arrIdiomas = arrIdiomas.filter(function (current) {
		var exists = !hash[current.idioma] || false;
		hash[current.idioma] = true;
		return exists;
	});
	//aqui arrEtnias ya tiene filtrado las etnias
	idiomas = getNumIdiomasUsers(arrIdiomas, jsonInforme);

	return idiomas;
}
function getNumEtniasUsuarios(jsonInforme) {
	var arrEtnias = [];
	var etnias;
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['etnia'] = VALOR.etniaU;
		obj['pos'] = 0;
		arrEtnias[KEY] = obj;

	});
	//console.log(arrEtnias, ' VALOR ETNIA');

	var hash = {};
	arrEtnias = arrEtnias.filter(function (current) {
		var exists = !hash[current.etnia] || false;
		hash[current.etnia] = true;
		return exists;
	});
	//aqui arrEtnias ya tiene filtrado las etnias
	etnias = getNumEtniasUsers(arrEtnias, jsonInforme);

	return etnias;
}
function generarRowsIdiomas(jsonData, idiomasSistema) {
	//console.log(etniasSistema[0]['CHATINO'], ' cuantos chatino tradicional ');
	var body = new Array();
	var rowHeader1 = [], rowHeader2 = [];

	rowHeader1.push(
		{ text: 'Idioma o Lengua', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
		{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
		{},
		{}
	);
	rowHeader2.push(
		{},
		{ text: 'Total', style: 'tableHeader', alignment: 'center' },
		{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
		{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
	);
	body.push(rowHeader1);
	body.push(rowHeader2);
	var content = [];
	var totalF = 0, totalT = 0, totalO = 0;
	for (var obj in jsonData) {
		if (jsonData.hasOwnProperty(obj)) {
			for (var prop in jsonData[obj]) {
				if (jsonData[obj].hasOwnProperty(prop)) {
					content = [prop, jsonData[obj][prop], idiomasSistema[0][prop], idiomasSistema[1][prop]];
					body.push(content);
					totalF += jsonData[obj][prop];
					totalT += idiomasSistema[0][prop];
					totalO += idiomasSistema[1][prop];
				}
			}
		}
	}
	content = ['TOTAL', totalF, totalT, totalO];
	body.push(content);
	return body;
}
function generarRowsEtnias(jsonData, etniasSistema) {
	//console.log(etniasSistema[0]['CHATINO'], ' cuantos chatino tradicional ');
	var body = new Array();
	var rowHeader1 = [], rowHeader2 = [];

	rowHeader1.push(
		{ text: 'Etnías', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
		{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
		{},
		{}
	);
	rowHeader2.push(
		{},
		{ text: 'Total', style: 'tableHeader', alignment: 'center' },
		{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
		{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
	);
	body.push(rowHeader1);
	body.push(rowHeader2);
	var content = [];
	var totalF = 0, totalT = 0, totalO = 0;
	for (var obj in jsonData) {
		if (jsonData.hasOwnProperty(obj)) {
			for (var prop in jsonData[obj]) {
				if (jsonData[obj].hasOwnProperty(prop)) {
					content = [prop, jsonData[obj][prop], etniasSistema[0][prop], etniasSistema[1][prop]];
					body.push(content);
					totalF += jsonData[obj][prop];
					totalT += etniasSistema[0][prop];
					totalO += etniasSistema[1][prop];
				}
			}
		}
	}
	content = ['TOTAL', totalF, totalT, totalO];
	body.push(content);
	return body;
}
function getNumActividades(jsonInforme) {
	var actividades = {};
	var numAses = 0;
	var numAuds = 0;
	var numVis = 0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			numAses++;
		}
		if (VALOR.latAud != null || VALOR.longAud != undefined) {
			numAuds++;
		}
		if (VALOR.fotoVis != null || VALOR.fotoVis != undefined) {
			numVis++;
		}
	});
	actividades['asesorias'] = numAses;
	actividades['audiencias'] = numAuds;
	actividades['visitas'] = numVis;
	return actividades;
}

function informeCompleto(jsonInforme){
        console.time('Test functionGlobalInformeAct');
        var fechaI = document.getElementById('inputInicio').value;
	    var fechaFi = document.getElementById('inputFinal').value;
        var base64 = globalHeaderPDF;

    	var fecha1 = new Date(fechaI);
    	var fecha2 = new Date(fechaFi);
    	var actividades;
    	var asesoriasTO, discapacidades;
    	var sexos, generos, etnias, etniasR, etniasSistema, edades, idiomasR, idiomas, idiomasSistema;
    	var totalH, totalM, totalSexoT, totalSexoO, totalSexo, totalSen, totalMot,totalMen, totalMul, totalDisT,totalDisO, totalDiscapacidad;
    	var totalLesbico, totalGay, totalBisexual, totalTransexual, 
    		totalTransgenero, totalTravesti, totalIntersexual,
    		totalGenerosT, totalGenerosO, totalG, totalEdadT, 
    		totalEdadO, totalEdadS,totalEdad1, totalEdad2, totalEdad3, totalEdad4, totalEdad5, totalEdad6 ;
        var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nomviembre", "Diciembre"];
        var fecha = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var fechaF = fecha.toLocaleDateString("es-ES", options);
        var primerM = fechaF.charAt(0).toUpperCase();
        var siguiente = fechaF.slice(1).toLowerCase();
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        actividades = getNumActividades(jsonInforme);
    	asesoriasTO = getNumAsesoriasTO(jsonInforme);
    	sexos = getNumSexoUsuarios(jsonInforme);
    	discapacidades = getNumDiscapacidadUsuarios(jsonInforme);
    	generos = getNumGeneroUsuarios(jsonInforme);
    	etnias = getNumEtniasUsuarios(jsonInforme);
    	idiomas = getNumIdiomasUsuarios(jsonInforme);
    	idiomasSistema = getIdiomasBySistema(getArrayIdiomasSystem(jsonInforme), jsonInforme);						
    	etniasSistema = getEtniasBySistema(getArrayEtniasSystem(jsonInforme), jsonInforme);
    	idiomasR = generarRowsIdiomas(idiomas, idiomasSistema);
    	etniasR = generarRowsEtnias(etnias, etniasSistema);
    	edades = getNumEdadUsuarios(jsonInforme);

    	totalH = sexos['numMascT'] + sexos['numMascO'];
    	totalM = sexos['numFemT'] + sexos['numFemO'];
    	totalSexo = totalH + totalM;
    	totalSexoT = sexos['numMascT'] + sexos['numFemT'];
    	totalSexoO = sexos['numMascO'] + sexos['numFemO'];


    	totalSen = discapacidades['numSensorialesT'] + discapacidades['numSensorialesO'];			
    	totalMot = discapacidades['numMotricesT'] + discapacidades['numMotricesO'];			
    	totalMen = discapacidades['numMentalesT'] + discapacidades['numMentalesO'];
    	totalMul = discapacidades['numMultiplesT'] + discapacidades['numMultiplesO'];	

    	totalDisT = discapacidades['numSensorialesT'] + discapacidades['numMotricesT'] + discapacidades['numMentalesT']+discapacidades['numMultiplesT'];
    	totalDisO =  discapacidades['numSensorialesO'] + discapacidades['numMotricesO'] + discapacidades['numMentalesO']+discapacidades['numMultiplesO'];
    	totalDiscapacidad = totalDisT + totalDisO;


    	totalLesbico = generos['numLesbicoT'] + generos['numLesbicoO'];
    	totalGay = generos['numGayT'] + generos['numGayO'];
    	totalBisexual = generos['numBisexualT'] + generos['numBisexualO'];
    	totalTransexual = generos['numTransexualT'] + generos['numTransexualO'];
    	totalTransgenero = generos['numTransgeneroT'] + generos['numTransgeneroO'];
    	totalTravesti = generos['numTravestiT'] + generos['numTravestiO'];
    	totalIntersexual = generos['numIntersexualT'] + generos['numIntersexualO'];
    	totalGenerosT = generos['numLesbicoT'] + generos['numGayT'] + generos['numBisexualT'] + generos['numTransexualT'] + generos['numTransgeneroT'] + generos['numTravestiT'] + generos['numIntersexualT'];
    	totalGenerosO = generos['numLesbicoO'] + generos['numGayO'] + generos['numBisexualO'] + generos['numTransexualO'] + generos['numTransgeneroO'] + generos['numTravestiO'] + generos['numIntersexualO'];

    	totalG = totalLesbico + totalGay + totalBisexual + totalTransexual + totalTransgenero + totalTravesti + totalIntersexual;
    	totalEdad1 =  edades['edades1T'] +  edades['edades1O'];
    	totalEdad2 =  edades['edades2T'] +  edades['edades2O'];
    	totalEdad3 =  edades['edades3T'] +  edades['edades3O'];
    	totalEdad4 =  edades['edades4T'] +  edades['edades4O'];
    	totalEdad5 =  edades['edades5T'] +  edades['edades5O'];
    	totalEdad6 =  edades['edades6T'] +  edades['edades6O'];
    	totalEdadT = edades['edades1T'] + edades['edades2T'] + edades['edades3T'] + edades['edades4T'] + edades['edades5T'] +  edades['edades6T'];
    	totalEdadO =  edades['edades1O'] + edades['edades2O'] + edades['edades3O'] + edades['edades4O'] + edades['edades5O'] +  edades['edades6O'];
        totalEdadS = totalEdadT + totalEdadO;
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        var pdfAct  = {
            watermark: { text: 'www oaxaca gob mx', color: 'gray', opacity: 0.3, bold: true, italics: false },
            pageSize: 'A4',
            pageOrientation: 'portrait',
            header: {
                margin: [105, 20, 100, 0],
                columns: [
                    {
                        // usually you would use a dataUri instead of the name for client-side printing
                        // sampleImage.jpg however works inside playground so you can play with it
                        image: 'data:image/png;base64,' + base64, width: 400, height: 60
                    }
                ]
            },
            footer: function (currentPage, pageCount) {
                return {
                    table: {
                        widths: ['*', 00],
                        body: [
                            [
                                { text: 'Pág. ' + currentPage + ' de ' + pageCount + '   ', alignment: 'center', bold: true, color: 'gray' }
                            ]
                        ]
                    },
                    layout: 'noBorders',
                };
            },
            // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
            pageMargins: [80, 60, 40, 60],
            content: [
                {
                    stack: [
                        '“2018, AÑO DE LA ERRADICACIÓN DEL TRABAJO INFANTIL”',
                        {
                            text: 'Reyes Mantecón, San Bartolo Coyotepec, Oax; ' + primerM + siguiente + '.\n' +
                                'Periodo COMPLETO' , style: 'subheader'
                        },
                    ],
                    style: 'header'
                },
                { text: 'INFORME COMPLETO', alignment:'center', style: 'subheader2' },
                { text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2' },
                { text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, durante el periodo que comprende del ' + fecha1.getUTCDate() + ' de ' + meses[fecha1.getUTCMonth()] + ' al ' + fecha2.getUTCDate() + ' de ' + meses[fecha2.getUTCMonth()] + ' del presente año, la Defensoría Pública brindó ' + actividades['asesorias'] + ' servicios gratuitos de asesorías jurídicas generales de un defensor, lo anterior se detalla de la siguiente manera:', style: 'textoJustificado' },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        headerRows: 1,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' },
                                { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                { text: 'Acusatorio y oral', style: 'tableHeader', alignment: 'center' },
                            ],
                            ['Asesorías simples Jurídicas', asesoriasTO['asesTradicional'], asesoriasTO['asesOral']],
                        ]
                    }
                },
                { text: 'Del total general de asesorías jurídicas, a continuación se desglosan los atributos de los beneficiarios:', style: 'textoJustificado' },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        widths: [200, 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'Sexo', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
                                {}, {}
                            ],
                            [
                                {},
                                { text: 'Total', style: 'tableHeader', alignment: 'center' },
                                { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                { text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
                            ],
                            ['Hombre', totalH, sexos['numMascT'], sexos['numMascO']],
                            ['Mujer', totalM, sexos['numFemT'], sexos['numFemO']],
                            ['Total', totalSexo, totalSexoT, totalSexoO]
                        ]
                    }
                },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        widths: [200, 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'Género', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
                                {}, {}
                            ],
                            [
                                {},
                                { text: 'Total', style: 'tableHeader', alignment: 'center' },
                                { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                { text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
                            ],
                            ['Lésbico', totalLesbico, generos['numLesbicoT'], generos['numLesbicoO']],
                            ['Gay', totalGay, generos['numGayT'], generos['numGayO']],
                            ['Bisexual', totalBisexual, generos['numBisexualT'], generos['numBisexualO']],
                            ['Transexual', totalTransexual, generos['numTransexualT'], generos['numTransexualO']],
                            ['Transgénero', totalTransgenero, generos['numTransgeneroT'], generos['numTransgeneroO']],
                            ['Travestí', totalTravesti, generos['numTravestiT'], generos['numTravestiO']],
                            ['Intersexual', totalIntersexual, generos['numIntersexualT'], generos['numIntersexualO']],
                            ['Total', totalG, totalGenerosT, totalGenerosO]
                        ]
                    }
                },
                { text: '\n ', style: 'saltoLinea' },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        widths: [200, 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'Edad', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
                                {}, {}
                            ],
                            [
                                {},
                                { text: 'Total', style: 'tableHeader', alignment: 'center' },
                                { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                { text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
                            ],
                            ['0-7 Años',	totalEdad1, edades['edades1T'], edades['edades1O']],
                            ['8-12 Años',	totalEdad2, edades['edades2T'], edades['edades2O']],
                            ['13-18 Años',	totalEdad3, edades['edades3T'], edades['edades3O']],
                            ['19-25 Años',	totalEdad4, edades['edades4T'], edades['edades4O']],
                            ['26-30 Años',	totalEdad5, edades['edades5T'], edades['edades5O']],
                            ['31-90 Años',	totalEdad6, edades['edades6T'], edades['edades6O']],
                            ['Total', 		totalEdadS, totalEdadT,totalEdadO]
                        ]
                    }
                },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {//etnias
                        widths: [200, 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: etniasR
                    }
                },
                { text: '\n\n', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        widths: [200, 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: idiomasR
                    }
                },		
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        widths: ['auto', 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'Discapacidades', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
                                {}, {}
                            ],
                            [
                                {},
                                { text: 'Total', style: 'tableHeader', alignment: 'center' },
                                { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                { text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
                            ],
                            ['Sensoriales y de la comunicación', totalSen,  discapacidades['numSensorialesT'],  discapacidades['numSensorialesO']],
                            ['Motrices', totalMot, discapacidades['numMotricesT'],  discapacidades['numMotricesO']],
                            ['Mentales', totalMen,  discapacidades['numMentalesT'],  discapacidades['numMentalesO']],
                            ['Multiples', totalMul,  discapacidades['numMultiplesT'],  discapacidades['numMultiplesO']],
                            ['Total', totalDiscapacidad, totalDisT, totalDisO]
                        ]
                    }
				},
				{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asesorías jurídicas brindadas en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en  asesorías jurídicas, esto también por sistema. ', style: 'textoJustificado' },
                { text: '10 DEFENSORES CON ALTO NÚMERO DE ASESORÍAS JURÍDICAS' },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Asesorías brindadas', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
                                {}
                            ],
                            [
                                {},
                                {},
                                {},
                                { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                { text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
                            ],
                            ['1', ' ', ' ', ' ', ' '],
                            ['2', ' ', ' ', ' ', ' '],
                            ['3', ' ', ' ', ' ', ''],
                            ['4', ' ', ' ', ' ', ''],
                            ['5', ' ', ' ', ' ', ''],
                            ['6', ' ', ' ', ' ', ''],
                            ['7', ' ', ' ', ' ', ''],
                            ['8', ' ', ' ', ' ', ''],
                            ['9', ' ', ' ', ' ', ''],
                            ['10', ' ', ' ', ' ', '']
                        ]
                    }
                },
                { text: '\n ', style: 'saltoLinea' },
                { text: '10 DEFENSORES CON UN BAJO NÚMERO DE ASESORÍAS JURÍDICAS' },
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
                        headerRows: 2,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Asesorías brindadas', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                { text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
                                {}
                            ],
                            [
                                {},
                                {},
                                {},
                                { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                { text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
                            ],
                            ['1', ' ', ' ', ' ', ' '],
                            ['2', ' ', ' ', ' ', ' '],
                            ['3', ' ', ' ', ' ', ''],
                            ['4', ' ', ' ', ' ', ''],
                            ['5', ' ', ' ', ' ', ''],
                            ['6', ' ', ' ', ' ', ''],
                            ['7', ' ', ' ', ' ', ''],
                            ['8', ' ', ' ', ' ', ''],
                            ['9', ' ', ' ', ' ', ''],
                            ['10', ' ', ' ', ' ', '']
                        ]
                    }
                },

                { text: '2.- AUDIENCIAS', style: 'subheader2' },
                {
                    text: 'Durante el periodo que comprende del ___ de _______ al ____ de ________ del 			presente año, los Defensores Públicos asistieron a _______ audiencias celebradas.', style: 'textoJustificado'
                },                
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                { text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
                {
                    text: 'Durante el periodo que comprende del ___ de _______ al ____ de ________ del presente año, los Defensores Públicos realizaron ___________ visitas carcelarias a sus internos.', style: 'textoJustificado'
                },
                
                {
                    style: 'tableExample',
                    color: 'black',
                    table: {
                        headerRows: 1,
                        // keepWithHeaderRows: 1,
                        body: [
                            [
                                { text: 'C.c.p.-', style: ['quote', 'small'] },
                                {
                                    text: 'Mtro. Jesús Gerardo Herrera Pérez.- Director de la Defensoría 		Pública del Estado de Oaxaca.- 		Para su conocimiento e intervención.- 	Presente.-C.P Pablo R. López Santos.- Secretario Técnico.- Para 	mismo 	fin.- Presente	Exp. y minutario.', style: ['quote', 'small']
                                }
                            ]
                        ]
                    }, layout: 'noBorders'
                }
            ],
            styles: {
                header: {
                    fontSize: 8,
                    bold: false,
                    alignment: 'center',
                    margin: [0, 40, 0, 10]
                },
                subheader: {
                    fontSize: 10,
                    alignment: 'right',
                    margin: [0, 10, 0, 0]
                },
                textoJustificado: {
                    fontSize: 11,
                    alignment: 'justify',
                    margin: [0, 0, 15, 15],
                },
                subheader2: {
                    fontSize: 11,
                    alignment: 'left',
                    margin: [0, 0, 15, 15],
                    bold: 'true'
                },
                tableExample: {
                    margin: [0, 5, 0, 15]
                },
                tableHeader: {
                    bold: true,
                    fontSize: 13,
                    color: 'black'
                },
                saltoLinea: {
                    margin: [0, 200, 0, 0]
                },
                quote: {
                    italics: true
                },
                small: {
                    fontSize: 8
                }
            },
            defaultStyle: {
                // alignment: 'justify'
            }

        }
        console.timeEnd('Test functionGlobalInformeAct');
        return pdfAct;
        
 }
