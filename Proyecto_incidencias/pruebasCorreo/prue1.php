<?php
$destinatario = "ronny.montano1997@gmail.com"; 
$asunto = "Este mensaje es de prueba"; 
$cuerpo = 'Este es el señor cuerpo del correo electronico :) ';
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

$enviado=mail($destinatario,$asunto,$cuerpo);
if($enviado){
    echo"Funciona";
}else{
    echo("no");
}
//lo del fichero .ini
//el puerto 35 , el correo desde uqe se envia
//el servidor de correo
?>


