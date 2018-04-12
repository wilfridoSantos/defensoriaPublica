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
        $(".custom-scroll-containers").mCustomScrollbar({
            theme: "dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: {
                enable: true
            }
        });
    });
})(jQuery);

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
            url: "Controlador/inicio_sesion.php",
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