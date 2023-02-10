<?php
    class Oferta{
        private $cod_oferta;
        private $descripcion;
        private $fecha_limite;
        private $descuento;
        private $dni_prof;


        function __construct(){}

        public function getCod_oferta(){
            return $this->cod_oferta;
        }

        public function setCod_oferta($cod_oferta){
            $this->cod_oferta = $cod_oferta;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function getFecha_limite(){
            return $this->fecha_limite;
        }

        public function setFecha_limite($fecha_limite){
            $this->fecha_limite = $fecha_limite;
        }
        public function getDescuento(){
            return $this->descuento;
        }
        
        public function setDescuento($descuento){
            $this->descuento = $descuento;
        }

        public function getDni_prof(){
            return $this->dni_prof;
        }

        public function setDni_prof($dni_prof){
            $this->dni_prof = $dni_prof;
        }
    }
?>