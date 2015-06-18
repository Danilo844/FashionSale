<?php 


class Roles extends Controller
{

	public $roles;

	function  Roles(){
		$this->roles = $this->loadModel("MRoles");
		$this->usuario = $this->loadModel("MUsuario");
	}
	

	public function index($i = null)
    {

    	$id = "";
    	$nombre = "";
    	$tabla = "";
	    foreach ($this->roles->listarRol() as $value) {
	    	$boton = "";
	    	if($value["Estado"] =="1"){
	    		$boton= "<a href='".URL."roles/inhabilitarEstado/".$value["idRoles"]."'>Inhabilitar</a>";
	    	}else {
	    		$boton= "<a href='".URL."roles/habilitarEstado/".$value["idRoles"]."'>Habilitar</a>";
	    	}
	    	if($value["Estado"] =="1"){
	    		$name = $value["Estado"];
	    		$name = "Activo";
	    	}else {
	    		$name = "Inactivo";
	    	}
			$tabla .= "<tr>
				<td>".$value["idRoles"]."</td>
				<td>".$value["Nombre"]."</td>
				<td>".$name."</td>
				<td><a href='".URL."roles/index/".$value["idRoles"]."'>Seleccionar</a> ".$boton."</td>
			<tr>";
		}
		if($i!=null){

		$this->roles->__SET("_idRol",$i);
			foreach ($this->roles->consultarRol() as $value) {
				$id = $value["idRoles"];
				$nombre = $value["Nombre"];
			}
		}

		$select = "";
    	$g = $this->roles;
		foreach ($g->ultimoRol() as  $key => $value) {

			$select.="<option value='".$value['idRoles']."' ";

			if (isset($_POST["txtRol"]) != null) {

				if ($_POST["txtRol"]==$value['idRoles']) 
				{
					$select.= "SELECTED";
				}	
			}else{
				$select.= $value['idRoles'];
			}	

			$select.= ">";
			$select.= $value['Nombre'];
			$select.= "</option>";
    	}

		$permisos="";
    	$c = $this->usuario;
    	$r = $this->roles;
    	$e="";

    	// $this->roles->__SET("_idRol",$_POST["txtRol"]);
    	// $rolesExistentes = $r ->PermisosXrol();
    	$checkbox = $r->listarPermisos();


    	foreach ($checkbox as $key => $value) {

    		$permisos.="<input type=checkbox name=checkbox[] value='".$value['idPermisos']."'";
    		// $this->roles->__SET("_idRol",$_POST["txtRol"]);
    		// $resultado= $this->roles->PermisosXrol();

    		// if ($resultado > 0) {
    		// 	echo "'checked=checked'";
    		// }
    		$permisos.=">";
    		$permisos.= $value['Nombre'];
    	}
	

		if(isset($_POST["action"])!=null)
		{
			$action = $_POST["action"];

			if($action == "btnRegistrar"){


				if ($_POST["txtNombre"] != null) {
					$this->Crear();
				} else {
					
					$this->MostrarMensaje(" Complete los campos *");
				}
			}
			else if($action == "btnModificar"){
				if ($_POST["txtId"] != null) {
					$this->Actualizar();
				} else {
					
					$this->MostrarMensaje(" Complete los campos *");
				}
			}
			if ($action == "btnRegistrarR") {
				$this->darPermisos();
			}
		}

		require APP . 'view/_templates/headerSesion.php';
	    require APP . 'view/roles/index.php';
	    require APP . 'view/_templates/footerSesion.php';

    }

    function MostrarMensaje($texto)
    {
 		echo "<script>alert('".$texto."')</script>";
	}

	function Crear()
        { 	
			
		 	$this->roles->__SET("_NombreRol",$_POST["txtNombre"]);
			$resultado= $this->roles->guardarRol();

			if($resultado != null)
		 	{
		 		$this->MostrarMensaje(" El rol se guardo ");
			}else{		
				$this->	MostrarMensaje(" Error no se guardo ");
			}	
	    }

	function Actualizar(){
		$this->roles->__SET("_idRol",$_POST["txtId"]);
		$this->roles->__SET("_NombreRol",$_POST["txtNombre"]);
		$resultado= $this->roles->modificarRol();

		if($resultado != null){
			$this->MostrarMensaje(" El rol se modifico ");
			header('location: ' . URL . 'roles');
		}else{
			$this->MostrarMensaje(" El rol no se modifico ");
		}
	} 

	function habilitarEstado($id){
		$this->roles->__SET("_idRol",$id);
		$resultado=$this->roles->habilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'roles');
			$this->MostrarMensaje("El estado se modifico ");

		}else{		
			$this->	MostrarMensaje("El estado No Se Modifico ");
		}
	}

	function InhabilitarEstado($id){
		$this->roles->__SET("_idRol",$id);
		$resultado=$this->roles->inhabilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'roles');
			$this->MostrarMensaje("El estado se modifico ");

		}else{		
			$this->	MostrarMensaje("El estado No Se Modifico ");
		}
	}

	function darPermisos(){
		$this->roles->__SET("_idRoles",$_POST["txtpRol"]);
		if ($_POST['checkbox'] != null) {
			if (is_array($_POST['checkbox'])) {
				while (list($key,$value) = each($_POST['checkbox'])) {
	 				$this->roles->__SET("_idPermisos","$value");
	 				$this->roles->permisosRol();
				}

			}
		}
	}



}


?>