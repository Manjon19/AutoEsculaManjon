<?php
    class Profesor{
        private $dni;
        private $nombre;
        private $precio_practica;
        private $vehiculo_practica;
        private $tipo_Carnet;
    
        function __construct(){}

        public function getDni(){
            return $this->dni;
        }

        public function setDni($dni){
            $this->dni = $dni;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getPrecio_practica(){
            return $this->precio_practica;
        }

        public function setPrecio_practica($precio_practica){
            $this->precio_practica = $precio_practica;
        }
        public function getVehiculo_practica(){
            return $this->vehiculo_practica;
        }
        
        public function setVehiculo_practica($vehiculo_practica){
            $this->vehiculo_practica = $vehiculo_practica;
        }

        public function getTipo_Carnet(){
            return $this->tipo_Carnet;
        }

        public function setTipo_Carnet($tipo_Carnet){
            $this->tipo_Carnet = $tipo_Carnet;
        }
    }
?>