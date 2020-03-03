<?php 
class Tblpacientes_model
{

    private $bd;
    private $tblpacientes;
    private $tblpaciente;

    public function __construct()
    {
        $this->bd = Conexion::getConexion();
        $this->tblpacientes = array();
        $this->tblpaciente = array();
    }

    public function insertPacientes($dato)
    {
        $nombre = $dato['nombre'];
        $apellidos = $dato['apellidos'];
        $tipodoc = $dato['tipodoc'];
        $numerodocumento = $dato['numerodocumento'];
        $genero = $dato['genero'];
        $edad = $dato['edad'];

        $consulta = "INSERT INTO tblpacientes(numerodocumento, tipodoc, nombre, apellido, genero, edad) VALUES($numerodocumento, $tipodoc, '$nombre', '$apellidos', $genero, $edad);";
        mysqli_query($this->bd, $consulta);
    }

    public function consultarPacientes($historia = null)
    {

        $sql = "SELECT t.nombre 'documento', p.numerodocumento, CONCAT(p.nombre, ' ', p.apellido) 'paciente', g.nombre 'genero', p.edad FROM tblpacientes p INNER JOIN tbltipodocumento t ON t.idtipodoc = p.tipodoc INNER JOIN tblgenero g ON p.genero = g.idgenero";

        if($historia)
        {
            $sql .= ' ORDER BY p.nombre';
        }

        $consulta = $this->bd->query($sql);

        while($fila = $consulta->fetch_assoc())
        {
            $this->tblpacientes[] = $fila;
        }
        return $this->tblpacientes;
    }

    public function consultarPacientePorId($documento)
    {
        $consulta = $this->bd->query("SELECT * FROM tblpacientes WHERE numerodocumento = " . $documento);
        $fila = $consulta->fetch_assoc();
        $this->tblpaciente[] = $fila;
        return $this->tblpaciente;
    }

    public function actualizarPaciente($dato)
    {
        $nombre = $dato['nombre'];
        $apellidos = $dato['apellidos'];
        $tipodoc = $dato['tipodoc'];
        $numerodocumento = $dato['numerodocumento'];
        $genero = $dato['genero'];
        $edad = $dato['edad'];

        $consulta = "UPDATE tblpacientes SET nombre = '$nombre', apellido = '$apellidos', tipodoc = $tipodoc, genero = $genero, edad = $edad WHERE numerodocumento = $numerodocumento";
        mysqli_query($this->bd, $consulta);
    }
}

?>