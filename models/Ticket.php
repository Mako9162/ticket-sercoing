<?php
    class Ticket extends Conectar{

        public function insert_ticket($usu_id, $cat_id, $cats_id, $cos_id, $tick_titulo, $tick_descrip){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_ticket (tick_id,usu_id,cat_id, cats_id, cos_id,tick_titulo,tick_descrip,tick_estado,fech_crea,usu_asig,fech_asig,est) VALUES (NULL,?,?,?,?,?,?,'Abierto',now(),NULL,NULL,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->bindValue(2, $cat_id);
            $sql->bindValue(3, $cats_id);
            $sql->bindValue(4, $cos_id);
            $sql->bindValue(5, $tick_titulo);
            $sql->bindValue(6, $tick_descrip);
            $sql->execute();

            $sql1="SELECT last_insert_id() AS 'tick_id';";
            $sql1=$conectar->prepare($sql1);
            $sql1->execute();
            return $resultado=$sql1->fetchAll(PDO::FETCH_ASSOC);
        }
        public function listar_ticket_xusu_tec($usu_id, $usu_asig){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_ticket.tick_id,
            tm_ticket.usu_id,
            tm_ticket.cat_id,
            tm_ticket.cats_id,
            tm_ticket.cos_id,
            tm_ticket.tick_titulo,
            tm_ticket.tick_descrip,
            tm_ticket.tick_estado,
            tm_ticket.fech_crea,
            tm_ticket.usu_asig,
            tm_ticket.fech_asig,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_categoria.cat_nom,
            tm_costo.cos_nom,
            tm_subcategoria.cats_nom
            FROM 
            tm_ticket
            INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
            INNER join tm_costo on tm_ticket.cos_id = tm_costo.cos_id
            INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
            INNER join tm_subcategoria on tm_ticket.cats_id = tm_subcategoria.cats_id
            WHERE
            tm_ticket.est = 1
            AND tm_usuario.usu_id= ?
			OR tm_ticket.usu_asig = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->bindValue(2, $usu_asig);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function listar_ticket_x_usu($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_ticket.tick_id,
            tm_ticket.usu_id,
            tm_ticket.cat_id,
            tm_ticket.cats_id,
            tm_ticket.cos_id,
            tm_ticket.tick_titulo,
            tm_ticket.tick_descrip,
            tm_ticket.tick_estado,
            tm_ticket.fech_crea,
            tm_ticket.usu_asig,
            tm_ticket.fech_asig,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_categoria.cat_nom,
            tm_costo.cos_nom,
            tm_subcategoria.cats_nom
            FROM 
            tm_ticket
            INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
            INNER join tm_costo on tm_ticket.cos_id = tm_costo.cos_id
            INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
            INNER join tm_subcategoria on tm_ticket.cats_id = tm_subcategoria.cats_id
            WHERE
            tm_ticket.est = 1
            AND tm_usuario.usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticket(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_ticket.tick_id,
            tm_ticket.usu_id,
            tm_ticket.cat_id,
            tm_ticket.cats_id,
            tm_ticket.cos_id,
            tm_ticket.tick_titulo,
            tm_ticket.tick_descrip,
            tm_ticket.tick_estado,
            tm_ticket.fech_crea,
            tm_ticket.usu_asig,
            tm_ticket.fech_asig,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_categoria.cat_nom,
            tm_costo.cos_nom,
            tm_subcategoria.cats_nom
            FROM 
            tm_ticket
            INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
            INNER join tm_costo on tm_ticket.cos_id = tm_costo.cos_id
            INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
            INNER join tm_subcategoria on tm_ticket.cats_id = tm_subcategoria.cats_id
            WHERE
            tm_ticket.est = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticketdetalle_x_ticket($tick_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT
            td_ticketdetalle.tickd_id,
            td_ticketdetalle.tickd_descrip,
            td_ticketdetalle.fech_crea,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_usuario.rol_id
            FROM 
            td_ticketdetalle
            INNER join tm_usuario on td_ticketdetalle.usu_id = tm_usuario.usu_id
            WHERE 
            tick_id =?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticket_x_id($tick_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_ticket.tick_id,
            tm_ticket.usu_id,
            tm_ticket.cat_id,
            tm_ticket.cats_id,
            tm_ticket.cos_id,
            tm_ticket.tick_titulo,
            tm_ticket.tick_descrip,
            tm_ticket.tick_estado,
            tm_ticket.fech_crea,
            tm_ticket.usu_asig,
            tm_ticket.fech_asig,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_usuario.usu_correo,
            tm_categoria.cat_nom,
            tm_costo.cos_nom,
            tm_subcategoria.cats_nom
            FROM 
            tm_ticket
            INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
            INNER join tm_costo on tm_ticket.cos_id = tm_costo.cos_id
            INNER join tm_subcategoria on tm_ticket.cats_id = tm_subcategoria.cats_id
            INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
            WHERE
            tm_ticket.est = 1
            AND tm_ticket.tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticket_detalle($tick_id, $usu_id, $tickd_descrip){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO td_ticketdetalle (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) VALUES (NULL,?,?,?,now(),'1')";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->bindValue(2, $usu_id);
            $sql->bindValue(3, $tickd_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticket_detalle_cerrar($tick_id, $usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO td_ticketdetalle 
            (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) 
            VALUES 
            (NULL,?,?,'Ticket Cerrado...',now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle_reabrir($tick_id, $usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO td_ticketdetalle 
            (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) 
            VALUES 
            (NULL,?,?,'Ticket Abierto Nuevamente...',now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_ticket($tick_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_ticket 
            SET	
                tick_estado = 'Cerrado'
            WHERE
                tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }   

        public function update_ticket_asignacion($tick_id,$usu_asig){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_ticket 
                SET	
                    usu_asig = ?,
                    fech_asig = NOW()
                WHERE
                    tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_asig);
            $sql->bindValue(2, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
  
        public function get_ticket_total(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_ticket_totalabierto(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where tick_estado='Abierto'";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        
        public function get_ticket_totalcerrado(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where tick_estado='Cerrado'";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_ticket_grafico(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total
            FROM   tm_ticket  JOIN  
                tm_categoria ON tm_ticket.cat_id = tm_categoria.cat_id  
            WHERE    
            tm_ticket.est = 1
            GROUP BY 
            tm_categoria.cat_nom 
            ORDER BY total DESC";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function reabrir_ticket($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_ticket 
                SET	
                    tick_estado = 'Abierto'
                WHERE
                    tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function reabrir_ticket_noti($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
            td_ticketdetalle.tickd_id,
            td_ticketdetalle.tick_id,
            td_ticketdetalle.tickd_descrip,
            td_ticketdetalle.fech_crea,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
			tm_usuario.usu_correo,
            tm_usuario.rol_id
            FROM 
            td_ticketdetalle
            INNER JOIN tm_usuario ON td_ticketdetalle.usu_id = tm_usuario.usu_id
			INNER JOIN tm_ticket ON td_ticketdetalle.tick_id = tm_ticket.tick_id
            WHERE 
            td_ticketdetalle.tick_id =?
            ORDER BY td_ticketdetalle.tickd_id DESC limit 1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }        
        
    }
?>