<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoescuela Manjon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../componentes/libs/jquery/jquery-3.6.0.min.js"></script>
    <style>
      footer {
        bottom: 0;
        left: 0;
        right: 0;
        position: relative;
        background-color:grey;
        color:white;
      }
    </style>
</head>
<body>
<h2 class="text-center">Bienvenido a la página de registro:</h2>
    <div class="d-flex align-items-center">
        <form class="w-50 m-auto" method="post" action="./administrar_usuarios.php">
        <div class="form-group my-3">
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Paco" class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="dni">Dni: </label>
                <input type="text" id="dni" class="form-control" name="dni" pattern="[0-9]{8}[A-Z]{1}" placeholder="00000000A" class="form-control" required>
            </div>
            <div class="form-group my-3">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" class="form-control" required minlength="6" maxlength="14">
            </div>
            <input type='hidden' name='rol' value='0'>
            <input type='number' class="d-none" name='oferta' value='0'>
            <input type='hidden' name='insertar' value='insertar'>
            <div class="d-grid gap-2 my-3">
                <button type="submit" class="btn btn-success btn-block">Registro</button>
                <a class="btn btn-danger" href="../index.php">Volver</a>
            </div>
            <script>
                $("a.btn.btn-danger").click(function(){
                    document.cookie="oferta=;max-age=0; path=/";
                })
            </script>
        </form>
    </div>
    
<?php 
	require_once '../componentes/pie.php';
?>