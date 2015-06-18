<?php 
/**
* 
*/
class MRoles
{
    private $_db;
    private $_NombreRol;
    private $_idRol;
    private $_Estado;

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

    public function guardarRol()
    {
        $sql = "CALL sp_RolesRegistrar(:nombre,:estado)";

        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            ':nombre' => $this->_NombreRol,
            ':estado' => $this->_Estado
            ));
        return $stm;
    }
    // si esta
    public function listarRol()
    {
        $sql = "CALL sp_RolesListar";
        $stm = $this->_db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarRol()
    {
        $sql= "CALL sp_RolesModificar (:idrol,:nombre)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'idrol'=>$this->_idRol,
            'nombre'=>$this->_NombreRol
            ));
        
        return $stm->rowCount();
    }

    public function habilitarEstado()
    {
        $sql= "CALL sp_RolesEstadohabilitar (:idrol)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'idrol'=>$this->_idRol

            ));
        
        return $stm->rowCount();

    }

    public function inhabilitarEstado()
    {
        $sql= "CALL sp_RolesEstadoInhabilitar (:idrol)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'idrol'=>$this->_idRol

            ));
        
        return $stm->rowCount();

    }
// si esta
    public function consultarRol(){ 
        $sql= "CALL sp_RolesConsultar(:idrol)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'idrol'=>$this->_idRol
            ));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function permisosRol(){
        $sql="CALL sp_permisosRol (:idRoles, :idPermisos)";

        $stm=  $this->_db->prepare($sql);

        $stm->execute(array(
            ':idRoles' => $this->__GET("_idRoles"), 
            ':idPermisos' => $this->__GET("_idPermisos")
        ));
    }

    public function listarPermisos(){
        $sql="CALL sp_PermisosListar";
        $stm=  $this->_db->prepare($sql);
        $stm->execute();
    
        return $stm->fetchALL(PDO::FETCH_ASSOC);
    }

    public function ultimoRol(){
        $sql="CALL sp_rolesListarPermisos";
        $stm=  $this->_db->prepare($sql);
        $stm->execute();
    
        return $stm->fetchALL(PDO::FETCH_ASSOC);

    }

}


 ?>