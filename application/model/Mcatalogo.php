<?php 

class Mcatalogo
{
	private $_Nombre;
    private $_Descripcion;
    private $_Estado;
    private $_idCatalogo;

    private $_db;

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
        $sql = "CALL sp_RegistrarCatalogo(:nombre,:descripcion,:estado)";

        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            ':nombre' => $this->_Nombre,
            ':descripcion' => $this->_Descripcion,
            ':estado' => $this->_Estado
           ));

        return $stm;
    }
    public function listar(){
        $sql=" CALL sp_listarCatalogo";
        $stm=  $this->_db->prepare($sql);
        $stm->execute();
        
        return $stm->fetchALL(PDO::FETCH_ASSOC);
    }
    public function consultar()
    {
          $sql="CALL sp_ConsultarCatalogo(:idCatalogo)";
          $stm=  $this->_db->prepare($sql);
          $stm  -> execute(array(
                'idCatalogo' => $this->_idCatalogo
            ));
          return $stm->fetchALL(PDO::FETCH_ASSOC);
    }
    public function actualizar()
    {
          $sql="CALL sp_modificarCatalogo(:idCatalogo,:nombre,:descripcion)";
          $stm=  $this->_db->prepare($sql);
          $stm  -> execute(array(
                'idCatalogo' => $this->_idCatalogo,
                'nombre' => $this->_Nombre,
                'descripcion' => $this->_Descripcion

            ));
         return $stm->rowCount();
    } 
      public function habilitarEstado()
    {
        $sql= "CALL sp_CatalogoEstadoHabilitar (:idCatalogo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'idCatalogo'=>$this->_idCatalogo

            ));
        
        return $stm->rowCount();

    }

    public function inhabilitarEstado()
    {
        $sql= "CALL sp_CatalogoEstadoInhabilitar (:idCatalogo)";
        $stm = $this->_db->prepare($sql);
        $stm->execute(array(
            'idCatalogo'=>$this->_idCatalogo

            ));
        
        return $stm->rowCount();

    }

}
   ?>