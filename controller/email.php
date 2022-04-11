<?php
    require_once("../config/conexion.php");
    require_once("../models/Email.php");
    $email = new Email();

    switch ($_GET["op"]) {
        case 'ticket_abierto':
            $email->ticket_abierto($_POST["tick_id"]);
        break;

        case 'ticket_cerrado':
            $email->ticket_cerrado($_POST["tick_id"]);
        break;

        case 'ticket_asignar':
            $email->ticket_asignar($_POST["tick_id"]);
        break;

        case 'ticket_reabierto':
            $email->ticket_reabierto($_POST["tick_id"]);
        break;

        case 'ticket_noti':
            $email->ticket_noti($_POST["tick_id"]);
        break;
    }
?>