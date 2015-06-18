<?php 
/**
* 
*/
class categoria extends controller
{
 
	public $categoria;
    public $tabla = "";
	public function categoria(){
		$this->categoria = $this->loadModel("Mcategoria");
		$this->tabla;
	}

	public function index($i = null)
    {
    	$idCategoria = "";
    	$nombre = "";
    	$descripcion = "";

		
    
		if($i!=null){

		$this->categoria->__SET("_idCategoria",$i);

    		foreach ($this->categoria->consultar() as $value) {
    			$idCategoria = $value["idCategoria"];
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
	    require APP . 'view/categoria/crearCategoria.php';
	    require APP . 'view/_templates/footer.php';

	}

    function MostrarMensaje($texto)
    {
 		echo "<script>alert('".$texto."')</script>";
	}

    function Crear()
    { 	
    	
		
	 	$this->categoria->__SET("_Nombre",$_POST["txtNombre"]);
	 	$this->categoria->__SET("_Descripcion",$_POST["txtDescripcion"]);

		$resultado= $this->categoria->guardar();

		if($resultado != null)
	 	{
			$this->MostrarMensaje("La categoria se guardo");
			header('location' . URL . 'categoria');
		}else{		
			$this->	MostrarMensaje("La cedula ya existe ");
		}
	}
	
	function Actualizar(){
		$this->categoria->__SET("_idCategoria",$_POST["txtIdCategoria"]);
		$this->categoria->__SET("_Nombre",$_POST["txtNombre"]);
		$this->categoria->__SET("_Descripcion",$_POST["txtDescripcion"]);
		$resultado= $this->categoria->actualizar();

		if($resultado != null){
			$this->MostrarMensaje(" El categoria se modificó");
			header('location: ' . URL . 'categoria');
		}else{
			$this->MostrarMensaje(" El categoria no se modificó ");
		}
    }
		function habilitarEstado($id){
		

			$this->categoria->__SET("_idCategoria",$id);
			$resultado=$this->categoria->habilitarEstado();
			if($resultado != null)
		 	{
		 		header('location: ' . URL . 'categoria');
				$this->MostrarMensaje("El estado se modifico ");

			}else{		
				$this->	MostrarMensaje("El estado No Se Modifico ");
			}
	    }
		function InhabilitarEstado($id){

			$this->categoria->__SET("_idCategoria",$id);
			$resultado=$this->categoria->inhabilitarEstado();
			if($resultado != null)
		 	{
		 		header('location: ' . URL . 'categoria');
				

			}else{		
				header('location: ' . URL . 'categoria/index');
				
			}
	    }
	function listar()
	{
		
		foreach ($this->categoria->listar() as $value) {
			$boton = "";
			$name="";
			if($value["estado"] =="1"){
	    		$boton= "<a href='".URL."categoria/InhabilitarEstado/".$value["idCategoria"]."'>Inhabilitar</a>";
	    	}else {
	    		$boton= "<a href='".URL."categoria/habilitarEstado/".$value["idCategoria"]."'>Habilitar</a>";
	    	}
	    	if($value["estado"] =="1"){
	    		$name = $value["estado"];
	    		$name = "Activo";
	    	}else {
	    		$name = "Inactivo";
	    	}
			$this->tabla .= "<tr>
				<td>".$value["idCategoria"]."</td>
				<td>".$value["nombre"]."</td>
				<td>".$value["descripcion"]."</td>
				<td>".$name."</td>
				<td><a href='".URL."categoria/index/".$value["idCategoria"]."'>Seleccionar</a>
				".$boton."</td>
			<tr>";
		}
		}

	}



	?>