<?php
    class FormaPagamentoDAO {
         public function create($formaPagamento){
            try {
                $query = BD ::getConexao()->prepare(
                    "INSERT INTO forma_pagamento(tipo)
                    VALUES (:t)"
                );
                $query->bindValue(':t', $formaPagamento->getTipo(), PDO::PARAM_STR);


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
                $query = BD::getConexao()->prepare("SELECT * FROM forma_pagamento");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaPagamentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $pagamento = new FormaPagamento(); //classe feijao
                    $pagamento->setId($linha['idforma_pagamento']);
                    $pagamento->setTipo($linha['tipo']);
                    
                    array_push($listaPagamentos, $pagamento);
                }

                return $listaPagamentos;

            }
            catch(PDOExeption $e){
                echo "Erro #2: " . $e->getMessage();
            }

        }
    }