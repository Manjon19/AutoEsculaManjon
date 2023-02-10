<?php
// incluye la clase Db
include_once ($_SERVER['DOCUMENT_ROOT'].'/Des_Auto/componentes/conexion.php');
 
	class CrudUsuario {
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo usuario
		public function insertar($usuario){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO usuarios(dni, nombre ,contrasena, rol, oferta) values(:dni, :nombre,:contrasena, :rol, :oferta)');
			$insert->bindValue('dni',$usuario->getDni());
            $insert->bindValue('nombre', $usuario->getNombre());
			$insert->bindValue('contrasena', $usuario->getContraseña());
			$insert->bindValue('rol',$usuario->getRol());
			$insert->bindValue('oferta', $usuario->getOferta());
			$insert->execute();
		}
		public function mostrar(){
			$db=Db::conectar();
			$listaUsuarios=[];
			$select=$db->query('SELECT * FROM usuarios');
			
			foreach ( $select->fetchAll() as $user) {
				
				$miUsu=new Usuario();
				
				$miUsu->setDni($user['dni']);
				$miUsu->setNombre($user['nombre']);
				$miUsu->setRol($user['rol']);
				$miUsu->setOferta($user['oferta']);
				$listaUsuarios[]=$miUsu;
			}
			return $listaUsuarios;
		}
		// método para saber si exite un usuario mediante un dni
		public function existe_usuario($dni){
			$db=Db::conectar();
			$select=$db->prepare('SELECT dni FROM usuarios where dni = :dni');
            $select->bindValue('dni', $dni);
            $select->execute();
			return $select;
		}
 
		// método para eliminar un usuario, recibe como parámetro el dni del usuario
		public function eliminar($dni){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM usuarios WHERE dni=:dni');
			$eliminar->bindValue('dni',$dni);
			$eliminar->execute();
		}
 
		// método para buscar un usuario, recibe como parámetro el dni del usuario
		public function obtenerUsuario($dni){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuarios WHERE dni=:dni');
			$select->bindValue('dni', $dni);
			$select->execute();
			$user=$select->fetch();
			$usuario = new Usuario();
			$usuario->setDni($user['dni']);
            $usuario->setNombre($user['nombre']);
			$usuario->setContraseña($user['contrasena']);
			$usuario->setRol($user['rol']);
			$usuario->setOferta($user['oferta']);
			return $usuario;
		}
 
		// método para actualizar un usuario, recibe como parámetro el usuario
		public function actualizar($usuario){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE usuarios SET nombre=:nombre, rol=:rol WHERE dni="'.$usuario->getDni().'"');
			$actualizar->bindValue('nombre',$usuario->getNombre());
            $actualizar->bindValue('rol',$usuario->getRol());
			$actualizar->execute();
		}
	}
?>