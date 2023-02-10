<?php
// incluye la clase Db
include_once ($_SERVER['DOCUMENT_ROOT'].'/Des_Auto/componentes/conexion.php');
include_once $_SERVER['DOCUMENT_ROOT'].'/Des_Auto/profesores/Profesor.php';
	class CrudOfertas {
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo oferta
		public function insertar($oferta){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO t_ofertas(cod_oferta,descripcion,fecha_limite,descuento,dni_prof) values(:cod_oferta,:descripcion,:fecha_limite,:descuento,:dni_prof)');
			$insert->bindValue('cod_oferta',$oferta->getCod_oferta());
            $insert->bindValue('descripcion', $oferta->getDescripcion());
			$insert->bindValue('fecha_limite', $oferta->getFecha_limite());
			$insert->bindValue('descuento',$oferta->getDescuento());
			$insert->bindValue('dni_prof', $oferta->getDni_prof());
			$insert->execute();
		}
		//metodo para obtener un profesor a partir de una oferta
		public function profe_oferta($oferta){
			$db=Db::conectar();
			$obtener=$db->prepare("Select * from profesores left join t_ofertas on t_ofertas.dni_prof=profesores.dni where t_ofertas.dni_prof=:dni_prof");
			$obtener->bindValue('dni_prof',$oferta->getDni_prof());
			$obtener->execute();
			$profe=$obtener->fetch();

			$profesor = new Profesor();
			$profesor->setDni($profe['dni']);
            $profesor->setNombre($profe['nombre']);
			$profesor->setPrecio_practica($profe['precio_practica']);
			$profesor->setVehiculo_practica($profe['vehiculo_practica']);
			$profesor->setTipo_Carnet($profe['tipo_Carnet']);
			return $profesor;
		}
		public function mostrar(){
			$db=Db::conectar();
			$listaOfertas=[];
			$select=$db->query('SELECT * FROM t_ofertas');
			
			foreach ( $select->fetchAll() as $oferta) {
				
				$miOferta=new Oferta();
				
				$miOferta->setCod_oferta($oferta['cod_oferta']);
				$miOferta->setDescripcion($oferta['descripcion']);
				$miOferta->setFecha_limite($oferta['fecha_limite']);
                $miOferta->setDescuento($oferta['descuento']);
				$miOferta->setDni_prof($oferta['dni_prof']);
				$listaOfertas[]=$miOferta;
			}
			return $listaOfertas;
		}
		
		// método para eliminar una oferta, recibe como parámetro el codigo de oferta
		public function eliminar($cod_oferta){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM t_ofertas WHERE cod_oferta=:cod_oferta');
			$eliminar->bindValue('cod_oferta',$cod_oferta);
			$eliminar->execute();
		}
 
		// método para buscar una Oferta, recibe como parámetro el codigo de oferta
		public function obtenerOferta($cod_oferta){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM t_ofertas WHERE cod_oferta=:cod_oferta');
			$select->bindValue('cod_oferta', $cod_oferta);
			$select->execute();
			$ofer=$select->fetch();

			$oferta = new Oferta();
			$oferta->setCod_oferta($ofer['cod_oferta']);
            $oferta->setDescripcion($ofer['descripcion']);
			$oferta->setFecha_limite($ofer['fecha_limite']);
			$oferta->setDescuento($ofer['descuento']);
			$oferta->setDni_prof($ofer['dni_prof']);
			return $oferta;
		}
 
		// método para actualizar una oferta, recibe como parámetro la oferta
		public function actualizar($oferta){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE t_ofertas SET descripcion=:descripcion, fecha_limite=:fecha_limite,descuento=:descuento,dni_prof=:dni_prof WHERE cod_oferta="'.$oferta->getCod_oferta().'"');
			$actualizar->bindValue('descripcion',$oferta->getDescripcion());
            $actualizar->bindValue('fecha_limite',$oferta->getFecha_limite());
            $actualizar->bindValue('descuento',$oferta->getDescuento());
            $actualizar->bindValue('dni_prof',$oferta->getDni_prof());
			$actualizar->execute();
		}
	}
?>