<?php 
 /**
 * 
 */
 class Comunicacion extends Controller
 {
 	
 	public function Comunicacion(){
 		$this->comunicacion = $this->loadModel("MComunicacion");
 	}

 	public function index($i = null){
 		 $empCedula=$_SESSION["Cedula"];


 		$select = "";
		foreach ($this->comunicacion->listarComunicacion() as  $key => $value) {

			$select.="<option value='".$value['Codigo']."' ";

			if (isset($_POST["txtComunicacion"]) != null) {

				if ($_POST["txtComunicacion"]==$value['Codigo']) 
				{
					$select.= "SELECTED";
				}	
			}else{
				$select.= $value['Codigo'];
			}	

			$select.= ">";
			$select.= $value['Nombre'];
			$select.= "</option>";
    	}

 		$codigo = "";
    	$nombre = "";
    	$descripcion = "";
    	$tabla = "";
	    foreach ($this->comunicacion->listarComunicacion() as $value) {
	    	$boton = "";
	    	if($value["Estado"] =="1"){
	    		$boton= "<a href='".URL."comunicacion/inhabilitarEstado/".$value["Codigo"]."'>Inhabilitar</a>";
	    	}else {
	    		$boton= "<a href='".URL."comunicacion/habilitarEstado/".$value["Codigo"]."'>Habilitar</a>";
	    	}
	    	if($value["Estado"] =="1"){
	    		$name = $value["Estado"];
	    		$name = "Activo";
	    	}else {
	    		$name = "Inactivo";
	    	}
			$tabla .= "<tr>
				<td>".$value["Codigo"]."</td>
				<td>".$value["Nombre"]."</td>
				<td>".$value["Descripcion"]."</td>
				<td>".$name."</td>
				<td><a href='".URL."comunicacion/index/".$value["Codigo"]."'>Seleccionar</a> ".$boton."</td>
			<tr>";
		}

		if($i!=null){

		$this->comunicacion->__SET("_Codigo",$i);
			foreach ($this->comunicacion->consultarComunicacion() as $value) {
				$codigo = $value["Codigo"];
				$nombre = $value["Nombre"];
				$descripcion = $value["Descripcion"];
			}
		}

 		if(isset($_POST["action"])!=null)
		{
			$action = $_POST["action"];

			if($action == "btnRegistrar"){

				if ($_POST["txtNombre"] != null && $_POST["txtDescripcion"]) {
					$this->Crear();
				} else {
					
					$this->MostrarMensaje(" Complete los campos *");
				}
			}
			else if($action == "btnModificar"){
				if ($_POST["txtCodigo"] != null) {
					$this->Actualizar();
				} else {
					
					$this->MostrarMensaje(" Complete los campos *");
				}
			}
			if($action == "btnGuardarPubli"){
				$this->registrarPublicacion();
			}

		}

		require APP . 'view/_templates/headerSesion.php';
	    require APP . 'view/comunicacion/index.php';
	    require APP . 'view/_templates/footerSesion.php';

 	}

 	function MostrarMensaje($texto)
    {
 		echo "<script>alert('".$texto."')</script>";
	}

	function Crear()
    { 	
			
	 	$this->comunicacion->__SET("_Nombre",$_POST["txtNombre"]);
	 	$this->comunicacion->__SET("_Descripcion",$_POST["txtDescripcion"]);

		$resultado= $this->comunicacion->guardarComunicacion();

		if($resultado != null)
	 	{
	 		$this->MostrarMensaje(" La comunicación se guardo ");
		}else{		
			$this->	MostrarMensaje(" Error no se guardo ");
		}	
    }

	function Actualizar()
	{
		$this->comunicacion->__SET("_Codigo",$_POST["txtCodigo"]);
		$this->comunicacion->__SET("_Nombre",$_POST["txtNombre"]);
		$this->comunicacion->__SET("_Descripcion",$_POST["txtDescripcion"]);
		$resultado= $this->comunicacion->modificarComunicacion();

		if($resultado != null){
			$this->MostrarMensaje(" El comunicación se modifico ");
		}else{
			$this->MostrarMensaje(" El rol no se modifico ");
		}
	}

	function habilitarEstado($id){
		$this->comunicacion->__SET("_Codigo",$id);
		$resultado=$this->comunicacion->habilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'comunicacion');
			$this->MostrarMensaje("El estado se modifico ");

		}else{		
			$this->	MostrarMensaje("El estado No Se Modifico ");
		}
	}

	function InhabilitarEstado($id){
		$this->comunicacion->__SET("_Codigo",$id);
		$resultado=$this->comunicacion->inhabilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'comunicacion');
			$this->MostrarMensaje("El estado se modifico ");

		}else{		
			$this->	MostrarMensaje("El estado No Se Modifico ");
		}
	}


	function registrarPublicacion(){
		$this->comunicacion->__SET("_Empleado",$_POST["txtCreadorPubli"]);
		$this->comunicacion->__SET("_Comunicacion",$_POST["txtComunicacionPubli"]);
		$this->comunicacion->__SET("_Descripcion",$_POST["txtdescripcionPubli"]);

		$resultado=$this->comunicacion->guardarPublicacion();
		if ($resultado != null) {
			$this->MostrarMensaje("Se guardo la publicacion");
		}else{
			$this->MostrarMensaje("No se guardo la publicacion");
		}
	}




 }

?>