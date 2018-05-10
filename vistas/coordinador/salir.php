<?php 
  // Borra todas las variables de sesión 

header("Expires: Tue, 13 Jan 2005 16:00:00 GMT"); // Ponemos la fecha siempre en pasado
header("Pragma: no-cache"); 
header("Cache-Control: no-cache");
  $_SESSION = array(); 
  // Borra la cookie que almacena la sesión 
  if(isset($_COOKIE[session_name()])) { 
    setcookie(session_name(), '', time() - 42000, '/'); 
  } 
  // Finalmente, destruye la sesión 
  session_destroy(); 
  header("Location: ../../index.php");
?> 
