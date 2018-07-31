	var base64 = globalHeaderPDF;
	var jsonInf={};
	var actividades;
	var asesoriasTO, discapacidades;
	var sexos, generos, etnias, etniasR, etniasSistema, edades, idiomasR, idiomas, idiomasSistema;
	var totalH, totalM, totalSexoT, totalSexoO, totalSexo, totalSen, totalMot,totalMen, totalMul, 
		totalDisT,totalDisO, totalDiscapacidad;
	var totalLesbico, totalGay, totalBisexual, totalTransexual, 
		totalTransgenero, totalTravesti, totalIntersexual,
		totalGenerosT, totalGenerosO, totalG, totalEdadT, 
		totalEdadO, totalEdadS,totalEdad1, totalEdad2, totalEdad3, totalEdad4, 
		totalEdad5, totalEdad6, totalEdad7, totalEdad8, totalEdad9 ;
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
function constructor(jsonInforme){
	jsonInf = jsonInforme;
	actividades = getNumActividades(jsonInf);		
}
function getTablaGeneral(valor){
	switch(valor){
		case 'TRADICIONAL':
			var totalAsesorias =jsonInf['actBySistemaDef'][0].actAsesoria;
			var tabla ={};
			var tablaGeneral={};
			tablaGeneral.headerRows= 1;
			tablaGeneral.body =  [
				[
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' }
				],
				['Asesorías simples Jurídicas',totalAsesorias, jsonInf['actBySistemaDef'][0].actAsesoria],
			];
		
			tabla.style = 'tableExample';
			tabla.color = 'black';
			tabla.table = tablaGeneral;
			return tabla;
		break;
		case 'ORAL':
		break;
		default:
			var totalAsesorias = parseInt(jsonInf['actBySistema'][1].actAsesoria) + parseInt(jsonInf['actBySistema'][0].actAsesoria);
			var tabla ={};
			var tablaGeneral={};
			tablaGeneral.headerRows= 1;
			tablaGeneral.body =  [
				[
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
					{ text: 'Acusatorio y oral', style: 'tableHeader', alignment: 'center' },
				],
				['Asesorías simples Jurídicas',totalAsesorias, jsonInf['actBySistema'][1].actAsesoria, jsonInf['actBySistema'][0].actAsesoria],
			];
		
			tabla.style = 'tableExample';
			tabla.color = 'black';
			tabla.table = tablaGeneral;
			return tabla;
		break;
	}

	
}
function getTablaSexo(valor){
	//sexos = getNumSexoUsuarios(jsonInf);
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 2;
	switch(valor){
		case 'TRADICIONAL':
		totalSexoT = parseInt(jsonInf['sexoBySistemaDef'][0].hombreAsesoria) + parseInt(jsonInf['sexoBySistemaDef'][0].mujerAsesoria);
			tablaGeneral.widths=  [100, 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Sexo', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
				],
				[
					{},
					{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' }
				],
				['Hombre', jsonInf['sexoBySistemaDef'][0].hombreAsesoria],
				['Mujer', jsonInf['sexoBySistemaDef'][0].mujerAsesoria],
				['Total', totalSexoT]
			];
		break;
		case 'ORAL':
			tablaGeneral.widths=  [100, 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Sexo', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
				],
				[
					{},
					{ text: 'Oral', style: 'tableHeader', alignment: 'center' }
				],
				['Hombre', sexos['numMascO']],
				['Mujer', sexos['numFemO']],
				['Total', totalSexoO]
			];
		break;
		case 'JUSTICIA':
			tablaGeneral.widths=  [100, 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Sexo', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
				],
				[
					{},
					{ text: 'Justicia para adolecentes', style: 'tableHeader', alignment: 'center' }
				],
				['Hombre', '']
				['Mujer', ''],
				['Total', '']
			];
		break;
		default:
		if(jsonInf['sexoBySistema'][1] == undefined || jsonInf['sexoBySistema'][1] == null){
			jsonInf['sexoBySistema'][1]={"hombreAsesoria":0, "mujerAsesoria":0};
		}
		var totalHombreAse= parseInt(jsonInf['sexoBySistema'][1].hombreAsesoria)+ parseInt(jsonInf['sexoBySistema'][0].hombreAsesoria);
		var totalmujerAse= parseInt(jsonInf['sexoBySistema'][1].mujerAsesoria)+ parseInt(jsonInf['sexoBySistema'][0].mujerAsesoria);
		var totalAsesoriasSexo = totalHombreAse + totalmujerAse;
		tablaGeneral.widths=  [100, 'auto', 'auto', 'auto'];
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
			['Hombre', totalHombreAse, jsonInf['sexoBySistema'][1].hombreAsesoria, jsonInf['sexoBySistema'][0].hombreAsesoria],
			['Mujer', totalmujerAse, jsonInf['sexoBySistema'][1].mujerAsesoria, jsonInf['sexoBySistema'][0].mujerAsesoria],
			['Total', totalAsesoriasSexo, '', '']
		];	
		break;
	}
	
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function getTablaGenero(valor){
	//generos = getNumGeneroUsuarios(jsonInf);
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 2;

	switch(valor){
		case 'TRADICIONAL':
		totalGenerosT = parseInt(jsonInf['generoBySistemaDef'][0].lesbicoAse)+parseInt(jsonInf['generoBySistemaDef'][0].gayAse)+
						parseInt(jsonInf['generoBySistemaDef'][0].bisexualAse)+parseInt(jsonInf['generoBySistemaDef'][0].transexualAse)+
						parseInt(jsonInf['generoBySistemaDef'][0].transgeneroAse)+parseInt(jsonInf['generoBySistemaDef'][0].travestiAse)+
						parseInt(jsonInf['generoBySistemaDef'][0].interAse);
			tablaGeneral.widths=  [150, 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Género', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
				],
				[
					{},					
					{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' }				
				],
				['Lésbico',jsonInf['generoBySistemaDef'][0].lesbicoAse],
				['Gay', jsonInf['generoBySistemaDef'][0].gayAse],
				['Bisexual', jsonInf['generoBySistemaDef'][0].bisexualAse],
				['Transexual', jsonInf['generoBySistemaDef'][0].transexualAse],
				['Transgénero', jsonInf['generoBySistemaDef'][0].transgeneroAse],
				['Travestí',  jsonInf['generoBySistemaDef'][0].travestiAse],
				['Intersexual', jsonInf['generoBySistemaDef'][0].interAse],
				['Total', totalGenerosT]
			];
		break;
		case 'ORAL':
			tablaGeneral.widths=  [150, 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Género', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
				],
				[
					{},					
					{ text: 'Oral', style: 'tableHeader', alignment: 'center' }				
				],
				['Lésbico',generos['numLesbicoO']],
				['Gay', generos['numGayO']],
				['Bisexual', generos['numBisexualO']],
				['Transexual', generos['numTransexualO']],
				['Transgénero', generos['numTransgeneroO']],
				['Travestí',  generos['numTravestiO']],
				['Intersexual',  generos['numIntersexualO']],
				['Total', totalGenerosO]
			];		
		break;
		case 'JUSTICIA':
			tablaGeneral.widths=  [150, 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Género', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
				],
				[
					{},					
					{ text: 'Justicia para adolecentes', style: 'tableHeader', alignment: 'center' }				
				],
				['Lésbico',''],
				['Gay', ''],
				['Bisexual',''],
				['Transexual',''],
				['Transgénero',''],
				['Travestí', ''],
				['Intersexual',''],
				['Total', '']
			];
		break;
		default:
		if(jsonInf['generoBySistema'][1] == undefined || jsonInf['generoBySistema'][1] == null){
			jsonInf['generoBySistema'][1]={"lesbicoAse":0, "bisexualAse":0,"gayAse":0, "interAse":0,
										  "transexualAse":0, "transgeneroAse":0, "travestiAse":0};
		}
		totalLesbico = parseInt(jsonInf['generoBySistema'][1].lesbicoAse)+ parseInt(jsonInf['generoBySistema'][0].lesbicoAse);
		totalBisexual = parseInt(jsonInf['generoBySistema'][1].bisexualAse)+ parseInt(jsonInf['generoBySistema'][0].bisexualAse);
		totalGay = parseInt(jsonInf['generoBySistema'][1].gayAse)+ parseInt(jsonInf['generoBySistema'][0].gayAse);
		totalIntersexual = parseInt(jsonInf['generoBySistema'][1].interAse)+ parseInt(jsonInf['generoBySistema'][0].interAse);
		totalTransexual = parseInt(jsonInf['generoBySistema'][1].transexualAse)+ parseInt(jsonInf['generoBySistema'][0].transexualAse);
		totalTransgenero = parseInt(jsonInf['generoBySistema'][1].transgeneroAse)+ parseInt(jsonInf['generoBySistema'][0].transgeneroAse);
		totalTravesti = parseInt(jsonInf['generoBySistema'][1].travestiAse)+ parseInt(jsonInf['generoBySistema'][0].travestiAse);
		totalG = totalLesbico + totalBisexual +  totalGay + totalIntersexual +  totalTransgenero + totalTransexual + totalTravesti;
			tablaGeneral.widths=  [150, 'auto', 'auto', 'auto'];
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
				['Lésbico', totalLesbico, jsonInf['generoBySistema'][1].lesbicoAse, jsonInf['generoBySistema'][0].lesbicoAse],
				['Gay', totalGay, jsonInf['generoBySistema'][1].gayAse, jsonInf['generoBySistema'][0].gayAse],
				['Bisexual', totalBisexual, jsonInf['generoBySistema'][1].bisexualAse, jsonInf['generoBySistema'][0].bisexualAse],
				['Transexual', totalTransexual, jsonInf['generoBySistema'][1].transexualAse, jsonInf['generoBySistema'][0].transexualAse],
				['Transgénero', totalTransgenero, jsonInf['generoBySistema'][1].transgeneroAse, jsonInf['generoBySistema'][0].transgeneroAse],
				['Travestí', totalTravesti,  jsonInf['generoBySistema'][1].travestiAse, jsonInf['generoBySistema'][0].travestiAse],
				['Intersexual', totalIntersexual, jsonInf['generoBySistema'][1].interAse, jsonInf['generoBySistema'][0].interAse],
				['Total', totalG, '','']
			];
		break;
	}

	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	//console.log(tabla);
	return tabla;
}
function getTablaEdad(valor){
	//edades = getNumEdadUsuarios(jsonInf);
	var tabla ={};
	var tablaGeneral={};		
	tablaGeneral.headerRows= 3;
	
	switch(valor){
		case 'TRADICIONAL':
				totalEdad1 = parseInt(jsonInf['edadBySistemaDef'][0].edad18_24H)+parseInt(jsonInf['edadBySistemaDef'][0].edad18_24M);
				totalEdad2 = parseInt(jsonInf['edadBySistemaDef'][0].edad25_29H)+parseInt(jsonInf['edadBySistemaDef'][0].edad25_29M);
				totalEdad3 = parseInt(jsonInf['edadBySistemaDef'][0].edad30_34H)+parseInt(jsonInf['edadBySistemaDef'][0].edad30_34M);
				totalEdad4 = parseInt(jsonInf['edadBySistemaDef'][0].edad35_39H)+parseInt(jsonInf['edadBySistemaDef'][0].edad35_39M);
				totalEdad5 = parseInt(jsonInf['edadBySistemaDef'][0].edad40_44H)+parseInt(jsonInf['edadBySistemaDef'][0].edad40_44M);
				totalEdad6 = parseInt(jsonInf['edadBySistemaDef'][0].edad45_49H)+parseInt(jsonInf['edadBySistemaDef'][0].edad45_49M);
				totalEdad7 = parseInt(jsonInf['edadBySistemaDef'][0].edad50_54H)+parseInt(jsonInf['edadBySistemaDef'][0].edad50_54M);
				totalEdad8 = parseInt(jsonInf['edadBySistemaDef'][0].edad55_59H)+parseInt(jsonInf['edadBySistemaDef'][0].edad55_59M);
				totalEdad9 = parseInt(jsonInf['edadBySistemaDef'][0].edad60MasH)+parseInt(jsonInf['edadBySistemaDef'][0].edad60MasM);
				totalEdadT = totalEdad1 + totalEdad2+totalEdad3 + totalEdad4+totalEdad5 + totalEdad6+totalEdad7 + totalEdad8+totalEdad9;
		tablaGeneral.widths= ['auto', 'auto', 'auto', 'auto'];
		tablaGeneral.body = [
			[
				{ text: 'Edad', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Tradicional',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}			
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }		
						
			],
			['18 A 24 AÑOS',	 totalEdad1, jsonInf['edadBySistemaDef'][0].edad18_24H,jsonInf['edadBySistemaDef'][0].edad18_24M],
			['25 A 29 AÑOS',	 totalEdad2, jsonInf['edadBySistemaDef'][0].edad25_29H,jsonInf['edadBySistemaDef'][0].edad25_29M],
			['30 A 34 AÑOS',	 totalEdad3, jsonInf['edadBySistemaDef'][0].edad30_34H,jsonInf['edadBySistemaDef'][0].edad30_34M],
			['35 A 39 AÑOS',	 totalEdad4, jsonInf['edadBySistemaDef'][0].edad35_39H,jsonInf['edadBySistemaDef'][0].edad35_39M],
			['40 A 44 AÑOS',	 totalEdad5, jsonInf['edadBySistemaDef'][0].edad40_44H,jsonInf['edadBySistemaDef'][0].edad40_44M],
			['45 A 49 AÑOS',	 totalEdad6, jsonInf['edadBySistemaDef'][0].edad45_49H,jsonInf['edadBySistemaDef'][0].edad45_49M],
			['50 A 54 AÑOS',	 totalEdad7, jsonInf['edadBySistemaDef'][0].edad50_54H,jsonInf['edadBySistemaDef'][0].edad50_54M],
			['55 A 59 AÑOS',	 totalEdad8, jsonInf['edadBySistemaDef'][0].edad55_59H,jsonInf['edadBySistemaDef'][0].edad55_59M],
			['DE 60 O MAS AÑOS', totalEdad9, jsonInf['edadBySistemaDef'][0].edad60MasH,jsonInf['edadBySistemaDef'][0].edad60MasM],
			['TOTAL', 			 totalEdadT,'','']
		];
		break;
		case 'ORAL':		
			tablaGeneral.widths= ['auto', 'auto', 'auto', 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Edad', rowSpan:3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},{}
				],
				[
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Oral',colSpan: 2, style: 'tableHeader', alignment: 'center' },
					{}			
				],
				[
					{},
					{},
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }				
				],
				['18 A 24 AÑOS',	 edades['edades1O'],edades['edades1OH'],edades['edades1OM']],
				['25 A 29 AÑOS',	 edades['edades2O'],edades['edades2OH'],edades['edades2OM']],
				['30 A 34 AÑOS',	 edades['edades3O'],edades['edades3OH'],edades['edades3OM']],
				['35 A 39 AÑOS',	 edades['edades4O'],edades['edades4OH'],edades['edades4OM']],
				['40 A 44 AÑOS',	 edades['edades5O'],edades['edades5OH'],edades['edades5OM']],
				['45 A 49 AÑOS',	 edades['edades6O'],edades['edades6OH'],edades['edades6OM']],
				['50 A 54 AÑOS',	 edades['edades7O'],edades['edades7OH'],edades['edades7OM']],
				['55 A 59 AÑOS',	 edades['edades8O'],edades['edades8OH'],edades['edades8OM']],
				['DE 60 O MAS AÑOS', edades['edades9O'],edades['edades9OH'],edades['edades9OM']],
				['TOTAL', 			 totalEdadO,totalHO,totalMO]
			];
		break;
		case 'JUSTICIA':		
		tablaGeneral.widths= ['auto', 'auto', 'auto', 'auto'];
		tablaGeneral.body = [
			[
				{ text: 'Edad', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Justicia para Adolecentes',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}			
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }				
			],
			['18 A 24 AÑOS',	'','',''],
			['25 A 29 AÑOS',	'','',''],
			['30 A 34 AÑOS',	'','',''],
			['35 A 39 AÑOS',	'','',''],
			['40 A 44 AÑOS',	'','',''],
			['45 A 49 AÑOS',	'','',''],
			['50 A 54 AÑOS',	'','',''],
			['55 A 59 AÑOS',	'','',''],
			['DE 60 O MAS AÑOS','','',''],
			['TOTAL', 			'','','']
		];
		break;
		default:
		if(jsonInf['edadBySistema'][1] == undefined || jsonInf['edadBySistema'][1] == null){
			jsonInf['edadBySistema'][1]={"totalSistema":0, "edad18_24H":0,"edad18_24M":0,"edad25_29H":0,"edad25_29M":0,"edad30_34H":0,"edad30_34M":0,"edad35_39H":0,"edad35_39M":0,"edad40_44H":0,"edad40_44M":0,
			"edad45_49H":0,"edad45_49M":0,"edad50_54H":0,"edad50_54M":0,"edad55_59H":0,"edad55_59M":0,"edad60MasH":0,"edad60MasM":0};
		}
		var totalT1824 = parseInt(jsonInf['edadBySistema'][1].edad18_24H)+parseInt(jsonInf['edadBySistema'][1].edad18_24M);
		var totalO1824 = parseInt(jsonInf['edadBySistema'][0].edad18_24H)+parseInt(jsonInf['edadBySistema'][0].edad18_24M);
		var totalT2529 = parseInt(jsonInf['edadBySistema'][1].edad25_29H)+parseInt(jsonInf['edadBySistema'][1].edad25_29M);
		var totalO2529 = parseInt(jsonInf['edadBySistema'][0].edad25_29H)+parseInt(jsonInf['edadBySistema'][0].edad25_29M);
		var totalT3034 = parseInt(jsonInf['edadBySistema'][1].edad30_34H)+parseInt(jsonInf['edadBySistema'][1].edad30_34M);
		var totalO3034 = parseInt(jsonInf['edadBySistema'][0].edad30_34H)+parseInt(jsonInf['edadBySistema'][0].edad30_34M);
		var totalT3539 = parseInt(jsonInf['edadBySistema'][1].edad35_39H)+parseInt(jsonInf['edadBySistema'][1].edad35_39M);
		var totalO3539 = parseInt(jsonInf['edadBySistema'][0].edad35_39H)+parseInt(jsonInf['edadBySistema'][0].edad35_39M);
		var totalT4044 = parseInt(jsonInf['edadBySistema'][1].edad40_44H)+parseInt(jsonInf['edadBySistema'][1].edad40_44M);
		var totalO4044 = parseInt(jsonInf['edadBySistema'][0].edad40_44H)+parseInt(jsonInf['edadBySistema'][0].edad40_44M);
		var totalT4549 = parseInt(jsonInf['edadBySistema'][1].edad45_49H)+parseInt(jsonInf['edadBySistema'][1].edad45_49M);
		var totalO4549 = parseInt(jsonInf['edadBySistema'][0].edad45_49H)+parseInt(jsonInf['edadBySistema'][0].edad45_49M);
		var totalT5054 = parseInt(jsonInf['edadBySistema'][1].edad50_54H)+parseInt(jsonInf['edadBySistema'][1].edad50_54M);
		var totalO5054 = parseInt(jsonInf['edadBySistema'][0].edad50_54H)+parseInt(jsonInf['edadBySistema'][0].edad50_54M);
		var totalT5559 = parseInt(jsonInf['edadBySistema'][1].edad55_59H)+parseInt(jsonInf['edadBySistema'][1].edad55_59M);
		var totalO5559 = parseInt(jsonInf['edadBySistema'][0].edad55_59H)+parseInt(jsonInf['edadBySistema'][0].edad55_59M);
		var totalT60   = parseInt(jsonInf['edadBySistema'][1].edad60MasH)+parseInt(jsonInf['edadBySistema'][1].edad60MasM);
		var totalO60   = parseInt(jsonInf['edadBySistema'][0].edad60MasH)+parseInt(jsonInf['edadBySistema'][0].edad60MasM);
		totalEdad1 = totalT1824 + totalO1824;
		totalEdad2 = totalT2529 + totalO2529;
		totalEdad3 = totalT3034 + totalO3034;
		totalEdad4 = totalT3539 + totalO3539;
		totalEdad5 = totalT4044 + totalO4044;
		totalEdad6 = totalT4549 + totalO4549;
		totalEdad7 = totalT5054 + totalO5054;
		totalEdad8 = totalT5559 + totalO5559;
		totalEdad9 = totalT60 + totalO60;
		totalEdadS = totalEdad1 +  totalEdad2 +  totalEdad3 +  totalEdad4 +  totalEdad5 +  totalEdad6 +  totalEdad7 +  totalEdad8 +  totalEdad9;
	
		tablaGeneral.widths= ['auto', 'auto', 'auto', 'auto','auto', 'auto', 'auto', 'auto'];
		tablaGeneral.body = [
			[
				{ text: 'Edad', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
				{},{},{},{},{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
				{},
				{},
				{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},
				{}
			],
			[
				{},
				{},
				{ text: 'Total', style: 'tableHeader', alignment: 'center' },
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' },
				{ text: 'Total', style: 'tableHeader', alignment: 'center' },
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			['18 A 24 AÑOS',	totalEdad1, totalT1824, jsonInf['edadBySistema'][1].edad18_24H,jsonInf['edadBySistema'][1].edad18_24M, totalO1824,jsonInf['edadBySistema'][0].edad18_24H,jsonInf['edadBySistema'][0].edad18_24M],
			['25 A 29 AÑOS',	totalEdad2, totalT2529, jsonInf['edadBySistema'][1].edad25_29H,jsonInf['edadBySistema'][1].edad25_29M, totalO2529,jsonInf['edadBySistema'][0].edad25_29H,jsonInf['edadBySistema'][0].edad25_29M],
			['30 A 34 AÑOS',	totalEdad3, totalT3034, jsonInf['edadBySistema'][1].edad30_34H,jsonInf['edadBySistema'][1].edad30_34M, totalO3034,jsonInf['edadBySistema'][0].edad30_34H,jsonInf['edadBySistema'][0].edad30_34M],
			['35 A 39 AÑOS',	totalEdad4, totalT3539, jsonInf['edadBySistema'][1].edad35_39H,jsonInf['edadBySistema'][1].edad35_39M, totalO3539,jsonInf['edadBySistema'][0].edad35_39H,jsonInf['edadBySistema'][0].edad35_39M],
			['40 A 44 AÑOS',	totalEdad5, totalT4044, jsonInf['edadBySistema'][1].edad40_44H,jsonInf['edadBySistema'][1].edad40_44M, totalO4044,jsonInf['edadBySistema'][0].edad40_44H,jsonInf['edadBySistema'][0].edad40_44M],
			['45 A 49 AÑOS',	totalEdad6, totalT4549, jsonInf['edadBySistema'][1].edad45_49H,jsonInf['edadBySistema'][1].edad45_49M, totalO4549,jsonInf['edadBySistema'][0].edad45_49H,jsonInf['edadBySistema'][0].edad45_49M],
			['50 A 54 AÑOS',	totalEdad7, totalT5054, jsonInf['edadBySistema'][1].edad50_54H,jsonInf['edadBySistema'][1].edad50_54M, totalO5054,jsonInf['edadBySistema'][0].edad50_54H,jsonInf['edadBySistema'][0].edad50_54M],
			['55 A 59 AÑOS',	totalEdad8, totalT5559, jsonInf['edadBySistema'][1].edad55_59H,jsonInf['edadBySistema'][1].edad55_59M, totalO5559,jsonInf['edadBySistema'][0].edad55_59H,jsonInf['edadBySistema'][0].edad55_59M],
			['DE 60 O MAS AÑOS',totalEdad9, totalT60,   jsonInf['edadBySistema'][1].edad60MasH,jsonInf['edadBySistema'][1].edad60MasM, totalO60,  jsonInf['edadBySistema'][0].edad60MasH,jsonInf['edadBySistema'][0].edad60MasM],
			['TOTAL', 			totalEdadS, '','','', '','','']
		];
	
		break;
	}
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function generarCuerpoTop(){
	var totalFinal = 0;
	var sourceData = jsonInf['topDefensoresBySystema'];
	console.log(sourceData, ' VALORRRRR SOURCE DATA');
	console.log(jsonInf, ' COMPLETO');
	//var listaDef = getListaDef(sourceData);
	var bodyData = [];	
		
			bodyData.push(
					[{ text: 'Defensor',	style: 'tableHeader', alignment: 'center' },
					 { text: 'Juzgado',  	style: 'tableHeader', alignment: 'center' },
					 { text: 'Asesorias', 	style: 'tableHeader', alignment: 'center' },
					 { text: 'H',			style: 'tableHeader', alignment: 'center' },
					 { text: 'M', 		 	style: 'tableHeader', alignment: 'center' },
					 { text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
					]
			);

		
		
			sourceData.forEach(function(VAL) {
				totalFinal += parseInt(VAL.asesoriaPorSistema);
				var dataRow = [];		
				dataRow.push(VAL.nombreP, VAL.nombreJuz, VAL.asesoriaPorSistema, VAL.hombres, VAL.mujeres, VAL.sistemaM);
				bodyData.push(dataRow);
				
			});
		
		bodyData.push(['TOTAL', '---', totalFinal,'---','---','---']);
		console.log(bodyData, ' bodydata tooop defensores');
		return bodyData;
}
function generarCuerpoEtniasT(){
	var totalFinal = 0;
	var sourceData = jsonInf['etniaBySistemaDef'];
	var listaEtnias = getNumEtniasUsuarios(sourceData);
	console.log(sourceData, ' SOURCE DATAAAA');
	console.log(listaEtnias, ' LISTA ETNIA');
	var bodyData = [];	
		
			bodyData.push(
					[
						{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
						{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
						{},{}
					]
			);
			bodyData.push(
					[
						{},
						{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
						{ text: 'Tradicional',colSpan: 2, style: 'tableHeader', alignment: 'center' },
						{}
					]
			);
			bodyData.push(
					[
						{},
						{},
						{ text: 'H', style: 'tableHeader', alignment: 'center' },
						{ text: 'M',style: 'tableHeader', alignment: 'center' }
					]
			);
		
		for(var i=0; i<listaEtnias.length; i++){
			sourceData.forEach(function(VAL) {
				if(listaEtnias[i].etnia == VAL.etniaU){
					//var totalT = parseInt(VAL.etniaHombreT) + parseInt(VAL.etniaMujerT);
					//var totalO = parseInt(VAL.etniaHombreO) + parseInt(VAL.etniaMujerO);
					totalFinal += parseInt(VAL.asesoriaPorSistema);				
					var dataRow = [];		
					dataRow.push(listaEtnias[i].etnia, VAL.asesoriaPorSistema, VAL.etniaHombreT, VAL.etniaMujerT);
					bodyData.push(dataRow);
				}
			});
		}
		bodyData.push(['TOTAL', totalFinal, ' ',' ']);
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
function generarCuerpoEtnias(){
	var totalFinal = 0;
	var sourceData = jsonInf['etniaBySistema'];
	var listaEtnias = getNumEtniasUsuarios(sourceData);
	var bodyData = [];	
		
			bodyData.push(
					[{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
					{},{},{},{},{},{}]
			);
			bodyData.push(
					[{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{},
					{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},
					{}]
			);
			bodyData.push(
					[{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }]
			);
		
		for(var i=0; i<listaEtnias.length; i++){
			sourceData.forEach(function(VAL) {
				if(listaEtnias[i].etnia == VAL.etniaU){
					var totalT = parseInt(VAL.etniaHombreT) + parseInt(VAL.etniaMujerT);
					var totalO = parseInt(VAL.etniaHombreO) + parseInt(VAL.etniaMujerO);
					totalFinal += parseInt(VAL.asesoriaPorSistema);				
					var dataRow = [];		
					dataRow.push(listaEtnias[i].etnia, VAL.asesoriaPorSistema, totalT, VAL.etniaHombreT, VAL.etniaMujerT, totalO, VAL.etniaHombreO, VAL.etniaMujerO);
					bodyData.push(dataRow);
				}
			});
		}
		bodyData.push(['TOTAL', totalFinal, ' ',' ',' ',' ',' ',' ']);
		//console.log(bodyData, ' bodydata');
		return bodyData;
}

function getTablaEtnias(valor){	
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 3;		
	//console.log(generarCuerpoEtnias(), 'cuerpo funcioin generar cuerpo etnias');
	switch(valor){
		case 'TRADICIONAL':
			return {
				style : 'tableExample',
				color : 'black',
				table:{
					widths:  ['auto', 'auto', 'auto', 'auto'],
					headerRows: 3,					
					body: generarCuerpoEtniasT()
				}
			}
		break;
		case 'ORAL':
		tablaGeneral.widths=  [150, 'auto', 'auto', 'auto'];
		//tablaGeneral.body = generarRowsEtnias(etnias, etniasSistema, valor);
		
		tablaGeneral.body=
		[
			[
				{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Acusatorio Oral',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			['','','','']
		];
		break;
		case 'JUSTICIA':
		tablaGeneral.widths=  [150, 'auto', 'auto', 'auto'];
		//tablaGeneral.body = generarRowsEtnias(etnias, etniasSistema, valor);
		
		tablaGeneral.body=
		[
			[
				{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Justicia para adolecentes',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			['','','','']
		];
		break;
		default:

		
			return {
				style : 'tableExample',
				color : 'black',
				table:{
					widths:  ['auto', 'auto', 'auto', 'auto','auto', 'auto', 'auto','auto'],
					headerRows: 3,					
					body: generarCuerpoEtnias()
				}
			}
		break;
	}
	
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;	
	return tabla; 
 }
 function generarCuerpoIdiomasT(){
	var totalFinal = 0;
	var sourceData = jsonInf['idiomaBySistemaDef'];
	var listaIdiomas = getNumIdiomasUsuarios(sourceData);
	var bodyData = [];	
		
			bodyData.push(
					[{ text: 'Idioma o Lengua', rowSpan:3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},{}]
			);
			bodyData.push(
					[{},
						{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
						{ text: 'Tradicional',colSpan: 2, style: 'tableHeader', alignment: 'center' },
						{}]
			);
			bodyData.push(
					[{},
						{},
						{ text: 'H', style: 'tableHeader', alignment: 'center' },
						{ text: 'M',style: 'tableHeader', alignment: 'center' }]
			);
		
		for(var i=0; i<listaIdiomas.length; i++){
			sourceData.forEach(function(VAL) {
				if(listaIdiomas[i].idioma == VAL.idiomaU){
					//var totalT = parseInt(VAL.idiomaHombreT) + parseInt(VAL.idiomaMujerT);
					//var totalO = parseInt(VAL.idiomaHombreO) + parseInt(VAL.idiomaMujerO);
					totalFinal += parseInt(VAL.asesoriaPorSistema);				
					var dataRow = [];	
					//console.log(listaIdiomas[i].idioma, VAL.asesoriaPorSistema, totalT, VAL.idiomaHombreT, VAL.idiomaMujerT, totalO, VAL.idiomaHombreO, VAL.idiomaMujerO);	
					dataRow.push(listaIdiomas[i].idioma, VAL.asesoriaPorSistema, VAL.idiomaHombreT, VAL.idiomaMujerT);
					bodyData.push(dataRow);
				}
			});
		}
		bodyData.push(['TOTAL', totalFinal, ' ',' ']);
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
 function generarCuerpoIdiomas(){
	var totalFinal = 0;
	var sourceData = jsonInf['idiomaBySistema'];
	var listaIdiomas = getNumIdiomasUsuarios(sourceData);
	var bodyData = [];	
		
			bodyData.push(
					[{ text: 'Idiomas o Lenguas', rowSpan:3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
					{},{},{},{},{},{}]
			);
			bodyData.push(
					[{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{},
					{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},
					{}]
			);
			bodyData.push(
					[{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }]
			);
		
		for(var i=0; i<listaIdiomas.length; i++){
			sourceData.forEach(function(VAL) {
				if(listaIdiomas[i].idioma == VAL.idiomaU){
					var totalT = parseInt(VAL.idiomaHombreT) + parseInt(VAL.idiomaMujerT);
					var totalO = parseInt(VAL.idiomaHombreO) + parseInt(VAL.idiomaMujerO);
					totalFinal += parseInt(VAL.asesoriaPorSistema);				
					var dataRow = [];	
					//console.log(listaIdiomas[i].idioma, VAL.asesoriaPorSistema, totalT, VAL.idiomaHombreT, VAL.idiomaMujerT, totalO, VAL.idiomaHombreO, VAL.idiomaMujerO);	
					dataRow.push(listaIdiomas[i].idioma, VAL.asesoriaPorSistema, totalT, VAL.idiomaHombreT, VAL.idiomaMujerT, totalO, VAL.idiomaHombreO, VAL.idiomaMujerO);
					bodyData.push(dataRow);
				}
			});
		}
		bodyData.push(['TOTAL', totalFinal, ' ',' ',' ',' ',' ',' ']);
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
function getTablaIdiomas(valor){
    var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 3;		
	//console.log(generarCuerpoEtnias(), 'cuerpo funcioin generar cuerpo etnias');
	switch(valor){
		case 'TRADICIONAL':
			return {
				style : 'tableExample',
				color : 'black',
				table:{
					widths:  ['auto', 'auto', 'auto', 'auto'],
					headerRows: 3,					
					body: generarCuerpoIdiomasT()
				}
			}
		break;
		case 'ORAL':
		tablaGeneral.widths=  [150, 'auto', 'auto', 'auto'];
		//tablaGeneral.body = generarRowsEtnias(etnias, etniasSistema, valor);
		
		tablaGeneral.body=
		[
			[
				{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Acusatorio Oral',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			['','','','']
		];
		break;
		case 'JUSTICIA':
		tablaGeneral.widths=  [150, 'auto', 'auto', 'auto'];
		//tablaGeneral.body = generarRowsEtnias(etnias, etniasSistema, valor);
		
		tablaGeneral.body=
		[
			[
				{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Justicia para adolecentes',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			['','','','']
		];
		break;
		default:

		
			return {
				style : 'tableExample',
				color : 'black',
				table:{
					widths:  ['auto', 'auto', 'auto', 'auto','auto', 'auto', 'auto','auto'],
					headerRows: 3,					
					body: generarCuerpoIdiomas()
				}
			}
		break;
	}
	
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;	
	return tabla; 
}
function getTablaDiscapacidad(valor){

	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 3;
	switch(valor){
		case 'TRADICIONAL':
		var dis=jsonInf['discapacidadBySistemaDef'];
		totalFinal =	parseInt(dis[0].tablaSensorial)+
						parseInt(dis[0].tablaMotriz)+
						parseInt(dis[0].tablaMental)+ 
						parseInt(dis[0].tablaMultiple)+
						parseInt(dis[0].tablaNinguno); 
		tablaGeneral.widths=  ['auto', 'auto', 'auto', 'auto'];
		tablaGeneral.body = [
			[
				{ text: 'Discapacidades', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Tradicional',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}				
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }				
			],
['Sensoriales y de la comunicación',	dis[0].tablaSensorial,	dis[0].tablaSensorialM,	dis[0].tablaSensorialF	],
						['Motrices',	dis[0].tablaMotriz,		dis[0].tablaMotrizM,	dis[0].tablaMotrizF		],
						['Mentales',	dis[0].tablaMental, 	dis[0].tablaMentalM,	dis[0].tablaMentalF 	],
						['Multiples',	dis[0].tablaMultiple, 	dis[0].tablaMultipleM,	dis[0].tablaMultipleF 	],
						['Ninguno',		dis[0].tablaNinguno, 	dis[0].tablaNingunoM,	dis[0].tablaNingunoF	],
						['Total',		totalFinal,'','']
			];
		break;
		case 'ORAL':
			tablaGeneral.widths=  ['auto', 'auto', 'auto', 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Discapacidades', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},{}
				],
				[
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Oral',colSpan: 2, style: 'tableHeader', alignment: 'center' },
					{}
					
				],
				[
					{},
					{},
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }
					
				],
				['Sensoriales y de la comunicación', discapacidades['numSensorialesO'],discapacidades['numSMO'],discapacidades['numSFO']],
				['Motrices',  discapacidades['numMotricesO'],discapacidades['numMMO'],discapacidades['numMFO']],
				['Mentales', discapacidades['numMentalesO'],discapacidades['numMEMO'],discapacidades['numMEFO']],
				['Multiples',   discapacidades['numMultiplesO'],discapacidades['numMUMO'],discapacidades['numMUFO']],
				['Total', totalDisO,'','']
			];
		break;
		case 'JUSTICIA':
		tablaGeneral.widths=  ['auto', 'auto', 'auto', 'auto'];
		tablaGeneral.body = [
			[
				{ text: 'Discapacidades', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Justicia para adolecentes',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}
				
			],
			[
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
				
			],
			['Sensoriales y de la comunicación', '','',''],
			['Motrices',  '','',''],
			['Mentales', '','',''],
			['Multiples',  '','',''],
			['Total','','','']
		];
		break;
		default:
		var dis=jsonInf['discapacidadBySistema'];
		var lista = getListaDiscapacidad();
		dis = validarDiscapacidad(lista,dis);
		var totalSenT,totalSenO, totalMotT, totalMotO, totalMenT, totalMenO, totalMulT, totalMulO, totalNinT,totalNinO,
		totalSen, totalMot, totalMen, totalMul, totalNin, totalFinal;

/* 		totalSen= parseInt(dis[0].tablaSensorial)+parseInt(dis[1].tablaSensorial);
		totalMot= parseInt(dis[0].tablaMotriz)+parseInt(dis[1].tablaMotriz);
		totalMen= parseInt(dis[0].tablaMental)+parseInt(dis[1].tablaMental);
		totalMul= parseInt(dis[0].tablaMultiple)+parseInt(dis[1].tablaMultiple);
		totalNin= parseInt(dis[0].tablaNinguno)+parseInt(dis[1].tablaNinguno);
		totalFinal = totalSen+ totalMot +totalMen+ totalMul+ totalNin;
 */		//console.log(' DENTRO TABLA DEFAULT');
			tablaGeneral.widths=  ['auto', 'auto', 'auto', 'auto','auto', 'auto', 'auto', 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Discapacidades', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
					{},{},{},{},{},{}
				],
				[
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{},
					{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
				],
				[
					{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }	
				],
['Sensoriales y de la comunicación',	dis[2]['SENSORIALESTotal'],dis[1]['SENSORIALES'].totalUsuarios,	dis[1]['SENSORIALES'].hombres,dis[1]['SENSORIALES'].mujeres,dis[0]['SENSORIALES'].totalUsuarios,	dis[0]['SENSORIALES'].hombres,dis[0]['SENSORIALES'].mujeres],
						['Motrices',	dis[2]['MOTRICESTotal'],dis[1]['MOTRICES'].totalUsuarios,	dis[1]['MOTRICES'].hombres,dis[1]['MOTRICES'].mujeres,dis[0]['MOTRICES'].totalUsuarios,	dis[0]['MOTRICES'].hombres,dis[0]['MOTRICES'].mujeres],
						['Mentales',	dis[2]['MENTALESTotal'],dis[1]['MENTALES'].totalUsuarios,	dis[1]['MENTALES'].hombres,dis[1]['MENTALES'].mujeres,dis[0]['MENTALES'].totalUsuarios,	dis[0]['MENTALES'].hombres,dis[0]['MENTALES'].mujeres],
						['Multiples',	dis[2]['MULTIPLESTotal'],dis[1]['MULTIPLES'].totalUsuarios,	dis[1]['MULTIPLES'].hombres,dis[1]['MULTIPLES'].mujeres,dis[0]['MULTIPLES'].totalUsuarios,	dis[0]['MULTIPLES'].hombres,dis[0]['MULTIPLES'].mujeres],
						['Ninguno',		dis[2]['NINGUNOTotal'],dis[1]['NINGUNO'].totalUsuarios,		dis[1]['NINGUNO'].hombres,dis[1]['NINGUNO'].mujeres,dis[0]['NINGUNO'].totalUsuarios,	dis[0]['NINGUNO'].hombres,dis[0]['NINGUNO'].mujeres],
						['Total',		dis[2]['totalFinal'],dis[2]['totalTra'],dis[2]['totalTH'],dis[2]['totalTM'],dis[2]['totalOra'],dis[2]['totalOH'],dis[2]['totalOM']]
			];
		
		break;
	}
	
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function getListaDiscapacidad(){
	var et=[];
	et.push('NINGUNO');
	et.push('SENSORIALES');
	et.push('MOTRICES');
	et.push('MENTALES');
	et.push('MULTIPLES');
	
	return et;
}
function validarDiscapacidad(lista,data){
	var arrT={};
	var arrO={};
	var arrTotales={};
	var arr = [];
	for(var i=0; i<lista.length; i++){
		arrT[lista[i]] = {
							'totalUsuarios':0,
							'hombres':0,
							'mujeres':0
						 };
		arrT['sistema'] = 'TRADICIONAL';
	}
	
	for(var i=0; i<lista.length; i++){
		arrO[lista[i]] 	= {
							'totalUsuarios':0,
							'hombres':0,
							'mujeres':0
						  };
		arrO['sistema'] ='ORAL';
	}

	for(var i=0; i<lista.length+1; i++){		
		$.each(data, function(k,v){			
			//console.log(Object.keys(arrT)[i], 'discapacidad', v.discapacidadUs);
			if(v.sis == 'TRADICIONAL' && v.discapacidadUs==Object.keys(arrT)[i]){
				arrT[v.discapacidadUs]['totalUsuarios']   = v.totalUsuarios;
				arrT[v.discapacidadUs]['hombres'] = v.hombres;
				arrT[v.discapacidadUs]['mujeres'] = v.mujeres;

			}
			if(v.sis == 'ORAL' && v.discapacidadUs==Object.keys(arrO)[i]){
				//arr[0].totalUsuarios = v.totalUsuarios;				
				//console.log(Object.keys(arrO)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				
				arrO[v.discapacidadUs]['totalUsuarios']=    v.totalUsuarios;
				arrO[v.discapacidadUs]['hombres'] = v.hombres;
				arrO[v.discapacidadUs]['mujeres'] = v.mujeres;
			}
			if(v.sis == 'ORAL' && v.discapacidadUs==Object.keys(arrO)[i]){
				//arr[0].totalUsuarios = v.totalUsuarios;				
				//console.log(Object.keys(arrO)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				
				arrO[v.discapacidadUs]['totalUsuarios']=    v.totalUsuarios;
				arrO[v.discapacidadUs]['hombres'] = v.hombres;
				arrO[v.discapacidadUs]['mujeres'] = v.mujeres;
			}

		});
	}
	arrTotales['totalFinal'] =0;
	arrTotales['totalTra'] =0;  arrTotales['totalOra'] =0;
	arrTotales['totalTH'] =0;	arrTotales['totalTM'] =0;
	arrTotales['totalOH'] =0;	arrTotales['totalOM'] =0;
	for(var i=0; i<lista.length; i++){
		arrTotales[lista[i]+'Total']= parseInt(arrT[lista[i]].totalUsuarios)+parseInt(arrO[lista[i]].totalUsuarios);
		arrTotales['totalFinal'] += arrTotales[lista[i]+'Total'];
		arrTotales['totalTra'] += parseInt(arrT[lista[i]].totalUsuarios);
		arrTotales['totalOra'] += parseInt(arrO[lista[i]].totalUsuarios);
		
		arrTotales['totalTH'] += parseInt(arrT[lista[i]].hombres);
		arrTotales['totalTM'] += parseInt(arrT[lista[i]].mujeres);
		arrTotales['totalOH'] += parseInt(arrO[lista[i]].hombres);
		arrTotales['totalOM'] += parseInt(arrO[lista[i]].mujeres);
	}
		arr.push(arrO);
		arr.push(arrT);
		arr.push(arrTotales);

	console.log(arr, 'VALOR ARRR');
	//console.log(Object.keys(arrT), 'LLAVES ARR T');
	return arr;
}
function getTablaTopTen(valor){
	//def = jsonInf['topDefensoresBySystema'];
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 3;
	//console.log(valor, ' valor sistema elegido');
	switch(valor){
		case 'TRADICIONAL':
		tablaGeneral.widths= ['auto', 'auto', 'auto','auto', 'auto'];
		
		tablaGeneral.body =  [
			[
				{ text: 'Defensor público', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Lugar de adscripción', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},                                                                                                                                         
				{},
				{ text: 'Total',rowSpan:2,style: 'tableHeader', alignment: 'center'},			
				{ text: 'Tradicional', colSpan:2, style: 'tableHeader', alignment: 'center' },
				{}
				
			],
			[
				{},
				{},
				{},			
				{ text: 'H',style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			[defensores[0].defensor, defensores[0].juzgado, defensores[0].asesoriasT,defensores[0].asesoriaHT,defensores[0].asesoriaFT],
			[defensores[1].defensor, defensores[1].juzgado, defensores[1].asesoriasT,defensores[1].asesoriaHT,defensores[1].asesoriaFT],
			[defensores[2].defensor, defensores[2].juzgado, defensores[2].asesoriasT,defensores[2].asesoriaHT,defensores[2].asesoriaFT],
			[defensores[3].defensor, defensores[3].juzgado, defensores[3].asesoriasT,defensores[3].asesoriaHT,defensores[3].asesoriaFT],
			[defensores[4].defensor, defensores[4].juzgado, defensores[4].asesoriasT,defensores[4].asesoriaHT,defensores[4].asesoriaFT],
			[defensores[5].defensor, defensores[5].juzgado, defensores[5].asesoriasT,defensores[5].asesoriaHT,defensores[5].asesoriaFT]
			/* [defensores[6].defensor, defensores[6].juzgado, defensores[6].asesoriasT,defensores[6].asesoriaHT,defensores[6].asesoriaFT],
			[defensores[7].defensor, defensores[7].juzgado, defensores[7].asesoriasT,defensores[7].asesoriaHT,defensores[7].asesoriaFT],
			[defensores[8].defensor, defensores[8].juzgado, defensores[8].asesoriasT,defensores[8].asesoriaHT,defensores[8].asesoriaFT],
			[defensores[9].defensor, defensores[9].juzgado, defensores[9].asesoriasT,defensores[9].asesoriaHT,defensores[9].asesoriaFT]  */
		];
		break;
		case 'ORAL':
		tablaGeneral.widths= ['auto', 'auto', 'auto','auto', 'auto'];		
		tablaGeneral.body =  [
			[
				{ text: 'Defensor público', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Lugar de adscripción', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},                                                                                                                                         
				{},
				{ text: 'Total',rowSpan:2,style: 'tableHeader', alignment: 'center'},			
				{ text: 'Oral', colSpan:2, style: 'tableHeader', alignment: 'center' },
				{}
				
			],
			[
				{},
				{},
				{},			
				{ text: 'H',style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			[defensores[0].defensor, defensores[0].juzgado, defensores[0].asesoriasO,defensores[0].asesoriaHO,defensores[0].asesoriaFO],
			[defensores[1].defensor, defensores[1].juzgado, defensores[1].asesoriasO,defensores[1].asesoriaHO,defensores[1].asesoriaFO],
			[defensores[2].defensor, defensores[2].juzgado, defensores[2].asesoriasO,defensores[2].asesoriaHO,defensores[2].asesoriaFO],
			[defensores[3].defensor, defensores[3].juzgado, defensores[3].asesoriasO,defensores[3].asesoriaHO,defensores[3].asesoriaFO],
			[defensores[4].defensor, defensores[4].juzgado, defensores[4].asesoriasO,defensores[4].asesoriaHO,defensores[4].asesoriaFO],
			[defensores[5].defensor, defensores[5].juzgado, defensores[5].asesoriasO,defensores[5].asesoriaHO,defensores[5].asesoriaFO],
			[defensores[6].defensor, defensores[6].juzgado, defensores[6].asesoriasO,defensores[6].asesoriaHO,defensores[6].asesoriaFO],
			[defensores[7].defensor, defensores[7].juzgado, defensores[7].asesoriasO,defensores[7].asesoriaHO,defensores[7].asesoriaFO],
			[defensores[8].defensor, defensores[8].juzgado, defensores[8].asesoriasO,defensores[8].asesoriaHO,defensores[8].asesoriaFO],
			[defensores[9].defensor, defensores[9].juzgado, defensores[9].asesoriasO,defensores[9].asesoriaHO,defensores[9].asesoriaFO] 
		];
		break;		
		case 'JUSTICIA':
		tablaGeneral.widths= ['auto', 'auto', 'auto','auto', 'auto'];		
		tablaGeneral.body =  [
			[
				{ text: 'Defensor público', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Lugar de adscripción', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},                                                                                                                                         
				{},
				{ text: 'Total',rowSpan:2,style: 'tableHeader', alignment: 'center'},			
				{ text: 'Justicia para adolecentes', colSpan:2, style: 'tableHeader', alignment: 'center' },
				{}
				
			],
			[
				{},
				{},
				{},			
				{ text: 'H',style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }
			],
			[defensores[0].defensor, defensores[0].juzgado, '','',''],
			[defensores[1].defensor, defensores[1].juzgado, '','',''],
			[defensores[2].defensor, defensores[2].juzgado, '','',''],
			[defensores[3].defensor, defensores[3].juzgado, '','',''],
			[defensores[4].defensor, defensores[4].juzgado, '','',''],
			[defensores[5].defensor, defensores[5].juzgado, '','',''],
			[defensores[6].defensor, defensores[6].juzgado, '','',''],
			[defensores[7].defensor, defensores[7].juzgado, '','',''],
			[defensores[8].defensor, defensores[8].juzgado, '','',''],
			[defensores[9].defensor, defensores[9].juzgado, '','',''] 
		];
		break;
		default:
		return {
				style : 'tableExample',
				color : 'black',
				table:{
					widths: ['auto', 'auto', 'auto','auto', 'auto', 'auto'],
					headerRows: 1,					
					body: generarCuerpoTop()
				}
			}			
		break;
	}

	
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function getDefensores(jsonInforme) {
	var numHT, numHO, numFT, numFO;
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
		var aseT=0, aseO=0, audT=0,audO=0, visT=0, visO=0;
		numHT=0, numHO=0,numFT=0, numFO=0;
		$.each(jsonInforme, function (KEY, VALOR) {
			if(VAL.idDef == VALOR.idDef){
				if(VALOR.sistema == 'TRADICIONAL'){
					if (VALOR.latAse != null || VALOR.longAse != undefined) {
						if(VALOR.sexo == 'MASCULINO'){
							numHT++;							
						}else{
							numFT++;							
						}
						aseT++;
						
						arrDefensores[LLAVE].asesoriasT = aseT;
					}
				}else{
					if (VALOR.latAse != null || VALOR.longAse != undefined) {
						if(VALOR.sexo == 'MASCULINO'){
							numHO++;
							
						}else{
							numFO++;
							
						}	
						aseO++;					
							
						arrDefensores[LLAVE].asesoriasO = aseO;
					}
				}
				arrDefensores[LLAVE].asesoriaHT=numHT;
				arrDefensores[LLAVE].asesoriaFT=numFT;
				arrDefensores[LLAVE].asesoriaHO = numHO;
				arrDefensores[LLAVE].asesoriaFO = numFO;
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
	  //console.log(arrDefensores);
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
	var numSMT=0, numSFT=0, numMMT=0,numMFT=0, numMEMT=0, numMEFT=0, numMUMT=0,numMUFT=0;
	var numSMO=0, numSFO=0, numMMO=0,numMFO=0, numMEMO=0, numMEFO=0, numMUMO=0,numMUFO=0;
	var numSensorialesT = 0,numMotricesT = 0, numMentalesT = 0, numMultiplesT=0;
	var numSensorialesO = 0,numMotricesO = 0, numMentalesO = 0, numMultiplesO=0;
	$.each(jsonInforme, function (KEY, VALOR) {
		if (VALOR.latAse != null || VALOR.longAse != undefined) {
			if (VALOR.sistema == 'TRADICIONAL') {
				switch(VALOR.discapacidadU){
					case 'SENSORIALES': 
						numSensorialesT++;
						if(VALOR.sexo == 'MASCULINO'){
							numSMT++;
						}else
							numSFT++;
					break;
					case 'MOTRICES': 
						numMotricesT++;							
						if(VALOR.sexo == 'MASCULINO'){
							numMMT++;
						}else
							numMFT++;
					break;
					case 'MENTALES': 
						numMentalesT++;
						
						if(VALOR.sexo == 'MASCULINO'){
							numMEMT++;
						}else
							numMEFT++;
					break;
					case 'MULTIPLES': 
						numMultiplesT++;
						
						if(VALOR.sexo == 'MASCULINO'){
							numMUMT++;
						}else
							numMUFT++;
					break;																										
				}

			}
			if (VALOR.sistema == 'ORAL') {
				switch(VALOR.discapacidadU){
					case 'SENSORIALES': 
						numSensorialesO++;
						if(VALOR.sexo == 'MASCULINO'){
							numSMO++;
						}else
							numSFO++;
					break;
					case 'MOTRICES': 
						numMotricesO++;
						if(VALOR.sexo == 'MASCULINO'){
							numMMO++;
						}else
							numMFO++;
					break;
					case 'MENTALES': 
						numMentalesO++;
						if(VALOR.sexo == 'MASCULINO'){
							numMEMO++;
						}else
							numMEFO++;
					break;
					case 'MULTIPLES': 
						numMultiplesO++;
						if(VALOR.sexo == 'MASCULINO'){
							numMUMO++;
						}else
							numMUFO++;
					break;
																								
				}
			}
		}
	});
	discapacidades['numSensorialesT'] = numSensorialesT;
	discapacidades['numSMT']=numSMT;
	discapacidades['numSFT']=numSFT;
	discapacidades['numMotricesT'] = numMotricesT;
	discapacidades['numMMT']=numMMT;
	discapacidades['numMFT']=numMFT;
	discapacidades['numMentalesT'] = numMentalesT;
	discapacidades['numMEMT']=numMEMT;
	discapacidades['numMEFT']=numMEFT;
	discapacidades['numMultiplesT'] = numMultiplesT;	
	discapacidades['numMUMT']=numMUMT;
	discapacidades['numMUFT']=numMUFT;
	
	discapacidades['numSensorialesO'] = numSensorialesO;
	discapacidades['numSMO']=numSMO;
	discapacidades['numSFO']=numSFO;
	discapacidades['numMotricesO'] = numMotricesO;
	discapacidades['numMMO']=numMMO;
	discapacidades['numMFO']=numMFO;
	discapacidades['numMentalesO'] = numMentalesO;
	discapacidades['numMEMO']=numMEMO;
	discapacidades['numMEFO']=numMEFO;
	discapacidades['numMultiplesO'] = numMultiplesO;
	discapacidades['numMUMO']=numMUMO;
	discapacidades['numMUFO']=numMUFO;
	
	
	
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
	var contaMT,contaFT, contaMO, contaFO;
	//console.log(arrEtnias, jsonInforme);
	for (var i = 0; i < arrIdiomas.length; i++) {
		contaMT=0,contaFT=0, contaMO=0, contaFO=0;					
		arrTradicional[arrIdiomas[i]['idioma']] = 0;
		arrOral[arrIdiomas[i]['idioma']] = 0;
		$.each(jsonInforme, function (KEY, VALOR) {
			if (VALOR.sistema == 'TRADICIONAL') {
				if (arrIdiomas[i]['idioma'] == VALOR.idiomaU) {
					//console.log(arrIdiomas[i]['idioma'], ' valor IDIOMAAAAA');
					arrTradicional[arrIdiomas[i]['idioma']] += 1;
					if(VALOR.sexo == 'MASCULINO'){
						 contaMT++;
					}else{						
						 contaFT++;
					}
				}
			} else if (VALOR.sistema == 'ORAL') {
				if (arrIdiomas[i]['idioma'] == VALOR.idiomaU) {
					arrOral[arrIdiomas[i]['idioma']] += 1;
					if(VALOR.sexo == 'MASCULINO'){
						contaMO++;
					}else{						
						contaFO++;
					}
				}
			}
			
		});
			arrTradicional[arrIdiomas[i]['idioma']+'MT'] = contaMT;
			arrTradicional[arrIdiomas[i]['idioma']+'FT'] = contaFT;
			arrOral[arrIdiomas[i]['idioma']+'MO'] = contaMO;
			arrOral[arrIdiomas[i]['idioma']+'FO'] = contaFO;
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
		var contaMT=0,contaFT=0, contaMO=0, contaFO=0;	
		arrTradicional[arrEtnias[i]['etnia']] = 0;
		arrOral[arrEtnias[i]['etnia']] = 0;
		$.each(jsonInforme, function (KEY, VALOR) {
			if (VALOR.sistema == 'TRADICIONAL') {
				if (arrEtnias[i]['etnia'] == VALOR.etniaU) {
					arrTradicional[arrEtnias[i]['etnia']] += 1;
					if(VALOR.sexo == 'MASCULINO'){
						contaMT++;
				   }else{						
						contaFT++;
				   }
				}
			} else if (VALOR.sistema == 'ORAL') {
				if (arrEtnias[i]['etnia'] == VALOR.etniaU) {
					arrOral[arrEtnias[i]['etnia']] += 1;
					if(VALOR.sexo == 'MASCULINO'){
						contaMO++;
				   }else{						
						contaFO++;
				   }
				}
			}
		});
		arrTradicional[arrEtnias[i]['etnia']+'MT'] = contaMT;
		arrTradicional[arrEtnias[i]['etnia']+'FT'] = contaFT;
		arrOral[arrEtnias[i]['etnia']+'MO'] = contaMO;
		arrOral[arrEtnias[i]['etnia']+'FO'] = contaFO;
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
				arrEtnias[i]['totalT'] += 1;
				obj[arrEtnias[i]['etnia']] = arrEtnias[i]['pos'];
				
				switch(VALOR.sistema){
					case 'TRADICIONAL':

						arrEtnias[i]['totalTra'] += 1;
						obj[arrEtnias[i]['tradicional']] = arrEtnias[i]['totalTra'];
						
					break;
					case 'ORAL':

						arrEtnias[i]['totalOral'] += 1;
						obj[arrEtnias[i]['oral']] = arrEtnias[i]['totalOral'];
						
					break;
				}
				arr.push(obj);
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
	//idiomas = getNumIdiomasUsers(arrIdiomas, jsonInforme);

	return arrIdiomas;
}
function getListaDef(jsonInforme) {
	var arrDefs = [];
	var defs;
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['defensor'] = VALOR.nombreP;		
		arrDefs[KEY] = obj;

	});
	//console.log(arrEtnias, ' VALOR ETNIA');

	var hash = {};
	arrDefs = arrDefs.filter(function (current) {
		var exists = !hash[current.defensor] || false;
		hash[currentm.defensor] = true;
		return exists;
	});
	//aqui arrEtnias ya tiene filtrado las etnias
	//etnias = getNumEtniasUsers(arrEtnias, jsonInforme);

	return arrDefs;
}
function getNumEtniasUsuarios(jsonInforme) {
	var arrEtnias = [];
	var etnias;
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['etnia'] = VALOR.etniaU;		
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
	//etnias = getNumEtniasUsers(arrEtnias, jsonInforme);

	return arrEtnias;
}
function generarRowsIdiomas(jsonData, idiomasSistema) {
	//console.log(etniasSistema[0]['CHATINO'], ' cuantos chatino tradicional ');
	var body = new Array();
	var rowHeader1 = [], rowHeader2 = [],rowHeader3 = [];

	rowHeader1.push(
		{ text: 'Idioma o Lengua', rowSpan:3, style: 'tableHeader', alignment: 'center' },
		{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
		{},{},{},{},{},{}
	);
	rowHeader2.push(
			{},
			{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
			{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
			{},
			{},
			{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
			{},
			{}
	);
	rowHeader3.push(
		{},
		{},
		{ text: 'Total', style: 'tableHeader', alignment: 'center' },
		{ text: 'H', style: 'tableHeader', alignment: 'center' },
		{ text: 'M',style: 'tableHeader', alignment: 'center' },
		{ text: 'Total', style: 'tableHeader', alignment: 'center' },
		{ text: 'H', style: 'tableHeader', alignment: 'center' },
		{ text: 'M',style: 'tableHeader', alignment: 'center' }

	);
	body.push(rowHeader1);
	body.push(rowHeader2);
	body.push(rowHeader3);
	var content = [];
	var totalF = 0, totalT = 0, totalO = 0;
	for (var obj in jsonData) {
		if (jsonData.hasOwnProperty(obj)) {
			for (var prop in jsonData[obj]) {
				if (jsonData[obj].hasOwnProperty(prop)) {
					content = [prop, jsonData[obj][prop], idiomasSistema[0][prop], idiomasSistema[0][prop+'MT'],idiomasSistema[0][prop+'FT'],idiomasSistema[1][prop],idiomasSistema[1][prop+'MO'],idiomasSistema[1][prop+'FO']];
					body.push(content);
					totalF += jsonData[obj][prop];
					totalT += idiomasSistema[0][prop];
					totalO += idiomasSistema[1][prop];
				}
			}
		}
	}
	content = ['TOTAL', totalF, totalT, '','',totalO,'',''];
	body.push(content);
	return body;
}
function generarRowsEtnias(jsonData, etniasSistema, valor) {
	//console.log(etniasSistema[0]['CHATINO'], ' cuantos chatino tradicional ');
	
	var body = new Array();
	var rowHeader1 = [], rowHeader2 = [], rowHeader3=[];
	switch(valor){
		case 'TRADICIONAL':
			rowHeader1.push(
				{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
				{},{},{},{},{},{}
			);
			rowHeader2.push(
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{},
					{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
			);
			rowHeader3.push(
					{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }
		
			);
			body.push(rowHeader1);
			body.push(rowHeader2);
			body.push(rowHeader3);
			var content = [];
			var totalF = 0, totalT = 0, totalO = 0;
			for (var obj in jsonData) {
				if (jsonData.hasOwnProperty(obj)) {
					for (var prop in jsonData[obj]) {
						if (jsonData[obj].hasOwnProperty(prop)) {
							content = [prop, jsonData[obj][prop], etniasSistema[0][prop],etniasSistema[0][prop+'MT'],etniasSistema[0][prop+'FT'], etniasSistema[1][prop],etniasSistema[1][prop+'MO'],etniasSistema[1][prop+'FO']];
							body.push(content);
							totalF += jsonData[obj][prop];
							totalT += etniasSistema[0][prop];
							totalO += etniasSistema[1][prop];
						}
					}
				}
			}
			content = ['TOTAL', totalF, totalT,'','', totalO,'',''];
			body.push(content);
		break;
		case 'ORAL':
		break;;
		case 'JUSTICIA':
		break;
		default:
			rowHeader1.push(
				{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
				{},{},{},{},{},{}
			);
			rowHeader2.push(
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{},
					{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
			);
			rowHeader3.push(
					{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }
		
			);
			body.push(rowHeader1);
			body.push(rowHeader2);
			body.push(rowHeader3);
			var content = [];
			var totalF = 0, totalT = 0, totalO = 0;
			for (var obj in jsonData) {
				if (jsonData.hasOwnProperty(obj)) {
					for (var prop in jsonData[obj]) {
						if (jsonData[obj].hasOwnProperty(prop)) {
							content = [prop, jsonData[obj][prop], etniasSistema[0][prop],etniasSistema[0][prop+'MT'],etniasSistema[0][prop+'FT'], etniasSistema[1][prop],etniasSistema[1][prop+'MO'],etniasSistema[1][prop+'FO']];
							body.push(content);
							totalF += jsonData[obj][prop];
							totalT += etniasSistema[0][prop];
							totalO += etniasSistema[1][prop];
						}
					}
				}
			}
			content = ['TOTAL', totalF, totalT,'','', totalO,'',''];
			body.push(content);
		break;
	}

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
