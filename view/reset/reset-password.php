
<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SoporteTI - Acceso</title>
    
    <link rel="shortcut icon" href="../../public/img/Icono.ico">
    <link rel="stylesheet" href="../../public/css/lib/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="../../public/css/separate/vendor/sweet-alert-animations.min.css">  
	<link rel="stylesheet" href="../../public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="../../public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/master.css">
    <link rel="stylesheet" href="../../public/css/lib/bootstrap-sweetalert/sweetalert.css">

    
    
</head>
<body>
<!-- <div class="bg-image"style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/Others/images/76.jpg');height: 100vh"> -->
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
            
            <form class="sign-box reset-password-box" action="reset.php" method="post" id="form_recuperar">
            <div class="sign-avatar">
                        <img src="../../public/2.png" alt="" id="imgtipo">
                    </div>
                    <!--<div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>-->
                    <header class="sign-title">Recuperar Contraseña</header>
                    <div class="form-group">

                        <input type="email" id="usu_correo" name="usu_correo" class="form-control" placeholder="e-mail"/>
                    </div>
                    <center><button type="submit" class="btn btn-rounded btn-danger">Enviar</button></center>
                    <center><button type="button" class="btn btn-rounded btn-primary btn-sm" onclick="location.href='../../index.php'">Volver</button></center>
               
                </form>
            </div>
            
        </div>
        
    </div><!--.page-center-->


<script src="../../public/js/lib/jquery/jquery.min.js"></script>
<script src="../../public/js/lib/tether/tether.min.js"></script>
<script src="../../public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="../../public/js/plugins.js"></script>
<script type="text/javascript" src="../../public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<!-- <script src="../../public/js/app.js"></script> -->
<script src="../../public/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>

<script type="text/javascript" src="index.js"></script>
</body>
</html>