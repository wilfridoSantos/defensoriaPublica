function informeAmbasByDefPeriodo(sistema, atributos){
    console.log(sistema, atributos, ' entro a funcion pdf');
    console.time('Test informeBYDEFPERIODO ambas');
	var tablaSexo={}, tablaGenero={},tablaGeneral={}, tablaEdad={}, tablaEtnia={}, tablaIdioma={}, tablaDiscapacidad={};
	var tablaActividades={};
    var campo={};
    tablaGeneral = getTablaGeneralExp(sistema);
    tablaActividades = getTablaActividades(sistema);
    var salto = { text: '\n\n\n', style: 'saltoLinea' };
    for(var i=0; i<atributos.length; i++ ){
        switch(atributos[i]){
            case 'SEXO':
                tablaSexo = getTablaSexoExp(sistema);
                campo={ text:'A continuación se desglosan los atributos de los beneficiarios involucrados en los expedientess.', style: 'textoJustificado' };
            break;
            case 'GENERO':
                campo={ text:'A continuación se desglosan los atributos de los beneficiarios involucrados en los expedientess.', style: 'textoJustificado' };
                tablaGenero=getTablaGeneroExp(sistema);

            break;
            case 'EDAD':
                campo={ text:'A continuación se desglosan los atributos de los beneficiarios involucrados en los expedientess.', style: 'textoJustificado' };
                tablaEdad = getTablaEdadExp(sistema);
            break;
            case 'ETNIA':
            campo={ text:'A continuación se desglosan los atributos de los beneficiarios involucrados en los expedientess.', style: 'textoJustificado' };
                tablaEtnia = getTablaEtniasExp(sistema);
            break;
            case 'IDIOMA':
            campo={ text:'A continuación se desglosan los atributos de los beneficiarios involucrados en los expedientess.', style: 'textoJustificado' };
                tablaIdioma = getTablaIdiomasExp(sistema);
            break;
            case 'DISCAPACIDAD':
            campo={ text:'A continuación se desglosan los atributos de los beneficiarios involucrados en los expedientess.', style: 'textoJustificado' };
                tablaDiscapacidad = getTablaDiscapacidadExp(sistema);
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
                        text: 'Reyes Mantecón, San Bartolo Coyotepec, Oax; ' + primerM + siguiente, style: 'subheader'
               },
				],
				style: 'header'
			},	
			{ text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, se obtuvieron xxxx registros de expedientes del defensor: xxxxx.', style: 'textoJustificado' },
			{ text: 'A continuación se muestra el estado general de los expedientes del defensor.', style: 'textoJustificado' },
            tablaGeneral,			
            { text: 'A continuación se desglosan las actividades realizadas sobre de los beneficiarios involucrados en los expedientess. :', style: 'textoJustificado' },
            tablaActividades,
            salto,
			campo,
            tablaSexo,
			tablaGenero,
			tablaEdad,
			tablaEtnia,
			tablaIdioma,		
			tablaDiscapacidad,
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
	console.timeEnd('Test informeBYDEFPERIODO ambas');
	return pdfAct;
}