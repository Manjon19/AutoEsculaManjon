<?php
//incluye la clase Usuario y su crud
session_start();
	require_once('./crud_usuarios.php');
	require_once('./usuario.php');
	$crud= new CrudUsuario();
	$usuario=new Usuario();
	require '../componentes/cabecera_Log.php';
	//busca el usuario utilizando el dni, que es enviado por GET desde la vista mostrar.php
	$usuario=$crud->obtenerUsuario($_GET['dni']);
?>
<html>
<head>
	<title>Actualizar Usuario</title>
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
	<form action='./administrar_usuarios.php' method='post' class="w-25 mx-auto my-5">
	<table>
		<tr>
			<input type='hidden' name='dni' value='<?=$usuario->getDni();?>'>
			<td>Nombre del usuario:</td>
			<td> <input type='text' name='nombre' value='<?=$usuario->getNombre();?>'></td>
		</tr>
		<tr>
			<td>Rol:</td>
			<td><input type='text' name='rol' value='<?=$usuario->getRol();?>' ></td>
		</tr>
		<input type='hidden' name='actualizar' value='actualizar'>
	</table>
	<input type='submit' value='Guardar' class="btn btn-primary">
	<a href="./lista_usuarios.php" class="btn btn-success">Volver</a>
</form>
<?php 
include_once "../componentes/pie.php";
?>