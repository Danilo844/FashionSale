<?php 

/**
* 
*/
class Usuario extends Controller
{
	public $usuario;
	public $rol;

	public function usuario(){
		$this->usuario = $this->loadModel("MUsuario");
		$this->rol = $this->loadModel("MRoles");
		}

	public function index( $i = null )
    {
    	$this->tabla="";
    	$select = "";
    	$g = $this->rol;
		foreach ($g->listarRol() as  $key => $value) {

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
    	
    	$id="";
		$cedula = "";
		$nombre = "";
		$correo = "";
		$pass = "";

		$tabla = "";
	    foreach ($this->usuario->listarUsuario() as $value) {
	    	$name = "";
	    	$boton = "";
	    	if($value["Estado"] =="1"){
	    		$boton= "<a href='".URL."usuario/inhabilitarEstado/".$value["Cedula"]."'>Inhabilitar</a>";
	    	}else {
	    		$boton= "<a href='".URL."usuario/habilitarEstado/".$value["Cedula"]."'>Habilitar</a>";
	    	}
	    	if($value["Estado"] =="1"){
	    		$name = $value["Estado"];
	    		$name = "Activo";
	    	}else {
	    		$name = "Inactivo";
	    	}
	    	
			$this->tabla .= "<tr>
				<td>".$value["Cedula"]."</td>
				<td>".$value["NombreUsuario"]."</td>
				<td>".$value["Correo"]."</td>
				<td>".$name."</td>
				<td>".$value["idRoles"]."</td>
				<td><a href='".URL."usuario/index/".$value["Cedula"]."'>Seleccionar</a>
				".$boton."</td>
			<tr>";
		}

    	if($i!=null)
    	{

			$this->usuario->__SET("_Cedula",$i);
			foreach ($this->usuario->consultarUsuario() as $value) {
				$cedula = $value["Cedula"];
				$nombre = $value["NombreUsuario"];
				$correo = $value["Correo"];
				$pass = $value["Password"];
			}
		}


		if(isset($_POST["action"])!=null)
		{
			$action = $_POST["action"];

			if($action == "btnRegistrar"){

				if ($_POST["txtCedula"] != null && $_POST["txtNombre"] != null && $_POST["txtCorreo"] != null && $_POST["txtPassword"] != null
					&& $_POST["txtRol"] != "Seleccionar") {
					$this->Crear();
				} else {					
					$this->MostrarMensaje("Complete los campos *");
				}
			}
			else if($action == "btnModificar"){
				
				if ($_POST["txtIdusuario"] != null) {
					$this->Actualizar();
				} else {
					
					$this->MostrarMensaje("Complete los campos *");
				}
			}
			
		}
		require APP . 'view/_templates/header.php';
	    require APP . 'view/usuario/index.php';
	    require APP . 'view/_templates/footer.php';

	}
	

    function MostrarMensaje($texto)
    {
 		echo "<script>alert('".$texto."')</script>";
	}

    function Crear()
    { 	
    	
		$gu = $this->usuario;
	 	$gu->__SET("_Cedula",$_POST["txtCedula"]);
	 	$gu->__SET("_NombreUsuario",$_POST["txtNombre"]);
	 	$gu->__SET("_Correo",$_POST["txtCorreo"]);
	 	$gu->__SET("_Password",e::encrypt($_POST["txtPassword"]));
	 	$gu->__SET("_idRol",$_POST["txtRol"]);
	 	$cedula = $gu->existenciaCedula();
	 	if ($cedula == 1) {
	 		$this->MostrarMensaje("La cedula existe");
	 	} else{
			$resultado= $gu->guardar();

			if($resultado != null)
		 	{
				$this->MostrarMensaje("El usuario se guardo");

			}else{		
				$this->MostrarMensaje("El usuario se guardo");
			}
		}
	}

	function InhabilitarEstado($id){
		$this->usuario->__SET("_Cedula",$id);
		$resultado=$this->usuario->inhabilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'usuario');

		}else{
			header('location: ' . URL . 'usuario/index');		
		}
	}
	function habilitarEstado($id){

		$this->usuario->__SET("_Cedula",$id);
		$resultado=$this->usuario->habilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'usuario');

		}else{
			header('location: ' . URL . 'usuario/index');		
		}
	}









































	function darPermisos()
	{

		$j = $this->rol;
		$j->__SET("_idRoles",$_POST["txtpRol"]);
		if ($_POST['checkbox'] != null) {
			if (is_array($_POST['checkbox'])) {
				while (list($key,$value) = each($_POST['checkbox'])) {
	 				$j->__SET("_idPermisos","$value");
	 				$j->permisosRol();
				}

			}
		}

	}

	

		
}

?>