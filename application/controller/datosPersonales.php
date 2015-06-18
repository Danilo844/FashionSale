<?php 
/**
* 
*/
class datosPersonales extends Controller
{

	
	function datosPersonales(){
		$this->usuario = $this->loadModel("MUsuario");
	}

	public function index(){
		$cedula=$_SESSION["Cedula"];
		$nombre=$_SESSION["Nombre"];
		$correo=$_SESSION["Email"];
		$contra = e::decrypt($_SESSION["Password"]);	

		if(isset($_POST["action"])!=null)
		{
		
			$action = $_POST["action"];
			if($action == "btnGuardar"){
			
				$this->Modificar();


			}else if($action == "btnContinuar"){
				$this->cambiarContra();
			}
		}

		require APP . 'view/_templates/headerSesion.php';
	    require APP . 'view/usuario/datosPersonales.php';
	    require APP . 'view/_templates/footerSesion.php';
	}

	function MostrarMensaje($texto)
    {
 		echo "<script>alert('".$texto."')</script>";
	}

	function Modificar(){

		$this->usuario->__SET("_Cedula",$_POST["txtCedula"]);

	 	$this->usuario->__SET("_NombreUsuario",$_POST["txtNombre"]);
	 	$_SESSION["Nombre"] = $_POST["txtNombre"];
	 	$nombre=$_SESSION["Nombre"];

	 	$this->usuario->__SET("_Correo",$_POST["txtCorreo"]);
		$resultado= $this->usuario->modificarUsuario();

		if($resultado != null)
	 	{ 
	 		header('location: ' . URL . 'datosPersonales');
	 		$this->MostrarMensaje("Se realizo la modificacion ");
	 		

		}else{		
			$this->	MostrarMensaje("No se realizo la modificación ");
		}
	}

	public function cambiarContra(){
		$this->usuario->__SET("_Cedula",$_POST["txtCedula"]);
		$this->usuario->__SET("_Contra",e::encrypt($_POST["txtNueva"]));
		$resultado = $this->usuario->modificarContra();
		if ($resultado != null) {
			$this->MostrarMensaje("Se cambio la contraseña ");
		}else{
			$this->MostrarMensaje("No se realizo  el cambio ");
		}
			
	}



}

 ?>