<?php
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=tickets", "root", "");
               // $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=sercoing_solicitudesit", "sercoing_marancibia", "HM]69)pe+o25");
                return $conectar;
            } catch (Exception $e) {
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'UTF8");
        }

        public function ruta(){
            return "http://localhost:8081/ticket-sercoing/";
           // return "http://solicitudesti.sercoing.cl/";
        }
    }

?>