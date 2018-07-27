function informeExpGCompleto(totalExp){
	console.time('Test informeGCompleto');
	var tablaSexo={}, tablaGenero={},tablaGeneral={}, tablaEdad={}, tablaEtnia={}, tablaIdioma={}, tablaDiscapacidad={};
	var tablaTop = {}, tablaActividades={}, tablaMateria={}, tablaRegion={};
    tablaGeneral = getTablaGeneralExp('');
    tablaActividades = getTablaActividades('');    
    tablaSexo = getTablaSexoExp('');
	tablaGenero=getTablaGeneroExp('');
	tablaEdad = getTablaEdadExp('');
	tablaEtnia = getTablaEtniasExp();
	tablaIdioma = getTablaIdiomasExp();
	tablaDiscapacidad = getTablaDiscapacidadExp();
	tablaMateria = getTablaMateria('');
	tablaRegion = getTablaRegion('');
	tablaTop = getTablaTopTenExp(); 
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
			{ text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, se obtuvieron '+totalExp+' registros de expedientes.', style: 'textoJustificado' },
			{ text: 'A continuación se muestra el estado general de los expedientes encontrados.', style: 'textoJustificado' },
            tablaGeneral,			
            { text: 'Del total general de expedientes, a continuación se desglosan las actividades realizadas sobre de los beneficiarios :', style: 'textoJustificado' },
            tablaActividades,
			{ text: 'A continuación se desglosan los atributos de los beneficiarios:', style: 'textoJustificado' },
            tablaSexo,
            { text: '\n ', style: 'saltoLinea' },
			tablaGenero,
			tablaEdad,
			{ text: '\n ', style: 'saltoLinea' },
			tablaEtnia,
			{ text: '', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
			tablaIdioma,		
			tablaDiscapacidad,
			{ text: '', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
			tablaMateria,
			tablaRegion,
			{ text: '', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
			{ text: 'Mostrar listado de los defensores públicos que reportan un alto número de expedientes brindadas en el periodo establecido en la búsqueda ', style: 'textoJustificado' },
			{ text: 'DEFENSORES CON ALTO NÚMERO DE EXPEDIENTES (Maximo 10 Defensores)' },
			tablaTop,
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