<?php 


/**
* 
*/
// Controladores en minuscula y las clases en mayuscula
class Login extends Controller
{
	public $login;
	public $rol;

	public function Login(){
		$this->login = $this->loadModel("Musuario");
		$this->rol = $this->loadModel("MRoles");
	}

	public function MostrarMensaje($texto){
	 	echo "<script>alert('".$texto."')</script>";
	}

	public function index()
	{

		$alert="";


		if(isset($_POST["btnEntrar"]))
		{
			$this->login->__SET("_Cedula",$_POST["txtCedula"]);
			$resultado= $this->login->entrar();
			if($resultado != null)
			{

				$d = e::decrypt($resultado->Password);//Descincrptar la contraseña
				
					if (trim($d) == trim($_POST["txtPassword"]))
					 {
					 	$_SESSION["Cedula"] = $resultado->Cedula;
						$_SESSION["Nombre"] = $resultado->NombreUsuario;
						$_SESSION["Email"]  = $resultado->Correo;
						$_SESSION["Password"] = $resultado->Password;
						$_SESSION["Estado"] = $resultado->Estado;
						$_SESSION["Rol"] = $resultado->idRoles;

						if ($resultado->Estado == "1") {

							$this->login->__SET("_idRol",$resultado->idRoles);
							$resul = $this->login-> menusRoles();
							// var_dump($resultado->idRoles);
							// var_dump($resul);
							// exit();
							$menu = "";
							foreach ($resul as $key => $value) {
								$menu .= "<a href='".URL.$value["url"]."'>".$value["Nombre"]."</a>";

							}
							$_SESSION["Menu"] = $menu;


							header("Location: ".URL."datosPersonales/index");
						}
						else {
							$alert= "Su estado es inhabilitado";
							session_destroy();
						}
					}
					else{
						$alert="La contraseña es incorrecta";
					}
			}else{
				$alert="El usuario es incorrecto";
			}
		}
		require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';

        if($alert != null){
        	$this->MostrarMensaje($alert);
        }
       
	}
	
	public function cerrarSesion(){

		unset($_SESSION["Nombre"]);
		unset($_SESSION["Rol"]);
		session_destroy();

		header("location: ".URL."login/index");
	}
	
	public function recuperarPassword()
	{
		if(isset($_POST["btnRecuperar"])!=null)
		{
			$resultado = $this->recuperar();
			if ($resultado != null) {
				$this->MostrarMensaje("La contraseña se reestablecio");
			}else{
				$this->MostrarMensaje("El correo no existe");
			}		
		}
		$correo;
    	$nombre;
		require APP . 'view/_templates/header.php';
        require APP . 'view/login/recuperarPassword.php';
        require APP . 'view/_templates/footer.php';
	}


	 public function sendMail($correo_destinatario,$nombre_destinatario,$nuevaContrasena)
    {
        $mail = new PHPMailer();

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                              // Enable SMTP authentication
        $mail->Username = 'stevensanz12@gmail.com';                 // SMTP username
        $mail->Password = '3217156498';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;     
        $mail->CharSet = 'UTF-8';                               // TCP port to connect to

        $mail->From = 'system@gmail.com';
        $mail->FromName = 'Administrador';
        $mail->addAddress($correo_destinatario,$nombre_destinatario);     // Add a recipient+

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Restablecer contraseña';
        $mail->Body    = 'La contraseña ha sido restablecida <b>'.$nuevaContrasena.'!</b>';
        $mail->AltBody = 'Fue un placer ayudarte.';

        if(!$mail->send()) {
            echo 'Ocurrió un error.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }

    public function generarContrasena(){
        $tamano = 8;
        $contrasena = "";
        $posicion = 0;
        $array = array('q','w','e','r','t','y','u','i','o','p','ñ','l','k','j','h','g','f','d','s','a','z','x','c','v','b','n','m','1','q','2','w',
            '3','4','e','5','r','t','6','7','y','u','8','9','i','o','0','A','S','D','Q','W','E','Z','X','C');
        for ($i=0; $i < $tamano; $i++) { 
            $posicion = rand(1,51);
            $contrasena .= $array[$posicion]; 
        }
        return $contrasena;
    } 

    public function recuperar(){
    	$contrasena;
    	$nueva;
    	
    	$resultado = $this->login;
		$resultado->__SET("_Correo",$_POST["txtCorreo"]);
		foreach ($this->login-> recuperarContra() as $key => $value) {
    		$correo = $value['Correo'];
    		$nombre=$value['NombreUsuario'];
    	}

    	$contrasena = $this->generarContrasena();

    	$nueva = $this->sendMail($correo,$nombre,$contrasena);

    	return $nueva;
    }	






}
 ?>