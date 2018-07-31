var globalDatosEstadisticoPorDefensor;
function gestionGraficaPorDefensor(elemento){
         console.log("en elemnto por defensor",elemento);
         switch (elemento) {
             case 'genero':
             generoGDefensor();
                 break;
              case 'discapacidad':
             discapacidadesGDefensor();
                 break;
             
            case 'idioma':
                 idiomaGDefensor();
             break;
            case 'expediente':
                 expedienteGDefensor();
             break;
            case 'etnia':
                 etniasGDefensor();
             break;
            
             default:
                 break;
         }
}

function discapacidadesGDefensor() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadisticoPorDefensor.tablaDiscapacidadExpDef;
                  //	var tradicional=array.filter(function(x){return (x.sis=='TRADICIONAL')});
                  	var tradicional=array[0];
                
                      var grafica=[['Discapacidad en sistema tradicional','Hombre','Mujeres']];
                      array.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.discapacidadUs);
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   grafica.push(arrayNew);	   
						});
                
                      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                
                    }

    }// final funcion de discapacidad
function etniasGDefensor() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadisticoPorDefensor.tablaEtniaExpDef;
                  	var grafica=[['Etnias en sistema tradicional','GDefensor','Hombre','Mujeres']];
                      array.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.etniaUs);
								   arrayNew.push(parseInt(element.totalExp));
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   grafica.push(arrayNew);	   
						});
					
				      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                
                        }

    }// final funcion de etnias
function generoGDefensor() {
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadisticoPorDefensor.tablaGeneroExpDef;
                   var grafica=[['Discapacidad en sistema tradicional','Total']];
                    var array=globalDatosEstadisticoPorDefensor.tablaGeneroExpDef;
                    array.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.generoUs);
								   arrayNew.push(parseInt(element.totalUsuarios));
	
							   grafica.push(arrayNew);	   
						});
					  
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                
                    }

    }// final funcion de genero
function idiomaGDefensor() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var tradicional=globalDatosEstadisticoPorDefensor.tablaIdiomaExpDef;
                  
                    var grafica=[['Idiomas','Hombre','Mujeres']];
                    tradicional.forEach(element => {
							var arrayNew=[];
                                   arrayNew.push(element.idiomaUs);
                                   if(element.hombresO!=='0'&element.mujeresO!=='0')
								   {    arrayNew.push(parseInt(element.hombresO));
								        arrayNew.push(parseInt(element.mujeresO));}
                                   if(element.hombresT!=='0'&element.mujeresOT!=='0')
								   {    arrayNew.push(parseInt(element.hombresT));
								        arrayNew.push(parseInt(element.mujeresT));}
                             grafica.push(arrayNew);	   
						});
				      
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                       }

    }// final funcion de idioma


function expedienteGDefensor() {
    
                  
                    //google.charts.load('current', {'packages':['bar']});
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

                    var array=globalDatosEstadisticoPorDefensor.tablaGeneralExpDef;
                    var grafica;//=[['Materia en sistema tradicional','Hombres','Mujeres'],
                                  // ];
                                  
                            array.forEach(elemento => {
                                
                                 grafica=  [['Expediente en sistema tradicional','Total expediente'],
                                          ['Baja falta de interes',parseInt(elemento.expBajaFalta )],
                                          ['Baja por revocación',parseInt(elemento.expBajaRevocacion)],
                                          ['Finalizados',parseInt(elemento.expFinalizacion)],
                                          ['Iniciado',parseInt(elemento.expIniciado )],
                                          ['Proceso',parseInt(elemento.expProceso )]
                                        
                                   ];
					 
						});
                    //var graficatwo=[['Materia en sistema oral','Hombres','Mujeres']];
                  	  
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(grafica);
                        var piechart_options = {title:'Grafica de tradicional',
                                       subtitle:'fecha:2018-2018'};
                        
                        var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
                           piechart.draw(data, piechart_options);
                 }

    }// final funcion de materia
