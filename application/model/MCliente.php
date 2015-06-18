<?php 


class MCliente
{
    private $_Cedula;
	private $_NombreCliente;
    private $_Correo;
	private $_Password;
    private $_idRol;
	private $_db;
    private $_Estado;

    public function __GET($atributo)
	{
       return $this->$atributo;
	}
	public function __SET($atributo,$valor)
	{
		return $this->$atributo=$valor;
	}

	function __construct($db)
	{
		try {
            $this->_db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
	}

	public function guardar()
    {
        $sql = "CALL sp_ClientesRegistrar(:cedula, :cliente, :email , :contrasena, :estado, :roles)";

        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            ':cedula' => $this->_Cedula,
            ':cliente' => $this->_NombreCliente,
            ':email' => $this->_Correo,
            ':contrasena' => $this->_Password,
            ':estado' => $this->_Estado,
            'roles' => $this->_idRol
            ));

        return $stm;
    }

    public function existenciaCedula()
    {
        $sql = "CALL sp_existeCedula(:cedula)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula
        ));
        
        return $stm->rowCount();

    }

    public function existenciaCorreo()
    {
        $sql = "CALL sp_existeCorreo(:correo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'correo'=>$this->_Correo
        ));
        
        return $stm->rowCount();

    }


    public function listarCliente()
    {
        $sql = "CALL sp_ClientesListar";
        $stm = $this->_db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inhabilitarEstado()
    {
        $sql= "CALL sp_ClientesEstadoInhabilitar (:cedula)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula
            ));
        
        return $stm->rowCount();

    }

    public function habilitarEstado()
    {
        $sql= "CALL sp_ClientesEstadoHabilitar (:cedula)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula
            ));
        
        return $stm->rowCount();
    }

    // public function modificarCliente()
    // {
    //     $sql= "CALL sp_ClientesModificar (:cedula,:nombre,:correo)";
    //     $stm = $this->_db->prepare($sql);
    //     $stm->execute(array(
    //         'cedula'=>$this->_Cedula,
    //         'nombre'=>$this->_NombreCliente,
    //         'correo'=>$this->_Correo
    //         ));
        
    //     return $stm->rowCount();
    // }
    
    public function consultarCliente()
    {
        $sql= "CALL sp_ClientesConsultar(:cedula)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula
            ));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>