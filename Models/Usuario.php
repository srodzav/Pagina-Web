<?php 

    class Usuario {
        private $_id;
        private $_correo;

        public function __construct($id, $_correo) {
            $this->setId($id);
            $this->setCorreo($_correo);
        }

        public function getId() {
            return $this->_id;
        }

        public function getCorreo() {
            return $this->_correo;
        }

        public function setId($id) {
            $this->_id = $id;
        }

        public function setCorreo($_correo) {
            $this->__correo = $_correo;
        }

        public function returnArray() {
            $usuario = array();

            $usuario["id"] = $this->getId();
            $usuario["correo"] = $this->getCorreo();

            return $usuario;
        }
    }

?>