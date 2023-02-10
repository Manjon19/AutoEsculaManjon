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
    require_once('../profesores/crud_profesores.php');
    require_once('../profesores/Profesor.php');
    require_once('../componentes/cabecera_Log.php');
    include_once "../componentes/menu.php";
    
    $crud = new CrudProfesores();
    $profesor = new Profesor();
    $profesores=$crud->mostrar()
    ?>
</head>
<body>
<h2 class="text-center">Añade una oferta nueva:</h2>
    <div class="d-flex align-items-center">
        <form class="w-50 m-auto" method="post" action="./administrar_ofertas.php">
        <div class="form-group my-3">
                <label for="cod_oferta">Codigo de Oferta: </label>
                <input type="number" id="cod_oferta" class="form-control" name="cod_oferta" placeholder="000" class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="descripcion">Descripcion: </label>
                <textarea id="descripcion" class="form-control" name="descripcion"  class="form-control" required>
                </textarea>
            </div>
            <div class="form-group my-3">
                <label for="fecha_limite">Fecha Limite:</label>
                <input type="date" class="form-control" name="fecha_limite"class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="descuento">Descuento:</label>
                <input type="number" class="form-control" name="descuento"class="form-control" required>
            </div>
            <!-- Dinamizacion de dni de profesores elegibles-->
            <div class="form-group my-3">
                <label for="dni_prof">Dni profesores::</label>
                <select id="dni_prof" name="dni_prof">
                    <?php 
                        foreach($profesores as $profe){?>

                        <option value="<?php echo $profe->getDni()?>"><?php echo $profe->getDni()?></option>
                        <?php
                        }
                    ?>
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