<?php
//incluye la clase Oferta y CrudOferta
require_once './crud_ofertas.php';
require_once './Oferta.php';
 
$crud= new CrudOfertas();
$oferta= new Oferta();
session_start();
	
	// si el elemento insertar no viene nulo llama al crud e inserta una oferta
	if (isset($_POST['insertar'])) {
		try {
			$oferta->setCod_oferta($_POST['cod_oferta']);
			$oferta->setDescripcion($_POST['descripcion']);
			$oferta->setFecha_limite($_POST['fecha_limite']);
			$oferta->setDescuento($_POST['descuento']);
            $oferta->setDni_prof($_POST['dni_prof']);
			//llama a la función insertar definida en el crud
			$crud->insertar($oferta);
		} catch(Exception $e) {	
            die($e->getMessage());
			header('Location: ./añadir_ofertas.php');
		}
		echo"<script>alert('Oferta insertado correctamente');
			window.location='./lista_ofertas.php'</script>";
		
		
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el oferta
	} elseif(isset($_POST['actualizar'])) {
		$oferta->setCod_oferta($_POST['cod_oferta']);
			$oferta->setDescripcion($_POST['descripcion']);
			$oferta->setFecha_limite($_POST['fecha_limite']);
			$oferta->setDescuento($_POST['descuento']);
            $oferta->setDni_prof($_POST['dni_prof']);
		$crud->actualizar($oferta);
		echo"<script>alert('Oferta actualizada correctamente');
			window.location='./lista_ofertas.php'</script>";
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un usuario
	}else{
		if (isset($_GET['accion'])) {
			if ($_GET['accion']=='e') {
				$crud->eliminar($_GET['cod_oferta']);
				echo"<script>alert('Oferta borrada correctamente');
			window.location='./lista_ofertas.php'</script>";	
			}
		}
	} 
?>