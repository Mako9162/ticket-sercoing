<?php
    class Costo extends Conectar{

        public function get_costo(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_costo WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_costo_listar(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_costo WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_costo($cos_nom){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_costo (cos_id, cos_nom, est) VALUES (NULL,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cos_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_costo($cos_id, $cos_nom ){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_costo SET
            cos_nom = ?
            WHERE
            cos_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cos_nom);
            $sql->bindValue(2, $cos_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_costo_x_id($cos_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_costo WHERE cos_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cos_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_costo($cos_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_costo SET est='0' WHERE cos_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cos_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>