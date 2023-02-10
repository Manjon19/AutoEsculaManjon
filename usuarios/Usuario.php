<?php
    class Usuario{
        private $dni;
        private $nombre;
        private $contraseña;
        private $rol;
        private $oferta;
    
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
        public function getContraseña(){
            return $this->contraseña;
        }

        public function setContraseña($contraseña){
            $this->contraseña = $contraseña;
        }
        public function getRol(){
            return $this->rol;
        }
        
        public function setRol($rol){
            $this->rol = $rol;
        }

        public function getOferta(){
            return $this->oferta;
        }

        public function setOferta($oferta){
            $this->oferta = $oferta;
        }
    }
?>