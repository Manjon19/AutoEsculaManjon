<?php
//incluye la clase Usuario y CrudUsuario
require_once $_SERVER['DOCUMENT_ROOT'].'/Des_Auto/usuarios/crud_usuarios.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Des_Auto/usuarios/Usuario.php';
 
$crud= new CrudUsuario();
$usuario= new Usuario();
session_start();
	if (isset($_POST['login'])) {
		try{
			$dni=$_POST["dni"];
			$contrasena=$_POST["contrasena"];
			$select=$crud->existe_usuario($dni);
			
			
			if(isset($select)){
				$usuario=$crud->obtenerUsuario($dni);
				$verificar = password_verify($contrasena, $usuario->getContraseña());
				if($verificar){
					
					$_SESSION["user"]=$usuario->getNombre();
					$_SESSION["dni"]=$usuario->getDni();
					$_SESSION["rol"]=$usuario->getRol();
					if ( $usuario->getRol()==1) {
						header("Location: ./index_admin.php"); //pagina para admin
					}else{
						header("Location: ./index_Loged.php");//Pagina para no admins
					}
					
				}else{
					echo"<script>alert('Error al introducir los datos');
			window.location='../index.php'</script>";
					
				}
			} 
		
	} catch (Exception $e) {
			
		/* header("Location: ./index.php"); */
		die('No existe ese usuario dentro de la Autoescuela.<br> Registrate!!!');
	}
		
	}

	// si el elemento insertar no viene nulo llama al crud e inserta un usuario
	if (isset($_POST['insertar'])) {
		try {
			$usuario->setDni($_POST['dni']);
			$usuario->setNombre($_POST['nombre']);
			$usuario->setContraseña(password_hash($_POST['contrasena'], PASSWORD_BCRYPT, ['cost'=>4]));
			$usuario->setRol(0);
            if (isset($_COOKIE['oferta'])) {
				$usuario->setOferta($_COOKIE['oferta']);
				setcookie('oferta',null,0,"/");
			}else{
				$usuario->setOferta(0);
			}
			//llama a la función insertar definida en el crud
			$crud->insertar($usuario);
		} catch(Exception $e) {	
            die($e->getMessage());
			header('Location: ./formulario_registro.php');
		}
		echo"<script>alert('Usuario insertado correctamente');
			window.location='../index.php'</script>";
		
		
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el usuario
	} elseif(isset($_POST['actualizar'])) {
		$usuario->setDni($_POST['dni']);
		$usuario->setRol($_POST['rol']);
		$usuario->setNombre($_POST['nombre']);
		$crud->actualizar($usuario);
		echo"<script>alert('Usuario actualizado correctamente');
			window.location='./lista_usuarios.php'</script>";
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un usuario
	}else{
		if (isset($_GET['accion'])) {
			if ($_GET['accion']=='e') {
				$crud->eliminar($_GET['dni']);
				echo"<script>alert('Usuario borrado correctamente');
			window.location='./lista_usuarios.php'</script>";	
			}
		}
	} 
?>