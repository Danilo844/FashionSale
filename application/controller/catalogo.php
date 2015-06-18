 <?php 
/**
* 
*/
class catalogo extends controller
{
 
	public $catalogo;
    public $tabla = "";
	public function catalogo(){
		$this->catalogo = $this->loadModel("Mcatalogo");
		$this->tabla;
	}

	public function index($i = null)
    {
    	$idCatalogo = "";
    	$nombre = "";
    	$descripcion = "";

		
    
		if($i!=null){

		$this->catalogo->__SET("_idCatalogo",$i);

    		foreach ($this->catalogo->consultar() as $value) {
    			$idCatalogo = $value["idCatalogo"];
    			$nombre = $value["nombre"];
    			$descripcion = $value["descripcion"];
			}
    		

    	}

    	if(isset($_POST["action"])!=null)
		{
			$action = $_POST["action"];

			if($action == "btnRegistrar"){

				if ( $_POST["txtNombre"] != null && $_POST["txtDescripcion"] != null) {
					$this->Crear();
				} else {
					
					$this->MostrarMensaje("Complete los campos *");
				}
			}
			if($action == "btnListar")
			{
				$this->listar();
			}
		
			if($action == "btnModificar"){

				if ( $_POST["txtNombre"] != null && $_POST["txtDescripcion"] != null) {
					$this->Actualizar();
				} else {
					
					$this->MostrarMensaje("Complete los campos *");
				}
			}
			
		}
		require APP . 'view/_templates/header.php';
	    require APP . 'view/catalogo/crearCatalogo.php';
	    require APP . 'view/_templates/footer.php';

	}

    function MostrarMensaje($texto)
    {
 		echo "<script>alert('".$texto."')</script>";
	}

    function Crear()
    { 	
    	
		
	 	$this->catalogo->__SET("_Nombre",$_POST["txtNombre"]);
	 	$this->catalogo->__SET("_Descripcion",$_POST["txtDescripcion"]);

		$resultado= $this->catalogo->guardar();

		if($resultado != null)
	 	{
			$this->MostrarMensaje("El Catalogo se guardo");
			header('location' . URL . 'catalogo');
		}else{		
			$this->	MostrarMensaje("La cedula ya existe ");
		}
	}
	
	function Actualizar(){
		$this->catalogo->__SET("_idCatalogo",$_POST["txtIdCatalogo"]);
		$this->catalogo->__SET("_Nombre",$_POST["txtNombre"]);
		$this->catalogo->__SET("_Descripcion",$_POST["txtDescripcion"]);
		$resultado= $this->catalogo->actualizar();

		if($resultado != null){
			$this->MostrarMensaje(" El catalogo se modificó");
			header('location: ' . URL . 'catalogo');
		}else{
			$this->MostrarMensaje(" El catalogo no se modifico ");
		}
    }
		function habilitarEstado($id){
		

			$this->catalogo->__SET("_idCatalogo",$id);
			$resultado=$this->catalogo->habilitarEstado();
			if($resultado != null)
		 	{
		 		header('location: ' . URL . 'catalogo');
				$this->MostrarMensaje("El estado se modifico ");

			}else{		
				$this->	MostrarMensaje("El estado No Se Modifico ");
			}
	    }
		function InhabilitarEstado($id){

			$this->catalogo->__SET("_idCatalogo",$id);
			$resultado=$this->catalogo->inhabilitarEstado();
			if($resultado != null)
		 	{
		 		header('location: ' . URL . 'catalogo');
				

			}else{		
				header('location: ' . URL . 'catalogo/index');
				
			}
	    }
	function listar()
	{
		
		foreach ($this->catalogo->listar() as $value) {
			$boton = "";
			$name="";
			if($value["estado"] =="1"){
	    		$boton= "<a href='".URL."catalogo/InhabilitarEstado/".$value["idCatalogo"]."'>Inhabilitar</a>";
	    	}else {
	    		$boton= "<a href='".URL."catalogo/habilitarEstado/".$value["idCatalogo"]."'>Habilitar</a>";
	    	}
	    	if($value["estado"] =="1"){
	    		$name = $value["estado"];
	    		$name = "Activo";
	    	}else {
	    		$name = "Inactivo";
	    	}
			$this->tabla .= "<tr>
				<td>".$value["idCatalogo"]."</td>
				<td>".$value["nombre"]."</td>
				<td>".$value["descripcion"]."</td>
				<td>".$name."</td>
				<td><a href='".URL."catalogo/index/".$value["idCatalogo"]."'>Seleccionar</a>
				".$boton."</td>
			<tr>";
		}
		}

	}



	?>
