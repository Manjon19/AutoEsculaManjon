<?php
    class Vehiculo{
        private $id;
        private $tipo;
        private $marca;
        private $modelo;
        private $ref_img;
        private $carnet_necesario;
    
        function __construct(){}

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }
        public function getModelo(){
            return $this->modelo;
        }
        
        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function getRef_img(){
            return $this->ref_img;
        }

        public function setRef_img($ref_img){
            $this->ref_img = $ref_img;
        }

        public function getCarnet_necesario(){
            return $this->carnet_necesario;
        }

        public function setCarnet_necesario($carnet_necesario){
            $this->carnet_necesario = $carnet_necesario;
        }
    }
?>