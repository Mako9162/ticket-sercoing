<?php
    require_once("../config/conexion.php");
    require_once("../models/Costo.php");
    $costo = new Costo();

    switch ($_GET["op"]) {
        case "combo":
            $datos = $costo->get_costo();
            if (is_array($datos)==true and count($datos)>0) {
                $html.="<option label='Seleccionar'></option>";
                foreach($datos as $row)
                {
                    
                    $html.="<option value='".$row['cos_id']."'>".$row['cos_nom']."</option>";
                }
                echo $html;
            }
        break;

        case "listar":
            $datos=$costo->get_costo_listar();
            $data= array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["cos_id"];
                $sub_array[] = $row["cos_nom"];

                $sub_array[] = '<buton type="button" onClick="editar('.$row['cos_id'].');" id="'.$row['cos_id'].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></buton>';
                $sub_array[] = '<buton type="button" onClick="eliminar('.$row['cos_id'].');" id="'.$row['cos_id'].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></buton>';
                $data[] = $sub_array;
                
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "guardaryeditar":
            if (empty($_POST["cos_id"])) {
                $costo->insert_costo($_POST["cos_nom"]);
            } else {
                $costo->update_costo($_POST["cos_id"], $_POST["cos_nom"]);
            }
        break;

        case "mostrar":
            $datos=$costo->get_costo_x_id($_POST["cos_id"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach ($datos as $row) {
        
                    $output["cos_nom"] = $row["cos_nom"];
                    $output["cos_id"] = $row["cos_id"];
     
                }
            echo json_encode($output);    
            }
        break;

        case "eliminar":
            $costo->delete_costo($_POST["cos_id"]);
        break;
    }

    
?>