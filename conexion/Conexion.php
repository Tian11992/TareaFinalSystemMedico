<?php

    class Conexion{

        public static function getConexion(){
            $conexion = new mysqli("localhost", "root", "", "bdmedicosystem");
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;
        }

    }

?>