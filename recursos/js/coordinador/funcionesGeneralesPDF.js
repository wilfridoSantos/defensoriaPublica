	var base64 = globalHeaderPDF;
	var jsonInf={};
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
	var totalHT;
	var totalMT;
	var totalHO;
	var totalMO;


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function constructor(jsonInforme){
	jsonInf = jsonInforme;
	actividades = getNumActividades(jsonInf);
    asesoriasTO = getNumAsesoriasTO(jsonInf);
    sexos = getNumSexoUsuarios(jsonInf);
    discapacidades = getNumDiscapacidadUsuarios(jsonInf);
    generos = getNumGeneroUsuarios(jsonInf);
    etnias = getNumEtniasUsuarios(jsonInf);
    idiomas = getNumIdiomasUsuarios(jsonInf);
    idiomasSistema = getIdiomasBySistema(getArrayIdiomasSystem(jsonInf), jsonInf);						
    etniasSistema = getEtniasBySistema(getArrayEtniasSystem(jsonInf), jsonInf);
    idiomasR = generarRowsIdiomas(idiomas, idiomasSistema);
    etniasR = generarRowsEtnias(etnias, etniasSistema);
    edades = getNumEdadUsuarios(jsonInf);

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
    totalEdad7 =  edades['edades7T'] +  edades['edades7O'];
    totalEdad8 =  edades['edades8T'] +  edades['edades8O'];
    totalEdad9 =  edades['edades9T'] +  edades['edades9O'];
    totalEdadT = edades['edades1T'] + edades['edades2T'] + edades['edades3T'] + edades['edades4T'] + edades['edades5T'] +  edades['edades6T']+  edades['edades7T']+  edades['edades8T']+  edades['edades9T'];
    totalEdadO =  edades['edades1O'] + edades['edades2O'] + edades['edades3O'] + edades['edades4O'] + edades['edades5O'] +  edades['edades6O']+  edades['edades7O']+  edades['edades8O']+  edades['edades9O'];
	totalEdadS = totalEdadT + totalEdadO;

	totalHT = edades['edades1tH'] + edades['edades2tH'] + edades['edades3tH'] + edades['edades4tH']+ edades['edades5tH']+ edades['edades6tH']+ edades['edades7tH']+ edades['edades8tH']+ edades['edades9tH'];
	totalMT = edades['edades1tM'] + edades['edades2tM'] + edades['edades3tM'] + edades['edades4tM']+ edades['edades5tM']+ edades['edades6tM']+ edades['edades7tM']+ edades['edades8tM']+ edades['edades9tM'];
	totalHO = edades['edades1OH'] + edades['edades2OH'] + edades['edades3OH'] + edades['edades4OH']+ edades['edades5OH']+ edades['edades6OH']+ edades['edades7OH']+ edades['edades8OH']+ edades['edades9OH'];
	totalMO = edades['edades1OM'] + edades['edades2OM'] + edades['edades3OM'] + edades['edades4OM']+ edades['edades5OM']+ edades['edades6OM']+ edades['edades7OM']+ edades['edades8OM']+ edades['edades9OM'];
}
function getTablaSexo(totalH, totalM,totalSexo,totalSexoT, totalSexoO,sexosNumMascT, sexosNumMascO,sexosNumFemT, sexosNumFemO){
	var tabla ={};

	var tablaGeneral={};
	tablaGeneral.widths=  [100, 'auto', 'auto', 'auto'];
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
function getTablaGenero(totalLesbico, totalGay,totalBisexual,totalTransexual, totalTransgenero,totalTravesti,
						totalIntersexual, totalG, gNumLesbicoT, gNumLesbicoO, gNumGayT, gNumGayO, gNumBisexualT, gNumBisexualO,
						gNumTransexualT, gNumTransexualO, gNumTransgeneroT, gNumTransgeneroO, gNumTravestiT, gNumTravestiO,
						gNumIntersexualT, gNumIntersexualO){
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.widths=  [150, 'auto', 'auto', 'auto'];
	tablaGeneral.headerRows= 2;
	//console.log("getTablaGeneroooooooo", gNumBisexualO, gNumTransexualT);
	tablaGeneral.body = [
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
		['Lésbico', totalLesbico, gNumLesbicoT, gNumLesbicoO],
		['Gay', totalGay, gNumGayT, gNumGayO],
		['Bisexual', totalBisexual, gNumBisexualT,gNumBisexualO],
		['Transexual', totalTransexual, gNumTransexualT, gNumTransexualO],
		['Transgénero', totalTransgenero, gNumTransgeneroT, gNumTransgeneroO],
		['Travestí', totalTravesti, gNumTravestiT, gNumTravestiO],
		['Intersexual', totalIntersexual, gNumIntersexualT, gNumIntersexualO],
		['Total', totalG, totalGenerosT, totalGenerosO]
	];

	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	//console.log(tabla);
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
					//console.log(numLesbicoT, ' numLesbicoTradicional');
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
				//console.log(' entro a ORAL');
				if (VALOR.generoU == 'LESBICO') {
					numLesbicoO++;
				//	console.log(numLesbicoO, ' numLesbicoOral');
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
	//console.log(generos);
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
	var hT1=0,hT2=0,hT3=0,hT4=0,hT5=0,hT6=0,hT7=0,hT8=0,hT9=0,
		mT1=0,mT2=0,mT3=0,mT4=0,mT5=0,mT6=0,mT7=0,mT8=0,mT9=0, 
		hO1=0,hO2=0,hO3=0,hO4=0,hO5=0,hO6=0,hO7=0,hO8=0,hO9=0,
		mO1=0,mO2=0,mO3=0,mO4=0,mO5=0,mO6=0,mO7=0,mO8=0,mO9=0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			switch(VALOR.sistema){
				case'TRADICIONAL':
					if (VALOR.edadU >= 18 && VALOR.edadU <= 24) {
						num07T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT1++;
						}else{
							mT1++;
						}
					}
					if (VALOR.edadU >= 25 && VALOR.edadU <= 29) {
						num812T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT2++;
						}else{
							mT2++;
						}
					}
					if (VALOR.edadU >= 30 && VALOR.edadU <= 34) {
						num1318T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT3++;
						}else{
							mT3++;
						}
					}
					if (VALOR.edadU >= 35 && VALOR.edadU <= 39) {
						num1925T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT4++;
						}else{
							mT4++;
						}
					}
					if (VALOR.edadU >= 40 && VALOR.edadU <= 44) {
						num2630T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT5++;
						}else{
							mT5++;
						}
					} 
					if (VALOR.edadU >= 45 && VALOR.edadU <= 49) {
						num3190T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT6++;
						}else{
							mT6++;
						}
					}
					if (VALOR.edadU >= 50 && VALOR.edadU <= 54) {
						num1T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT7++;
						}else{
							mT7++;
						}
					}
					if (VALOR.edadU >= 55 && VALOR.edadU <= 59) {
						num2T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT8++;
						}else{
							mT8++;
						}
					}
					if (VALOR.edadU >= 60) {
						num3T++;
						if(VALOR.sexo== 'MASCULINO' ){
							hT9++;
						}else{
							mT9++;
						}
					}					
			break;
			case 'ORAL':				
				if (VALOR.edadU >= 18 && VALOR.edadU <= 24) {
					num07O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO1++;
					}else{
						mO1++;
					}
				}
				if (VALOR.edadU >= 25 && VALOR.edadU <= 29) {
					num812O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO2++;
					}else{
						mO2++;
					}
				}
				if (VALOR.edadU >= 30 && VALOR.edadU <= 34) {
					num1318O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO3++;
					}else{
						mO3++;
					}
				}
				if (VALOR.edadU >= 35 && VALOR.edadU <= 39) {					
					num1925O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO4++;
					}else{
						mO4++;
					}
				}
				if (VALOR.edadU >= 40 && VALOR.edadU <= 44) {
					num2630O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO5++;
					}else{
						mO5++;
					}
				} if (VALOR.edadU >= 45 && VALOR.edadU <= 49) {
					num3190O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO6++;
					}else{
						mO6++;
					}
				}
				if (VALOR.edadU >= 50 && VALOR.edadU <= 54) {
					num1O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO7++;
					}else{
						mO7++;
					}
				}
				if (VALOR.edadU >= 55 && VALOR.edadU <= 59) {
					num2O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO8++;
					}else{
						mO8++;
					}
				}
				if (VALOR.edadU >= 60) {
					num3O++;
					if(VALOR.sexo== 'MASCULINO' ){
						hO9++;
					}else{
						mO9++;
					}
				}
			break;
			}
		}
	});
	edades['edades1T'] = num07T;
	edades['edades1tH'] = hT1;
	edades['edades1tM'] = mT1;
	edades['edades2T'] = num812T;
	edades['edades2tH'] = hT2;
	edades['edades2tM'] = mT2;
	edades['edades3T'] = num1318T;
	edades['edades3tH'] = hT3;
	edades['edades3tM'] = mT3;
	edades['edades4T'] = num1925T;
	edades['edades4tH'] = hT4;
	edades['edades4tM'] = mT4;
	edades['edades5T'] = num2630T;
	edades['edades5tH'] = hT5;
	edades['edades5tM'] = mT5;
	edades['edades6T'] = num3190T;
	edades['edades6tH'] = hT6;
	edades['edades6tM'] = mT6;
	edades['edades7T'] = num1T;
	edades['edades7tH'] = hT7;
	edades['edades7tM'] = mT7;
	edades['edades8T'] = num2T;
	edades['edades8tH'] = hT8;
	edades['edades8tM'] = mT8;
	edades['edades9T'] = num3T;
	edades['edades9tH'] = hT9;
	edades['edades9tM'] = mT9;

	edades['edades1O'] = num07O;
	edades['edades1OH'] = hO1;
	edades['edades1OM'] = mO1;
	edades['edades2O'] = num812O;
	edades['edades2OH'] = hO2;
	edades['edades2OM'] = mO2;
	edades['edades3O'] = num1318O;
	edades['edades3OH'] = hO3;
	edades['edades3OM'] = mO3;
	edades['edades4O'] = num1925O;
	edades['edades4OH'] = hO4;
	edades['edades4OM'] = mO4;
	edades['edades5O'] = num2630O;
	edades['edades5OH'] = hO5;
	edades['edades5OM'] = mO5;
	edades['edades6O'] = num3190O;
	edades['edades6OH'] = hO6;
	edades['edades6OM'] = mO6;
	edades['edades7O'] = num1O;
	edades['edades7OH'] = hO7;
	edades['edades7OM'] = mO7;
	edades['edades8O'] = num2O;
	edades['edades8OH'] = hO8;
	edades['edades8OM'] = mO8;
	edades['edades9O'] = num3O;
	edades['edades9OH'] = hO9;
	edades['edades9OM'] = mO9;
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
		console.log(jsonInforme, " jsonnInforme ");
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
		console.log("valor devuelto en func acividades ", actividades);
		return actividades;
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
