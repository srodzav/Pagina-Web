<?php 

    class Productos {
        private $_id;
        private $_nombre;
        private $_cantidad;
        private $_precio;

        public function __construct($id, $nombre, $cantidad, $precio) {
            $this->setId($id);
            $this->setNombre($nombre);
            $this->setCantidad($cantidad);
            $this->setPrecio($precio);
        }

        public function getId() {
            return $this->_id;
        }

        public function getNombre() {
            return $this->_nombre;
        }

        public function getCantidad() {
            return $this->_cantidad;
        }

        public function getPrecio() {
            return $this->_precio;
        }


        public function setId($id) {
            $this->_id = $id;
        }

        public function setNombre($nombre) {
            $this->_nombre = $nombre;
        }

        public function setCantidad($cantidad) {
            $this->_cantidad = $cantidad;
        }

        public function setPrecio($precio) {
            $this->_precio = $precio;
        }

        public function returnArray() {
            $producto = array();

            $producto["id"] = $this->getId();
            $producto["nombre"] = $this->getNombre();
            $producto["cantidad"] = $this->getCantidad();
            $producto["precio"] = $this->getPrecio();

            return $producto;
        }
    }

?>