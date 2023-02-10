<?php
session_start();
require_once('./crud_vehiculos.php');
require_once('./Vehiculo.php');
require_once('../componentes/cabecera_Log.php');
include_once "../componentes/menu.php";

$crud = new CrudVehiculos();
$vehiculo = new Vehiculo();
//obtiene todos los vehiculos con el método mostrar de la clase crud
$listaVehiculos = $crud->mostrar();
?>

<html>

<head>
	<title>Listado de vehiculos</title>
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
			right: 15%;
		}
	</style>
</head>

<body>
	<h1 class="text-center">Listado de vehiculos</h1>
	<table border=1>

		<thead>
			<th class="text-center">Imagen</th>
			<th class="text-center">Tipo</th>
			<th class="text-center">Marca</th>
			<th class="text-center">Modelo</th>
			<th class="text-center">Tipo Carnet</th>
			<?php if ($_SESSION['rol'] != 0) { ?>
				<th class="text-center">Actualizar</th>
				<th class="text-center">Eliminar</th>
			<?php } ?>
		</thead>

		<tbody>
			<?php foreach ($listaVehiculos as $vehiculo) {
				if ($vehiculo->getId() != 0) {

			?>
					<tr>
						<td><img class="img-fluid" src="../componentes/img/<?php echo $vehiculo->getRef_img(); ?>"></img></td>
						<td class="text-center"><?php echo $vehiculo->getTipo(); ?></td>
						<td class="text-center"><?php echo $vehiculo->getMarca(); ?></td>
						<td class="text-center"><?php echo $vehiculo->getModelo(); ?> </td>
						<td class="text-center"><?php echo $vehiculo->getCarnet_necesario(); ?> </td>
						<?php if ($_SESSION['rol'] != 0) { ?>
							<td><a href="./actualizar_vehiculo.php?id=<?= $vehiculo->getId(); ?>&accion=a" class="btn btn-warning">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="margin: 0 4px 4px 0">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
									</svg>
									Actualizar</a> </td>
							<td><a href="./administrar_vehiculos.php?id=<?= $vehiculo->getId() ?>&accion=e" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16" style="margin: 0 4px 4px 0">
										<path fill-rule="evenodd" d="M6.5 1a.5.5 0 0 0-.5.5v1h4v-1a.5.5 0 0 0-.5-.5h-3ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1H3.042l.846 10.58a1 1 0 0 0 .997.92h6.23a1 1 0 0 0 .997-.92l.846-10.58Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
									</svg>Eliminar</a></td>
					</tr>

		<?php }
					}
				} ?>

		</tbody>
	</table>
	<?php if ($_SESSION['rol'] != 0) { ?>
		<div class="d-flex justify-content-center mb-3"><a class="btn btn-success" href="./añadir_vehiculo.php">Añadir Vehiculo</a></div>
	<?php } ?>
	<?php include_once "../componentes/pie.php"; ?>