<?php
session_start();
include_once "../componentes/cabecera_Log.php";
?>

<body>



    <div class="container mt-3">
        <?php include_once "../componentes/menu.php" ?>
        <p class="h1 text-center mt-3">Bienvenido a la pagina de inicio de administradores.</p>
        <div class="d-flex justify-content-center mt-3">
            <h2 class="mt-3">Es hora de administrar la autoescuela!!</h2>
        </div>
     
    </div>
    <?php
    include_once "../componentes/pie.php";
    ?>