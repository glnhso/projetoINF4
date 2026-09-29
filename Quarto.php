<?php
    class Quarto {
        //Atributos
        private $id;
        private $numero;
        private $tipo;
        private $preco;
        private $disponivel;

        //métodos d encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

         public function getNumero() {
            return $this->numero;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }

         public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

         public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

         public function getDisponivel() {
            return $this->disponivel;
        }

        public function setDisponivel($disponivel) {
            $this->disponivel = $disponivel;
        }
    }