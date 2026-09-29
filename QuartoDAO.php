<?php
    class QuartoDAO {
        public function create($quarto){
            try {
                $query = BD ::getConexao()->prepare(
                    "INSERT INTO quarto(numero, tipo, preco, disponivel)
                    VALUES (:n, :t, :p, :d)"
                );
                $query->bindValue(':n', $quarto->getNumero(), PDO::PARAM_INT);
                $query->bindValue(':t', $quarto->getTipo(), PDO::PARAM_STR);
                $query->bindValue(':p', $quarto->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':d', $quarto->getDisponivel(), PDO::PARAM_STR);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
             catch(PDOExeption $e){
                echo "Erro #1: " . $e->getMessage();
             }
        }
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaQuartos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $quarto = new Quarto(); //classe feijao
                    $quarto->setId($linha['idquarto']);
                    $quarto->setNumero($linha['numero']);
                    $quarto->setTipo($linha['tipo']);
                    $quarto->setPreco($linha['preco']);
                    $quarto->setDisponivel($linha['disponivel']);
                    
                    array_push($listaQuartos, $quarto);
                }

                return $listaQuartos;

            }
            catch(PDOExeption $e){
                echo "Erro #2: " . $e->getMessage();
            }

        }
    }