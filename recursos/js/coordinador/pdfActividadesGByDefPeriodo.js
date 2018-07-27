function informeGByDefPeriodo(nombreDef, sistema, actividades){
	console.time('Test informeGPeriodo');
    var fechaI = document.getElementById('inputInicio').value;
    var fechaFi = document.getElementById('inputFinal').value;
    var fecha1 = new Date(fechaI);
    var fecha2 = new Date(fechaFi);
	var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	var tablaSexo={}, tablaGenero={},tablaGeneral={}, tablaEdad={}, tablaEtnia={}, tablaIdioma={}, tablaDiscapacidad={};
    var tablaTop = {};
    console.log(sistema, ' valor sistemaaa');
	tablaGeneral = getTablaGeneral(sistema);
	tablaSexo = getTablaSexo(sistema);
	tablaGenero=getTablaGenero(sistema); 
	tablaEdad = getTablaEdad(sistema);
	tablaEtnia = getTablaEtnias(sistema);
	tablaIdioma = getTablaIdiomas(sistema);
	tablaDiscapacidad = getTablaDiscapacidad(sistema);        
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
                        'Periodo de ' + fechaI + ' a ' + fechaFi, style: 'subheader'
               },
				],
				style: 'header'
            },	
            { text: 'A continuación se presenta el informe del defensor: '+nombreDef +' donde se han registrado ' +actividades.actividadesPorSistema+' actividades generales, los cuales son ASESORIAS JURIDICAS, AUDIENCIAS, Y VISITAS CARCELARÍAS.', style: 'textoJustificado'},
        		
			{ text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2' },
            { text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, durante el periodo que comprende del ' + fecha1.getUTCDate() + ' de ' + meses[fecha1.getUTCMonth()] + ' al ' + fecha2.getUTCDate() + ' de ' + meses[fecha2.getUTCMonth()] + ' de '+fecha2.getFullYear()+', el defensor brindó ' + actividades.actAsesoria + ' servicios gratuitos de asesorías jurídicas generales, lo anterior se detalla de la siguiente manera:', style: 'textoJustificado' },
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
			{ text: '2.- AUDIENCIAS', style: 'subheader2' },
			{
                text: 'Durante el periodo que comprende del ' + fecha1.getUTCDate() + ' de ' + meses[fecha1.getUTCMonth()] + ' al ' + fecha2.getUTCDate() + ' de ' + meses[fecha2.getUTCMonth()]+' de '+fecha2.getFullYear()+', el defensor '+nombreDef+' asistio a '+actividades.actAudiencia+' audiencias celebradas.', style: 'textoJustificado'
			},			
			{ text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
			{
                text: 'Durante el periodo que comprende del ' + fecha1.getUTCDate() + ' de ' + meses[fecha1.getUTCMonth()] + ' al ' + fecha2.getUTCDate() + ' de ' + meses[fecha2.getUTCMonth()] +' de '+fecha2.getFullYear()+',  el defensor '+nombreDef+' asistio a '+actividades.actVisita+' visitas carcelarias a sus internos.', style: 'textoJustificado'
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
	console.timeEnd('Test informeGPeriodo');
	return pdfAct;
	
}        