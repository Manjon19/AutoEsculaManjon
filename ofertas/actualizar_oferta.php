<?php
//incluye la clase Oferta y su crud
session_start();
	require_once('./crud_ofertas.php');
	require_once('./oferta.php');
	$crud= new CrudOfertas();
	$oferta=new Oferta();
	require '../componentes/cabecera_Log.php';
	//busca la oferta utilizando el cod_oferta, que es enviado por GET desde la vista mostrar.php
	$oferta=$crud->obtenerOferta($_GET['cod_oferta']);
?>
<html>
<head>
	<title>Actualizar Oferta</title>
	<style>
		tr, td, th {
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
	<form action='./administrar_ofertas.php' method='post' class="w-25 mx-auto my-5">
	<table>
		<tr>
			<input type='hidden' name='cod_oferta' value='<?=$oferta->getCod_oferta();?>'>
			<td>Descripcion de la oferta:</td>
			<td> <textarea name='descripcion'><?=$oferta->getDescripcion();?></textarea>
		</tr>
		<tr>
			<td>Fecha limite:</td>
			<td><input type='date' required name='fecha_limite' value='<?=$oferta->getFecha_limite();?>' ></td>
		</tr>
        <tr>
			<td>Descuento:</td>
			<td><input type='number' required name='descuento' value='<?=$oferta->getDescuento();?>' ></td>
		</tr>
        
			
			<input type='hidden' name='dni_prof' value='<?=$oferta->getDni_prof();?>' ></td>
		
		<input type='hidden' name='actualizar' value='actualizar'>
	</table>
	<input type='submit' value='Guardar' class="btn btn-primary">
	<a href="./lista_ofertas.php" class="btn btn-success">Volver</a>
</form>
<?php 
include_once "../componentes/pie.php";
?>