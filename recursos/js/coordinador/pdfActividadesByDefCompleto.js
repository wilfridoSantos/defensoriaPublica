function informeByDefCompleto(jsonInforme){
	console.time('Test functionGlobalInformeAct');
	var nombreDef = jsonInforme[0]['Defensor']+' '+jsonInforme[0]['apDefP']+' '+jsonInforme[0]['apDefM'];
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
							'completo', style: 'subheader'
					},
				],
				style: 'header'
			},
			{ text: 'A continuación se presenta el informe del defensor: '+nombreDef, style: 'textoJustificado'},
			{ text: "", style: 'textoJustificado'},
			{ text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2' },
			{ text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, la Defensoría Pública brindó ' + actividades['asesorias'] + ' servicios gratuitos de asesorías jurídicas generales de un defensor, lo anterior se detalla de la siguiente manera:', style: 'textoJustificado' },
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
							{ text: 'TOTAL', style: 'tableHeader', alignment: 'center' },
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
			{ text: '2.- AUDIENCIAS', style: 'subheader2' },
			{
				text: 'El defensor público '+nombreDef+' asistio a '+actividades['audiencias']+' audiencias celebradas.', style: 'textoJustificado'
			},                
			//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			{ text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
			{
				text: 'El defensor público '+nombreDef+' asistio a '+actividades['visitas']+' visitas carcelarias a sus internos.', style: 'textoJustificado'
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
