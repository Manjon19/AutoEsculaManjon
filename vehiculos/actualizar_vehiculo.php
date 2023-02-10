<?php
//incluye la clase Oferta y su crud
session_start();
require_once('./crud_vehiculos.php');
require_once('./vehiculo.php');
$crud = new CrudVehiculos();
$vehiculo = new Vehiculo();
require '../componentes/cabecera_Log.php';
//busca la vehiculo utilizando el id, que es enviado por GET desde la vista 
$vehiculo = $crud->obtenerVehiculo($_GET['id']);
?>
<html>

<head>
	<title>Actualizar vehiculo</title>
	<style>
		tr,
		td,
		th {
			padding: 10px;
		}

		table {
			margin: 20px auto;
		}

		#volver {
			position: fixed;
			right: 35%;
		}
	</style>
</head>

<body>
	<form action='./administrar_vehiculos.php' method='post' enctype="multipart/form-data" class="w-25 mx-auto my-5">
		<table>
			<tr>
				<input type='hidden' name='id' value='<?= $vehiculo->getId(); ?>'>
				<td>Tipo de vehiculo:</td>
				<td> <select name='tipo'>
						<option value="Motocicleta">Motocicleta</option>
						<option value="Ciclomotor">Ciclomotor</option>
						<option value="Turismo">Turismo</option>
						<option value="Camion">Camion</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Marca:</td>
				<td><input type='text' required name='marca' value='<?= $vehiculo->getMarca(); ?>' required></td>
			</tr>
			<tr>
				<td>Modelo:</td>
				<td><input type='text' required name='modelo' value='<?= $vehiculo->getModelo(); ?>' required></td>
			</tr>
			<tr>
				<td>Imagen:</td>
				<td><input type='file' class="form-control" name="ref_img" required></td>
			</tr>
			<tr>
				<td>Tipo de carnet:</td>
				<td> <select name='carnet_necesario'>
						<option value="AM">AM</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					</select>
				</td>
			</tr>
			<input type='hidden' name='id' value='<?= $vehiculo->getId(); ?>'></td>
			<input type='hidden' name='actualizar' value='actualizar'>

		</table>

		<input type='submit' value='Guardar' class="btn btn-primary">

		<a href="./lista_vehiculos.php" class="btn btn-success">Volver</a></td>

	</form>
	<?php
	include_once "../componentes/pie.php";
	?>