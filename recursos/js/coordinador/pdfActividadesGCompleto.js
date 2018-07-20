function informeGCompleto(totalAse, actividades){
	console.time('Test informeGCompleto');
	var tablaSexo={}, tablaGenero={},tablaGeneral={}, tablaEdad={}, tablaEtnia={}, tablaIdioma={}, tablaDiscapacidad={};
	var tablaTop = {};
	tablaGeneral = getTablaGeneral();
	tablaSexo = getTablaSexo();
	tablaGenero=getTablaGenero();
	tablaEdad = getTablaEdad();
	tablaEtnia = getTablaEtnias();
	tablaIdioma = getTablaIdiomas();
	tablaDiscapacidad = getTablaDiscapacidad();
	tablaTop = getTablaTopTen();
	var registro = parseInt(actividades[0].actividadesPorSistema)+parseInt(actividades[1].actividadesPorSistema);
	var audiencias, visitas;
	audiencias = parseInt(actividades[0].actAudiencia) +  parseInt(actividades[1].actAudiencia);
	visitas    = parseInt(actividades[0].actVisita) +  parseInt(actividades[1].actVisita);
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
                        text: 'Reyes Mantecón, San Bartolo Coyotepec, Oax; ' + primerM + siguiente, style: 'subheader'
               },
				],
				style: 'header'
			},			
			{ text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, se obtuvieron '+registro+' registros de actividades, los cuales se desglosan en Asesorías juridícas, Audiencias, y Visitas carcelarías.', style: 'textoJustificado' },
			{ text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2' },
            { text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, la Defensoría Pública brindó ' + totalAse + ' servicios gratuitos de asesorías jurídicas generales, lo anterior se detalla de la siguiente manera:', style: 'textoJustificado' },
			tablaGeneral,
			{ text: 'Del total general de asesorías jurídicas, a continuación se desglosan los atributos de los beneficiarios:', style: 'textoJustificado' },
			tablaSexo,
			tablaGenero,
			{ text: '\n ', style: 'saltoLinea' },
			tablaEdad,
			tablaEtnia,
			{ text: '', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
			tablaIdioma,		
			tablaDiscapacidad,
			{ text: '', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
			{ text: 'Mostrar listado de los defensores públicos que reportan un alto número de asesorías jurídicas brindadas en el periodo establecido en la búsqueda, así como se muestran los defensores que reportan los números más bajos en  asesorías jurídicas. ', style: 'textoJustificado' },
			{ text: 'DEFENSORES CON ALTO NÚMERO DE ASESORÍAS JURÍDICAS (Maximo 10 Defensores)' },
			tablaTop,
			{ text: '2.- AUDIENCIAS', style: 'subheader2' },
			{
                text: 'Los defensores publicos asistieron a '+audiencias+' audiencias celebradas.', style: 'textoJustificado'
			},
			{ text: 'Lista top de los defensores públicos que reportan un alto número de asistencia a audiencias en el periodo establecido en la búsqueda, así como los defensores que reportan los números más bajos de asistencia en audiencias.', style: 'textoJustificado' },
			{ text: 'DEFENSORES CON ALTO NÚMERO DE AUDIENCIAS' },
			{},
			{ text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
			{
                text: 'Los defensores públicos asistieron a '+visitas+' visitas carcelarias a sus internos.', style: 'textoJustificado'
			},
			{ text: 'Lista top de los defensores públicos que reportan un alto número de visitas carcelarias  en el periodo establecido en la búsqueda, así como los defensores que reportan los números más bajos en visitas carcelarias.', style: 'textoJustificado' },
			{ text: 'DEFENSORES CON ALTO NÚMERO DE VISITAS CARCELARÍAS' },
			{},	
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
	console.timeEnd('Test informeGCompleto');
	return pdfAct;
	
}        