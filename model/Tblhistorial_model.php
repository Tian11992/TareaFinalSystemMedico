<?php

	class Tblhistorial_model
	{
		private $bd;
        private $tblhistoriales;
        private $tblhistoriaPaciente;


        public function __construct()
        {
            $this->bd = Conexion::getConexion();
            $this->tblhistoriales = array();
            $this->tblhistoriaPaciente = array();
        }

        public function insertarHistoria($dato)
        {
            $paciente = $dato['paciente'];
            $medico = $dato['medico'];
            $observacion = $dato['observacion'];

            $consulta = "INSERT INTO tblhistorias VALUES(NULL, $paciente, $medico, '$observacion', CURDATE());";
            mysqli_query($this->bd, $consulta);
        }

        public function consultarHistorial()
        {
            $consulta = $this->bd->query("SELECT idhistoria, h.paciente 'idpaciente', t.nombre 'documento', CONCAT(p.nombre, ' ', p.apellido) 'paciente' FROM tblhistorias h INNER JOIN tblpacientes p ON p.numerodocumento = h.paciente INNER JOIN tbltipodocumento t ON t.idtipodoc = p.tipodoc");

            while($fila = $consulta->fetch_assoc())
            {
                $this->tblhistoriales[] = $fila;
            }
            return $this->tblhistoriales;
        }

        public function consultarHistorialPaciente($id)
        {
        	$consulta = $this->bd->query("SELECT h.observacion, CONCAT(p.nombre, ' ', p.apellido) 'paciente', m.nombre 'doctor', h.fecha FROM tblhistorias h INNER JOIN tblmedicos m ON m.numerodocumento = h.medico INNER JOIN tblpacientes p ON h.paciente = p.numerodocumento WHERE h.paciente = $id");

        	while($fila = $consulta->fetch_assoc())
        	{
        		$this->tblhistoriaPaciente[] = $fila;
        	}

        	return $this->tblhistoriaPaciente;
        }

        public function eliminarHistorial($idhistoria)
        {
            $consulta = "DELETE FROM tblhistorias WHERE idhistoria = $idhistoria";

            mysqli_query($this->bd, $consulta);
        }

	}

?>