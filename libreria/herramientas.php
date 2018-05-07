<?php
//require_once ("PHPMailderAutoload.php");

    //Definimos la funciones para trabajar en PHP 
    function test_input($cadena){
        htmlspecialchars($cadena);
		    addslashes($cadena);
		return $cadena;   
    }
    
 
 
    
    //funcion que envia un correo electronico
    function envio_correo($dir_email, $asunto, $mensaje){
   // ini_set('SMTP','smtp.gmail.com');
    //ini_set('smtp_port',587);
    $cabecera = "From: <griselda.mendez@gob.mx>";
        $headers = "MIME-Version: 1.0/r/n";
	   $headers.= "Content-type: text/html; charset=iso-8859-1/r/n";	
	   $headers.= $cabecera."/r/n";
       mail($dir_email, $asunto, $mensaje, $cabecera);
            
      



/* 
$address = "othonhergar@gmail.com";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = " ";
$mail->Port = 465;
$mail->SetFrom("vin_oaxaca@tecnm.mx",'bolsa de trabajo');
$mail->AddAddress($address);
$mail->Username = "itoaxacabolsat@gmail.com";
$mail->Password = "8017B0J0";
$mail->Subject = $asunto;
$mail->Body = $mensaje;
$mail->WordWrap=50;
if(!$mail->Send()) {

echo "no enviado";
} else {
echo "enviado";
} */
    }
  

    
        //funcion encriptar
  
function encriptar($password){
    return password_hash($password,PASSWORD_DEFAULT);
} 


?>