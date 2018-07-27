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
function getTablaGeneralExp(valor){
	switch(valor){
		case 'TRADICIONAL':
		var exp = jsonInf['tablaGeneralExpDef'];
		//var totalExp= parseInt(jsonInf['tablaGeneralExp'][0].expedientesPorSistema) + parseInt(jsonInf['tablaGeneralExp'][1].expedientesPorSistema);
		var tabla ={};
		var tablaGeneral={};
		tablaGeneral.headerRows= 3;
		var totalT,totalTH, totalTM, totUser;
		$.each(exp,function(i,v){
			switch(i){
				case 0:
					totalT =parseInt(exp[i].expIniciado)+
							parseInt(exp[i].expProceso)+	
							parseInt(exp[i].expBajaRevocacion)+
							parseInt(exp[i].expBajaFalta)+
							parseInt(exp[i].expFinalizacion);
					totalTH=parseInt(exp[i].expIniciadoH)+
							parseInt(exp[i].expProcesoH)+	
							parseInt(exp[i].expBajaRevocacionH)+
							parseInt(exp[i].expBajaFaltaH)+
							parseInt(exp[i].expFinalizacionH);
					totalTM=parseInt(exp[i].expIniciadoM)+
							parseInt(exp[i].expProcesoM)+	
							parseInt(exp[i].expBajaRevocacionM)+
							parseInt(exp[i].expBajaFaltaM)+
							parseInt(exp[i].expFinalizacionM);
				totUser =	parseInt(exp[i].expIniciadoH)+parseInt(exp[i].expIniciadoM)+		
							parseInt(exp[i].expProcesoH)+parseInt(exp[i].expProcesoM)+			
							parseInt(exp[i].expBajaRevocacionH)+parseInt(exp[i].expBajaRevocacionM)+
							parseInt(exp[i].expBajaFaltaH)+parseInt(exp[i].expBajaFaltaM)+	
							parseInt(exp[i].expFinalizacionH)+parseInt(exp[i].expFinalizacionM);
					
				break;
			}
		});
		tablaGeneral.widths= [150, 'auto', 'auto', 'auto','auto'];
		tablaGeneral.body = [
			[
				{ text: 'Expedientes', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Total', rowSpan:3, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan:3, style: 'tableHeader', alignment: 'center' },
				{},{}
			],
			[
				{},
				{},
				{ text: 'Usuarios', rowSpan:2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Tradicional',colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}			
			],
			[
				{},
				{},
				{},
				{ text: 'H', style: 'tableHeader', alignment: 'center' },
				{ text: 'M',style: 'tableHeader', alignment: 'center' }				
			],			
			['INICIADOS',						 	exp[0].expIniciado,			parseInt(exp[0].expIniciadoH)+parseInt(exp[0].expIniciadoM),		exp[0].expIniciadoH,		exp[0].expIniciadoM],
			['EN TRAMITE', 							exp[0].expProceso,			parseInt(exp[0].expProcesoH)+parseInt(exp[0].expProcesoM),			exp[0].expProcesoH,			exp[0].expProcesoM],
			['BAJAS POR REVOCACIÓN DEL DEFENSOR',	exp[0].expBajaRevocacion,	parseInt(exp[0].expBajaRevocacionH)+parseInt(exp[0].expBajaRevocacionM),	exp[0].expBajaRevocacionH,	exp[0].expBajaRevocacionM],
			['BAJAS POR FALTA DE ÍNTERES',			exp[0].expBajaFalta,		parseInt(exp[0].expBajaFaltaH)+parseInt(exp[0].expBajaFaltaM),				exp[0].expBajaFaltaH,		exp[0].expBajaFaltaM],
			['FINALIZADOS',							exp[0].expFinalizacion,		parseInt(exp[0].expFinalizacionH)+parseInt(exp[0].expFinalizacionM),exp[0].expFinalizacionH,	exp[0].expFinalizacionM],
			['TOTAL',totalT,totUser,totalTH,totalTM]
			];
	
		tabla.style = 'tableExample';
		tabla.color = 'black';
		tabla.table = tablaGeneral;
		return tabla;
		break;
		case 'ORAL':

		break;
		default:
			var exp = jsonInf['tablaGeneralExp'];
			//var totalExp= parseInt(jsonInf['tablaGeneralExp'][0].expedientesPorSistema) + parseInt(jsonInf['tablaGeneralExp'][1].expedientesPorSistema);
			var tabla ={};
			var tablaGeneral={};
			tablaGeneral.headerRows= 3;
			var iniciado,proceso,bajaFalta, bajaRevocacion, finalizado, totalT,totalTH, totalTM, totalO,totalOH, totalOM;
			iniciado = parseInt(exp[0].expIniciado) +  parseInt(exp[1].expIniciado);
			proceso = parseInt(exp[0].expProceso) +  parseInt(exp[1].expProceso);
			bajaFalta = parseInt(exp[0].expBajaFalta) +  parseInt(exp[1].expBajaFalta);
			bajaRevocacion= parseInt(exp[0].expBajaRevocacion) +  parseInt(exp[1].expBajaRevocacion);
			finalizado = parseInt(exp[0].expFinalizacion) +  parseInt(exp[1].expFinalizacion);
			var total = iniciado + proceso + bajaFalta + bajaRevocacion+ finalizado;
			$.each(exp,function(i,v){

				switch(i){
					case 0://oral
						totalO =parseInt(exp[i].expIniciado)+
								parseInt(exp[i].expProceso)+	
								parseInt(exp[i].expBajaRevocacion)+
								parseInt(exp[i].expBajaFalta)+
								parseInt(exp[i].expFinalizacion);
						totalOH=parseInt(exp[i].expIniciadoH)+
								parseInt(exp[i].expProcesoH)+	
								parseInt(exp[i].expBajaRevocacionH)+
								parseInt(exp[i].expBajaFaltaH)+
								parseInt(exp[i].expFinalizacionH);
						totalOM=parseInt(exp[i].expIniciadoM)+
								parseInt(exp[i].expProcesoM)+	
								parseInt(exp[i].expBajaRevocacionM)+
								parseInt(exp[i].expBajaFaltaM)+
								parseInt(exp[i].expFinalizacionM);

					break;
					case 1:
						totalT =parseInt(exp[i].expIniciado)+
								parseInt(exp[i].expProceso)+	
								parseInt(exp[i].expBajaRevocacion)+
								parseInt(exp[i].expBajaFalta)+
								parseInt(exp[i].expFinalizacion);
						totalTH=parseInt(exp[i].expIniciadoH)+
								parseInt(exp[i].expProcesoH)+	
								parseInt(exp[i].expBajaRevocacionH)+
								parseInt(exp[i].expBajaFaltaH)+
								parseInt(exp[i].expFinalizacionH);
						totalTM=parseInt(exp[i].expIniciadoM)+
								parseInt(exp[i].expProcesoM)+	
								parseInt(exp[i].expBajaRevocacionM)+
								parseInt(exp[i].expBajaFaltaM)+
								parseInt(exp[i].expFinalizacionM);
					break;

				}
			});
			tablaGeneral.widths= [150, 'auto', 'auto', 'auto','auto', 'auto', 'auto', 'auto'];
			tablaGeneral.body = [
				[
					{ text: 'Expedientes', rowSpan:3, style: 'tableHeader', alignment: 'center' },
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
				['INICIADOS',						 iniciado,		exp[1].expIniciado,		exp[1].expIniciadoH,		exp[1].expIniciadoM,		exp[0].expIniciado,		exp[0].expIniciadoH,		exp[0].expIniciadoM],
				['EN TRAMITE', 						 proceso,		exp[1].expProceso,		exp[1].expProcesoH,			exp[1].expProcesoM,			exp[0].expProceso,		exp[0].expProcesoH,			exp[0].expProcesoM],
				['BAJAS POR REVOCACIÓN DEL DEFENSOR',bajaRevocacion,exp[1].expBajaRevocacion,exp[1].expBajaRevocacionH,	exp[1].expBajaRevocacionM,	exp[0].expBajaRevocacion,exp[0].expBajaRevocacionH,	exp[0].expBajaRevocacionM],
				['BAJAS POR FALTA DE ÍNTERES',		 bajaFalta,		exp[1].expBajaFalta,	exp[1].expBajaFaltaH,		exp[1].expBajaFaltaM,		exp[0].expBajaFalta,	exp[0].expBajaFaltaH,		exp[0].expBajaFaltaM],
				['FINALIZADOS',						 finalizado,	exp[1].expFinalizacion,	exp[1].expFinalizacionH,	exp[1].expFinalizacionM,	exp[0].expFinalizacion,	exp[0].expFinalizacionH,	exp[0].expFinalizacionM],
				['TOTAL', total,totalT,totalTH,totalTM,totalO,totalOH,totalOM]
				];
		
			tabla.style = 'tableExample';
			tabla.color = 'black';
			tabla.table = tablaGeneral;
			return tabla;
		break;
	}

	
}
function getTablaActividades(valor){
	switch(valor){
		case 'TRADICIONAL':
			return{
				style : 'tableExample',
					color : 'black',
					table:{
						widths:['auto','auto','auto','auto','auto','auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'],
						headerRows: 1,
						body: generarCuerpoActiT()
				}
			};			
		break;
		case 'ORAL':

		break;
		default:
		return{
			style : 'tableExample',
				color : 'black',
				table:{
					widths:['auto','auto','auto','auto','auto','auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'],
					headerRows: 1,
					body: generarCuerpoActi()
			}
			};
		break;
	}

	
}
function generarCuerpoActiT(){
	var sourceData = jsonInf['tablaActExpDef'];
	var bodyData = [];	
		
	bodyData.push(
		[
			{ text: 'Materia', style: 'tableHeader', alignment: 'center' },
			{ text: 'Ins.', style: 'tableHeader', alignment: 'center' },
			{ text: 'Sistema', style: 'tableHeader', alignment: 'center' },
			{ text: 'Total', style: 'tableHeader', alignment: 'center' },
			{ text: 'A.', style: 'tableHeader', alignment: 'center' },
			{ text: 'H.', style: 'tableHeader', alignment: 'center' },
			{ text: 'M.', style: 'tableHeader', alignment: 'center' },
			{ text: 'Au.', style: 'tableHeader', alignment: 'center' },
			{ text: 'H.', style: 'tableHeader', alignment: 'center' },
			{ text: 'M.', style: 'tableHeader', alignment: 'center' },
			{ text: 'V.C.', style: 'tableHeader', alignment: 'center' },
			{ text: 'H.', style: 'tableHeader', alignment: 'center' },
			{ text: 'M.', style: 'tableHeader', alignment: 'center' }]
	);		
	var totalFi=0, totalAse=0, totalAud=0, totalVis=0, tah=0,tam=0,tauh=0,taum=0,tvh=0,tvm=0;
			sourceData.forEach(function(VAL) {								
					var dataRow = [];		
					var sis;
					if(VAL.sis == 'TRADICIONAL' ){
						sis = 'Tradicional';
					}else{
					  sis='Oral';
				   }
				   totalFi += parseInt(VAL.idAct);
				   totalAse += parseInt(VAL.asesoria);
				   tah += parseInt(VAL.aseH);
				   tam += parseInt(VAL.aseM);
				   totalAud += parseInt(VAL.audiencias);
				   tauh+= parseInt(VAL.audH);
				   taum+=parseInt(VAL.audM);
				   totalVis += parseInt(VAL.visitas);
				   tvh+=parseInt(VAL.visH);
				   tvm+=parseInt(VAL.visM);
					//dataRow.push(sis, VAL.materia, '', '', '', '', '','','', '','','');
					dataRow.push(VAL.mate,VAL.ins,sis,VAL.idAct, VAL.asesoria, VAL.aseH, VAL.aseM, VAL.audiencias,VAL.audH,VAL.audM,VAL.visitas,VAL.visH,VAL.visM);
					bodyData.push(dataRow);
				
			});
		
		bodyData.push(['TOTAL', '-','-', totalFi, totalAse, tah, tam, totalAud,tauh,taum, totalVis,tvh,tvm]);
		//console.log(bodyData, ' bodydata');
		return bodyData;

}
function generarCuerpoActi(){
	var sourceData = jsonInf['tablaActExp'];
	var bodyData = [];	
		
			bodyData.push(
					[
						{ text: 'Materia', style: 'tableHeader', alignment: 'center' },
						{ text: 'Ins.', style: 'tableHeader', alignment: 'center' },
						{ text: 'Sistema', style: 'tableHeader', alignment: 'center' },
						{ text: 'Total', style: 'tableHeader', alignment: 'center' },
						{ text: 'A.', style: 'tableHeader', alignment: 'center' },
						{ text: 'H.', style: 'tableHeader', alignment: 'center' },
						{ text: 'M.', style: 'tableHeader', alignment: 'center' },
						{ text: 'Au.', style: 'tableHeader', alignment: 'center' },
						{ text: 'H.', style: 'tableHeader', alignment: 'center' },
						{ text: 'M.', style: 'tableHeader', alignment: 'center' },
						{ text: 'V.C.', style: 'tableHeader', alignment: 'center' },
						{ text: 'H.', style: 'tableHeader', alignment: 'center' },
						{ text: 'M.', style: 'tableHeader', alignment: 'center' }]
			);

	var totalFi=0, totalAse=0, totalAud=0, totalVis=0, tah=0,tam=0,tauh=0,taum=0,tvh=0,tvm=0;
			sourceData.forEach(function(VAL) {								
					var dataRow = [];		
					var sis;
					if(VAL.sis == 'TRADICIONAL' ){
						sis = 'Tradicional';
					}else{
					  sis='Oral';
				   }
				   totalFi += parseInt(VAL.idAct);
				   totalAse += parseInt(VAL.asesoria);
				   tah += parseInt(VAL.aseH);
				   tam += parseInt(VAL.aseM);
				   totalAud += parseInt(VAL.audiencias);
				   tauh+= parseInt(VAL.audH);
				   taum+=parseInt(VAL.audM);
				   totalVis += parseInt(VAL.visitas);
				   tvh+=parseInt(VAL.visH);
				   tvm+=parseInt(VAL.visM);
					//dataRow.push(sis, VAL.materia, '', '', '', '', '','','', '','','');
					dataRow.push(VAL.mate,VAL.ins,sis,VAL.idAct, VAL.asesoria, VAL.aseH, VAL.aseM, VAL.audiencias,VAL.audH,VAL.audM,VAL.visitas,VAL.visH,VAL.visM);
					bodyData.push(dataRow);
				
			});
		
		bodyData.push(['TOTAL', '-','-', totalFi, totalAse, tah, tam, totalAud,tauh,taum, totalVis,tvh,tvm]);
		//console.log(bodyData, ' bodydata');
		return bodyData;

}
function getTablaSexoExp(valor){
	//sexos = getNumSexoUsuarios(jsonInf);
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 2;
	switch(valor){
		case 'TRADICIONAL':
		var sexo= jsonInf['tablaSexoExpDef'];
		var th,tm, oh,om;
		$.each(sexo, function(key,val){
			switch(val.sexoUs)
			{
				case 'MASCULINO':
					if(val.sistema=='TRADICIONAL'){
						th = parseInt(val.totalUsuarios);
					}else{
						oh = parseInt(val.totalUsuarios);
					}
				break;
					case 'FEMENINO':				
					if(val.sistema=='ORAL'){
						om= parseInt(val.totalUsuarios);
					}else{
						tm= parseInt(val.totalUsuarios);
					}
				break;
			}
		});
		var hs,ms,tt, st,so;
		st=th+tm;
		so = oh+om;
		hs = th;
		ms = tm;
		tt=hs+ms;
		tablaGeneral.widths=  [100, 'auto', 'auto'];
		tablaGeneral.body = [
			[
				{ text: 'Sexo', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
				{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
				{}
			],
			[
				{},
				{ text: 'Usuarios', style: 'tableHeader', alignment: 'center' },
				{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' }				
			],
			['Hombre', hs, th],
			['Mujer',  ms, tm],
			['Total',  tt, st]
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
		var sexo= jsonInf['tablaSexoExp'];
		var th,tm, oh,om;
		$.each(sexo, function(key,val){
			switch(val.sexoUs)
			{
				case 'MASCULINO':
					if(val.sistema=='TRADICIONAL'){
						th = parseInt(val.totalUsuarios);
					}else{
						oh = parseInt(val.totalUsuarios);
					}
				break;
					case 'FEMENINO':				
					if(val.sistema=='ORAL'){
						om= parseInt(val.totalUsuarios);
					}else{
						tm= parseInt(val.totalUsuarios);
					}
				break;
			}
		});
		var hs,ms,tt, st,so;
		st=th+tm;
		so = oh+om;
		hs = th+oh;
		ms = tm+om;
		tt=hs+ms;
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
			['Hombre', hs, th, oh],
			['Mujer',  ms, tm, om],
			['Total',  tt, st, so]
		];	
		break;
	}
	
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function getTablaGeneroExp(valor){
	//generos = getNumGeneroUsuarios(jsonInf);
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 2;

	switch(valor){
		case 'TRADICIONAL':
				var gen = jsonInf['tablaGeneroExpDef'];
				var lesT=0,lesO=0, gayT=0, gayO=0, biT=0, biO=0, transexualT=0, transexualO=0, transgeneroT=0, transgeneroO=0, travT=0, travO=0,intT=0, intO=0;
				var totalT,totalO, totalF, 
					totLes, totGay, totBit,totTransexual, totTransgenero, totTrav, totInt;
				
				/* gen = $.each(gen,function(k,v){
					console.log(v, 'VALOR VVVV');
				}); */
				$.each(gen, function(key, val){
					switch(val.generoUs){
						case'LESBICO':
							if(val.sistema=='TRADICIONAL'){
								lesT= parseInt(val.totalUsuarios); 
							}
							if(val.sistema=='ORAL'){
								lesO= parseInt(val.totalUsuarios); 
							}
						break;
						case 'GAY':						
							if(val.sistema=='TRADICIONAL'){
								gayT= parseInt(val.totalUsuarios); 
							}
							if(val.sistema=='ORAL'){
								gayO= parseInt(val.totalUsuarios); 
							}				
						break;
						case'BISEXUAL':
							if(val.sistema=='TRADICIONAL'){
								biT= parseInt(val.totalUsuarios); 
							}
							if(val.sistema=='ORAL'){
								biO= parseInt(val.totalUsuarios); 
							}
						break;
						case 'TRANSEXUAL':
							if(val.sistema=='TRADICIONAL'){
								transexualT= parseInt(val.totalUsuarios); 
							}
							if(val.sistema=='ORAL'){
								transexualO= parseInt(val.totalUsuarios); 
							}
						break;
						case'TRANSGENERO':
							if(val.sistema=='TRADICIONAL'){
								transgeneroT= parseInt(val.totalUsuarios); 
							}
							if(val.sistema=='ORAL'){
								transgeneroO= parseInt(val.totalUsuarios); 
							}
						break;
						case 'TRAVESTI':
							if(val.sistema=='TRADICIONAL'){
								travT= parseInt(val.totalUsuarios); 
							}
							if(val.sistema=='ORAL'){
								travO= parseInt(val.totalUsuarios); 
							}
						break;
						case'INTERSEXUAL':

							if(val.sistema=='TRADICIONAL'){
								intT= parseInt(val.totalUsuarios); 
							}
							if(val.sistema=='ORAL'){
								intO= parseInt(val.totalUsuarios); 
							}
						break;
						default:
							
						break;					

					}
				});
				totalT = lesT + gayT + biT + transexualT + transgeneroT + travT + intT;
				totalO = lesO + gayO + biO + transexualO + transgeneroO + travO + intO;
				totLes = lesT ;
				totGay = gayT ;
				totBit = biT ;
				totTransexual = transexualT ;
				totTransgenero = transgeneroT ;
				totTrav = travT ;
				totInt = intT ;
				totalF = totalT ;
				tablaGeneral.widths=  [150, 'auto', 'auto'];
				tablaGeneral.body = [
					[
						{ text: 'Género', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
						{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
						{}
					],
					[
						{},
						{ text: 'Total', style: 'tableHeader', alignment: 'center' },
						{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' }
					],
					['Lésbico',totLes, lesT],
					['Gay', totGay, gayT],
					['Bisexual', totBit, biT],
					['Transexual', totTransexual, transexualT],
					['Transgénero', totTransgenero, transgeneroT],
					['Travestí', totTrav, travT],
					['Intersexual', totInt, intT],
					['Total', totalF, totalT]
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
			var gen = jsonInf['tablaGeneroExp'];
			var lesT=0,lesO=0, gayT=0, gayO=0, biT=0, biO=0, transexualT=0, transexualO=0, transgeneroT=0, transgeneroO=0, travT=0, travO=0,intT=0, intO=0;
			var totalT,totalO, totalF, 
				totLes, totGay, totBit,totTransexual, totTransgenero, totTrav, totInt;
			
			/* gen = $.each(gen,function(k,v){
				console.log(v, 'VALOR VVVV');
			}); */
			$.each(gen, function(key, val){
				switch(val.generoUs){
					case'LESBICO':
						if(val.sistema=='TRADICIONAL'){
							lesT= parseInt(val.totalUsuarios); 
						}
						if(val.sistema=='ORAL'){
							lesO= parseInt(val.totalUsuarios); 
						}
					break;
					case 'GAY':						
						if(val.sistema=='TRADICIONAL'){
							gayT= parseInt(val.totalUsuarios); 
						}
						if(val.sistema=='ORAL'){
							gayO= parseInt(val.totalUsuarios); 
						}				
					break;
					case'BISEXUAL':
						if(val.sistema=='TRADICIONAL'){
							biT= parseInt(val.totalUsuarios); 
						}
						if(val.sistema=='ORAL'){
							biO= parseInt(val.totalUsuarios); 
						}
					break;
					case 'TRANSEXUAL':
						if(val.sistema=='TRADICIONAL'){
							transexualT= parseInt(val.totalUsuarios); 
						}
						if(val.sistema=='ORAL'){
							transexualO= parseInt(val.totalUsuarios); 
						}
					break;
					case'TRANSGENERO':
						if(val.sistema=='TRADICIONAL'){
							transgeneroT= parseInt(val.totalUsuarios); 
						}
						if(val.sistema=='ORAL'){
							transgeneroO= parseInt(val.totalUsuarios); 
						}
					break;
					case 'TRAVESTI':
						if(val.sistema=='TRADICIONAL'){
							travT= parseInt(val.totalUsuarios); 
						}
						if(val.sistema=='ORAL'){
							travO= parseInt(val.totalUsuarios); 
						}
					break;
					case'INTERSEXUAL':

						if(val.sistema=='TRADICIONAL'){
							intT= parseInt(val.totalUsuarios); 
						}
						if(val.sistema=='ORAL'){
							intO= parseInt(val.totalUsuarios); 
						}
					break;
					default:
						
					break;					

				}
			});
			totalT = lesT + gayT + biT + transexualT + transgeneroT + travT + intT;
			totalO = lesO + gayO + biO + transexualO + transgeneroO + travO + intO;
			totLes = lesT + lesO;
			totGay = gayT + gayO;
			totBit = biT + biO;
			totTransexual = transexualT + transexualO;
			totTransgenero = transgeneroT + transgeneroO;
			totTrav = travT + travO;
			totInt = intT + intO;
			totalF = totalT + totalO;
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
				['Lésbico',totLes, lesT,lesO],
				['Gay', totGay, gayT,gayO],
				['Bisexual', totBit, biT,biO],
				['Transexual', totTransexual, transexualT,transexualO],
				['Transgénero', totTransgenero, transgeneroT,transgeneroO],
				['Travestí', totTrav, travT,travO],
				['Intersexual', totInt, intT,intO],
				['Total', totalF, totalT,totalO]
			];
		break;
	}

	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	//console.log(tabla);
	return tabla;
}
function getTablaEdadExp(valor){
	//edades = getNumEdadUsuarios(jsonInf);
	var tabla ={};
	var tablaGeneral={};		
	tablaGeneral.headerRows= 3;
	
	switch(valor){
		case 'TRADICIONAL':
		var edad= jsonInf['tablaEdadExpDef'];
		//edad = validarEdadP(edad);
		var totalT1824,totalO1824, totalT2529, totalO2529, totalT3034, totalO3034, totalT3539, totalO3539,
			totalT4044, totalO4044, totalT4549,totalO4549,totalT5054, totalO5054, totalT5559, totalO5559, totalT60, totalO60,
			hT=0,mT=0,hO=0, mO=0;
			hT= parseInt(edad[0].edad18_24H)+
				parseInt(edad[0].edad25_29H)+
				parseInt(edad[0].edad30_34H)+
				parseInt(edad[0].edad35_39H)+
				parseInt(edad[0].edad40_44H)+
				parseInt(edad[0].edad45_49H)+
				parseInt(edad[0].edad50_54H)+
				parseInt(edad[0].edad55_59H)+
				parseInt(edad[0].edad60MasH);

			mT= parseInt(edad[0].edad18_24M)+
				parseInt(edad[0].edad25_29M)+
				parseInt(edad[0].edad30_34M)+
				parseInt(edad[0].edad35_39M)+
				parseInt(edad[0].edad40_44M)+
				parseInt(edad[0].edad45_49M)+
				parseInt(edad[0].edad50_54M)+
				parseInt(edad[0].edad55_59M)+
				parseInt(edad[0].edad60MasM);

			/* hO= parseInt(edad[0].edad18_24H)+
				parseInt(edad[0].edad25_29H)+
				parseInt(edad[0].edad30_34H)+
				parseInt(edad[0].edad35_39H)+
				parseInt(edad[0].edad40_44H)+
				parseInt(edad[0].edad45_49H)+
				parseInt(edad[0].edad50_54H)+
				parseInt(edad[0].edad55_59H)+
				parseInt(edad[0].edad60MasH);

			mO= parseInt(edad[0].edad18_24M)+
				parseInt(edad[0].edad25_29M)+
				parseInt(edad[0].edad30_34M)+
				parseInt(edad[0].edad35_39M)+
				parseInt(edad[0].edad40_44M)+
				parseInt(edad[0].edad45_49M)+
				parseInt(edad[0].edad50_54M)+
				parseInt(edad[0].edad55_59M)+
				parseInt(edad[0].edad60MasM); */							
			totalT1824 = parseInt(edad[0].edad18_24H)+parseInt(edad[0].edad18_24M);
			//totalO1824 = parseInt(edad[0].edad18_24H)+parseInt(edad[0].edad18_24M);
			totalT2529 = parseInt(edad[0].edad25_29H)+parseInt(edad[0].edad25_29M);
			//totalO2529 = parseInt(edad[0].edad25_29H)+parseInt(edad[0].edad25_29M);
			totalT3034 = parseInt(edad[0].edad30_34H)+parseInt(edad[0].edad30_34M);
			//totalO3034 = parseInt(edad[0].edad30_34H)+parseInt(edad[0].edad30_34M);
			totalT3539 = parseInt(edad[0].edad35_39H)+parseInt(edad[0].edad35_39M);
			//totalO3539 = parseInt(edad[0].edad35_39H)+parseInt(edad[0].edad35_39M);
			totalT4044 = parseInt(edad[0].edad40_44H)+parseInt(edad[0].edad40_44M);
			//totalO4044 = parseInt(edad[0].edad40_44H)+parseInt(edad[0].edad40_44M);
			totalT4549 = parseInt(edad[0].edad45_49H)+parseInt(edad[0].edad45_49M);
			//totalO4549 = parseInt(edad[0].edad45_49H)+parseInt(edad[0].edad45_49M);
			totalT5054 = parseInt(edad[0].edad50_54H)+parseInt(edad[0].edad50_54M);
			//totalO5054 = parseInt(edad[0].edad50_54H)+parseInt(edad[0].edad50_54M);
			totalT5559 = parseInt(edad[0].edad55_59H)+parseInt(edad[0].edad55_59M);
			//totalO5559 = parseInt(edad[0].edad55_59H)+parseInt(edad[0].edad55_59M);
			totalT60   = parseInt(edad[0].edad60MasH)+parseInt(edad[0].edad60MasM);
			//totalO60   = parseInt(edad[0].edad60MasH)+parseInt(edad[0].edad60MasM);		
			totalEdad1 = totalT1824;// + totalO1824;
			totalEdad2 = totalT2529;// + totalO2529;
			totalEdad3 = totalT3034;// + totalO3034;
			totalEdad4 = totalT3539;// + totalO3539;
			totalEdad5 = totalT4044;// + totalO4044;
			totalEdad6 = totalT4549;// + totalO4549;
			totalEdad7 = totalT5054;// + totalO5054;
			totalEdad8 = totalT5559;// + totalO5559;
			totalEdad9 = totalT60; 	//   + totalO60;
			totalEdadS = totalEdad1 +  totalEdad2 +  totalEdad3 +  totalEdad4 +  totalEdad5 +  totalEdad6 +  totalEdad7 +  totalEdad8 +  totalEdad9;
	
		tablaGeneral.widths= ['auto', 'auto', 'auto', 'auto','auto'];
		tablaGeneral.body = [
		[
			{ text: 'Edad', rowSpan:3, style: 'tableHeader', alignment: 'center' },
			{ text: 'Sistema de justicia', colSpan:4, style: 'tableHeader', alignment: 'center' },
			{},{},{}
		],
		[
			{},
			{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
			{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
			{},
			{}
			
		],
		[
			{},
			{},
			{ text: 'Total', style: 'tableHeader', alignment: 'center' },
			{ text: 'H', style: 'tableHeader', alignment: 'center' },
			{ text: 'M',style: 'tableHeader', alignment: 'center' }
			
		],
		['18 A 24 AÑOS',	totalEdad1, totalT1824, edad[0].edad18_24H,edad[0].edad18_24M],// totalO1824,edad[0].edad18_24H,edad[0].edad18_24M],
		['25 A 29 AÑOS',	totalEdad2, totalT2529, edad[0].edad25_29H,edad[0].edad25_29M],// totalO2529,edad[0].edad25_29H,edad[0].edad25_29M],
		['30 A 34 AÑOS',	totalEdad3, totalT3034, edad[0].edad30_34H,edad[0].edad30_34M],// totalO3034,edad[0].edad30_34H,edad[0].edad30_34M],
		['35 A 39 AÑOS',	totalEdad4, totalT3539, edad[0].edad35_39H,edad[0].edad35_39M],// totalO3539,edad[0].edad35_39H,edad[0].edad35_39M],
		['40 A 44 AÑOS',	totalEdad5, totalT4044, edad[0].edad40_44H,edad[0].edad40_44M],// totalO4044,edad[0].edad40_44H,edad[0].edad40_44M],
		['45 A 49 AÑOS',	totalEdad6, totalT4549, edad[0].edad45_49H,edad[0].edad45_49M],// totalO4549,edad[0].edad45_49H,edad[0].edad45_49M],
		['50 A 54 AÑOS',	totalEdad7, totalT5054, edad[0].edad50_54H,edad[0].edad50_54M],// totalO5054,edad[0].edad50_54H,edad[0].edad50_54M],
		['55 A 59 AÑOS',	totalEdad8, totalT5559, edad[0].edad55_59H,edad[0].edad55_59M],// totalO5559,edad[0].edad55_59H,edad[0].edad55_59M],
		['DE 60 O MAS AÑOS',totalEdad9, totalT60,   edad[0].edad60MasH,edad[0].edad60MasM],// totalO60,  edad[0].edad60MasH,edad[0].edad60MasM],
		['TOTAL', 			totalEdadS, edad[0].totalSistema,hT,mT]//, edad[0].totalSistema,hO,mO] 
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
			var edad= jsonInf['tablaEdadExp'];
			edad = validarEdad(edad);

			var totalT1824,totalO1824, totalT2529, totalO2529, totalT3034, totalO3034, totalT3539, totalO3539,
				totalT4044, totalO4044, totalT4549,totalO4549,totalT5054, totalO5054, totalT5559, totalO5559, totalT60, totalO60,
				hT=0,mT=0,hO=0, mO=0;
				hT= parseInt(edad[1].edad18_24H)+
					parseInt(edad[1].edad25_29H)+
					parseInt(edad[1].edad30_34H)+
					parseInt(edad[1].edad35_39H)+
					parseInt(edad[1].edad40_44H)+
					parseInt(edad[1].edad45_49H)+
					parseInt(edad[1].edad50_54H)+
					parseInt(edad[1].edad55_59H)+
					parseInt(edad[1].edad60MasH);

				mT= parseInt(edad[1].edad18_24M)+
					parseInt(edad[1].edad25_29M)+
					parseInt(edad[1].edad30_34M)+
					parseInt(edad[1].edad35_39M)+
					parseInt(edad[1].edad40_44M)+
					parseInt(edad[1].edad45_49M)+
					parseInt(edad[1].edad50_54M)+
					parseInt(edad[1].edad55_59M)+
					parseInt(edad[1].edad60MasM);

				hO= parseInt(edad[0].edad18_24H)+
					parseInt(edad[0].edad25_29H)+
					parseInt(edad[0].edad30_34H)+
					parseInt(edad[0].edad35_39H)+
					parseInt(edad[0].edad40_44H)+
					parseInt(edad[0].edad45_49H)+
					parseInt(edad[0].edad50_54H)+
					parseInt(edad[0].edad55_59H)+
					parseInt(edad[0].edad60MasH);

				mO= parseInt(edad[0].edad18_24M)+
					parseInt(edad[0].edad25_29M)+
					parseInt(edad[0].edad30_34M)+
					parseInt(edad[0].edad35_39M)+
					parseInt(edad[0].edad40_44M)+
					parseInt(edad[0].edad45_49M)+
					parseInt(edad[0].edad50_54M)+
					parseInt(edad[0].edad55_59M)+
					parseInt(edad[0].edad60MasM);
					
				
		totalT1824 = parseInt(edad[1].edad18_24H)+parseInt(edad[1].edad18_24M);
		totalO1824 = parseInt(edad[0].edad18_24H)+parseInt(edad[0].edad18_24M);
		totalT2529 = parseInt(edad[1].edad25_29H)+parseInt(edad[1].edad25_29M);
		totalO2529 = parseInt(edad[0].edad25_29H)+parseInt(edad[0].edad25_29M);
		totalT3034 = parseInt(edad[1].edad30_34H)+parseInt(edad[1].edad30_34M);
		totalO3034 = parseInt(edad[0].edad30_34H)+parseInt(edad[0].edad30_34M);
		totalT3539 = parseInt(edad[1].edad35_39H)+parseInt(edad[1].edad35_39M);
		totalO3539 = parseInt(edad[0].edad35_39H)+parseInt(edad[0].edad35_39M);
		totalT4044 = parseInt(edad[1].edad40_44H)+parseInt(edad[1].edad40_44M);
		totalO4044 = parseInt(edad[0].edad40_44H)+parseInt(edad[0].edad40_44M);
		totalT4549 = parseInt(edad[1].edad45_49H)+parseInt(edad[1].edad45_49M);
		totalO4549 = parseInt(edad[0].edad45_49H)+parseInt(edad[0].edad45_49M);
		totalT5054 = parseInt(edad[1].edad50_54H)+parseInt(edad[1].edad50_54M);
		totalO5054 = parseInt(edad[0].edad50_54H)+parseInt(edad[0].edad50_54M);
		totalT5559 = parseInt(edad[1].edad55_59H)+parseInt(edad[1].edad55_59M);
		totalO5559 = parseInt(edad[0].edad55_59H)+parseInt(edad[0].edad55_59M);
		totalT60   = parseInt(edad[1].edad60MasH)+parseInt(edad[1].edad60MasM);
		totalO60   = parseInt(edad[0].edad60MasH)+parseInt(edad[0].edad60MasM);

		 		
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
			],/* 
			['18 A 24 AÑOS',	'','','','','','',''],
			['25 A 29 AÑOS',	'','','','','','',''],
			['30 A 34 AÑOS',	'','','','','','',''],
			['35 A 39 AÑOS',	'','','','','','',''],
			['40 A 44 AÑOS',	'','','','','','',''],
			['45 A 49 AÑOS',	'','','','','','',''],
			['50 A 54 AÑOS',	'','','','','','',''],
			['55 A 59 AÑOS',	'','','','','','',''],
			['DE 60 O MAS AÑOS','','','','','','',''],
			['TOTAL', 			'','','','','','','']  */
			['18 A 24 AÑOS',	totalEdad1, totalT1824, edad[1].edad18_24H,edad[1].edad18_24M, totalO1824,edad[0].edad18_24H,edad[0].edad18_24M],
			['25 A 29 AÑOS',	totalEdad2, totalT2529, edad[1].edad25_29H,edad[1].edad25_29M, totalO2529,edad[0].edad25_29H,edad[0].edad25_29M],
			['30 A 34 AÑOS',	totalEdad3, totalT3034, edad[1].edad30_34H,edad[1].edad30_34M, totalO3034,edad[0].edad30_34H,edad[0].edad30_34M],
			['35 A 39 AÑOS',	totalEdad4, totalT3539, edad[1].edad35_39H,edad[1].edad35_39M, totalO3539,edad[0].edad35_39H,edad[0].edad35_39M],
			['40 A 44 AÑOS',	totalEdad5, totalT4044, edad[1].edad40_44H,edad[1].edad40_44M, totalO4044,edad[0].edad40_44H,edad[0].edad40_44M],
			['45 A 49 AÑOS',	totalEdad6, totalT4549, edad[1].edad45_49H,edad[1].edad45_49M, totalO4549,edad[0].edad45_49H,edad[0].edad45_49M],
			['50 A 54 AÑOS',	totalEdad7, totalT5054, edad[1].edad50_54H,edad[1].edad50_54M, totalO5054,edad[0].edad50_54H,edad[0].edad50_54M],
			['55 A 59 AÑOS',	totalEdad8, totalT5559, edad[1].edad55_59H,edad[1].edad55_59M, totalO5559,edad[0].edad55_59H,edad[0].edad55_59M],
			['DE 60 O MAS AÑOS',totalEdad9, totalT60,   edad[1].edad60MasH,edad[1].edad60MasM, totalO60,  edad[0].edad60MasH,edad[0].edad60MasM],
			['TOTAL', 			totalEdadS, edad[1].totalSistema,hT,mT, edad[0].totalSistema,hO,mO] 
		];
	
		break;
	}
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function getTablaEtniasExp(valor){	
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
					widths:  ['auto', 'auto', 'auto', 'auto','auto'],
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
				{ text: 'Expedientes', rowSpan:2, style: 'tableHeader', alignment: 'center' },
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
	var sourceData = jsonInf['tablaIdiomaExp'];
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
		var totalF=0, totT=0, totO=0, totHT=0, totMT=0, totHO=0, totMO=0;
		for(var i=0; i<listaIdiomas.length; i++){
			sourceData.forEach(function(VAL) {
				if(listaIdiomas[i].idioma == VAL.idiomaUs){						
					var dataRow = [];	
					var idiomaT= parseInt(VAL.hombresT)+parseInt(VAL.mujeresT);
					var idiomaO= parseInt(VAL.hombresO)+parseInt(VAL.mujeresO);
					dataRow.push(listaIdiomas[i].idioma,VAL.totalUsuarios,idiomaT,VAL.hombresT,VAL.mujeresT,idiomaO,VAL.hombresO,VAL.mujeresO);
					bodyData.push(dataRow);
					totalFinal += parseInt(VAL.totalUsuarios);
					totT +=idiomaT;
					totO +=idiomaO;
					totHT += parseInt(VAL.hombresT);
					totMT += parseInt(VAL.mujeresT);
					totHO += parseInt(VAL.hombresO);
					totMO += parseInt(VAL.mujeresO);
				}
			});
		}
		bodyData.push(['TOTAL', totalFinal,totT,totHT,totMT,totO,totHO,totMO]);
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
function getTablaIdiomasExp(valor){
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
					widths:  ['auto', 'auto', 'auto', 'auto','auto'],
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
function getTablaDiscapacidadExp(valor){
	var tabla ={};
	var tablaGeneral={};
	tablaGeneral.headerRows= 3;
	switch(valor){
		case 'TRADICIONAL':
			return{
					style : 'tableExample',
					color : 'black',
					table:{
						widths: ['auto', 'auto', 'auto', 'auto','auto'],
						headerRows: 3,					
						body: generarCuerpoDiscapacidadP()
					}				
			}
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
			return{
					style : 'tableExample',
					color : 'black',
					table:{
						widths: ['auto', 'auto', 'auto', 'auto','auto', 'auto', 'auto', 'auto'],
						headerRows: 3,					
						body: generarCuerpoDiscapacidad()
					}				
			}
		break;
	}
	
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;
}
function getTablaMateria(valor){
	var tabla ={};
	var tablaGeneral={};		
	tablaGeneral.headerRows= 1;
	
	switch(valor){
		case 'TRADICIONAL':
				var mat= jsonInf['tablaMateriaExpDef'];
				var totExp=0, totU=0, totH=0, totM=0;

					totExp= parseInt(mat[0].penalTExp)+
							parseInt(mat[0].ejecucionTExp)+
							parseInt(mat[0].civilTExp)+
							parseInt(mat[0].familiarTExp)+
							parseInt(mat[0].agrarioTExp)+
							parseInt(mat[0].mercantilTExp)+
							parseInt(mat[0].tribunalTExp)+
							parseInt(mat[0].amparosTExp)+
							parseInt(mat[0].penalOExp);

					totU=	parseInt(mat[0].penalT)+
							parseInt(mat[0].ejecucionT)+
							parseInt(mat[0].civilT)+
							parseInt(mat[0].familiarT)+
							parseInt(mat[0].agrarioT)+
							parseInt(mat[0].mercantilT)+
							parseInt(mat[0].tribunalT)+
							parseInt(mat[0].amparosT)+
							parseInt(mat[0].penalO);

					totH = 	parseInt(mat[0].penalTH)+
							parseInt(mat[0].ejecucionTH)+
							parseInt(mat[0].civilTH)+
							parseInt(mat[0].familiarTH)+
							parseInt(mat[0].agrarioTH)+
							parseInt(mat[0].mercantilTH)+
							parseInt(mat[0].tribunalTH)+
							parseInt(mat[0].amparosTH)+
							parseInt(mat[0].penalOH);
					
					totM =  parseInt(mat[0].penalTM)+
							parseInt(mat[0].ejecucionTM)+
							parseInt(mat[0].civilTM)+
							parseInt(mat[0].familiarTM)+
							parseInt(mat[0].agrarioTM)+
							parseInt(mat[0].mercantilTM)+
							parseInt(mat[0].tribunalTM)+
							parseInt(mat[0].amparosTM)+
							parseInt(mat[0].penalOM);			
								
					//consol MATTTTTT');
				tablaGeneral.widths= [100, 90, 'auto', 'auto','auto', 'auto'];
				tablaGeneral.body = [
					[
						{ text: 'Materia', style: 'tableHeader', alignment: 'center' },
						{ text: 'Sistema', style: 'tableHeader', alignment: 'center' },
						{ text: 'Total Exp', style: 'tableHeader', alignment: 'center' },
						{ text: 'Usuarios', style: 'tableHeader', alignment: 'center' },
						{ text: 'H', style: 'tableHeader', alignment: 'center' },
						{ text: 'M', style: 'tableHeader', alignment: 'center' },
					],
					['PENAL','TRADICIONAL',					mat[0].penalTExp,mat[0].penalT,mat[0].penalTH,mat[0].penalTM],
					['EJECUCIÓN DE SANCIONES','TRADICIONAL',mat[0].ejecucionTExp,mat[0].ejecucionT,mat[0].ejecucionTH,mat[0].ejecucionTM],
					['CIVIL','TRADICIONAL',					mat[0].civilTExp,mat[0].civilT,mat[0].civilTH,mat[0].civilTM],
					['FAMILIAR','TRADICIONAL',				mat[0].familiarTExp,mat[0].familiarT,mat[0].familiarTH,mat[0].familiarTM],
					['AGRARIO','TRADICIONAL',				mat[0].agrarioTExp,mat[0].agrarioT,mat[0].agrarioTH,mat[0].agrarioTM],
					['MERCANTIL','TRADICIONAL',				mat[0].mercantilTExp,mat[0].mercantilT,mat[0].mercantilTH,mat[0].mercantilTM],
					['TRIBUNAL','TRADICIONAL',				mat[0].tribunalTExp,mat[0].tribunalT,mat[0].tribunalTH,mat[0].tribunalTM],
					['AMPAROS','TRADICIONAL',				mat[0].amparosTExp,mat[0].amparosT,mat[0].amparosTH,mat[0].amparosTM],
					['PENAL','ORAL',						mat[0].penalOExp,mat[0].penalO,mat[0].penalOH,mat[0].penalOM],
					['PENAL','JUSTICIA PARA ADOLECENTES','','','',''],
					['','TOTAL',totExp,totU,totH,totM]
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
				['','','','']
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
					var mat= jsonInf['tablaMateriaExp'];

					var totExp=0, totU=0, totH=0, totM=0;
					totExp= parseInt(mat[0].penalTExp)+
							parseInt(mat[0].ejecucionTExp)+
							parseInt(mat[0].civilTExp)+
							parseInt(mat[0].familiarTExp)+
							parseInt(mat[0].agrarioTExp)+
							parseInt(mat[0].mercantilTExp)+
							parseInt(mat[0].tribunalTExp)+
							parseInt(mat[0].amparosTExp)+
							parseInt(mat[0].penalOExp);

					totU=	parseInt(mat[0].penalT)+
							parseInt(mat[0].ejecucionT)+
							parseInt(mat[0].civilT)+
							parseInt(mat[0].familiarT)+
							parseInt(mat[0].agrarioT)+
							parseInt(mat[0].mercantilT)+
							parseInt(mat[0].tribunalT)+
							parseInt(mat[0].amparosT)+
							parseInt(mat[0].penalO);

					totH = 	parseInt(mat[0].penalTH)+
							parseInt(mat[0].ejecucionTH)+
							parseInt(mat[0].civilTH)+
							parseInt(mat[0].familiarTH)+
							parseInt(mat[0].agrarioTH)+
							parseInt(mat[0].mercantilTH)+
							parseInt(mat[0].tribunalTH)+
							parseInt(mat[0].amparosTH)+
							parseInt(mat[0].penalOH);
					
					totM =  parseInt(mat[0].penalTM)+
							parseInt(mat[0].ejecucionTM)+
							parseInt(mat[0].civilTM)+
							parseInt(mat[0].familiarTM)+
							parseInt(mat[0].agrarioTM)+
							parseInt(mat[0].mercantilTM)+
							parseInt(mat[0].tribunalTM)+
							parseInt(mat[0].amparosTM)+
							parseInt(mat[0].penalOM);			
								
					//consol MATTTTTT');
				tablaGeneral.widths= [100, 90, 'auto', 'auto','auto', 'auto'];
				tablaGeneral.body = [
					[
						{ text: 'Materia', style: 'tableHeader', alignment: 'center' },
						{ text: 'Sistema', style: 'tableHeader', alignment: 'center' },
						{ text: 'Total Exp', style: 'tableHeader', alignment: 'center' },
						{ text: 'Usuarios', style: 'tableHeader', alignment: 'center' },
						{ text: 'H', style: 'tableHeader', alignment: 'center' },
						{ text: 'M', style: 'tableHeader', alignment: 'center' },
					],
					['PENAL','TRADICIONAL',					mat[0].penalTExp,mat[0].penalT,mat[0].penalTH,mat[0].penalTM],
					['EJECUCIÓN DE SANCIONES','TRADICIONAL',mat[0].ejecucionTExp,mat[0].ejecucionT,mat[0].ejecucionTH,mat[0].ejecucionTM],
					['CIVIL','TRADICIONAL',					mat[0].civilTExp,mat[0].civilT,mat[0].civilTH,mat[0].civilTM],
					['FAMILIAR','TRADICIONAL',				mat[0].familiarTExp,mat[0].familiarT,mat[0].familiarTH,mat[0].familiarTM],
					['AGRARIO','TRADICIONAL',				mat[0].agrarioTExp,mat[0].agrarioT,mat[0].agrarioTH,mat[0].agrarioTM],
					['MERCANTIL','TRADICIONAL',				mat[0].mercantilTExp,mat[0].mercantilT,mat[0].mercantilTH,mat[0].mercantilTM],
					['TRIBUNAL','TRADICIONAL',				mat[0].tribunalTExp,mat[0].tribunalT,mat[0].tribunalTH,mat[0].tribunalTM],
					['AMPAROS','TRADICIONAL',				mat[0].amparosTExp,mat[0].amparosT,mat[0].amparosTH,mat[0].amparosTM],
					['PENAL','ORAL',						mat[0].penalOExp,mat[0].penalO,mat[0].penalOH,mat[0].penalOM],
					['PENAL','JUSTICIA PARA ADOLECENTES','','','',''],
					['','TOTAL',totExp,totU,totH,totM]
				];
			
		break;
	}
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;

}
function getTablaRegion(valor){
	var tabla ={};
	var tablaGeneral={};		
	tablaGeneral.headerRows= 3;
	
	switch(valor){
		case 'TRADICIONAL':
			return {
				style : 'tableExample',
				color : 'black',
				table:{
					widths:['auto', 'auto', 'auto', 'auto','auto', 'auto'],
					headerRows: 3,					
					body: generarCuerpoRegionP()
				}
			}
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
				['','','','']
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
				return {
					style : 'tableExample',
					color : 'black',
					table:{
						widths:['auto', 'auto', 'auto', 'auto','auto', 'auto', 'auto', 'auto','auto'],
						headerRows: 3,					
						body: generarCuerpoRegion()
					}
				}	
		break;
	}
	tabla.style = 'tableExample';
	tabla.color = 'black';
	tabla.table = tablaGeneral;
	return tabla;

}
function generarCuerpoRegionP(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaRegionExpDef'];
	var listaRegion = getListaRegion();//getNumEtniasUsuarios(sourceData);
	//var data= validarRegion(listaRegion,sourceData);
	var bodyData = [];	
		
			bodyData.push(
				[
					{ text: 'Region', rowSpan:3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Exp', rowspan:3,style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:4, style: 'tableHeader', alignment: 'center' },
					{},{},{}
				]
			);
			bodyData.push(
				[
					{},
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
					
				]
			);
			bodyData.push(
				[
					{},
					{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }
					
				]
			);
			var totalFinal=0, totTra=0, totOr=0, totHT=0,totMT=0, totHO=0, totMO=0, totExpp=0;

			for(var i=0; i<listaRegion.length; i++){
				
				$.each(sourceData, function(key,val){//tradicional
					if(listaRegion[i] == val.reg){						
						//if(k != 'sistema'){
							var totExp = parseInt(val.totExp);//+parseInt(v.totalExp);
							var totSis = parseInt(val.usuarios);//+parseInt(v.totalUser);
							//console.log([k,totSis,val.total,val.hombres,val.mujeres,v.total,v.hombres,v.mujeres]);
							bodyData.push([listaRegion[i],totExp,totSis,val.usuarios,val.hombres,val.mujeres]);
							//var k = parseInt(val)+parseInt(v);
							totalFinal += totSis;
							totTra += parseInt(val.usuarios);
							//totOr += parseInt(v.totalUser);
							totHT += parseInt(val.hombres)
							totMT += parseInt(val.mujeres)
							/* totHO += parseInt(v.hombres)
							totMO += parseInt(v.mujeres); */
							totExpp += totExp;
						//}
					}
				});
			}
			bodyData.push(['TOTAL',totExpp,totalFinal,totTra,totHT,totMT]);		
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
function generarCuerpoRegion(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaRegionExp'];
	var listaRegion = getListaRegion();//getNumEtniasUsuarios(sourceData);
	var data= validarRegion(listaRegion,sourceData);
	var bodyData = [];	
		
			bodyData.push(
				[
					{ text: 'Region', rowSpan:3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Exp', rowspan:3,style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
					{},{},{},{},{},{}
				]
			);
			bodyData.push(
				[
					{},
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{},
					{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
				]
			);
			bodyData.push(
				[
					{},
					{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }
				]
			);
			var totalFinal=0, totTra=0, totOr=0, totHT=0,totMT=0, totHO=0, totMO=0, totExpp=0;

			$.each(data[0], function(k,v){//oral
				
				$.each(data[1], function(key,val){//tradicional
					if(k==key){						
						if(k != 'sistema'){
							var totExp = parseInt(val.totalExp)+parseInt(v.totalExp);
							var totSis = parseInt(val.totalUser)+parseInt(v.totalUser);
							//console.log([k,totSis,val.total,val.hombres,val.mujeres,v.total,v.hombres,v.mujeres]);
							bodyData.push([k,totExp,totSis,val.totalUser,val.hombres,val.mujeres,v.totalUser,v.hombres,v.mujeres]);
							//var k = parseInt(val)+parseInt(v);
							totalFinal += totSis;
							totTra += parseInt(val.totalUser);
							totOr += parseInt(v.totalUser);
							totHT += parseInt(val.hombres)
							totMT += parseInt(val.mujeres)
							totHO += parseInt(v.hombres)
							totMO += parseInt(v.mujeres);
							totExpp += totExp;
						}
					}
				});
			});
			bodyData.push(['TOTAL',totExpp,totalFinal,totTra,totHT,totMT,totOr,totHO,totMO]);		
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
function generarCuerpoDiscapacidadP(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaDiscapacidadExpDef'];
	var listaDiscapacidad = getListaDiscapacidad();//getNumEtniasUsuarios(sourceData);
	console.log(listaDiscapacidad, 'LISTA');
	//var data= validarDiscapacidad(listaDiscapacidad,sourceData);
	var bodyData = [];			
			bodyData.push(
				[
					{ text: 'Discapacidades', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:4, style: 'tableHeader', alignment: 'center' },
					{},{},{}
				]
			);
			bodyData.push(
				[
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
				]
			);
			bodyData.push(
				[
					{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }
				]
			);
			var totalFinal=0, totTra=0, totOr=0, totHT=0,totMT=0, totHO=0, totMO=0;				
			for(var i=0; i<listaDiscapacidad.length; i++){
				$.each(sourceData, function(key,val){//tradicional
					if(val.discapacidadUs == listaDiscapacidad[i]){						
						//if(k != 'sistema'){
							var totSis = parseInt(val.totalUsuarios);//+parseInt(v.total);
							bodyData.push([listaDiscapacidad[i],totSis,val.totalUsuarios,val.hombres,val.mujeres]);
							//var k = parseInt(val)+parseInt(v);
							totalFinal += totSis;
							totTra += parseInt(val.totalUsuarios);
							//totOr += parseInt(v.total);
							totHT += parseInt(val.hombres);
							totMT += parseInt(val.mujeres);
							//totHO += parseInt(v.hombres)
							//totMO += parseInt(v.mujeres);
						//}
					}
				});
			}
			
			bodyData.push(['TOTAL',totalFinal,totTra,totHT,totMT]);
		return bodyData;
}
function generarCuerpoDiscapacidad(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaDiscapacidadExp'];
	var listaDiscapacidad = getListaDiscapacidad();//getNumEtniasUsuarios(sourceData);
	console.log(listaDiscapacidad, 'LISTA');
	var data= validarDiscapacidad(listaDiscapacidad,sourceData);
	var bodyData = [];	
		
			bodyData.push(
				[
					{ text: 'Discapacidades', rowSpan: 3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:7, style: 'tableHeader', alignment: 'center' },
					{},{},{},{},{},{}
				]
			);
			bodyData.push(
				[
					{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{},
					{ text: 'Acusatorío y oral', colSpan:3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
				]
			);
			bodyData.push(
				[
					{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' },
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }	
				]
			);
			var totalFinal=0, totTra=0, totOr=0, totHT=0,totMT=0, totHO=0, totMO=0;				
			$.each(data[0], function(k,v){
				$.each(data[1], function(key,val){//tradicional
					if(k==key){						
						if(k != 'sistema'){
							var totSis = parseInt(val.total)+parseInt(v.total);
							bodyData.push([k,totSis,val.total,val.hombres,val.mujeres,v.total,v.hombres,v.mujeres]);
							//var k = parseInt(val)+parseInt(v);
							totalFinal += totSis;
							totTra += parseInt(val.total);
							totOr += parseInt(v.total);
							totHT += parseInt(val.hombres)
							totMT += parseInt(val.mujeres)
							totHO += parseInt(v.hombres)
							totMO += parseInt(v.mujeres);
						}
					}
				});
			});
			
			bodyData.push(['TOTAL',totalFinal,totTra,totHT,totMT,totOr,totHO,totMO]);
		return bodyData;
}
function getNumIdiomasUsuarios(jsonInforme) {
	var arrIdiomas = [];
	var idiomas;
	$.each(jsonInforme, function (KEY, VALOR) {
		var obj = {};
		obj['idioma'] = VALOR.idiomaUs;
		arrIdiomas[KEY] = obj;
	});

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
function generarCuerpoIdiomasT(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaIdiomaExpDef'];
	var listaIdiomas = getNumIdiomasUsuarios(sourceData);
	var bodyData = [];	
		
			bodyData.push(
					[{ text: 'Idiomas o Lenguas', rowSpan:3, style: 'tableHeader', alignment: 'center' },
					{ text: 'Sistema de justicia', colSpan:4, style: 'tableHeader', alignment: 'center' },
					{},{},{}]
			);
			bodyData.push(
					[{},
					{ text: 'Total', rowSpan:2, style: 'tableHeader', alignment: 'center' },
					{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
					{},
					{}
					]
			);
			bodyData.push(
					[{},
					{},
					{ text: 'Total', style: 'tableHeader', alignment: 'center' },
					{ text: 'H', style: 'tableHeader', alignment: 'center' },
					{ text: 'M',style: 'tableHeader', alignment: 'center' }
					]
			);
		var totalF=0, totT=0, totO=0, totHT=0, totMT=0, totHO=0, totMO=0;
		for(var i=0; i<listaIdiomas.length; i++){
			sourceData.forEach(function(VAL) {
				if(listaIdiomas[i].idioma == VAL.idiomaUs){						
					var dataRow = [];	
					var idiomaT= parseInt(VAL.hombresT)+parseInt(VAL.mujeresT);
					///\var idiomaO= parseInt(VAL.hombresO)+parseInt(VAL.mujeresO);
					dataRow.push(listaIdiomas[i].idioma,VAL.totalUsuarios,idiomaT,VAL.hombresT,VAL.mujeresT);
					bodyData.push(dataRow);
					totalFinal += parseInt(VAL.totalUsuarios);
					totT +=idiomaT;
					//totO +=idiomaO;
					totHT += parseInt(VAL.hombresT);
					totMT += parseInt(VAL.mujeresT);
					//totHO += parseInt(VAL.hombresO);
					//totMO += parseInt(VAL.mujeresO);
				}
			});
		}
		bodyData.push(['TOTAL', totalFinal,totT,totHT,totMT]);
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
function validarEdadP(edad){
	if(edad[0].sistema == 'TRADICIONAL'){
		edad[0] = {
			'sistemaG':'TRADICIONAL', 
			'totalSitema':0,
			'edad18_24H':0,
			'edad18_24M':0,
			'edad25_29H':0,
			'edad25_29M':0,
			'edad30_34H':0,
			'edad30_34M':0,
			'edad35_39H':0,
			'edad35_39M':0,
			'edad40_44H':0,
			'edad40_44M':0,
			'edad45_49H':0,
			'edad45_49M':0,
			'edad50_54H':0,
			'edad50_54M':0,
			'edad55_59H':0,
			'edad55_59M':0,
			'edad60MasH':0,
			'edad60MasM':0
		};					
	}else{
		edad[0] = {
			'sistemaG':'ORAL', 
			'totalSitema':0,
			'edad18_24H':0,
			'edad18_24M':0,
			'edad25_29H':0,
			'edad25_29M':0,
			'edad30_34H':0,
			'edad30_34M':0,
			'edad35_39H':0,
			'edad35_39M':0,
			'edad40_44H':0,
			'edad40_44M':0,
			'edad45_49H':0,
			'edad45_49M':0,
			'edad50_54H':0,
			'edad50_54M':0,
			'edad55_59H':0,
			'edad55_59M':0,
			'edad60MasH':0,
			'edad60MasM':0
		};
	}
	return edad;
}
function validarEdad(edad){
	if(edad[1]==undefined || edad[1]==null){
		if(edad[0].sistemaG=='TRADICIONAL'){
			edad[1] = {
						'sistemaG':'ORAL', 
						'totalSitema':0,
						'edad18_24H':0,
						'edad18_24M':0,
						'edad25_29H':0,
						'edad25_29M':0,
						'edad30_34H':0,
						'edad30_34M':0,
						'edad35_39H':0,
						'edad35_39M':0,
						'edad40_44H':0,
						'edad40_44M':0,
						'edad45_49H':0,
						'edad45_49M':0,
						'edad50_54H':0,
						'edad50_54M':0,
						'edad55_59H':0,
						'edad55_59M':0,
						'edad60MasH':0,
						'edad60MasM':0
					};
		}else{
			edad[1] = {
				'sistemaG':'TRADICIONAL', 
				'totalSitema':0,
				'edad18_24H':0,
				'edad18_24M':0,
				'edad25_29H':0,
				'edad25_29M':0,
				'edad30_34H':0,
				'edad30_34M':0,
				'edad35_39H':0,
				'edad35_39M':0,
				'edad40_44H':0,
				'edad40_44M':0,
				'edad45_49H':0,
				'edad45_49M':0,
				'edad50_54H':0,
				'edad50_54M':0,
				'edad55_59H':0,
				'edad55_59M':0,
				'edad60MasH':0,
				'edad60MasM':0
			};
		}			
	}
	return edad;
}
function generarCuerpoTop(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaTopExp'];
	//var listaDef = getListaDef(sourceData);
	var bodyData = [];			
			bodyData.push(
					[{ text: 'Defensor',	style: 'tableHeader', alignment: 'center' },
					 { text: 'Juzgado',  	style: 'tableHeader', alignment: 'center' },
					 { text: 'Materia',  	style: 'tableHeader', alignment: 'center' },					 
					 { text: 'Expedientes', 	style: 'tableHeader', alignment: 'center' },
					 { text: 'H',			style: 'tableHeader', alignment: 'center' },
					 { text: 'M', 		 	style: 'tableHeader', alignment: 'center' },
					 { text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' }
					]
			);

		
		
			sourceData.forEach(function(VAL) {
				totalFinal += parseInt(VAL.totExp);
				var dataRow = [];		
				dataRow.push(VAL.defensor, VAL.juzgado,VAL.materia, VAL.totExp, VAL.hombres, VAL.mujeres, VAL.sis);
				bodyData.push(dataRow);
				
			});
		
		bodyData.push(['TOTAL', '---','---', totalFinal,'---','---','---']);
		console.log(bodyData, ' bodydata tooop defensores');
		return bodyData;
}
function generarCuerpoEtniasT(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaEtniaExpDef'];
	var listaEtnias = getListaEtnias();//getNumEtniasUsuarios(sourceData);
	//var data= validarEtniasT(listaEtnias,sourceData);
	var bodyData = [];	
		
			bodyData.push(
					[	{ text: 'Etnias', rowSpan:3, style: 'tableHeader', alignment: 'center' },
						{ text: 'Sistema de justicia', colSpan:4, style: 'tableHeader', alignment: 'center' },
						{},{},{}
					]
			);
			bodyData.push(
					[	{},
						{ text: 'Expedientes', rowSpan:2, style: 'tableHeader', alignment: 'center' },
						{ text: 'Tradicional',colSpan: 3, style: 'tableHeader', alignment: 'center' },
						{},
						{}
					]
			);
			bodyData.push(
					[
						{},
						{},
						{ text: 'Usuarios', style: 'tableHeader', alignment: 'center' },
						{ text: 'H', style: 'tableHeader', alignment: 'center' },
						{ text: 'M',style: 'tableHeader', alignment: 'center' }
					
					]
			);
			var totalFinal=0, totTra=0, totOr=0, totHT=0,totMT=0, totHO=0, totMO=0;
		for(var i=0; i<listaEtnias.length+1; i++){
			$.each(sourceData, function(k,v){//
					if(v.etniaUs == listaEtnias[i]){
						//if(k != 'sis'){
							var totSis =parseInt(v.totalUsuarios);
							bodyData.push([listaEtnias[i],totSis,v.totalUsuarios,v.hombres,v.mujeres]);
							totalFinal += totSis;
							totTra += parseInt(v.totalUsuarios);
							//totOr += parseInt(v.totalUsuarios);
							totHT += parseInt(v.hombres)
							totMT += parseInt(v.mujeres)
							//totHO += parseInt(v.hombres)
							//totMO += parseInt(v.mujeres);
						//}
					}
					
			});
		}
			bodyData.push(['TOTAL',totalFinal,totTra,totHT,totMT]);
		return bodyData;
}
function generarCuerpoEtnias(){
	var totalFinal = 0;
	var sourceData = jsonInf['tablaEtniaExp'];
	var listaEtnias = getListaEtnias();//getNumEtniasUsuarios(sourceData);
	var data= validarEtnias(listaEtnias,sourceData);
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
			var totalFinal=0, totTra=0, totOr=0, totHT=0,totMT=0, totHO=0, totMO=0;

			$.each(data[0], function(k,v){//oral
				
				$.each(data[1], function(key,val){//tradicional
					if(k==key){						
						if(k != 'sistema'){
							var totSis = parseInt(val.total)+parseInt(v.total);
							bodyData.push([k,totSis,val.total,val.hombres,val.mujeres,v.total,v.hombres,v.mujeres]);
							//var k = parseInt(val)+parseInt(v);
							totalFinal += totSis;
							totTra += parseInt(val.total);
							totOr += parseInt(v.total);
							totHT += parseInt(val.hombres)
							totMT += parseInt(val.mujeres)
							totHO += parseInt(v.hombres)
							totMO += parseInt(v.mujeres);
						}
					}
				});
			});
			bodyData.push(['TOTAL',totalFinal,totTra,totHT,totMT,totOr,totHO,totMO]);
					/* bodyData.push(['MIXTECO',		'','','','','','','']);
					bodyData.push(['ZAPOTECO',		'','','','','','','']);
					bodyData.push(['AMUZGO',		'','','','','','','']);
					bodyData.push(['CHATINO',		'','','','','','','']);
					bodyData.push(['CHINANTECO',	'','','','','','','']);
					bodyData.push(['CHOCHOL',		'','','','','','','']);
					bodyData.push(['CHONTAL',		'','','','','','','']);
					bodyData.push(['CUICATECO',		'','','','','','','']);
					bodyData.push(['HUAVES',		'','','','','','','']);
					bodyData.push(['IXCATECOS',		'','','','','','','']);
					bodyData.push(['MAZATECOS',		'','','','','','','']);
					bodyData.push(['MIXE',			'','','','','','','']);
					bodyData.push(['NAHUAS',		'','','','','','','']);
					bodyData.push(['TRIQUI',		'','','','','','','']);
					bodyData.push(['ZOQUES',		'','','','','','','']);
					bodyData.push(['CHOCHOLTECOS',	'','','','','','','']);
					bodyData.push(['TACUATES',		'','','','','','','']);
					bodyData.push(['AFROMEXICANO',	'','','','','','','']);
					bodyData.push(['AFROMESTIZO',	'','','','','','','']);
					bodyData.push(['TZOTZILES',		'','','','','','','']);
					bodyData.push(['POPOLOCA',		'','','','','','','']);
					bodyData.push(['TOTAL',			'','','','','','','']); */
		//console.log(bodyData, ' bodydata');
		return bodyData;
}
function getListaEtnias(){
	var et=[];
	et.push('MIXTECO');
	et.push('ZAPOTECO');
	et.push('AMUZGO');
	et.push('CHATINO');
	et.push('CHINANTECO');
	et.push('CHOCHOL');
	et.push('CHONTAL');
	et.push('CUICATECO');
	et.push('HUAVES');
	et.push('IXCATECOS');
	et.push('MAZATECOS');
	et.push('MIXE');	
	et.push('NAHUAS');
	et.push('TRIQUI');
	et.push('ZOQUES');
	et.push('CHOCHOLTECOS');
	et.push('TACUATES');
	et.push('AFROMEXICANO');
	et.push('AFROMESTIZO');
	et.push('TZOTZILES');
	et.push('POPOLOCA');
	return et;
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
function getListaRegion(){
	var et=[];
	et.push('CAÑADA');
	et.push('COSTA');
	et.push('ISTMO');
	et.push('SIERRA NORTE');
	et.push('SIERRA SUR');
	et.push('VALLES CENTRALES');
	et.push('PAPALOAPAN');
	et.push('MIXTECA');
	
	return et;
}
function validarEtniasP(lista,data){
	var arrT={};
	var arrO={};
	var arr = [];
	for(var i=0; i<lista.length; i++){
		arrT[lista[i]] = {
							'total':0,
							'hombres':0,
							'mujeres':0
						 };
		arrT['sistema'] = 'TRADICIONAL';
	}
	
	for(var i=0; i<lista.length; i++){
		arrO[lista[i]] 	= {
							'total':0,
							'hombres':0,
							'mujeres':0
						  };
		arrO['sistema'] ='ORAL';
	}
	for(var i=0; i<lista.length; i++){		
		$.each(data, function(k,v){			
			//console.log(Object.keys(arrT)[i], 'etniaaa');
			if(v.sis == 'TRADICIONAL' && v.etniaUs==Object.keys(arrT)[i]){
				//arr[1].totalUsuarios = v.totalUsuarios;
				//console.log(Object.keys(arrT)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				arrT[v.etniaUs]['total']   = v.totalUsuarios;
				arrT[v.etniaUs]['hombres'] = v.hombres;
				arrT[v.etniaUs]['mujeres'] = v.mujeres;

			}
			if(v.sis == 'ORAL' && v.etniaUs==Object.keys(arrO)[i]){
				//arr[0].totalUsuarios = v.totalUsuarios;				
				//console.log(Object.keys(arrO)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				
				arrO[v.etniaUs]['total']=v.totalUsuarios;
				arrO[v.etniaUs]['hombres'] = v.hombres;
				arrO[v.etniaUs]['mujeres'] = v.mujeres;
			}
		});
	}
		arr.push(arrO);
		arr.push(arrT);

	//console.log(arr, 'VALOR ARRR');
	//console.log(Object.keys(arrT), 'LLAVES ARR T');
	return arr;
}
function validarEtnias(lista,data){
	var arrT={};
	var arrO={};
	var arr = [];
	for(var i=0; i<lista.length; i++){
		arrT[lista[i]] = {
							'total':0,
							'hombres':0,
							'mujeres':0
						 };
		arrT['sistema'] = 'TRADICIONAL';
	}
	
	for(var i=0; i<lista.length; i++){
		arrO[lista[i]] 	= {
							'total':0,
							'hombres':0,
							'mujeres':0
						  };
		arrO['sistema'] ='ORAL';
	}
	for(var i=0; i<lista.length; i++){		
		$.each(data, function(k,v){			
			//console.log(Object.keys(arrT)[i], 'etniaaa');
			if(v.sis == 'TRADICIONAL' && v.etniaUs==Object.keys(arrT)[i]){
				//arr[1].totalUsuarios = v.totalUsuarios;
				//console.log(Object.keys(arrT)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				arrT[v.etniaUs]['total']   = v.totalUsuarios;
				arrT[v.etniaUs]['hombres'] = v.hombres;
				arrT[v.etniaUs]['mujeres'] = v.mujeres;

			}
			if(v.sis == 'ORAL' && v.etniaUs==Object.keys(arrO)[i]){
				//arr[0].totalUsuarios = v.totalUsuarios;				
				//console.log(Object.keys(arrO)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				
				arrO[v.etniaUs]['total']=v.totalUsuarios;
				arrO[v.etniaUs]['hombres'] = v.hombres;
				arrO[v.etniaUs]['mujeres'] = v.mujeres;
			}
		});
	}
		arr.push(arrO);
		arr.push(arrT);

	//console.log(arr, 'VALOR ARRR');
	//console.log(Object.keys(arrT), 'LLAVES ARR T');
	return arr;
}
function validarRegion(lista,data){
	var arrT={};
	var arrO={};
	var arr = [];
	for(var i=0; i<lista.length; i++){
		arrT[lista[i]] = {
			'totalExp':0,
			'totalUser':0,
							'hombres':0,
							'mujeres':0
						 };
		arrT['sistema'] = 'TRADICIONAL';
	}
	
	for(var i=0; i<lista.length; i++){
		arrO[lista[i]] 	= {
			'totalExp':0,
			'totalUser':0,
							'hombres':0,
							'mujeres':0
						  };
		arrO['sistema'] ='ORAL';
	}
	for(var i=0; i<lista.length+1; i++){		
		$.each(data, function(k,v){			
			//console.log(Object.keys(arrT)[i], 'etniaaa');
			if(v.sis == 'TRADICIONAL' && v.reg==Object.keys(arrT)[i]){
				//arr[1].totalUsuarios = v.totalUsuarios;
				//console.log(Object.keys(arrT)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				arrT[v.reg]['totalUser']   = v.usuarios;
				arrT[v.reg]['totalExp']   = v.totExp;				
				arrT[v.reg]['hombres'] = v.hombres;
				arrT[v.reg]['mujeres'] = v.mujeres;

			}
			if(v.sis == 'ORAL' && v.reg==Object.keys(arrO)[i]){
				//arr[0].totalUsuarios = v.totalUsuarios;				
				//console.log(Object.keys(arrO)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				
				arrO[v.reg]['totalUser']   = v.usuarios;
				arrO[v.reg]['totalExp']   = v.totExp;				
				arrO[v.reg]['hombres'] = v.hombres;
				arrO[v.reg]['mujeres'] = v.mujeres;
			}
		});
	}
		arr.push(arrO);
		arr.push(arrT);

	console.log(arr, 'VALOR ARRR REGIONNN');
	//console.log(Object.keys(arrT), 'LLAVES ARR T');
	return arr;
}
function validarDiscapacidad(lista,data){
	var arrT={};
	var arrO={};
	var arr = [];
	for(var i=0; i<lista.length; i++){
		arrT[lista[i]] = {
							'total':0,
							'hombres':0,
							'mujeres':0
						 };
		arrT['sistema'] = 'TRADICIONAL';
	}	
	for(var i=0; i<lista.length; i++){
		arrO[lista[i]] 	= {
							'total':0,
							'hombres':0,
							'mujeres':0
						  };
		arrO['sistema'] ='ORAL';
	}
	console.log(arrT, ' LONGITUD ARTt`');
 	for(var i=0; i<lista.length+1; i++){		
		$.each(data, function(k,v){	
			
			//console.log(Object.keys(arrT)[i], ' VALOR LLAVE T');
			
			//console.log(Object.keys(arrO)[i], ' VALOR LLAVE O');		
			if(v.sis == 'TRADICIONAL' && v.discapacidadUs==Object.keys(arrT)[i]){
				
			//console.log(Object.keys(arrT)[i], ' VALOR LLAVE T');
				//console.log(Object.keys(arrT)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				arrT[Object.keys(arrT)[i]]['total']   = v.totalUsuarios;
				arrT[Object.keys(arrT)[i]]['hombres'] = v.hombres;
				arrT[Object.keys(arrT)[i]]['mujeres'] = v.mujeres;

			}
			if(v.sis == 'ORAL' && v.discapacidadUs==Object.keys(arrO)[i]){
				//arr[0].totalUsuarios = v.totalUsuarios;				
				//console.log(Object.keys(arrO)[i], v.etniaUs,' etnias iguales', v.totalUsuarios);				
				
			//console.log(Object.keys(arrO)[i], ' VALOR LLAVE O');
				arrO[Object.keys(arrO)[i]]['total']=v.totalUsuarios;
				arrO[Object.keys(arrO)[i]]['hombres'] = v.hombres;
				arrO[Object.keys(arrO)[i]]['mujeres'] = v.mujeres;
			}
		});
	} 
	//console.log(arrT, ' NO VACIO ?');
		arr.push(arrO);
		arr.push(arrT);

	console.log(arr, 'VALOR ARRR');
	//console.log(Object.keys(arrT), 'LLAVES ARR T');
	return arr;
}
function getTablaTopTenExp(valor){
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
					widths: ['auto', 'auto', 'auto','auto', 'auto', 'auto','auto'],
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
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
