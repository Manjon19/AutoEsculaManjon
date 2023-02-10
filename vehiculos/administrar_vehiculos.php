<?php
//incluye la clase Vehiculo y CrudVehiculo
require_once './crud_vehiculos.php';
require_once './Vehiculo.php';
 
$crud= new CrudVehiculos();
$vehiculo= new Vehiculo();
session_start();
	
	// si el elemento insertar no viene nulo llama al crud e inserta un vehiculo
	if (isset($_POST['insertar'])) {
		try {
			$vehiculo->setId($_POST['id']);
			$vehiculo->setTipo($_POST['tipo']);
			$vehiculo->setMarca($_POST['marca']);
			$vehiculo->setModelo($_POST['modelo']);
            $vehiculo->setRef_img($_FILES['ref_img']['name']);
			$vehiculo->setCarnet_necesario($_POST['carnet_necesario']);
			//llama a la función insertar definida en el crud
			$crud->insertar($vehiculo);
		} catch(Exception $e) {	
            die($e->getMessage());
			header('Location: ./añadir_vehiculo.php');
		}
		echo"<script>alert('vehiculo insertado correctamente');
			window.location='./lista_vehiculos.php'</script>";
		
		
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el vehiculo
	} elseif(isset($_POST['actualizar'])) {
			$vehiculo->setId($_POST['id']);
			$vehiculo->setTipo($_POST['tipo']);
			$vehiculo->setMarca($_POST['marca']);
			$vehiculo->setModelo($_POST['modelo']);
            $vehiculo->setRef_img($_FILES['ref_img']['name']);
			$vehiculo->setCarnet_necesario($_POST['carnet_necesario']);
			$crud->actualizar($vehiculo);
		echo"<script>alert('Vehiculo actualizado correctamente');
			window.location='./lista_vehiculos.php'</script>";
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un usuario
	}else{
		if (isset($_GET['accion'])) {
			if ($_GET['accion']=='e') {
				$crud->eliminar($_GET['id']);
				echo"<script>alert('Vehiculo borrada correctamente');
			window.location='./lista_vehiculos.php'</script>";	
			}
		}
	} 
?>