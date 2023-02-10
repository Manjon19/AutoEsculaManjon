<?php
// incluye la clase Db
include_once ($_SERVER['DOCUMENT_ROOT'].'/Des_Auto/componentes/conexion.php');
 
	class CrudProfesores {
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo profesor
		public function insertar($profesor){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO profesores(dni,nombre,precio_practica,vehiculo_practica,tipo_Carnet) values(:dni,:nombre,:precio_practica,:vehiculo_practica,:tipo_Carnet)');
			$insert->bindValue('dni',$profesor->getDni());
            $insert->bindValue('nombre', $profesor->getNombre());
			$insert->bindValue('precio_practica', $profesor->getPrecio_practica());
			$insert->bindValue('vehiculo_practica',$profesor->getVehiculo_practica());
			$insert->bindValue('tipo_Carnet', $profesor->getTipo_Carnet());
			$insert->execute();
		}
		public function mostrar(){
			$db=Db::conectar();
			$listaProfesores=[];
			$select=$db->query('SELECT * FROM profesores');
			
			foreach ( $select->fetchAll() as $profesor) {
				
				$miProfesor=new Profesor();
				
				$miProfesor->setDni($profesor['dni']);
				$miProfesor->setNombre($profesor['nombre']);
				$miProfesor->setPrecio_practica($profesor['precio_practica']);
                $miProfesor->setVehiculo_practica($profesor['vehiculo_practica']);
				$miProfesor->setTipo_Carnet($profesor['tipo_Carnet']);
				$listaProfesores[]=$miProfesor;
			}
			return $listaProfesores;
		}
		
		// método para eliminar un profesor, recibe como parámetro el dni de dicho profesor
		public function eliminar($dni){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM profesores WHERE dni=:dni');
			$eliminar->bindValue('dni',$dni);
			$eliminar->execute();
		}
 
		// método para buscar un profesor, recibe como parámetro el dni del profesor
		public function obtenerProfesor($dni){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM profesores WHERE dni=:dni');
			$select->bindValue('dni', $dni);
			$select->execute();
			$profe=$select->fetch();
			$profesor=new Profesor();
				
			$profesor->setDni($profe['dni']);
			$profesor->setNombre($profe['nombre']);
			$profesor->setPrecio_practica($profe['precio_practica']);
			$profesor->setVehiculo_practica($profe['vehiculo_practica']);
			$profesor->setTipo_Carnet($profe['tipo_Carnet']);
			
			return $profesor;
		}
 
		// método para actualizar un profesor, recibe como parámetro el profesor
		public function actualizar($profesor){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE profesores SET dni=:dni,nombre=:nombre,precio_practica=:precio_practica,vehiculo_practica=:vehiculo_practica,tipo_Carnet=:tipo_Carnet WHERE dni="'.$profesor->getDni().'"');
			$actualizar->bindValue('dni',$profesor->getDni());
            $actualizar->bindValue('nombre',$profesor->getNombre());
            $actualizar->bindValue('precio_practica',$profesor->getPrecio_practica());
            $actualizar->bindValue('vehiculo_practica',$profesor->getVehiculo_practica());
			$actualizar->bindValue('tipo_Carnet',$profesor->geTipo_Carnet());
			$actualizar->execute();
		}
	}
?>