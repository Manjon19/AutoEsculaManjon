<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoescuela Manjon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      footer {
        bottom: 0;
        left: 0;
        right: 0;
        position: absolute;
        
      }
    </style>
    <?php
    session_start();
    require_once('../vehiculos/crud_vehiculos.php');
    require_once('../vehiculos/Vehiculo.php');
    require_once('../componentes/cabecera_Log.php');
    include_once "../componentes/menu.php";
    
    $crud = new CrudVehiculos();
    $vehiculo = new Vehiculo();
    $vehiculo=$crud->mostrar()
    ?>
</head>
<body>
<h2 class="text-center">Añade un Coche nuevo:</h2>
    <div class="d-flex align-items-center">
        <form class="w-50 m-auto" method="post" enctype="multipart/form-data" action="./administrar_vehiculos.php">
            <input type="hidden" name="id" value="">
            <div class="form-group my-3">
                <label for="tipo">Tipo de Coche: </label>
                <select type="text" id="tipo" class="form-control" name="tipo" class="form-control" required>
                    <option value="Turismo">Turismo</option>
                    <option value="Camion">Camion</option>
                    <option value="Ciclomotor">Ciclomotor</option>
                    <option value="Motocicleta">Motocicleta</option>
                </select>
            </div>
            <div class="form-group my-3">
                <label for="marca">Marca: </label>
                <input type="text" id="marca" class="form-control" name="marca"  class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo"class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="ref_img">Imagen del vehiculo:</label>
                <input type="file" class="form-control" name="ref_img"class="form-control" required>
                
            </div>
            <!-- Dinamizacion de dni de profesores elegibles-->
            <div class="form-group my-3">
                <label for="carnet_necesario">Carnet necesario para el vehiculo:</label>
                <select id="carnet_necesario" name="carnet_necesario">
                   <option value="B">B</option>
                   <option value="C">C</option>
                   <option value="AM">AM</option>
                   <option value="A">A</option>
                </select>
            </div>
            <input type='hidden' name='insertar' value='insertar'>
            <div class="d-grid gap-2 my-3">
                <button type="submit" class="btn btn-success btn-block">Añadir</button>
            </div>
        </form>
    </div>
    
<?php 
	require_once '../componentes/pie.php';
?>