 <?php
require_once 'simpleTest/autorun.php';
require_once 'classes/Log.php'; 
 
    class pruebaUnitaria extends UnitTestCase{
        function __construct() {
            parent::__construct('Test con Log');
        }
    //    $holaMundo = new holaMundo();    
        function testPruebaUnitaria(){
            $defensor = Array(
                "id_defensor"    =>'46',
                "nombre"         =>'pacho',
                "ap_paterno"     =>'f',
                "ap_materno"     =>'perez',
                "curp"           =>'K45P1234ABCD3214567',
                "calle"          =>'oaxaca',
                "numero_ext"     =>'23',    
                "numero_int"     =>'2',
                "colonia"        =>'oaxaca',
                "municipio"      =>'san juan',
                "nup"            =>'3456',
                "nue"            =>'12365',
                "genero"         =>'masculino',
                "telefono"       =>'9378878787',
                "corre_electronico" =>'ADMIN@MAIL.COM',                
                "cedula_profesional" =>'67767676767',
                "juzgado"         =>'fsdfss'
            );  
           $actualizar= $this.get('/controlador/defensor/controlActualizar.php',$defensor,'submit');
            //$this->assertTrue(300,holaMundo());
            //@unlink('temp/test.log');
            //$log = new Log('temp/test.log');
           
            //$log->returnBool();
            $this->assertEqual(201 ,returnBool());
            //$this->assertTrue(file_exists('temp/test.log'));
        }
    }


?>