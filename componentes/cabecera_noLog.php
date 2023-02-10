<!DOCTYPE html>
<html lang="es">
<head>
 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoescuela Manjon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./componentes/libs/jquery/jquery-3.6.0.min.js"></script>
    <style>
      body{
        margin-top: 10px;
      }
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

  <div class="d-flex justify-content-between">


<img src="./componentes/img/Logo.png" width="120" alt="" class="img-fluid" />

<p class="h1 d-flex align-items-baseline justify-content-evenly">Bienvenido a Autoescuela Manjon</p>


    
<form action="./usuarios/administrar_usuarios.php" class="d-flex justify-content-end mt-2" method="post">
    <div class="row g-3 ">
  <div class="col col-3">
    <input type="text" class="form-control" name="dni" placeholder="00000000A" aria-label="00000000A" required>
  </div>
  <div class="col col-3">
    <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" aria-label="Contrasena" required>
  </div>
  <div class="form-group col col-1 d-none">
    <input type='hidden' name='login' value='login'>
  </div>
  <div class="col d-flex justify-content-around ">
      <button type="submit" class="btn btn-primary">Iniciar sesión</button>
      <a href="./usuarios/formulario_registro.php" class="btn btn-success">Registrar</a>
    </div>
  
</div>
</form>
</div>