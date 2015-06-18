<?php 
/**
* 
*/
class MComunicacion
{
	
	private $_db;
	private $_Codigo;
	private $_Nombre;
	private $_Descripcion;
	private $_Estado;
    private $_Empleado;
    public $_Comunicacion;

    public function __SET($atributo, $valor){
        $this->$atributo = $valor;  
    }

    public function __GET($atributo){
        return $this->$atributo;
    }

	function __construct($db)
    {
        try {
            $this->_db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function guardarComunicacion()
    {
        $sql = "CALL sp_comunicacionRegistrar(:nombre,:descripcion,:estado)";

        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            ':nombre' => $this->_Nombre,
            ':descripcion' => $this->_Descripcion,
            ':estado' => $this->_Estado
            ));
        return $stm;
    }
    
    public function listarComunicacion()
    {
        $sql = "CALL sp_comunicacionListar";
        $stm = $this->_db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    public function modificarComunicacion()
    {
        $sql= "CALL sp_comunicacionModificar (:codigo,:nombre, :descripcion)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'codigo'=>$this->_Codigo,
            'nombre'=>$this->_Nombre,
            'descripcion' =>$this->_Descripcion
            ));
        
        return $stm->rowCount();
    }

    public function habilitarEstado()
    {
        $sql= "CALL sp_comunicacionEstadohabilitar (:codigo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'codigo'=>$this->_Codigo

            ));
        
        return $stm->rowCount();

    }

    public function inhabilitarEstado()
    {
        $sql= "CALL sp_comunicacionEstadoInhabilitar (:codigo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'codigo'=>$this->_Codigo

            ));
        
        return $stm->rowCount();

    }

    public function consultarComunicacion(){

        $sql= "CALL sp_comunicacionConsultar(:codigo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'codigo'=>$this->_Codigo
            ));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardarPublicacion(){
        $sql = "CALL sp_publicacionRegistrar(:empleado,:comunicacion,:descripcion)";

        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            ':empleado' => $this->_Empleado,
            ':comunicacion' => $this->_Comunicacion,
            ':descripcion' => $this->_Descripcion
            ));
        return $stm;
    }


}


?>