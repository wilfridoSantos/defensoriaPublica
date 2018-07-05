function informeCompletoParcial(jsonInforme){
	console.time('Test functionGlobalInformeAct');
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	defensores = getDefensores(jsonInforme);
	console.log(defensores, ' defensores econtrados');
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
	totalEdad7 =  edades['edades7T'] +  edades['edades7O'];
	totalEdad8 =  edades['edades8T'] +  edades['edades8O'];
	totalEdad9 =  edades['edades9T'] +  edades['edades9O'];
	totalEdadT = edades['edades1T'] + edades['edades2T'] + edades['edades3T'] + edades['edades4T'] + edades['edades5T'] +  edades['edades6T']+  edades['edades7T']+  edades['edades8T']+  edades['edades9T'];
	totalEdadO =  edades['edades1O'] + edades['edades2O'] + edades['edades3O'] + edades['edades4O'] + edades['edades5O'] +  edades['edades6O']+  edades['edades7O']+  edades['edades8O']+  edades['edades9O'];
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
							'Completo', style: 'subheader'
					},
				],
				style: 'header'
			},			
			{ text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2' },
			{ text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, la Defensoría Pública brindó ' + actividades['asesorias'] + ' servicios gratuitos de asesorías jurídicas generales, lo anterior se detalla de la siguiente manera:', style: 'textoJustificado' },
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
						['18 A 24 AÑOS',	totalEdad1, edades['edades1T'], edades['edades1O']],
						['25 A 29 AÑOS',	totalEdad2, edades['edades2T'], edades['edades2O']],
						['30 A 34 AÑOS',	totalEdad3, edades['edades3T'], edades['edades3O']],
						['35 A 39 AÑOS',	totalEdad4, edades['edades4T'], edades['edades4O']],
						['40 A 44 AÑOS',	totalEdad5, edades['edades5T'], edades['edades5O']],
						['45 A 49 AÑOS',	totalEdad6, edades['edades6T'], edades['edades6O']],
						['50 A 54 AÑOS',	totalEdad7, edades['edades7T'], edades['edades7O']],
						['55 A 59 AÑOS',	totalEdad8, edades['edades8T'], edades['edades8O']],
						['DE 60 O MAS AÑOS',	totalEdad9, edades['edades9T'], edades['edades9O']],
						['TOTAL', 		totalEdadS, totalEdadT,totalEdadO]
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
			{ text: '', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
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
			{ text: '', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON ALTO NÚMERO DE ASESORÍAS JURÍDICAS' },
			{
				style: 'tableExample',
				color: 'black',
				table: {
					widths: [150, 'auto', 'auto', 'auto', 'auto'],
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
						[defensores[0].defensor, defensores[0].asesoriasTotal, defensores[0].juzgado, defensores[0].asesoriasT, defensores[0].asesoriasO],
						[defensores[1].defensor, defensores[1].asesoriasTotal, defensores[1].juzgado, defensores[1].asesoriasT, defensores[1].asesoriasO],
						[defensores[2].defensor, defensores[2].asesoriasTotal, defensores[2].juzgado, defensores[2].asesoriasT, defensores[2].asesoriasO],
						[defensores[3].defensor, defensores[3].asesoriasTotal, defensores[3].juzgado, defensores[3].asesoriasT, defensores[3].asesoriasO],
						[defensores[4].defensor, defensores[4].asesoriasTotal, defensores[4].juzgado, defensores[4].asesoriasT, defensores[4].asesoriasO],
						[defensores[5].defensor, defensores[5].asesoriasTotal, defensores[5].juzgado, defensores[5].asesoriasT, defensores[5].asesoriasO],
						[defensores[6].defensor, defensores[6].asesoriasTotal, defensores[6].juzgado, defensores[6].asesoriasT, defensores[6].asesoriasO],
						[defensores[7].defensor, defensores[7].asesoriasTotal, defensores[7].juzgado, defensores[7].asesoriasT, defensores[7].asesoriasO],
						[defensores[8].defensor, defensores[8].asesoriasTotal, defensores[8].juzgado, defensores[8].asesoriasT, defensores[8].asesoriasO],
						[defensores[9].defensor, defensores[9].asesoriasTotal, defensores[9].juzgado, defensores[9].asesoriasT, defensores[9].asesoriasO]
					]
				}
			},
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE ASESORÍAS JURÍDICAS' },
			{
				style: 'tableExample',
				color: 'black',
				table: {
					widths: [150, 'auto', 'auto', 'auto', 'auto'],
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
						[defensores[0].defensor, defensores[0].asesoriasTotal, defensores[0].juzgado, defensores[0].asesoriasT, defensores[0].asesoriasO],
						[defensores[1].defensor, defensores[1].asesoriasTotal, defensores[1].juzgado, defensores[1].asesoriasT, defensores[1].asesoriasO],
						[defensores[2].defensor, defensores[2].asesoriasTotal, defensores[2].juzgado, defensores[2].asesoriasT, defensores[2].asesoriasO],
						[defensores[3].defensor, defensores[3].asesoriasTotal, defensores[3].juzgado, defensores[3].asesoriasT, defensores[3].asesoriasO],
						[defensores[4].defensor, defensores[4].asesoriasTotal, defensores[4].juzgado, defensores[4].asesoriasT, defensores[4].asesoriasO],
						[defensores[5].defensor, defensores[5].asesoriasTotal, defensores[5].juzgado, defensores[5].asesoriasT, defensores[5].asesoriasO],
						[defensores[6].defensor, defensores[6].asesoriasTotal, defensores[6].juzgado, defensores[6].asesoriasT, defensores[6].asesoriasO],
						[defensores[7].defensor, defensores[7].asesoriasTotal, defensores[7].juzgado, defensores[7].asesoriasT, defensores[7].asesoriasO],
						[defensores[8].defensor, defensores[8].asesoriasTotal, defensores[8].juzgado, defensores[8].asesoriasT, defensores[8].asesoriasO],
						[defensores[9].defensor, defensores[9].asesoriasTotal, defensores[9].juzgado, defensores[9].asesoriasT, defensores[9].asesoriasO]
					]
				}
			},

			{ text: '2.- AUDIENCIAS', style: 'subheader2' },
			{
				text: 'Los defensores publicos asistieron a ' + actividades['audiencias'] + ' audiencias celebradas.', style: 'textoJustificado'
			},
			{ text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia civil ________; materia familiar _______; materia administrativa _______; materia agraria ________; materia ejecución de sanciones ________; tribunal de alzada _______. Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
			{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asistencia a audiencias en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos de asistencia en audiencias, esto también por sistema.', style: 'textoJustificado' },
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON ALTO NÚMERO DE AUDIENCIAS' },
			{
				style: 'tableExample',
				color: 'black',
				table: {
					widths: [150, 'auto', 'auto', 'auto', 'auto'],
					headerRows: 2,
					// keepWithHeaderRows: 1,
					body: [
						[
							{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
							{ text: 'Asistencia \nde audiencias', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
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
						[defensores[0].defensor, defensores[0].asesoriasTotal, defensores[0].juzgado, defensores[0].asesoriasT, defensores[0].asesoriasO],
						[defensores[1].defensor, defensores[1].asesoriasTotal, defensores[1].juzgado, defensores[1].asesoriasT, defensores[1].asesoriasO],
						[defensores[2].defensor, defensores[2].asesoriasTotal, defensores[2].juzgado, defensores[2].asesoriasT, defensores[2].asesoriasO],
						[defensores[3].defensor, defensores[3].asesoriasTotal, defensores[3].juzgado, defensores[3].asesoriasT, defensores[3].asesoriasO],
						[defensores[4].defensor, defensores[4].asesoriasTotal, defensores[4].juzgado, defensores[4].asesoriasT, defensores[4].asesoriasO],
						[defensores[5].defensor, defensores[5].asesoriasTotal, defensores[5].juzgado, defensores[5].asesoriasT, defensores[5].asesoriasO],
						[defensores[6].defensor, defensores[6].asesoriasTotal, defensores[6].juzgado, defensores[6].asesoriasT, defensores[6].asesoriasO],
						[defensores[7].defensor, defensores[7].asesoriasTotal, defensores[7].juzgado, defensores[7].asesoriasT, defensores[7].asesoriasO],
						[defensores[8].defensor, defensores[8].asesoriasTotal, defensores[8].juzgado, defensores[8].asesoriasT, defensores[8].asesoriasO],
						[defensores[9].defensor, defensores[9].asesoriasTotal, defensores[9].juzgado, defensores[9].asesoriasT, defensores[9].asesoriasO]
					]
				}
			},
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE AUDIENCIAS' },
			{
				style: 'tableExample',
				color: 'black',
				table: {
					widths: [150, 'auto', 'auto', 'auto', 'auto'],
					headerRows: 2,
					// keepWithHeaderRows: 1,
					body: [
						[
							{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
							{ text: 'Asistencia \nde audiencias', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
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
						[defensores[0].defensor, defensores[0].asesoriasTotal, defensores[0].juzgado, defensores[0].asesoriasT, defensores[0].asesoriasO],
						[defensores[1].defensor, defensores[1].asesoriasTotal, defensores[1].juzgado, defensores[1].asesoriasT, defensores[1].asesoriasO],
						[defensores[2].defensor, defensores[2].asesoriasTotal, defensores[2].juzgado, defensores[2].asesoriasT, defensores[2].asesoriasO],
						[defensores[3].defensor, defensores[3].asesoriasTotal, defensores[3].juzgado, defensores[3].asesoriasT, defensores[3].asesoriasO],
						[defensores[4].defensor, defensores[4].asesoriasTotal, defensores[4].juzgado, defensores[4].asesoriasT, defensores[4].asesoriasO],
						[defensores[5].defensor, defensores[5].asesoriasTotal, defensores[5].juzgado, defensores[5].asesoriasT, defensores[5].asesoriasO],
						[defensores[6].defensor, defensores[6].asesoriasTotal, defensores[6].juzgado, defensores[6].asesoriasT, defensores[6].asesoriasO],
						[defensores[7].defensor, defensores[7].asesoriasTotal, defensores[7].juzgado, defensores[7].asesoriasT, defensores[7].asesoriasO],
						[defensores[8].defensor, defensores[8].asesoriasTotal, defensores[8].juzgado, defensores[8].asesoriasT, defensores[8].asesoriasO],
						[defensores[9].defensor, defensores[9].asesoriasTotal, defensores[9].juzgado, defensores[9].asesoriasT, defensores[9].asesoriasO]
					]
				}
			},
			{ text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
			{
				text: 'Los Defensores Públicos realizaron ___________ visitas carcelarias a sus internos.', style: 'textoJustificado'
			},
			{ text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia ejecución de sanciones ________ Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
			{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de visitas carcelarias  en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en visitas carcelarias , esto también por sistema.', style: 'textoJustificado' },
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON ALTO NÚMERO DE VISITAS CARCELARÍAS' },
			{
				style: 'tableExample',
				color: 'black',
				table: {
					widths: [150, 'auto', 'auto', 'auto', 'auto'],
					headerRows: 2,
					// keepWithHeaderRows: 1,
					body: [
						[
							{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
							{ text: 'Visitas \n Carcelarías', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
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
						[defensores[0].defensor, defensores[0].asesoriasTotal, defensores[0].juzgado, defensores[0].asesoriasT, defensores[0].asesoriasO],
						[defensores[1].defensor, defensores[1].asesoriasTotal, defensores[1].juzgado, defensores[1].asesoriasT, defensores[1].asesoriasO],
						[defensores[2].defensor, defensores[2].asesoriasTotal, defensores[2].juzgado, defensores[2].asesoriasT, defensores[2].asesoriasO],
						[defensores[3].defensor, defensores[3].asesoriasTotal, defensores[3].juzgado, defensores[3].asesoriasT, defensores[3].asesoriasO],
						[defensores[4].defensor, defensores[4].asesoriasTotal, defensores[4].juzgado, defensores[4].asesoriasT, defensores[4].asesoriasO],
						[defensores[5].defensor, defensores[5].asesoriasTotal, defensores[5].juzgado, defensores[5].asesoriasT, defensores[5].asesoriasO],
						[defensores[6].defensor, defensores[6].asesoriasTotal, defensores[6].juzgado, defensores[6].asesoriasT, defensores[6].asesoriasO],
						[defensores[7].defensor, defensores[7].asesoriasTotal, defensores[7].juzgado, defensores[7].asesoriasT, defensores[7].asesoriasO],
						[defensores[8].defensor, defensores[8].asesoriasTotal, defensores[8].juzgado, defensores[8].asesoriasT, defensores[8].asesoriasO],
						[defensores[9].defensor, defensores[9].asesoriasTotal, defensores[9].juzgado, defensores[9].asesoriasT, defensores[9].asesoriasO]
					]
				}
			},
			{ text: '\n\n\n ', style: 'saltoLinea' },
			{ text: '\n\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE VISITAS CARCELARÍAS' },
			{
				style: 'tableExample',
				color: 'black',
				table: {
					widths: [150, 'auto', 'auto', 'auto', 'auto'],
					headerRows: 2,
					// keepWithHeaderRows: 1,
					body: [
						[
							{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
							{ text: 'Visitas \n Carcelarías', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
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
						[defensores[0].defensor, defensores[0].asesoriasTotal, defensores[0].juzgado, defensores[0].asesoriasT, defensores[0].asesoriasO],
						[defensores[1].defensor, defensores[1].asesoriasTotal, defensores[1].juzgado, defensores[1].asesoriasT, defensores[1].asesoriasO],
						[defensores[2].defensor, defensores[2].asesoriasTotal, defensores[2].juzgado, defensores[2].asesoriasT, defensores[2].asesoriasO],
						[defensores[3].defensor, defensores[3].asesoriasTotal, defensores[3].juzgado, defensores[3].asesoriasT, defensores[3].asesoriasO],
						[defensores[4].defensor, defensores[4].asesoriasTotal, defensores[4].juzgado, defensores[4].asesoriasT, defensores[4].asesoriasO],
						[defensores[5].defensor, defensores[5].asesoriasTotal, defensores[5].juzgado, defensores[5].asesoriasT, defensores[5].asesoriasO],
						[defensores[6].defensor, defensores[6].asesoriasTotal, defensores[6].juzgado, defensores[6].asesoriasT, defensores[6].asesoriasO],
						[defensores[7].defensor, defensores[7].asesoriasTotal, defensores[7].juzgado, defensores[7].asesoriasT, defensores[7].asesoriasO],
						[defensores[8].defensor, defensores[8].asesoriasTotal, defensores[8].juzgado, defensores[8].asesoriasT, defensores[8].asesoriasO],
						[defensores[9].defensor, defensores[9].asesoriasTotal, defensores[9].juzgado, defensores[9].asesoriasT, defensores[9].asesoriasO]
					]
				}
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