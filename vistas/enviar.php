<?php

$message = $_POST['message'];

$header = 'from: deleonalex54@gmail.com' . $message . " \r\n";
$header .= "X-Mailer: PHP/" .phpversion() . " \r\n";
$header .= "Mine-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$message = "mensaje: " . $_POST['message'] . " \r\n ";
$message .= "Enviado el: " . date('d/m/y', time());



$para = 'cdeleon164@gmail.com';
//$asunto = 'Asunto del mensaje';

if(mail($para,  utf8_decode($message), $header)){
    echo "Enviado correctamente";

}else{
    echo "No se pudo enviar el correo";
}

//header("escritorio2.php");

?>
