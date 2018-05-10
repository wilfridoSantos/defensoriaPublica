<?php
use PHPUnit\Framework\TestCase;


class StackTest extends PHPUnit_Framework_TestCase//TestCase

{
    public function testPushAndPop  ()
    { //registro de personal
        $url='http://localhost/defensoriaPublica/controlador/defensor/registrar_Defensor.php';
        //emula una visita a la vista de cambiar adscirpcion
        visit($url)
        // Requisitar el formulario
        ->keys('nombre','pepito')// ingresaso del nombre
        ->keys('apellid_paterno','lopez')// ingresaso del apellido
        ->keys('apellido_materno','perez')// ingresaso del apllidpo
        ->keys('telefono','9877878776')// ingresaso del telefon
        ->keys('email','pepito@gmail.com')// ingresaso del correo
        ->keys('nup','32122')// ingresaso del nup
        ->keys('nue','32132')// ingresaso del nue
        ->select('adscripcion', '6') //seleccion de adscripcion
        ->select('puesto','4')// selecion del puesto
        ->keys('genero','masculino')// ingresaso del genero
        ->keys('password', 'hola') //ingreso contraseña
        ->select('genero', '6') //seleccion de genero
       
        // Hacer clic en el boton agregar
        ->press('guardar'); // dar en guardar
        waitForText(' registro exitso');


        //actualizar juzgado
        $url='http://localhost/defensoriaPublica/controlador/defensor/registrar_Defensor.php';
        //emula una visita a la vista de cambiar adscirpcion
        visit($url)
        // Requisitar el formulario

         ->keys("id_defensor"    ,'44')
         ->keys("nombre"         ,"pepes")
         ->keys("ap_paterno"     ,"lopez")
         ->keys("ap_materno"     ,'garcia')
         ->keys( "curp"           ,'curp')
         ->keys("calle"          ,'emiliano')
         ->keys("numero_ext"     ,'221')    
         ->keys("numero_int"     ,'23')
         ->keys("colonia"        ,'oaxaca')
         ->keys( "municipio"      ,'oaxaca')
         ->keys( "nup"            ,'2334')
         ->keys("nue"            ,'234')
         ->keys("genero"         ,'masculino')
         ->keys("telefono"       ,'988767879')
         ->keys( "corre_electronico" ,'f@gmail.com')                
         ->keys("cedula_profesional" ,'c3dul4Pr0f4io4L')
         ->keys("juzgado"         ,'penal 1')
     
       
        // Hacer clic en el boton agregar
        ->press('actualizar datos'); // dar en actualizar
        waitForText(' registro actualizado')


      /// eliminar personal
        $url='http://localhost/defensoriaPublica/controlador/juzgado/controlDelDefesor.php';
        //emula una visita a la vista de cambiar adscirpcion
        visit($url)
        // Requisitar el formulario
       
        ->select('id_defensor', '6') //seleccion de adscripcion
        // Hacer clic en el boton agregar
        ->press('eliminar');
        ->select('confirmacion', 'si') //seleccion de adscripcion
        
        waitForText('defensor eliminado ')



        
        $url='http://localhost/defensoriaPublica/controlador/juzgado/actividad_juzgado.php';
        //emula una visita a la vista de cambiar adscirpcion
        visit($url)
        // Requisitar el formulario
        ->keys('nue','32122')// ingresaso del nue
        ->select('adscripcion', '6') //seleccion de adscripcion
        // Hacer clic en el boton agregar
        ->press('cambiar');
        waitForText(' cambio de defensor exitso')


        
    }
}
?>