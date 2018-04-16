<?php

function encriptar($cadena) {
    $key = '';
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key),
            $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted;
}

echo encriptar('9510');

function desencriptar($cadena) {
    $key = '';
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), 
            base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
            
    return $decrypted;  
}
