<?php 


class Cliente extends Controller
{
	public $cliente;
	public $tabla = "";

	public function Cliente(){
		$this->cliente = $this->loadModel("MCliente");
		$this->tabla;
	}

	public function index($i = null){

		$id="";
		$cedula = "";
		$nombre = "";
		$correo = "";
		$pass = "";

    	if($i!=null){

		    $this->cliente->__SET("_Cedula",$i);
			foreach ($this->cliente->consultarCliente() as $value) {
				$cedula = $value["Cedula"];
				$nombre = $value["NombreCliente"];
				$correo = $value["Correo"];
			
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
			// if($action == "btnModificar"){
				
			// 	if ($_POST["txtCedula"] != null && $_POST["txtNombre"]  != null && $_POST["txtCorreo"] != null) {
			// 		$this->Actualizar();
			// 	} else {
					
			// 		$this->MostrarMensaje("Complete los campos *");
			// 	}
			// }
			// if($action = "btnListar"){
			// 	$this->Listar();			
			// }
			
		}
		require APP . 'view/_templates/header.php';
	    require APP . 'view/cliente/index.php';
	    require APP . 'view/_templates/footer.php';
	}
	function MostrarMensaje($texto)
    {
 		echo "<script>alert('".$texto."')</script>";
	}

	// function Listar(){

	// 	foreach ($this->cliente->listarCliente() as $value) {
	//     	$name = "";
	//     	$boton = "";
	//     	if($value["Estado"] =="1"){
	//     		$boton= "<a href='".URL."cliente/inhabilitarEstado/".$value["Cedula"]."'>Inhabilitar</a>";
	//     	}else {
	//     		$boton= "<a href='".URL."cliente/habilitarEstado/".$value["Cedula"]."'>Habilitar</a>";
	//     	}
	//     	if($value["Estado"] =="1"){
	//     		$name = $value["Estado"];
	//     		$name = "Activo";
	//     	}else {
	//     		$name = "Inactivo";
	//     	}
	    	
	// 		$this->tabla .= "<tr>
	// 			<td>".$value["Cedula"]."</td>
	// 			<td>".$value["NombreUsuario"]."</td>
	// 			<td>".$value["Correo"]."</td>
	// 			<td>".$name."</td>
	// 			<td>".$value["idRoles"]."</td>
	// 			<td><a href='".URL."cliente/index/".$value["Cedula"]."''>Seleccionar</a>
	// 			".$boton."</td>
	// 		<tr>";
	// 	}

	// }
	
    	

	function Crear()
    { 	
    	
		$cl = $this->cliente;
	 	$cl->__SET("_Cedula",$_POST["txtCedula"]);
	 	$cl->__SET("_NombreCliente",$_POST["txtNombre"]);
	 	$cl->__SET("_Correo",$_POST["txtCorreo"]);
	 	$cl->__SET("_Password",e::encrypt($_POST["txtPassword"]));
	 	$cl->__SET("_idRol",$_POST["txtRol"]);
	 	$cedula = $cl->existenciaCedula();
	 	$correo = $cl->existenciaCorreo();
	 	if ($cedula == 1) {
	 		$this->MostrarMensaje("La cedula existe");
	 	}else if ($correo == 1){
	 		$this->MostrarMensaje("El Correo existe");
	 	} else{
			$resultado= $cl->guardar();

			if($resultado != null)
		 	{
		 	
				$this->MostrarMensaje("El cliente se guardo");

			}else{		
				$this->MostrarMensaje("El cliente se guardo");
			}
		}
	}

	function InhabilitarEstado($id){
		$this->cliente->__SET("_Cedula",$id);
		$resultado=$this->cliente->inhabilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'cliente');

		}else{
			header('location: ' . URL . 'cliente/index');		
		}
	}
	function habilitarEstado($id){

		$this->cliente->__SET("_Cedula",$id);
		$resultado=$this->cliente->habilitarEstado();
		if($resultado != null)
	 	{
	 		header('location: ' . URL . 'cliente');

		}else{
			header('location: ' . URL . 'cliente/index');		
		}
	}
	// function Actualizar(){
	// 	$this->cliente->__SET("_Cedula",$_POST["txtCedula"]);
	//  	$this->cliente->__SET("_NombreCliente",$_POST["txtNombre"]);
	//  	$this->cliente->__SET("_Correo",$_POST["txtCorreo"]);
	// 	$resultado= $this->cliente->modificarCliente();

	// 	if($resultado != null)
	//  	{
	 		
	// 		$this->MostrarMensaje("El cliente se modifico ");

	// 	}else{		
	// 		$this->	MostrarMensaje("El cliente no se modifico ");
	// 	}
	// }
}

?>