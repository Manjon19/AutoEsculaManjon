<?php
session_start();
include_once('./componentes/conexion.php');
include_once("./ofertas/crud_ofertas.php");
include_once("./ofertas/Oferta.php");
include_once("./profesores/Profesor.php");
include_once("./vehiculos/Vehiculo.php");
include_once("./vehiculos/crud_vehiculos.php");
$crud_oferta = new CrudOfertas();
$listaOfertas = $crud_oferta->mostrar();
$crud_vehiculo = new CrudVehiculos();
$vehiculo = new Vehiculo();
if (isset($_SESSION['user'])) {
  include_once "./componentes/cabecera_Log.php";
} else {
  include_once "./componentes/cabecera_noLog.php";
}
?>

<body>
  <div class="container d-flex flex-column align-items-center mt-3">
    <h3>Ofertas para nuevos usuarios:</h3>
    <div id="carruselOfertas" class="carousel slide carousel-dark w-75 mt-3" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        foreach ($listaOfertas as $oferta) {
          $miProfe = $crud_oferta->profe_oferta($oferta);
          $vehiculo = $crud_vehiculo->obtenerVehiculo($miProfe->getVehiculo_practica());
          if ($vehiculo->getId() != 0) {
            if ($listaOfertas[1]==$oferta) {
        ?>
            <div class="carousel-item active">
              <input type="hidden" name="cod_oferta" value="<?php echo $oferta->getCod_oferta()?>">
              <img src="./componentes/img/<?php echo $vehiculo->getRef_img() ?>" class="d-block w-75 mx-auto">
              <div class="carousel-caption d-none d-md-block bg-secondary bg-gradient bg-opacity-50">
                <h5>Descuento: <?php echo $oferta->getDescuento() ?>%</h5>
                <span><?php echo $oferta->getDescripcion() ?></span>
            </br>
                <button class="btn btn-success"><a class="text-decoration-none text-white" href="./usuarios/formulario_registro.php">Obtener oferta</a></button> 
              </div>
            </div>

        <?php
        }else{
          ?>

            <div class="carousel-item">
            <input type="hidden" name="cod_oferta" value="<?php echo $oferta->getCod_oferta()?>">
              <img src="./componentes/img/<?php echo $vehiculo->getRef_img() ?>" class="d-block w-75 mx-auto">
              <div class="carousel-caption d-none d-md-block bg-secondary bg-gradient bg-opacity-50">
                <h5>Descuento: <?php echo $oferta->getDescuento() ?>%</h5>
                <span><?php echo $oferta->getDescripcion() ?></span>
                </br>
                <button class="btn btn-success"><a class="text-decoration-none text-white" href="./usuarios/formulario_registro.php">Obtener oferta</a></button> 
              </div>
            </div>
        <?php
        
        }
          }
        }
        ?>
        <script>
          $("button>a").click(function(){
            document.cookie="oferta="+$(".active>input:hidden").val()+";max-age=3600; path=/";
          });
          
        </script>
        <button class="carousel-control-prev" type="button" data-bs-target="#carruselOfertas" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carruselOfertas" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
  </div>
  <?php
  include_once "./componentes/pie.php";
  ?>