$(document).ready(function() {
    
    var informeGActividad= document.getElementById('informeGActividades');
    informeGActividad.addEventListener('click', informeGActividades, false);
    function informeGActividades() {
        //console.log('entro a activ');
            $('#menuContainer').load("informeGActividades.php");
    };

    var informeGExpediente= document.getElementById('informeGExpedientes');
    informeGExpediente.addEventListener('click', informeGExpedientes, false);
    function informeGExpedientes() {
        //console.log('entro a activ');
            $('#menuContainer').load("informeGExpedientes.php");
    };

    var informePActividad= document.getElementById('informePActividades');
    informePActividad.addEventListener('click', informePActividades, false);
    function informePActividades() {
        //console.log('entro a activ');
            $('#menuContainer').load("informePActividades.php");
    };

    var informePExpediente= document.getElementById('informePExpedientes');
    informePExpediente.addEventListener('click', informePExpedientes, false);
    function informePExpedientes() {
        //console.log('entro a activ');
            $('#menuContainer').load("informePExpedientes.php");
    };

    var consultaActividad= document.getElementById('consultaActividades');
        consultaActividad.addEventListener('click', consultaActividades, false);
    function consultaActividades() {
        //console.log('entro a activ');
            $('#menuContainer').load("consultasActividades.php");
    };  

    var consultaExpediente= document.getElementById('consultaExpedientes');
        consultaExpediente.addEventListener('click', consultaExpedientes, false);
    function consultaExpedientes() {
        //console.log('entro a activ');
            $('#menuContainer').load("consultasExpedientes.php");
    };



});
    //+++++++++++++++++++++++++++++FIN PARTE MENU MODULO ESTADISTICA++++++++++++++++++++++++++++
    function generarGrafica(){
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }
    function solicitarConsultaAct(){
        var inicio = $('#inputInicio').val();
        var final = $('#inputFinal').val();
        var desc = $('#botonDesc').get(0);
        var selSistema = $('#selectSistema').val(); 
        var selConsulta = $('#selectConsulta').val(); 
        var labelFinal = document.getElementById('labelFinal');

        console.log(inicio, final, desc, selSistema, selConsulta);

        $.ajax({
			url: "../../controlador/actividad/consultaActividades.php",
			type: "POST",
            data: {"ini":inicio,
                   "fin":final,
                   "sistema":selSistema,
                   "consulta":selConsulta
                 },
			success: function (data) {
               // console.log(data,'  data de');
				if (data != 0) {
                    var jsonConsulta = jQuery.parseJSON(data);
                    
					console.log(jsonConsulta, ' data de actividades');
                    $('#resultadoConsulta').removeAttr('style'); 
                    //$('#resultadoConsulta').append('<h3> hoooola</h3>');
                    //generarGrafica();
				
				} else {
					$('#resultadoConsulta').attr('style','display:none;');
					$('#resultadoConsulta').append('LA CONSULTA SOLICITADA NO CONTIENE DATOS');
				}
			}
		});
    }
    function myFunctionDate(val) { //this.value from input date vista informeActividades.php
        var inicio = $('#inputInicio').val();
        var final = $('#inputFinal').val();
        var desc = $('#botonDesc').get(0);
        var selSistema = $('#selectSistema').val(); 
        var selConsulta = $('#selectConsulta').val(); 
        var labelFinal = document.getElementById('labelFinal');    

        if (inicio != '' && final != '') {
            var ini = new Date(inicio);
            var fin = new Date(final);
            if ((ini < fin) || (ini == fin)) {                
                $(".alert").remove();
                if(selSistema != '' && selConsulta != ''){
                   // console.log(selSistema, 'VALOR select sistema');
                    desc.disabled = false;  
                }else{
                    desc.disabled = true;
                    //console.log(selSistema, 'VALOR select sistema');
                }
                return true;
            } else {            
                				
                $(".errors").remove();
                labelFinal.setAttribute("class", "alert alert-danger");    
                labelFinal.innerText = "la fecha final debe ser Mayor";
                return false;
            }
        } else {
            return false;
        }
    };
    
    function myFunctionSistema(val){
        var inicio = $('#inputInicio').val();
        var final = $('#inputFinal').val();
        var selAtributos = $('#selectAtributos').val(); 
        var desc = $('#botonDesc').get(0);   
        
        if (inicio != '' && final != '' && selAtributos != '' && val !='' ) {
            var ini = new Date(inicio);
            var fin = new Date(final);
            if(fin > ini){
                desc.disabled = false;
            }else{
                desc.disabled = true;
            }
            
            return true;
        } else {
            //console.log('entro false');
            desc.disabled = true;
            return false;
        } 
    };

    function generarPDFActividades() {
        var inicio = $('#inputInicio').val();
        var final = $('#inputFinal').val();
        var atributos  = $('#selectAtributos')[0].selectedOptions; 
        var arrAtrib = [];
        for(var i = 0; i< atributos.length; i++){
            arrAtrib.push(atributos[i].value);
            console.log(atributos[i].value, i+' valor(es) select atributos');
        }       
        //console.timeStart('Test performance');
        /* var fechaI = document.getElementById('inputInicio').value;
        var fechaFi = document.getElementById('inputFinal').value;
        var fecha1 = new Date(fechaI);
        var fecha2 = new Date(fechaFi);
        var actividades;
        var asesoriasTO;
        var sexos, generos, etnias, etniasR, etniasSistema, edades;
        var totalH, totalM, totalSexoT, totalSexoO, totalSexo;
        var totalLesbico, totalGay, totalBisexual, totalTransexual, 
            totalTransgenero, totalTravesti, totalIntersexual,
            totalGenerosT, totalGenerosO, totalG, totalEdadT, 
            totalEdadO, totalEdadS,totalEdad1, totalEdad2, totalEdad3, totalEdad4, totalEdad5, totalEdad6 ;
        var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nomviembre", "Diciembre"];
        console.log(fecha1.getUTCDate(), meses[fecha1.getUTCMonth()]);
        //console.log(getBase64FromImageUrl('../../recursos/images/cabecera.png'));
        $.ajax({
            url: "../../controlador/personal_campo/controladorInformeAct.php",
            type: "POST",
            data: "fechaI=" + fechaI + "&fechaF=" + fechaFi,
            success: function (data) {
                var base64 = globalHeaderPDF;
                var jsonInforme = jQuery.parseJSON(data);
                //console.log(base64, ' base 64');
    
                actividades = getNumActividades(jsonInforme);
                asesoriasTO = getNumAsesoriasTO(jsonInforme);
                sexos = getNumSexoUsuarios(jsonInforme);
                generos = getNumGeneroUsuarios(jsonInforme);
                etnias = getNumEtniasUsuarios(jsonInforme);
                etniasSistema = getEtniasBySistema(getArrayEtniasSystem(jsonInforme), jsonInforme);
                etniasR = generarRowsEtnias(etnias, etniasSistema);
                edades = getNumEdadUsuarios(jsonInforme);
                console.log(edades, ' edades por sistema');
                console.log(etniasR, '  CUERPO DE LA TABLA');
                //console.log(etniasSistema, ' etnias por sistema');
    
    
                totalH = sexos['numMascT'] + sexos['numMascO'];
                totalM = sexos['numFemT'] + sexos['numFemO'];
                totalSexo = totalH + totalM;
                totalSexoT = sexos['numMascT'] + sexos['numFemT'];
                totalSexoO = sexos['numMascO'] + sexos['numFemO'];
    
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
                totalEdadT = edades['edades1T'] + edades['edades2T'] + edades['edades3T'] + edades['edades4T'] + edades['edades5T'] +  edades['edades6T'];
                totalEdadO =  edades['edades1O'] + edades['edades2O'] + edades['edades3O'] + edades['edades4O'] + edades['edades5O'] +  edades['edades6O'];
                totalEdadS = totalEdadT + totalEdadO;
    
    
                //console.log(arrays, ' arrays prueba 1');
    
                /* 	
                                        ['total', '302','123','1232'],
                                        ['total', '302','123','1232']
                'numMascT',
                    'numFemT',
                    'numMascO',
                'numFemO',
                            var contenido = '';
                            $.each(jsonInforme, function (KEY, VALOR) {
                                contenido += 'Nombre del defensor: ' + VALOR.Defensor + '\n';
                                contenido += 'Nombre del usuario de servicio: ' + VALOR.Usuario + '\n';
                                contenido += 'Fecha de registro: ' + VALOR.fecha_registro + '\n';
                                contenido += 'Observaciones: ' + VALOR.observacion + '\n\n';
                            }); 
                //aqui habia un * /
                
                var fecha = new Date();
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                var fechaF = fecha.toLocaleDateString("es-ES", options);
    
                var primerM = fechaF.charAt(0).toUpperCase();
                var siguiente = fechaF.slice(1).toLowerCase();
                //console.log(fecha1, ' fecha actual ');
                var dd = {
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
                        { text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2' },
                        { text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, durante el periodo que comprende del ' + fecha1.getUTCDate() + ' de ' + meses[fecha1.getUTCMonth()] + ' al ' + fecha2.getUTCDate() + ' de ' + meses[fecha2.getUTCMonth()] + ' del presente año, la Defensoría Pública brindó ' + actividades['asesorias'] + ' servicios gratuitos de asesorías jurídicas generales, lo anterior se detalla de la siguiente manera:', style: 'textoJustificado' },
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
                                    ['0-7 Años',	totalEdad1, edades['edades1T'], edades['edades1O']],
                                    ['8-12 Años',	totalEdad2, edades['edades2T'], edades['edades2O']],
                                    ['13-18 Años',	totalEdad3, edades['edades3T'], edades['edades3O']],
                                    ['19-25 Años',	totalEdad4, edades['edades4T'], edades['edades4O']],
                                    ['26-30 Años',	totalEdad5, edades['edades5T'], edades['edades5O']],
                                    ['31-90 Años',	totalEdad6, edades['edades6T'], edades['edades6O']],
                                    ['Total', 		totalEdadS, totalEdadT,totalEdadO]
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
                                body: [
                                    [
                                        { text: 'Idioma o Lengua', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
                                        { text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
                                        {}, {}
                                    ],
                                    [
                                        {},
                                        { text: 'Total', style: 'tableHeader', alignment: 'center' },
                                        { text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
                                        { text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
                                    ],
                                    ['Idioma amuzgo', ' ', ' ', ' '],
                                    ['Lenguas chinantecas', ' ', ' ', ' '],
                                    ['Idioma chocho', ' ', ' ', ' '],
                                    ['Idioma chontal de oaxaca', ' ', ' ', ' '],
                                    ['Idioma huave', ' ', ' ', ' '],
                                    ['Idioma chatino', ' ', ' ', ' '],
                                    ['Idioma mixe', ' ', ' ', ' '],
                                    ['Idioma ixcateco', ' ', ' ', ' '],
                                    ['Lenguas zapotecas', ' ', ' ', ' '],
                                    ['Lenguas zoqueanas', ' ', ' ', ' '],
                                    ['Lenguas mazatecas', ' ', ' ', ' '],
                                    ['Lenguas mixeanas', ' ', ' ', ' '],
                                    ['Mixteco de la frontera Puebla-Oaxaca', ' ', ' ', ' '],
                                    ['Mixteco del oeste alto', ' ', ' ', ' '],
                                    ['Náhuatl oaxaqueño', ' ', ' ', ' '],
                                    ['Idioma papabuco', ' ', ' ', ' '],
                                    ['Idioma pochuteco', ' ', ' ', ' '],
                                    ['Lenguas popolocanas', ' ', ' ', ' '],
                                    ['Lenguas tequistlatecas', ' ', ' ', ' '],
                                    ['Idioma tequistlateco', ' ', ' ', ' '],
                                    ['Triqui de chicahuaxtla', ' ', ' ', ' '],
                                    ['Triqui de copala', ' ', ' ', ' '],
                                    ['Triqui de itunyoso', ' ', ' ', ' '],
                                    ['Triqui de santo Domingo del estado', ' ', ' ', ' '],
                                    ['Soren whichmann', ' ', ' ', ' '],
                                    ['Total', ' ', ' ', ' '],
                                ]
                            }
                        },
                        { text: '\n ', style: 'saltoLinea' },
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
                                    ['Sensoriales y de la comunicación', ' ', ' ', ' '],
                                    ['Motrices', ' ', ' ', ' '],
                                    ['Mentales', ' ', ' ', ' '],
                                    ['Multiples', ' ', ' ', ' '],
                                    ['Total', ' ', ' ', ' ']
                                ]
                            }
                        },
                        { text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asesorías jurídicas brindadas en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en  asesorías jurídicas, esto también por sistema. ', style: 'textoJustificado' },
                        { text: '10 DEFENSORES CON ALTO NÚMERO DE ASESORÍAS JURÍDICAS' },
                        {
                            style: 'tableExample',
                            color: 'black',
                            table: {
                                widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
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
                                    ['1', ' ', ' ', ' ', ' '],
                                    ['2', ' ', ' ', ' ', ' '],
                                    ['3', ' ', ' ', ' ', ''],
                                    ['4', ' ', ' ', ' ', ''],
                                    ['5', ' ', ' ', ' ', ''],
                                    ['6', ' ', ' ', ' ', ''],
                                    ['7', ' ', ' ', ' ', ''],
                                    ['8', ' ', ' ', ' ', ''],
                                    ['9', ' ', ' ', ' ', ''],
                                    ['10', ' ', ' ', ' ', '']
                                ]
                            }
                        },
                        { text: '\n ', style: 'saltoLinea' },
                        { text: '10 DEFENSORES CON UN BAJO NÚMERO DE ASESORÍAS JURÍDICAS' },
                        {
                            style: 'tableExample',
                            color: 'black',
                            table: {
                                widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
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
                                    ['1', ' ', ' ', ' ', ' '],
                                    ['2', ' ', ' ', ' ', ' '],
                                    ['3', ' ', ' ', ' ', ''],
                                    ['4', ' ', ' ', ' ', ''],
                                    ['5', ' ', ' ', ' ', ''],
                                    ['6', ' ', ' ', ' ', ''],
                                    ['7', ' ', ' ', ' ', ''],
                                    ['8', ' ', ' ', ' ', ''],
                                    ['9', ' ', ' ', ' ', ''],
                                    ['10', ' ', ' ', ' ', '']
                                ]
                            }
                        },
    
                        { text: '2.- AUDIENCIAS', style: 'subheader2' },
                        {
                            text: 'Durante el periodo que comprende del ___ de _______ al ____ de ________ del 			presente año, los Defensores Públicos asistieron a _______ audiencias celebradas.', style: 'textoJustificado'
                        },
                        { text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia civil ________; materia familiar _______; materia administrativa _______; materia agraria ________; materia ejecución de sanciones ________; tribunal de alzada _______. Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
                        { text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asistencia a audiencias en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos de asistencia en audiencias, esto también por sistema.', style: 'textoJustificado' },
                        { text: '\n ', style: 'saltoLinea' },
                        { text: '10 DEFENSORES CON ALTO NÚMERO DE AUDIENCIAS' },
                        {
                            style: 'tableExample',
                            color: 'black',
                            table: {
                                widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
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
                                    ['1', ' ', ' ', ' ', ''],
                                    ['2', ' ', ' ', ' ', ''],
                                    ['3', ' ', ' ', ' ', ''],
                                    ['4', ' ', ' ', ' ', ''],
                                    ['5', ' ', ' ', ' ', ''],
                                    ['6', ' ', ' ', ' ', ''],
                                    ['7', ' ', ' ', ' ', ''],
                                    ['8', ' ', ' ', ' ', ''],
                                    ['9', ' ', ' ', ' ', ''],
                                    ['10', ' ', ' ', ' ', '']
                                ]
                            }
                        },
    
                        { text: '10 DEFENSORES CON UN BAJO NÚMERO DE AUDIENCIAS' },
                        {
                            style: 'tableExample',
                            color: 'black',
                            table: {
                                widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
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
                                    ['1', ' ', ' ', ' ', ' '],
                                    ['2', ' ', ' ', ' ', ' '],
                                    ['3', ' ', ' ', ' ', ''],
                                    ['4', ' ', ' ', ' ', ''],
                                    ['5', ' ', ' ', ' ', ''],
                                    ['6', ' ', ' ', ' ', ''],
                                    ['7', ' ', ' ', ' ', ''],
                                    ['8', ' ', ' ', ' ', ''],
                                    ['9', ' ', ' ', ' ', ''],
                                    ['10', ' ', ' ', ' ', '']
                                ]
                            }
                        },
                        { text: '\n ', style: 'saltoLinea' },
                        { text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
                        {
                            text: 'Durante el periodo que comprende del ___ de _______ al ____ de ________ del presente año, los Defensores Públicos realizaron ___________ visitas carcelarias a sus internos.', style: 'textoJustificado'
                        },
                        { text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia ejecución de sanciones ________ Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
                        { text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de visitas carcelarias  en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en visitas carcelarias , esto también por sistema.', style: 'textoJustificado' },
                        { text: '10 DEFENSORES CON ALTO NÚMERO DE VISITAS CARCELARÍAS' },
                        {
                            style: 'tableExample',
                            color: 'black',
                            table: {
                                widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
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
                                    ['1', ' ', ' ', ' ', ' '],
                                    ['2', ' ', ' ', ' ', ' '],
                                    ['3', ' ', ' ', ' ', ''],
                                    ['4', ' ', ' ', ' ', ''],
                                    ['5', ' ', ' ', ' ', ''],
                                    ['6', ' ', ' ', ' ', ''],
                                    ['7', ' ', ' ', ' ', ''],
                                    ['8', ' ', ' ', ' ', ''],
                                    ['9', ' ', ' ', ' ', ''],
                                    ['10', ' ', ' ', ' ', '']
                                ]
                            }
                        },
                        { text: '\n\n\n ', style: 'saltoLinea' },
                        { text: '10 DEFENSORES CON UN BAJO NÚMERO DE VISITAS CARCELARÍAS' },
                        {
                            style: 'tableExample',
                            color: 'black',
                            table: {
                                widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
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
                                    ['1', ' ', ' ', ' ', ' '],
                                    ['2', ' ', ' ', ' ', ' '],
                                    ['3', ' ', ' ', ' ', ''],
                                    ['4', ' ', ' ', ' ', ''],
                                    ['5', ' ', ' ', ' ', ''],
                                    ['6', ' ', ' ', ' ', ''],
                                    ['7', ' ', ' ', ' ', ''],
                                    ['8', ' ', ' ', ' ', ''],
                                    ['9', ' ', ' ', ' ', ''],
                                    ['10', ' ', ' ', ' ', '']
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
    
                // print the PDF
                //pdfMake.createPdf(docDefinition).print();
    
                // download the PDF
                //pdfMake.createPdf(docDefinition).download('optionalName.pdf');
                pdfMake.createPdf(dd).open();
            }
        }); */
        //console.timeEnd('Test performance');
    };


    
function seleccionarUnDefensor(val){
    console.log(val.checked, 'primera prueba onchange');
    
    if(val.checked == true){//esta activada el check        
        $('#idCheckDefensor').removeAttr('style');        
    }else{
        //$('#idCheckDefensor').empty();
        $('#idCheckDefensor').attr('style','display:none');
    }
}



function cargarInputDefensor(){
    var varUsuario=[];
   console.log(window.Global_defensores, ' valor del global');
   //var datos = $.parseJSON(window.Global_defensores);
   var datos= window.Global_defensores;
   $.each(datos, function (KEY, VALOR) {
               var temp={};
                if(VALOR.id_personal > 0){
                        temp['label']=VALOR.nombre;
                        temp['apellidos']=VALOR.ap_paterno+" "+VALOR.ap_materno;
                        temp['desc']=VALOR.colonia+", "+VALOR.municipio;
                        temp['id_usuario']=VALOR.id_personal;
                        //console.log(VALOR);
                        varUsuario.push(temp);
                }
               });
$( function() {             
    function log( message ) {
      var usuario=message.item.label+" "+message.item.apellidos;
      if($("#usuarios").val()!= " " || $("#usuarios").val()!= ""){//PRIMERO CHECO SI ESQUE EL USUARIO NO FUE YA INSERTADO
        $('#usuarioSeleccionados').empty();
        var tr=document.createElement("tr");
        //      $( "<tr><td>" ).text( message ).prependTo( "#usuarioSeleccionados" );
        var td=document.createElement("td");
        tr.appendChild(td);
        //console.log(message);
    
        // $( td ).text( message ).prependTo( "#usuarioSeleccionados" );
        $( td ).text( usuario );// A ESTE TD LE ASIGO AL USUARIO DEL SERVICIO
        td.setAttribute("id_usuario_eliminar",message.item.id_usuario);
        //td.setAttribute("class","id_usuario_servicio");
        //td.setAttribute("name","id_usuario");
        $("#usuarioSeleccionados").append(tr);
        var td2=document.createElement("td");         
        $("#usuarios").val(message.item.id_usuario);          
        $(td2).append("<button type='button' class='btn btn-primary eliminar col-md-7 col-xs-12'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> </button>");   
        tr.appendChild(td2);
        //$("#project").text(usuario);
      }   
      $("#project").attr('disabled', true);//SIEMPRE LIMPIA EL INPUT DE BUSQUEDA  // $( "#usuarioSeleccionados" ).scrollTop( 0 );
    }///TERMINA LA FUCION
  $( "#project" ).autocomplete({
     minLength: 0,
     source: varUsuario,
     focus: function( event, ui ) {
       $( "#project" ).val(ui.item.label+" "+ ui.item.apellidos );
       return false;
     },
     select: function( event, ui ) {
       var usuario=ui.item.label+" "+ui.item.apellidos;
        log(ui);
       return false;
     }
   })
   .autocomplete( "instance" )._renderItem = function( ul, item ) {
     return $( "<li>" )
       .append( "<div>" + item.label +" "+item.apellidos+ "<br>" + item.desc + "</div>" )
       .appendTo( ul );
   };
});
}