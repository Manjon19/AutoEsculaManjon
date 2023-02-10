<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoescuela Manjon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../componentes/libs/jquery/jquery-3.6.0.min.js"></script>
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
<?php 
    $user=$_SESSION['user'];
  ?>
<header class="d-flex justify-content-around mt-3">
<div class="col-2">

<img src="../componentes/img/Logo.png" width="120" alt="" class="img-fluid" />
</div>
<div class="col-8">
<p class="h1 d-flex align-items-baseline justify-content-evenly">Autoescuela Manjon</p>
</div>

<div class="" method="post">
  <div class="row g-3 ">
    <div class="col mr-3 d-flex justify-content-around align-items-center">
      <span class="h5">Bienvenido: <?php echo $user?></span>
    </div>
    <button onclick="cerrar_Sesion()" id="cerrar" class="btn col mr-3 btn-danger" width="30">Cerrar Sesion</button>

  </div>
  <script>
      function cerrar_Sesion(){
          window.location="../cerrar_sesion.php";
      }
  </script>
</div>
</header>