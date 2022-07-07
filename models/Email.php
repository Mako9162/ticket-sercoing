<?php

require('class.phpmailer.php');
include("class.smtp.php");

require_once("../config/conexion.php");
require_once("../models/Ticket.php");
require_once("../models/Usuario.php");

class Email extends PHPMailer{
    protected $gcorreo ='solicitudes@sercoing.cl';
    protected $gpass ='*YvAp@5M^JLJrc0I7Y';

    public function ticket_abierto($tick_id){
        
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row) {
            $id = $row["tick_id"];
            $usu = $row["usu_nom"].' '.$row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
            $costo = $row["cos_nom"];
            $descrip = $row["tick_descrip"];
        }

        // Siempre es igual
        $this->SMTPDebug = 0;
        $this->IsSMTP();
        $this->Host = 'mail.sercoing.cl';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gpass;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        $this->FromName = $this->tu_nombre = "SolicitudesTI - Sercoing";
        $this->CharSet = 'UTF-8';
        $this->Encoding = "base64";
        $this->addAddress($correo);
        $this->addAddress("solicitudes@sercoing.cl");
        $this->WordWrap = 50;
        $this->IsHtml(true);
        $this->msgHTML(true); 
        $this->Subject = "Nuevo Ticket Abierto Nº: ".$id;
        $cuerpo = file_get_contents('../public/nuevo.html');
        //parametros de la plantilla
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);
        $cuerpo = str_replace("lblDesc", $costo, $cuerpo);

        utf8_decode($cuerpo);
        
        $this->AddEmbeddedImage('../public/imagen.jpg', 'imagen', 'imagen.jpg');

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Nuevo Ticket Abierto");
        return $this->Send();

    }

    public function ticket_cerrado($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row) {
            $id = $row["tick_id"];
            $usu = $row["usu_nom"].' '.$row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
            $costo = $row["cos_nom"];
            $descrip = $row["tick_descrip"];
        }
        $usuario = new Usuario();
        $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
        foreach ($datos1 as $row1) {
            $correoasig = $row1["usu_correo"];
         }

        // Siempre es igual
        $this->SMTPDebug = 0;
        $this->IsSMTP();
        $this->Host = 'mail.sercoing.cl';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gpass;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        $this->FromName = $this->tu_nombre = "SolicitudesTI - Sercoing";
        $this->CharSet = 'UTF-8';
        $this->Encoding = "base64";
        $this->addAddress($correo);
        $this->addAddress("solicitudes@sercoing.cl");
        $this->addAddress($correoasig);
        $this->WordWrap = 50;
        $this->IsHtml(true);
        $this->msgHTML(true); 
        $this->Subject = "El ticket Nº: ".$id.", ha sido cerrado";
        $cuerpo = file_get_contents('../public/cerrado.html');
        //parametros de la plantilla
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);
        $cuerpo = str_replace("lblDesc", $costo, $cuerpo);

        utf8_decode($cuerpo);
        
        $this->AddEmbeddedImage('../public/imagen.jpg', 'imagen', 'imagen.jpg');

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Cerrado");
        return $this->Send();
    }

    public function ticket_asignar($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row) {
            $id = $row["tick_id"];
            $usu = $row["usu_nom"].' '.$row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
            $costo = $row["cos_nom"];
            $descrip = $row["tick_descrip"];
            $fech_asig = $row["fech_asig"];
        }
        $usuario = new Usuario();
        $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
        foreach ($datos1 as $row1) {
            $correoasig = $row1["usu_correo"];
            $usu_asig = $row1["usu_nom"].' '.$row1["usu_ape"];
        }

        // Siempre es igual
        $this->SMTPDebug = 0;
        $this->IsSMTP();
        $this->Host = 'mail.sercoing.cl';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gpass;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        $this->FromName = $this->tu_nombre = "SolicitudesTI - Sercoing";
        $this->CharSet = 'UTF-8';
        $this->Encoding = "base64";
        $this->addAddress($correo);
        $this->addAddress("solicitudes@sercoing.cl");
        $this->addAddress($correoasig);
        $this->WordWrap = 50;
        $this->IsHtml(true);
        $this->msgHTML(true); 
        $this->Subject = "El ticket Nº: ".$id.", ha sido asignado";
        $cuerpo = file_get_contents('../public/asignar.html');
        //parametros de la plantilla
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);
        $cuerpo = str_replace("lblCosto", $costo, $cuerpo);
        $cuerpo = str_replace("lblUsu", $usu_asig, $cuerpo);
        $cuerpo = str_replace("lblFech", date("d/m/Y H:i:s", strtotime($fech_asig)), $cuerpo);

        utf8_decode($cuerpo);
        
        $this->AddEmbeddedImage('../public/imagen.jpg', 'imagen', 'imagen.jpg');

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Cerrado");
        return $this->Send();
    }

    public function ticket_reabierto($tick_id){
        
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row) {
            $id = $row["tick_id"];
            $usu = $row["usu_nom"].' '.$row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
            $costo = $row["cos_nom"];
            $descrip = $row["tick_descrip"];
        }

        // Siempre es igual
        $this->SMTPDebug = 0;
        $this->IsSMTP();
        $this->Host = 'mail.sercoing.cl';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gpass;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        $this->FromName = $this->tu_nombre = "SolicitudesTI - Sercoing";
        $this->CharSet = 'UTF-8';
        $this->Encoding = "base64";
        $this->addAddress($correo);
        $this->addAddress("solicitudes@sercoing.cl");
        $this->WordWrap = 50;
        $this->IsHtml(true);
        $this->msgHTML(true); 
        $this->Subject = "El ticket Nº: ".$id .", ha sido abierto nuevamente";
        $cuerpo = file_get_contents('../public/reabierto.html');
        //parametros de la plantilla
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);
        $cuerpo = str_replace("lblDesc", $costo, $cuerpo);

        utf8_decode($cuerpo);
        
        $this->AddEmbeddedImage('../public/imagen.jpg', 'imagen', 'imagen.jpg');

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags(" Ticket reabierto");
        return $this->Send();

    }

    public function ticket_noti($tick_id){
        
        $ticket = new Ticket();
        $datos = $ticket->reabrir_ticket_noti($tick_id);
        foreach ($datos as $row) {
            $id = $row["tick_id"];
            $usu = $row["usu_nom"].' '.$row["usu_ape"];
            $descrip = $row["tickd_descrip"];
            $fecha = $row["fech_crea"];
            $usucorreoasig = $row["usu_correo"];
        }

        $ticket1 = new Ticket();
        $datos1 = $ticket1->listar_ticket_x_id($tick_id);
        foreach ($datos1 as $row) {
            $id = $row["tick_id"];
            $correo = $row["usu_correo"];

        }

        // $usuario = new Usuario();
        // $datos1=$usuario->get_usuario_x_id($row["usu_id"]);
        // foreach ($datos1 as $row1) {
        //     $correo = $row1["usu_correo"];
        //     $usu_asig = $row1["usu_nom"].' '.$row1["usu_ape"];
        // }

        // Siempre es igual
        $this->SMTPDebug = 0;
        $this->IsSMTP();
        $this->Host = 'mail.sercoing.cl';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->Username = $this->gcorreo;
        $this->Password = $this->gpass;
        $this->From = $this->gcorreo;
        $this->SMTPSecure = 'tls';
        $this->FromName = $this->tu_nombre = "SolicitudesTI - Sercoing";
        $this->CharSet = 'UTF-8';
        $this->Encoding = "base64";
        $this->addAddress("solicitudes@sercoing.cl");
        $this->addAddress($usucorreoasig);
        $this->addAddress($correo);
        $this->WordWrap = 50;
        $this->IsHtml(true);
        $this->msgHTML(true); 
        $this->Subject = "Nuevos comentarios en ticket Nº: ".$id;
        $cuerpo = file_get_contents('../public/noti.html');
        //parametros de la plantilla
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblDesc", $descrip, $cuerpo);
        $cuerpo = str_replace("lblFech", $fecha, $cuerpo);
        

        utf8_decode($cuerpo);
        
        $this->AddEmbeddedImage('../public/imagen.jpg', 'imagen', 'imagen.jpg');

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags(" Nuevos comentarios");
        return $this->Send();

    }
}

?>