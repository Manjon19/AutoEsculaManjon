<?php
//incluye la clase Usuario y su crud
session_start();
	require_once('./crud_usuarios.php');
	require_once('./usuario.php');
	$crud= new CrudUsuario();
	$usuario=new Usuario();
	require '../componentes/cabecera_Log.php';
	//busca el usuario utilizando el dni, que es enviado por GET desde la vista mostrar.php
	$usuario=$crud->obtenerUsuario($_SESSION['dni']);
?>
<html>
<head>
	<title>Mi Perfil</title>
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
	<h1 class="text-center mt-3">Aquí solo podrás observar tu perfil!</h1>
	<table>
        <tr>
            <th>Dni:</th>
            <td name='dni'><?=$usuario->getDni();?></td>
        </tr>
		<tr>
			
			<th>Nombre:</th>
			<td name='nombre'><?=$usuario->getNombre();?></td> </td>
		</tr>
		<tr>
			<th>Rol:</th>
			<td name='rol'><?php if($usuario->getRol()==0){
                echo "Cliente";}
				else{
					echo "Administrador";
				}?></td>
		</tr>
	</table>
	<div class="d-flex justify-content-center">
	<?php if($usuario->getRol()==0){ ?>
		<a href="./index_Loged.php" class="btn btn-success">Volver a Inicio</a>
				<?php }else{ ?>
					<a href="./index_admin.php" class="btn btn-success">Volver a Inicio</a>
					
				<?php }?>
	</div>
</form>
<?php 
include_once "../componentes/pie.php";
?>