<?php
// incluye la clase Db
include_once ($_SERVER['DOCUMENT_ROOT'].'/Des_Auto/componentes/conexion.php');

class CrudVehiculos
{
	// constructor de la clase
	public function __construct()
	{
	}
	//Metodo para subir foto al directorio
	public function guardar_imagen()
	{
		//Recogemos el archivo enviado por el formulario
		$archivo = $_FILES['ref_img']['name'];
		//Si el archivo contiene algo y es diferente de vacio
		if (isset($archivo) && $archivo != "") {
			//Obtenemos algunos datos necesarios sobre el archivo
			$tipo = $_FILES['ref_img']['type'];
			$tamano = $_FILES['ref_img']['size'];
			$temp = $_FILES['ref_img']['tmp_name'];
			//Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
			if ((!(strpos($tipo, "gif") || !strpos($tipo, "jpeg") || !strpos($tipo, "jpg") || !strpos($tipo, "png") )&& ($tamano < 2000000))) {
				echo '<script>alert("<b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
			- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.")</b></script>';
			} else {
				//Si la imagen es correcta en tamaño y tipo
				//Se intenta subir al servidor
				if (move_uploaded_file($temp, '../componentes/img/' . $archivo)) {
					//Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
					chmod('../componentes/img/' . $archivo, 0777);
				} else {
					//Si no se ha podido subir la imagen, mostramos un mensaje de error
					echo '<script>Ocurrió algún error al subir el fichero. No pudo guardarse.</script>';
				}
			}
		}
	}
	// método para insertar, recibe como parámetro un objeto de tipo oferta
	public function insertar($vehiculo)
	{
		$db = Db::conectar();
		$insert = $db->prepare('INSERT INTO vehiculos(id,tipo,marca,modelo,ref_img,carnet_necesario) values(:id,:tipo,:marca,:modelo,:ref_img,:carnet_necesario)');
		$insert->bindValue('id', $vehiculo->getId());
		$insert->bindValue('tipo', $vehiculo->getTipo());
		$insert->bindValue('marca', $vehiculo->getMarca());
		$insert->bindValue('modelo', $vehiculo->getModelo());
		$insert->bindValue('ref_img', $vehiculo->getRef_img());
		$insert->bindValue('carnet_necesario', $vehiculo->getCarnet_necesario());

		
		$this->guardar_imagen();
		$insert->execute();
	}
	public function mostrar()
	{
		$db = Db::conectar();
		$listaVehiculos = [];
		$select = $db->query('SELECT * FROM vehiculos');

		foreach ($select->fetchAll() as $vehiculo) {

			$miVehiculo = new Vehiculo();

			$miVehiculo->setId($vehiculo['id']);
			$miVehiculo->setTipo($vehiculo['tipo']);
			$miVehiculo->setMarca($vehiculo['marca']);
			$miVehiculo->setModelo($vehiculo['modelo']);
			$miVehiculo->setRef_img($vehiculo['ref_img']);
			$miVehiculo->setCarnet_necesario($vehiculo['carnet_necesario']);
			$listaVehiculos[] = $miVehiculo;
		}
		return $listaVehiculos;
	}

	// método para eliminar una id, recibe como parámetro el id de vehiculo
	public function eliminar($id)
	{
		$db = Db::conectar();
		$eliminar = $db->prepare('DELETE FROM vehiculos WHERE id=:id');
		$eliminar->bindValue('id', $id);
		$eliminar->execute();
	}

	// método para buscar un vehiculo, recibe como parámetro el id de vehiculo
	public function obtenerVehiculo($id)
	{
		$db = Db::conectar();
		$select = $db->prepare('SELECT * FROM vehiculos WHERE id=:id');
		$select->bindValue('id', $id);
		$select->execute();
		$car = $select->fetch();

		$vehiculo = new Vehiculo();
		$vehiculo->setId($car['id']);
		$vehiculo->setTipo($car['tipo']);
		$vehiculo->setMarca($car['marca']);
		$vehiculo->setModelo($car['modelo']);
		$vehiculo->setRef_img($car['ref_img']);
		$vehiculo->setCarnet_necesario($car['carnet_necesario']);
		return $vehiculo;
	}

	// método para actualizar un vehiculo, recibe como parámetro el vehiculo
	public function actualizar($vehiculo)
	{
		$db = Db::conectar();
		$actualizar = $db->prepare('UPDATE vehiculos SET id=:id, tipo=:tipo, marca=:marca, modelo=:modelo, ref_img=:ref_img, carnet_necesario=:carnet_necesario WHERE id="' . $vehiculo->getId() . '"');
		$actualizar->bindValue('id', $vehiculo->getId());
		$actualizar->bindValue('tipo', $vehiculo->getTipo());
		$actualizar->bindValue('marca', $vehiculo->getMarca());
		$actualizar->bindValue('modelo', $vehiculo->getModelo());
		$actualizar->bindValue('ref_img', $vehiculo->getRef_img());
		$actualizar->bindValue('carnet_necesario', $vehiculo->getCarnet_necesario());
		$this->guardar_imagen();
		$actualizar->execute();
	}
}
