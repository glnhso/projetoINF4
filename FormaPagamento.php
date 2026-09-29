<?php
    class FormaPagamento {
        //Atributos
        private $id;
        private $tipo;

        //métodos d encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

         public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
    }