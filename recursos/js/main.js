$(document).ready(function() {
    $('#principal').load('form/inicio.php');
    $('.tooltips-general').tooltip('hide');
    $('.mobile-menu-button').on('click', function() {
        var mobileMenu = $('.navbar-lateral');
        if (mobileMenu.css('display') === 'none') {
            mobileMenu.fadeIn(300);
        } else {
            mobileMenu.fadeOut(300);
        }
    });
    $('.dropdown-menu-button').on('click', function() {
        var dropMenu = $(this).next('ul');
        dropMenu.slideToggle('slow');
    });
    $('.exit-system-button').on('click', function(e) {
        e.preventDefault();
        var LinkExitSystem = $(this).attr("data-href");
        swal({
            title: "¿Estás seguro?",
            text: "Quieres salir del sistema y cerrar la sesión actual",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "Si, salir",
            cancelButtonText: "No, cancelar",
            animation: "slide-from-top",
            closeOnConfirm: false
        }, function() {
            window.location = LinkExitSystem;
        });
    });
    /*$('.search-book-button').click(function (e) {
     e.preventDefault();
     var LinkSearchBook = $(this).attr("data-href");
     swal({
     title: "¿Qué libro estás buscando?",
     text: "Por favor escribe el nombre del libro",
     type: "input",
     showCancelButton: true,
     closeOnConfirm: false,
     animation: "slide-from-top",
     cancelButtonText: "Cancelar",
     confirmButtonText: "Buscar",
     confirmButtonColor: "#3598D9",
     inputPlaceholder: "Escribe aquí el nombre de libro"},
     function (inputValue) {
     if (inputValue === false)
     return false;

     if (inputValue === "") {
     swal.showInputError("Debes escribir el nombre del libro");
     return false;
     }
     window.location = LinkSearchBook + "?bookName=" + inputValue;
     });
     });*/
    $('.btn-help').on('click', function() {
        $('#ModalHelp').modal({
            show: true,
            backdrop: "static"
        });
    });
    $('#inicio').click(function() {
        $('#principal').load('form/inicio.php');
    });
    $('#clientes').click(function() {
        $('#principal').load('form/clientes.php');
    });
    $('#catalogos').click(function() {
        $('#principal').load('form/catalogos.php');
    });
    $('#mensajes').click(function() {
        $('#principal').load('form/mensajes.php');
    });
    $('#sembrados').click(function() {
        $('#principal').load('form/sembrados.php');
    });
    $('#configuraciones').click(function() {
        $('#principal').load('form/configuraciones.php');
    });
    $('#reportes').click(function() {
        $('#principal').load('form/reportesEstadisticas.php');
    });
    $('#referidos').click(function() {
        $('#principal').load('form/referidos.php');
    });
});
(function($) {
    $(window).load(function() {

    });
})(jQuery);
function buscarXCedula() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("inputCedula");
    filter = input.value.toUpperCase();
    table = document.getElementById("datatable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[4];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          //console.log('huuuuuuuuu hkajsdkasjhd');
        } else {
          tr[i].style.display = "none";
          //console.log('dosssssssss ');
        }
      }
    }
  }
 
  
  /* $(".boton").click(function() {
    var cedula = $(this).closest('tr').find('#dataCedula').text() 
    //console.log(cedula);
    console.log('algoooooo');
    //var ced = document.getElementById("cedulaProf").textContent;
    //alert('entro a expediente num #  ' + ced);
    
    
      //$('#menuContainer').load( "../../vistas/coordinador/verInfoDefensor.php?cedula="+ cedula);
      //header('Location: ../../controlador/defensor/controlDefensor.php?cedula='+ cedula);
     /*  $.ajax({
        url: "../../controlador/defensor/controlDefensor.php",
        type: "post",
        data: "numCedula=" + cedula,
        beforeSend: function() {
            $('body').load('verInfoDefensor.php');
        },
        success: function(data) {
            var jsonDefensores = jQuery.parseJSON(data);
            console.log(jsonDefensores);
            //$('#menuContainer').html(data);
            //$('body').removeClass('loading');
        }
    }); 
  });*/
function actualizarDefensor(){
    $('#menuContainer').load( "../../vistas/coordinador/update.php");
    //console.log('HOOOOla aCTUALIZAR DEFENSOR');
}

function updateDefensor(){

    console.log('actualizando datooooss');
}

function upload_image(){//Funcion encargada de enviar el archivo via AJAX
    $(".upload-msg").text('Cargando...');
    var inputFileImage = document.getElementById("fileToUpload");
    var file = inputFileImage.files[0];
    var data = new FormData();
    data.append('fileToUpload',file);
    
    /*jQuery.each($('#fileToUpload')[0].files, function(i, file) {
        data.append('file'+i, file);
    });*/
                
    $.ajax({
        url: "upload.php",        // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
            $(".upload-msg").html(data);
            window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            });	}, 5000);
        }
    });
    
}

function ingresarSistema() {
    console.log("Metodo ingresarSistema()");
    var usuario = document.getElementById("usuarios_inicio"),
            password = document.getElementById("password"),
            p = "",
            error = false;
    if (!usuario.value.length > 0) {
        p += '<p class="text-danger"><strong>*Ingresa tu usuario</strong></p>';
        error = true;
    }
    if (!password.value.length > 0) {
        p += '<p class="text-danger"><strong>*Ingresa la contraseña</strong></p>';
        error = true;
    }
    $('#mensaje_index').html(p);
    if (!error) {
      console.log('No hay error antes de accesar a inicio_sesion.php');
        $.ajax({
            url: "controlador/inicio_sesion.php",
            type: "post",
            data: "usuario_txt=" + usuario.value + "&password_txt=" + password.value,
            beforeSend: function() {
                $('body').addClass('loading');
            },
            success: function(data) {

                $('#mensaje_index').html(data);
                $('body').removeClass('loading');
            }
        });
    }
}



function olvido() {
    $('#titulo-inicio').html("Recupera tu contraseña");
    var contenido = "";
    contenido += '<div class="group-material-login">';
    contenido += '<input id="usuario_restore"  type="text" class="material-login-control" required="" maxlength="70">';
    contenido += '<span class="highlight-login"></span>';
    contenido += '<span class="bar-login"></span>';
    contenido += '<label><i class="zmdi zmdi-account"></i> &nbsp; Usuario/Correo</label>';
    contenido += '</div>';
    contenido += '<a id=""  href="javascript:location.reload()" class="btn-link"  style="color:#fff;"><i class="zmdi zmdi-arrow-left"> &nbsp;</i>Regresar</a>';
    contenido += '<button id="ingresar" onclick="enviarpass()" class="btn-login" type="button">Enviar mi contraseña &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>';
    contenido += '<div id="mensaje_recuperar"  style="background: #fff; border-radius: 1em;" class="group-material-login text-center">';
    contenido += '</div>';
    $('#form_index').html(contenido);
}

function enviarpass() {
    var usuario = $('#usuario_restore').val();
    $.ajax({
        url: "php/restore_password.php",
        type: "post",
        data: "usuario_txt=" + usuario,
        beforeSend: function(xhr) {
            $('body').addClass('loading');
        },
        success: function(data) {
            $('#mensaje_recuperar').html(data);
            $('body').removeClass('loading');
        }
    });
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzü";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 1234567890";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function sinCaracteres(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function validacion() {
    var nom = document.getElementById('miInput').value;
    console.log('nom');
}

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("datatable2");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          //console.log('huuuuuuuuu hkajsdkasjhd');
        } else {
          tr[i].style.display = "none";
          //console.log('dosssssssss ');
        }
      }
    }
  }
  