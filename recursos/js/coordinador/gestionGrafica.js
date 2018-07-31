var globalDatosEstadistico;
var imagen;
//google.visualization.events.addListener(chart, 'click', function () { f=chart.getImageURI();
    //f.addEventListener('click',)
     //document.getElementById('png').outerHTML   = '<p onclick=debugBase64(f)>Printable version</p>';
   // document.getElementById('button').outerHTML = '<a href="' + chart.getImageURI() + '" download="cute.jpg">Printable version</a>';
          
function gestionGrafica(elemento){
         console.log("en elemnto ",elemento);
         switch (elemento) {
             case 'genero':
             genero();
                 break;
             case 'materia':
             Materia();
                 break;
             case 'discapacidad':
             discapacidades();
                 break;
             
            case 'idioma':
                 idioma();
             break;
            case 'expediente':
                 expediente();
             break;
            case 'etnia':
                 etnias();
             break;
            
             default:
                 break;
         }
}

function discapacidades() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadistico.tablaDiscapacidadExp;
                   var oral=array.filter(function(x){return (x.sis=='ORAL')});
					var tradicional=array.filter(function(x){return (x.sis=='TRADICIONAL')});
					var grafica=[['Discapacidad en sistema tradicional','Hombre','Mujeres']];
					    tradicional.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.discapacidadUs);
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   grafica.push(arrayNew);	   
						});
					var graficatwo=[['Discapacidad en sistema oral','Hombre','Mujeres']];
					    oral.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.discapacidadUs);
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   graficatwo.push(arrayNew);	   
						});
						console.log("emprimiento la grafica ",grafica);
                      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var datatwo = google.visualization.arrayToDataTable(graficatwo);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                           $('#buttonone').empty();
                           $('#buttonone').append( '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        var barchart_options = {title:'Grafica de oral',
                                          //   legend: 'none'
                                    };
                        //var chart = new google.visualization.Bar(document.getElementById('barchart_div'));
                        var barchart = new google.visualization.ColumnChart(document.getElementById('columnchart_two'));
                        //barchart.draw(data, barchart_options);
                        barchart.draw(datatwo, barchart_options);
                        $('#buttontwo').empty();
                     // document.getElementById('buttontwo').outerHTML = '<a href="' + barchart.getImageURI() + '" download="grafica.jpg">Descargar</a>';
                      $('#buttontwo').append( '<a href="' + barchart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        //barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
                    }

    }// final funcion de discapacidad
function etnias() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadistico.tablaEtniaExp;
                   var oral=array.filter(function(x){return (x.sis=='ORAL')});
					var tradicional=array.filter(function(x){return (x.sis=='TRADICIONAL')});
					var grafica=[['Etnias en sistema tradicional','Expediente','Hombre','Mujeres']];
					    tradicional.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.etniaUs);
								   arrayNew.push(parseInt(element.totalExp));
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   grafica.push(arrayNew);	   
						});
					var graficatwo=[['Etnias en sistema oral','Expediente','Hombre','Mujeres']];
					    oral.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.etniaUs);
								   arrayNew.push(parseInt(element.totalExp));
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   graficatwo.push(arrayNew);	   
						});
						console.log("emprimiento la grafica ",grafica);
                      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var datatwo = google.visualization.arrayToDataTable(graficatwo);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                           $('#buttonone').empty();
                           $('#buttonone').append( '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        var barchart_options = {title:'Grafica de oral',
                                          //   legend: 'none'
                                    };
                        //var chart = new google.visualization.Bar(document.getElementById('barchart_div'));
                        var barchart = new google.visualization.ColumnChart(document.getElementById('columnchart_two'));
                        //barchart.draw(data, barchart_options);
                        barchart.draw(datatwo, barchart_options);
                        $('#buttonone').empty();
                        $('#buttontwo').append( '<a href="' + barchart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');

                        //barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
                    }

    }// final funcion de etnias
function genero() {
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadistico.tablaGeneroExp;
                   var oral=array.filter(function(x){return (x.sistema=='ORAL')});
					var tradicional=array.filter(function(x){return (x.sistema=='TRADICIONAL')});
					var grafica=[['Discapacidad en sistema tradicional','Total']];
					    tradicional.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.generoUs);
								   arrayNew.push(parseInt(element.totalUsuarios));
	
							   grafica.push(arrayNew);	   
						});
					var graficatwo=[['Discapacidad en sistema oral','total']];
					    oral.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.generoUs);
								   arrayNew.push(parseInt(element.totalUsuarios));
							   graficatwo.push(arrayNew);	   
						});
						console.log("emprimiento la grafica genero",grafica);
                      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var datatwo = google.visualization.arrayToDataTable(graficatwo);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                           $('#buttonone').empty();
                           $('#buttonone').append( '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        var barchart_options = {title:'Grafica de oral',
                                          //   legend: 'none'
                                    };
                        //var chart = new google.visualization.Bar(document.getElementById('barchart_div'));
                        var barchart = new google.visualization.ColumnChart(document.getElementById('columnchart_two'));
                        //barchart.draw(data, barchart_options);
                        barchart.draw(datatwo, barchart_options);
                        $('#buttonone').empty();
                           $('#buttontwo').append( '<a href="' + barchart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        //barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
                    }

    }// final funcion de discapacidad
function idioma() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var tradicional=globalDatosEstadistico.tablaIdiomaExp;
                    var oral=globalDatosEstadistico.tablaIdiomaExp;
                  // var oral=array.filter(function(x){return (x.sis=='ORAL')});
				//	var tradicional=array.filter(function(x){return (x.sis=='TRADICIONAL')});
					var grafica=[['Idiomas en sistema tradicional','Hombre','Mujeres']];
                    tradicional.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.idiomaUs);
								   arrayNew.push(parseInt(element.hombresT));
								   arrayNew.push(parseInt(element.mujeresT));
							   grafica.push(arrayNew);	   
                        });
                        
					var graficatwo=[['idiomas en sistema oral','Hombre','Mujeres']];
                    oral.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.idiomaUs);
								   arrayNew.push(parseInt(element.hombresO));
								   arrayNew.push(parseInt(element.mujeresO));
							   graficatwo.push(arrayNew);	   
						});
						console.log("emprimiento la grafica ",grafica);
                      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var datatwo = google.visualization.arrayToDataTable(graficatwo);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                           $('#buttonone').empty();
                           $('#buttonone').append( '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        var barchart_options = {title:'Grafica de oral',
                                          //   legend: 'none'
                                    };
                        //var chart = new google.visualization.Bar(document.getElementById('barchart_div'));
                        var barchart = new google.visualization.ColumnChart(document.getElementById('columnchart_two'));
                        //barchart.draw(data, barchart_options);
                        barchart.draw(datatwo, barchart_options);
                        $('#buttonone').empty();
                        $('#buttontwo').append( '<a href="' + barchart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');

                        //barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
                    }

    }// final funcion de idioma


function Materia() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadistico.tablaMateriaExp;
                    var grafica;//=[['Materia en sistema tradicional','Hombres','Mujeres'],
                                  // ];
                                  
					    array.forEach(elemento => {
                                 grafica=  [['Materia en sistema tradicional','Expediente','Hombres','Mujeres'],
                                          ['Agrario',parseInt(elemento.agrarioTExp),parseInt(elemento.agrarioTH),parseInt(elemento.agrarioTM)],
                                          ['Amparos',parseInt(elemento.amparosTExp),parseInt(elemento.amparosTH),parseInt(elemento.amparosTM)],
                                          ['Civil',parseInt(elemento.civilTExp),parseInt(elemento.civilTH),parseInt(elemento.civilTM)],
                                          ['Ejecucion de sanciones',parseInt(elemento.ejecucionTExp),parseInt(elemento.ejecucionTH),parseInt(elemento.ejecucionTM)],
                                          ['Familiar',parseInt(elemento.familiarTExp),parseInt(elemento.familiarTH),parseInt(elemento.familiarTM)],
                                          ['Mercantil',parseInt(elemento.mercantilTExp),parseInt(elemento.mercantilTH),parseInt(elemento.mercantilTM)],
                                          ['Penal',parseInt(elemento.penalTExp),parseInt(elemento.penalTH),parseInt(elemento.penalTM)]
                                   ];
					 
						});
                    //var graficatwo=[['Materia en sistema oral','Hombres','Mujeres']];
                    var graficatwo;
                    array.forEach(element => {
                             graficatwo=[['Materia en sistema oral','Expediente','Hombres','Mujeres'],
                                            ['Penal',parseInt(element.penalOExp),parseInt(element.penalOH),parseInt(element.penalOM)]
                                 ];
					   
						});
						console.log("emprimiento la grafica ",grafica);
						console.log("emprimiento la grafica two ",graficatwo);
                      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var datatwo = google.visualization.arrayToDataTable(graficatwo);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                           $('#buttonone').empty();
                           $('#buttonone').append( '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        var barchart_options = {title:'Grafica de oral',
                                          //   legend: 'none'
                                    };
                        //var chart = new google.visualization.Bar(document.getElementById('barchart_div'));
                        var barchart = new google.visualization.ColumnChart(document.getElementById('columnchart_two'));
                        //barchart.draw(data, barchart_options);
                        barchart.draw(datatwo, barchart_options);
                        $('#buttonone').empty();
                        $('#buttontwo').append( '<a href="' + barchart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');

                        //barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
                    }

    }// final funcion de materia
function expediente() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadistico.tablaGeneralExp;
                    var tradicional=array.find(function(x){return (x.sistemaG==='TRADICIONAL')});
                    var oral=array.find(function(x){return (x.sistemaG==='ORAL')});
                    var grafica;//=[['Materia en sistema tradicional','Hombres','Mujeres'],
                                  // ];
                                  
                     // tradicional.forEach(elemento => {
                                 grafica=  [['Expediente en sistema tradicional','Total expediente'],
                                          ['Baja falta de interes',parseInt(tradicional.expBajaFalta )],
                                          ['Baja por revocación',parseInt(tradicional.expBajaRevocacion)],
                                          ['Finalizados',parseInt(tradicional.expFinalizacion)],
                                          ['Iniciado',parseInt(tradicional.expIniciado )],
                                          ['Proceso',parseInt(tradicional.expProceso )]
                                        
                                   ];
					 
						//});
                    //var graficatwo=[['Materia en sistema oral','Hombres','Mujeres']];
                    var graficatwo;
                   // oral.forEach(element => {
                                    graficatwo=  [['Expediente en sistema oral','Total expediente'],
                                    ['Baja falta de interes',parseInt(tradicional.expBajaFalta )],
                                    ['Baja por revocación',parseInt(tradicional.expBajaRevocacion)],
                                    ['Finalizados',parseInt(tradicional.expFinalizacion)],
                                    ['Iniciado',parseInt(tradicional.expIniciado )],
                                    ['Proceso',parseInt(tradicional.expProceso )]
                                
                            ];
					   
						//});
						console.log("emprimiento la grafica ",grafica);
						console.log("emprimiento la grafica two ",graficatwo);
                      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var datatwo = google.visualization.arrayToDataTable(graficatwo);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                           $('#buttonone').empty();
                           $('#buttonone').append( '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
                        var barchart_options = {title:'Grafica de oral',
                                          //   legend: 'none'
                                    };
                        //var chart = new google.visualization.Bar(document.getElementById('barchart_div'));
                        var barchart = new google.visualization.ColumnChart(document.getElementById('columnchart_two'));
                        //barchart.draw(data, barchart_options);
                        barchart.draw(datatwo, barchart_options);
                        $('#buttonone').empty();
                        $('#buttontwo').append( '<a href="' + barchart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');

                        //barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
                    }

    }// final funcion de materia
