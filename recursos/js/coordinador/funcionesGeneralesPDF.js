
var base64 = globalHeaderPDF;

var actividades;
var asesoriasTO, discapacidades;
var sexos, generos, etnias, etniasR, etniasSistema, edades, idiomasR, idiomas, idiomasSistema;
var totalH, totalM, totalSexoT, totalSexoO, totalSexo, totalSen, totalMot,totalMen, totalMul, totalDisT,totalDisO, totalDiscapacidad;
var totalLesbico, totalGay, totalBisexual, totalTransexual, 
	totalTransgenero, totalTravesti, totalIntersexual,
	totalGenerosT, totalGenerosO, totalG, totalEdadT, 
	totalEdadO, totalEdadS,totalEdad1, totalEdad2, totalEdad3, totalEdad4, totalEdad5, totalEdad6, totalEdad7, totalEdad8, totalEdad9 ;
var fecha = new Date();
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var fechaF = fecha.toLocaleDateString("es-ES", options);
var primerM = fechaF.charAt(0).toUpperCase();
var siguiente = fechaF.slice(1).toLowerCase();
var defensores;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function getTablaSexo(totalH, totalM,totalSexo,totalSexoT, totalSexoO,sexosNumMascT, sexosNumMascO,sexosNumFemT, sexosNumFemO){
	var tabla ={};

	var tablaGeneral={};
	tablaGeneral.widths=  [200, 'auto', 'auto', 'auto'];
	tablaGeneral.headerRows= 2;
	tablaGeneral.body = [
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
		['Hombre', totalH, sexosNumMascT, sexosNumMascO],
		['Mujer', totalM, sexosNumFemT, sexosNumFemO],
		['Total', totalSexo, totalSexoT, totalSexoO]
	];

	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function getDefensores(jsonInforme) {
	var arrDefensores = [];	
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['defensor'] = VALOR.Defensor+' '+ VALOR.appDef+' '+ VALOR.apmDef;
		obj['idDef'] = VALOR.idDef;
		obj['asesoriasT'] = 0;
		obj['asesoriasO'] = 0;
		obj['asesoriasTotal'] = 0;
		obj['juzgado'] = '';
		arrDefensores.push(obj);

	});
	var hash = {};
	arrDefensores = arrDefensores.filter(function (current) {
		var exists = !hash[current.defensor] || false;
		hash[current.defensor] = true;
		return exists;
	});

	$.each(arrDefensores, function (LLAVE, VAL) {
		var aseT=0, aseO=0, audT=0,audO=0, visT=0, visO=0 ;
		$.each(jsonInforme, function (KEY, VALOR) {
			if(VAL.idDef == VALOR.idDef){
				if(VALOR.sistema == 'TRADICIONAL'){
					if (VALOR.latAse != null || VALOR.longAse != undefined) {
						aseT++;
						arrDefensores[LLAVE].asesoriasT = aseT;
					}
				}else{
					if (VALOR.latAse != null || VALOR.longAse != undefined) {
						aseO++;						
						arrDefensores[LLAVE].asesoriasO = aseO;
					}
				}
				arrDefensores[LLAVE].juzgado = VALOR.juzgado;
				arrDefensores[LLAVE].asesoriasTotal = aseT + aseO;
			}
		});
	});
	arrDefensores.sort(function (a, b) {
		if (a.asesoriasTotal < b.asesoriasTotal) {
		  return 1;
		}
		if (a.asesoriasTotal > b.asesoriasTotal) {
		  return -1;
		}
		// a must be equal to b
		return 0;
	  });
	return arrDefensores;
}
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
	var num1T = 0, num1O = 0;
	var num2T = 0, num2O = 0;
	var num3T = 0, num3O = 0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			if (VALOR.sistema == 'TRADICIONAL') {
				//console.log('TRADICIONAL EDAD-> '+VALOR.edadU);
				if (VALOR.edadU >= 18 && VALOR.edadU <= 24) {
					num07T++;
				}
				if (VALOR.edadU >= 25 && VALOR.edadU <= 29) {
					num812T++;
				}
				if (VALOR.edadU >= 30 && VALOR.edadU <= 34) {
					num1318T++;
				}
				if (VALOR.edadU >= 35 && VALOR.edadU <= 39) {
					num1925T++;
				}
				if (VALOR.edadU >= 40 && VALOR.edadU <= 44) {
					num2630T++;
				} 
				if (VALOR.edadU >= 45 && VALOR.edadU <= 49) {
					num3190T++;
				}
				if (VALOR.edadU >= 50 && VALOR.edadU <= 54) {
					num1T++;
				}
				if (VALOR.edadU >= 55 && VALOR.edadU <= 59) {
					num2T++;
				}
				if (VALOR.edadU >= 60) {
					num3T++;
				}
				
			}
			if (VALOR.sistema == 'ORAL') {
				
				if (VALOR.edadU >= 18 && VALOR.edadU <= 24) {
					num07O++;
				}
				if (VALOR.edadU >= 25 && VALOR.edadU <= 29) {
					num812O++;
				}
				if (VALOR.edadU >= 30 && VALOR.edadU <= 34) {
					num1318O++;
				}
				if (VALOR.edadU >= 35 && VALOR.edadU <= 39) {					
					num1925O++;
				}
				if (VALOR.edadU >= 40 && VALOR.edadU <= 44) {
					num2630O++;
				} if (VALOR.edadU >= 45 && VALOR.edadU <= 49) {
					num3190O++;
				}
				if (VALOR.edadU >= 50 && VALOR.edadU <= 54) {
					num1O++;
				}
				if (VALOR.edadU >= 55 && VALOR.edadU <= 59) {
					num2O++;
				}
				if (VALOR.edadU >= 60) {
					num3O++;
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
	edades['edades7T'] = num1T;
	edades['edades8T'] = num2T;
	edades['edades9T'] = num3T;

	edades['edades1O'] = num07O;
	edades['edades2O'] = num812O;
	edades['edades3O'] = num1318O;
	edades['edades4O'] = num1925O;
	edades['edades5O'] = num2630O;
	edades['edades6O'] = num3190O;
	edades['edades7O'] = num1O;
	edades['edades8O'] = num2O;
	edades['edades9O'] = num3O;
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

	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
