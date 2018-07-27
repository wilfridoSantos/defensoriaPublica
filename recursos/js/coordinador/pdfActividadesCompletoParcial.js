function informeCompletoParcialT(selAtrib){
	console.log('apenad entro a informecompletoParcialT');
	console.time('Test functionGlobalInformeAct');
	var tablaSexo = {};		
	var tablaGenero = {};		
	var tablaDiscapacidades = {};		
	var tablaEdad = {};		
	var tablaIdiomas = {};		
	var tablaEtnias = {};		
	var top10Defensores = {};
		top10Defensores = getTablaTopTen('TRADICIONAL');
	var tablaGeneral = {};
		tablaGeneral = getTablaGeneral('TRADICIONAL');

		for(var i=0; i<selAtrib.length; i++){
			switch(selAtrib[i]){
				case 'SEXO':
					tablaSexo = getTablaSexo('TRADICIONAL');	
				break;
				case 'GENERO':
					tablaGenero = getTablaGenero('TRADICIONAL');
				break;
				case 'EDAD':
					tablaEdad = getTablaEdad('TRADICIONAL');
				break;
				case 'ETNIA':
					tablaEtniaa = getTablaEtnias('TRADICIONAL');
				break;
				case 'IDIOMA':
					tablaIdiomas = getTablaIdiomas('TRADICIONAL');
				break;
				case 'DISCAPACIDAD':
					tablaDiscapacidades = getTablaDiscapacidad('TRADICIONAL');
				break;
			}
		}
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
			tablaGeneral,
			{ text: 'Del total general de asesorías jurídicas, a continuación se desglosan los atributos de los beneficiarios:', style: 'textoJustificado' },
			tablaSexo,
			tablaGenero,
			tablaEdad,
			tablaEtnias,
			tablaIdiomas,		
			tablaDiscapacidades,
			{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asesorías jurídicas brindadas en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en  asesorías jurídicas, esto también por sistema. ', style: 'textoJustificado' },
			{ text: '10 DEFENSORES CON ALTO NÚMERO DE ASESORÍAS JURÍDICAS' },
			top10Defensores,
			{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE ASESORÍAS JURÍDICAS' },
				getTablaTopTen('TRADICIONAL'),
			{ text: '2.- AUDIENCIAS', style: 'subheader2' },
			{
				text: 'Los defensores publicos asistieron a ' + actividades['audiencias'] + ' audiencias celebradas.', style: 'textoJustificado'
			},
			{ text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia civil ________; materia familiar _______; materia administrativa _______; materia agraria ________; materia ejecución de sanciones ________; tribunal de alzada _______. Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
			{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asistencia a audiencias en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos de asistencia en audiencias, esto también por sistema.', style: 'textoJustificado' },
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON ALTO NÚMERO DE AUDIENCIAS' },
			getTablaTopTen('TRADICIONAL'),
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE AUDIENCIAS' },
			getTablaTopTen('TRADICIONAL'),
			{ text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
			{
				text: 'Los Defensores Públicos realizaron ___________ visitas carcelarias a sus internos.', style: 'textoJustificado'
			},
			{ text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia ejecución de sanciones ________ Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
			{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de visitas carcelarias  en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en visitas carcelarias , esto también por sistema.', style: 'textoJustificado' },
			{ text: '\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON ALTO NÚMERO DE VISITAS CARCELARÍAS' },
			getTablaTopTen('TRADICIONAL'),
			{ text: '\n\n\n ', style: 'saltoLinea' },
			{ text: '\n\n ', style: 'saltoLinea' },
			{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE VISITAS CARCELARÍAS' },
			getTablaTopTen('TRADICIONAL'),
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
function informeCompletoParcialO(jsonInforme){
	
}
function informeCompletoParcialJ(jsonInforme){

}
function informeCompletoParcialALL(jsonInforme){

}