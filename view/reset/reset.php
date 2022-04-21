<?php
    include './conexion.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './Exception.php';
    require './PHPMailer.php';
    require './SMTP.php';

    $gcorreo ='solicitudes@sercoing.cl';
    $gpass ='*YvAp@5M^JLJrc0I7Y';
    
    $usu_correo=$_POST["usu_correo"];
    $pass=rand(1000000,9999999);
    $conexion->query("UPDATE tm_usuario SET usu_pass='$pass' WHERE usu_correo='$usu_correo'") or die($conexion->error);
    if ($conexion->affected_rows) {
        echo '<script language="javascript">alert("Se ha enviado un correo electronico con la nueva contraseña");window.location.href="../../index.php"</script>';
        $alert=1;
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'mail.sercoing.cl';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = $gcorreo;
        $mail->Password = $gpass;
        $mail->From = $gcorreo;
        $mail->SMTPSecure = 'tls';
        $mail->FromName = $mail->tu_nombre = "SolicitudesTI - Sercoing";
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = "base64";
        $mail->addAddress($usu_correo);
        $mail->WordWrap = 50;
        $mail->IsHtml(true);
        $mail->msgHTML(true); 
        $mail->Subject = "Actualización de contraseña";
        $cuerpo = file_get_contents('./reset.html');
        //parametros de la plantilla
        $cuerpo = str_replace("passxx", $pass, $cuerpo);

        utf8_decode($cuerpo);
        
        $mail->AddEmbeddedImage('../../public/imagen.jpg', 'imagen', 'imagen.jpg');

        $mail->Body = $cuerpo;
        $mail->AltBody = strip_tags("Recuperar Contraseña");
        return $mail->Send();
    }else{
        $alert=2;
        echo '<script language="javascript">alert("Ingrese un correo valido");window.location.href="./reset-password.php"</script>';
        }

?>
