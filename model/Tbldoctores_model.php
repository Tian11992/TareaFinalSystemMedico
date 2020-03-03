<?php

    class Tbldoctores_model
    {
        private $bd;
        private $tbldoctores;
        private $tbldoctor;

        public function __construct()
        {
            $this->bd = Conexion::getConexion();
            $this->tbldoctores = array();
            $this->tbldoctor = array();
        }

        public function insertDoctores($dato)
        {
            $nombre = $dato['nombre'];
            $tipodoc = $dato['tipodoc'];
            $numerodocumento = $dato['numerodocumento'];

            $consulta = "INSERT INTO tblmedicos VALUES($numerodocumento, $tipodoc, '$nombre');";
            mysqli_query($this->bd, $consulta);
        }

        public function consultarDoctores($historia = null)
        {
            $sql = "SELECT t.nombre 'documento', m.numerodocumento, m.nombre FROM tblmedicos m INNER JOIN tbltipodocumento t ON m.tipodoc = t.idtipodoc";

            if($historia)
            {
                $sql .= ' ORDER BY m.nombre';
            }

            $consulta = $this->bd->query($sql);
            while($fila = $consulta->fetch_assoc())
            {
                $this->tbldoctores[] = $fila;
            }
            return $this->tbldoctores;
        }

        public function consultarDoctorPorId($documento)
        {
            $consulta = $this->bd->query("SELECT * FROM tblmedicos WHERE numerodocumento = " . $documento);
            $fila = $consulta->fetch_assoc();
            $this->tbldoctor[] = $fila;
            return $this->tbldoctor;
        }

        public function actualizarDoctor($dato)
        {
            $nombre = $dato['nombre'];
            $tipodoc = $dato['tipodoc'];
            $numerodocumento = $dato['numerodocumento'];

            $consulta = "UPDATE tblmedicos SET nombre = '$nombre', tipodoc = $tipodoc WHERE numerodocumento = $numerodocumento";
            mysqli_query($this->bd, $consulta);
        }
    }

?>