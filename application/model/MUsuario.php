<?php 

/**
* 
*/
class Musuario 
{
    private $_Cedula;
	private $_NombreUsuario;
    private $_Correo;
	private $_Password;
    private $_idRol;
	private $_db;
    private $_Estado;
    private $_Contra;

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
        $sql = "CALL sp_UsuariosRegistrar(:cedula, :usuario, :email , :contrasena, :estado, :roles)";

        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            ':cedula' => $this->_Cedula,
            ':usuario' => $this->_NombreUsuario,
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

    public function modificarUsuario()
    {
        $sql= "CALL sp_UsuariosModificar (:cedula,:nombre,:correo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula,
            'nombre'=>$this->_NombreUsuario,
            'correo'=>$this->_Correo
            ));
        
        return $stm->rowCount();
    }

    public function listarUsuario()
    {
        $sql = "CALL sp_UsuariosListar";
        $stm = $this->_db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inhabilitarEstado()
    {
        $sql= "CALL sp_UsuariosEstadoInhabilitar (:cedula)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula
            ));
        
        return $stm->rowCount();

    }

    public function habilitarEstado()
    {
        $sql= "CALL sp_UsuariosEstadoHabilitar (:cedula)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula
            ));
        
        return $stm->rowCount();
    }

    public function consultarUsuario()
    {
        $sql= "CALL sp_UsuariosConsultar(:cedula)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula
            ));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function entrar()
    {
        $sql = "CALL sp_Login(:usuario)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(':usuario' => $this->_Cedula));

        return $stm->fetch();
    }

    public function recuperarContra()
    {
        $sql = "CALL sp_recuperarContrasena(:correo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(':correo' => $this->_Correo));

        return $stm->fetchALL(PDO::FETCH_ASSOC);
    }

    public function modificarContra()
    {
        $sql = "CALL sp_passwordModificar(:cedula, :contra)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'cedula'=>$this->_Cedula,
            'contra'=>$this->_Contra
             ));
        
        return $stm->rowCount();
    }

    public function menusRoles()
    {
        $sql = "CALL sp_ListarModulos(:idRol)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(':idRol' => $this->_idRol));

        return $stm->fetchALL(PDO::FETCH_ASSOC);
    }
}
 ?>