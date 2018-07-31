var conultas=document.getElementById('consultas');
conultas.addEventListener('click', realizandoConsulta, false);
function realizandoConsulta() {
        $('#menuContainer').load("consultaPreguntas.php");
};

var datosGeneralesConsultas;
var listaNegra=['FECHA DE AUTO APERTURA A JUICIO','FECHA DE CONCLUIDO EL PERIODO DE DESAHOGO DE PRUEBAS',
                'FECHA DE CONCLUSIÓN','FECHA DE CONCLUSIÓN DE DEFENSA','FECHA DE CONCLUSIÓN M.P',
                 'FECHA DE CUMPLIMIENTO DE LA EJECUTORIA','FECHA DE DESAHOGO',
                'FECHA DE LA NOTIFICACIÓN DEL AUTO DE INICIO AL ACTOR','FECHA DE LA NOTIFICACIÓN DEL AUTO DE INICIO AL DEMANDADO',
                 'FECHA DE LA RESOLUCIÓN DE LA SENTENCIA O LECTURA DE FALLO','FECHA DE LA SENTENCIA',
                'FECHA DE NOTIFICACION DE AUTO INICIO','FECHA DE NOTIFICACION DE LA PARTE OFENDIDA',
                'FECHA DE NOTIFICACIÓN DE LA RESOLUCIÓN','FECHA DE NOTIFICACION DEL BENIFICIO',
                 'FECHA DE NOTIFICACION POR PARTE DE JUZGADO AL DEFENSOR','FECHA DE OFRECIMIENTO',
                 'FECHA DE PERIODO PROBATORIO','FECHA DE RESOLUCIÓN DEL TÉRMINO CONSTITUCIONAL',
                 'FECHA DE SENTENCIA 1° INSTANCIA','FECHA DE SENTENCIA 2° INSTANCIA',
                'FECHA EN QUE COMPURGARA SU PENA EL  SENTENCIADO','FECHA EN QUE FUE TURNADO AL JUEZ DE EJECUCION DE SANCIONES',
                 'FECHA EN QUE LIGITIMADA LA PARTE QUE INTERPUSO EL RECURSO','FECHA EN QUE SE DICTA LA RESOLUCION QUE SE RECURRE',
                'FECHA EN QUE SE NOTIFICA LA RESOLUCION','FECHA INICIO','FECHA QUE SE LEVANTANTO LA SUSPENCIÓN DE LA EJECUCION DE LA PENA',
                'JUZGADO DE ORIGEN','JUZGADO SENTENCIANTE','LUGAR DE RECLUSION','NÚMERO DE EXPEDIENTE',
                'NUMERO DE LA ULTIMA REMISION PARCIAL DE PENA OTORGADA','PENA DE PRESION AL CUAL FUE SENTENCIADO',
                'PLAZO PARA CIERRE DE INVESTIGACIÓN','SALA EN DONDE SE ENCUENTRA RADICADO','TIEMPO COMPURGADO A LA FECHA'
               ];
function seleccionarUnDefensorExpediente(val){//checkdefensor especifico
	var desc = $('#botonDesc').get(0);	
    var rGeneralC = $('#radioCompleto').get(0).checked;
	var rGeneralP = $('#radioPeriodo').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var inputProject = $('#project').val();
	if(val){

		$('#checkSistema').hide(); //entonces muestra su input
		$('#checkMateria').hide(); //entonces muestra su input
		$('#checkRegion').hide(); //entonces muestra su input
		$('#idCheckDefensor').removeAttr('style'); //entonces muestra su input
		dataDefensor();

    }else{
		$('#checkSistema').show(); //entonces muestra su input
		$('#checkMateria').show(); //entonces muestra su input
		$('#checkRegion').show(); //entonces muestra su input

        $("#idCheckDefensor").attr('style','display:none');
	}
	if(rGeneralC){
		$("#divPeriodo").attr('style', 'display:none;');		
		if(val){//esta activada el check defensor esp?  	
			if(inputProject != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false;
		}else{
			desc.disabled= false;
			return true;
		}
	}
	if(rGeneralP){//esta activado por periodo
		$("#divPeriodo").removeAttr('style');
		if(val){//esta activada el check defensor esp?     
			if(myFunctionDate('') != false && inputProject != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			console.log('se congelo bpoton porque no hay');
			return false;		
		}else{//check defensor esta desact
			if (myFunctionDate('') != false){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false; 
		}
		desc.disabled= true;
		return false;
	}
}

function estadoInputExpediente(val){
 
    
	var desc = $('#botonDesc').get(0);
	var botonConsulta = $('#botonConsultarExpediente').get(0);
	//var selectSistema = $('#selectSistema').val();
	var check =    $('#checkId').get(0).checked;
	var rGeneralC = $('#radioCompleto').get(0).checked;
	var rGeneralP = $('#radioPeriodo').get(0).checked;
/* 	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked; */
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	console.log('fuera del if dentro estadoIo=nput');
	if(rGeneralC){//radio general completo
		if(check){//check defensor unico
			if(val != '' ){
				desc.disabled= false;
				return true;				
			}
			desc.disabled= true;
			
				return false;
		}
			desc.disabled= false;
			
			return true;	
	}
	if(rGeneralP){// radio general x periodo de tiempo
		if(check){//check defensor unico
			if(val != '' ){//input no vacio?
				if(myFunctionDate('') != false) {
					desc.disabled= false;
					
					return true;
				}		
				desc.disabled= true;
				
				return false;				
			}			
			desc.disabled= true;
			
				return false;
		}else{
			if(myFunctionDate('') != false) {
				desc.disabled= false;
				
			}			
				desc.disabled= true;
				
				return false;
		}
	}	
	desc.disabled= true;
	
		return false;
}

function estadoInputParcial(val){
var desc = $('#botonDesc').get(0);
var selectSistema = $('#selectSistema').val();
var check = $('#checkId').get(0).checked;
var rParcialC = $('#radioPeriodo').get(0).checked;
var rParcialP = $('#radioCompleto').get(0).checked;
var inicio = $('#inputInicio')[0].value;
var final = $('#inputFinal')[0].value;
console.log('fuera del if dentro estadoIo=nput');
if(rParcialC){//radio parcial completo
    if(check){//check defensor unico
        if(val != '' && selectSistema != '' ){
            desc.disabled= false;
            return true;				
        }
    }else{
        if(selectSistema != '' ){
            desc.disabled= false;
            return true;				
        }
        desc.disabled= true;
        return false;                                   
    }
    
}
if(rParcialP){// radio general x periodo de tiempo
    if(check){//check defensor unico
        if(val != '' ){//input no vacio?
            if(myFunctionDate('') != false && selectSistema != '') {
                desc.disabled= false;
                return true;
            }
            desc.disabled= true;
            return false;				
        }
            desc.disabled= true;
            return false;	
    }else{
        if(myFunctionDate('') != false && selectSistema!='') {
            desc.disabled= false;
            return true;
        }
        desc.disabled= true;
        return false;	
    }
    desc.disabled= true;
    return false;	
}
}


function consultaExpediente(){ 
 console.log("consutlados informacion");
 var defensor=document.getElementById('usuarios').value;
 var materia=document.getElementById('materia').value;
 var sistema=document.getElementById('sistema').value;
 var region=document.getElementById('region').value;
 var fechaInicio=document.getElementById('inputInicio').value;
 var fechaFinal=document.getElementById('inputFinal').value;
 var consultaPor='defensor&defensor='+defensor;
 var enviar=false;
 console.log("viendo que regresa defesnro ",verificacionDefensorPeriodo());
 
 	if(verificacionDefensorPeriodo()===true){
         defensor=document.getElementById('usuarios').value;
        enviar=true;
    }
 	if(verificacionMateriaSistema()){
       console.log("se seleccion materia o sistema");
       enviar=true;
       console.log("que sera matria ",materia);
       console.log("que sera sistema ",sistema);
       if(sistema!==""&sistema!=="NINGUNO"&(materia===""|materia==="NINGUNO"))// SOLO POR SISTEMA
          consultaPor='sistema&sistema='+sistema;

       if(materia!==""&materia!=="NINGUNO"&(sistema===""|sistema==="NINGUNO"))//SOLO POR MATERIA
             consultaPor='materia&materia='+materia;

      // if(sistema!==""|sistema!=="NINGUNO")//POR SISTEMA MATERIA
       if(sistema!=="NINGUNO"&materia!='NINGUNO')//POR SISTEMA MATERIA
             consultaPor='sistemaMateria&materia='+materia+'&sistema='+sistema;

       if(region!==""&region!=="NINGUNO")// POR REGION
             consultaPor='regionSistemaMateria&region='+region+'&materia='+materia+'&sistema='+sistema;
    }
    if(enviar)
        $.ajax({
			url: "../../controlador/estadistica/consumoConsultas.php",
			type: "GET",
		//	data: "consultaPor=defensor&defensor=" +defensor + "&fechaInicio=" + fechaInicio+ "&fechaFinal=" + fechaFinal,
			data: "consultaPor="+consultaPor + "&fechaInicio=" + fechaInicio+ "&fechaFinal=" + fechaFinal,
			success: function (data) {
               console.log("recibo de datos ",data);
                
				 if (data != 0) {
				    datosGeneralesConsultas=data//GUARDANDO DATOS PARA FUTURO UTILIZACION
                    $('#tbodyConsultas').empty();
                 //   console.log("valor del key ",data);
					$.each(data, function (KEY, VALOR) {
                        console.log("en array ",VALOR);
                     //   console.log("sacando el tama;;o ",VALOR.length);
                     var masculino;
                     var femenino;
                     var opcion="";
                    
                     if(VALOR.length!==0){
                       //  console.log("entrando a despues de leng",VALOR);
                         //console.log("entrando Y SACANDO a despues de leng",VALOR.length);
                         
                           /* var masculino=VALOR.datosGenerales.sexo.MASCULINO;
                            var femenino=VALOR.datosGenerales.sexo.FEMENINO
                             var opcion=""
                             */;
                            masculino=VALOR.datosGenerales.sexo.MASCULINO;
                             femenino=VALOR.datosGenerales.sexo.FEMENINO
                            //var opcion="";
                           // console.log("datos de los femni ".femenino);
                     } 
                            if(masculino===undefined)
                                   masculino=0;
                            if(femenino===undefined)
                                   femenino=0;
                           if(VALOR.opciones!==undefined)
                                   opcion='<option value="opciones">opción </option>';
                           var filtroAListaNegra=listaNegra.find(function(x){ return (x==KEY)});
                           if(filtroAListaNegra===undefined)// VERIFICO SI LA PREGUNTA NO ESTA EN LA LISTA NEGRA
                            $('#tbodyConsultas').append(
                                    '<tr> ' +
                                    '<td id="key">' + KEY + '</td>' +
                                    '<td >'+(masculino+femenino)+'</td>' +
                                    '<td>' + masculino+ '</td>' +
                                    '<td>' +femenino + '</td>' +
                                    '<td><select id="filtro1" style="width:150px;" class="form-control" name="users" onchange="filtroGenerales(this)">'+                
                                        '<option value="etnias" >Etnias</option>'+
                                        '<option value="generos">Generos</option>'+
                                        '<option value="discapacidad">Discapacidades</option>'+
                                        '<option value="idiomas">Idiomas </option>'+
                                        opcion+
                                    '</select></td>'+
                                    ' </tr>'
                             );
                      
					});

				} else {
					$('#tbodyConsultas').empty();
					botonDess.disabled = true;
				} 
			}
		});
   // }
    
}
var opcionesSeleccionadoMomento;
function filtroOpcionesPregunta(elemento){
    var valorKey = $(elemento).closest('tr').find('#key').text();
    console.log("opcion seleccionado ",valorKey);
    
    var keySeleccionado=opcionesSeleccionadoMomento[valorKey];
    console.log("opciones ",keySeleccionado);
    
    $('#tbodyConsultasOpciones').empty();
    $('#tablaAnidaEnSegundaTabla').show();
   var objetoEncontrado=keySeleccionado[elemento.value];
   if(elemento.value==="opciones")
      objetoEncontrado=keySeleccionado.opciones;
   console.log("objetos encontrados ",objetoEncontrado);
   console.log("ELEMENTO ",elemento.value);
   if(elemento.value!=="generos")
    $.each(objetoEncontrado, function (KEY, VALOR) {
        //	console.log(VALOR, ' valor ');
      
       var masculino=parseInt(VALOR.MASCULINO);
       var femenino=parseInt(VALOR.FEMENINO);
       console.log("datos de los femni ".femenino);
       // esta parte de aqui es si  la pregunta tiene opciones
       if(elemento.value==='opciones'){console.log("esta en opbcioens");
       
          masculino=VALOR.sexo.MASCULINO;    
          femenino=VALOR.sexo.FEMENINO; } 
       //

         if(masculino===undefined|isNaN(masculino))
            masculino=0;
         if(femenino===undefined|isNaN(femenino))
            femenino=0;
            
            $('.sexo').show();
        $('#tbodyConsultasOpciones').append(
            '<tr> ' +
                '<td >' + KEY + '</td>' +
                '<td >'+VALOR+'</td>' +
            ' </tr>'
        );
    });
    else {
        console.log("ES GENEROS");
        
        $.each(objetoEncontrado, function (KEY, VALOR) {
            //	console.log(VALOR, ' valor ');
        
           $('.sexo').hide();
       
            $('#tbodyConsultasEspecificas').append(
                '<tr> ' +
                '<td >' + KEY + '</td>' +
                '<td >'+VALOR+'</td>' +
                
                
                ' </tr>'
            );
        }); 
    }
}
function filtroGenerales(elemento){
    var valorKey = $(elemento).closest('tr').find('#key').text();
    
    var keySeleccionado=datosGeneralesConsultas[valorKey];
    var opciones=' ';
    
    $('#tbodyConsultasEspecificas').empty();
   var objetoEncontrado=keySeleccionado.datosGenerales[elemento.value];
   $('#cabezeraOpcionesTabla2').hide();
  // $('#tablaAnidaEnSegundaTabla').hide();
   if(elemento.value==="opciones"){//CUANDO LA PREGUNTA TIENE OPCIONES
       console.log("se selecciono opciones");
       
    objetoEncontrado=keySeleccionado.opciones;
    opcionesSeleccionadoMomento=objetoEncontrado;
    $('#cabezeraOpcionesTabla2').show();
    opciones='<td><select id="filtroOpciones" style="width:150px;" class="form-control" name="users" onchange="filtroOpcionesPregunta(this)">'+                
    '<option value="etnias" >Etnias</option>'+
  
    '<option value="discapacidades">Discapacidades</option>'+
    '<option value="idioma">Idiomas </option>'+
    '</select></td>';
   }
   console.log("objetos encontrados ",objetoEncontrado);
   console.log("ELEMENTO ",elemento.value);
   if(elemento.value!=="generos")
    $.each(objetoEncontrado, function (KEY, VALOR) {
        //	console.log(VALOR, ' valor ');
      
       var masculino=parseInt(VALOR.MASCULINO);
       var femenino=parseInt(VALOR.FEMENINO);
       console.log("datos de los femni ".femenino);
       // esta parte de aqui es si  la pregunta tiene opciones
       if(elemento.value==='opciones'){console.log("esta en opbcioens");
       
          masculino=VALOR.sexo.MASCULINO;    
          femenino=VALOR.sexo.FEMENINO; } 
       //

         if(masculino===undefined|isNaN(masculino))
            masculino=0;
         if(femenino===undefined|isNaN(femenino))
            femenino=0;
            
            $('.sexo').show();
        $('#tbodyConsultasEspecificas').append(
            '<tr> ' +
            '<td id="key" >' + KEY + '</td>' +
            '<td >'+(masculino+femenino)+'</td>' +
            '<td>' + masculino+ '</td>' +
            '<td>' +femenino + '</td>' +
              opciones+
    
            ' </tr>'
        );
    });
    else {
        console.log("ES GENEROS");
        
        $.each(objetoEncontrado, function (KEY, VALOR) {
            //	console.log(VALOR, ' valor ');
        
           $('.sexo').hide();
       
            $('#tbodyConsultasEspecificas').append(
                '<tr> ' +
                '<td >' + KEY + '</td>' +
                '<td >'+VALOR+'</td>' +
                
                
                ' </tr>'
            );
        }); 
    }

   
}



function verificacionMateriaSistema(){
      var desc = $('#botonDesc').get(0);
    var defensorSeleccionado = $('#usuarios').val();
    
	var botonConsulta = $('#botonConsultarExpediente').get(0);
	//var selectSistema = $('#selectSistema').val();
	var check =    $('#checkId').get(0).checked;//PARA VERIFICAR SI ESTA SELECCIONADO EL DEFENSOR
	var consultaCompleta = $('#radioCompleto').get(0).checked;
	var consultaPeriodo = $('#radioPeriodo').get(0).checked;
/* 	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked; */
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var materia = $('#materia')[0].value;
	var sistema = $('#sistema')[0].value;
	var region = $('#region')[0].value;
    if(check){//QUE NO ESTE SELECCIONADO DEFESENSOR
        return false;	
    }
    if((materia===''|materia==='NINGUNO')&(sistema===''|sistema==='NINGUNO')&(region===''|region==='NINGUNO')){
        alert('Selecciona una materia, sistema o región');
        return false;
    }
  //  if((region!==''|region!=='NINGUNO')&((sistema===''|sistema==='NINGUNO')|(materia===''|materia==='NINGUNO'))){
    if((region!=='NINGUNO')&(sistema==='NINGUNO')&(materia==='NINGUNO')){
        alert('Selecciona una materia y un sistema ');
        return false;
    }
    if((region!=='NINGUNO')&(sistema==='NINGUNO')){
        alert('Selecciona una sistema');
        return false;
    }
    if((region!=='NINGUNO')&(materia==='NINGUNO')){
        alert('Selecciona una materia');
        return false;
    }
	if(consultaCompleta){//radio general completo
		if(!check){//QUE NO ESTE SELECCIONADO DEFESENSOR
			return true;	
        }
      return false;  
    }
	if(consultaPeriodo){// radio general x periodo de tiempo
        if(!check){//QUE NO ESTES SELECCIONADO DEFENSOR
          //  console.log("viendo el defensor-> ",defensorSeleccionado);
            
				if(myFunctionDate('') != false) {//verificacion de fecha
					desc.disabled= false;
					
					return true;
				}		
				desc.disabled= true;
                alert("seleccione fecha correcto  ");
				return false;
		}return false;
    }	
	desc.disabled= true;
		return false;


}
function verificacionDefensorPeriodo(){
    var desc = $('#botonDesc').get(0);
    var defensorSeleccionado = $('#usuarios').val();
    
	var botonConsulta = $('#botonConsultarExpediente').get(0);
	//var selectSistema = $('#selectSistema').val();
	var check =    $('#checkId').get(0).checked;//PARA VERIFICAR SI ESTA SELECCIONADO EL DEFENSOR
	var consultaCompleta = $('#radioCompleto').get(0).checked;
	var consultaPeriodo = $('#radioPeriodo').get(0).checked;
/* 	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked; */
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
    //console.log('fuera del if dentro estadoIo=nput');
    if(!check)
       return false;// REGRESA INDICANDO QUE NO ES UN DEFENSOR
	if(consultaCompleta){//radio general completo
		if(check){//check defensor unico
			if(defensorSeleccionado != '' ){
				desc.disabled= false;
				
				return true;				
            }
            alert("seleccione un defensor  ");
			desc.disabled= true;
							return false;
		}
			desc.disabled= false;
			
            alert("seleccione un defensor o fecha ");
			return true;	
	}
	if(consultaPeriodo){// radio general x periodo de tiempo
        if(check){//check defensor unico
          //  console.log("viendo el defensor-> ",defensorSeleccionado);
            
			if(defensorSeleccionado != '' ){//input no vacio?
				if(myFunctionDate('') != false) {//verificacion de fecha
					desc.disabled= false;
					
					return true;
				}		
				desc.disabled= true;
                console.log("dentro de defensor");
                alert("seleccione fecha correcto  ");
				return false;				
			}			
			desc.disabled= true;
			
            alert("seleccione un defensor o fecha    ");
				return false;
		}else{
			if(myFunctionDate('') != false) {
                console.log("dentro de defensor");
                
                alert("seleccione fecha correcto    ");
				desc.disabled= false;
				
			}			
				desc.disabled= true;
				
				return false;
		}
    }	
	desc.disabled= true;
		return false;
}