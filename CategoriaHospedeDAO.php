<?php
    class CategoriaHospedeDAO {
         public function create($categoriaHospede){
            try {
                $query = BD ::getConexao()->prepare(
                    "INSERT INTO categoria_hospede(descricao)
                    VALUES (:d)"
                );
                $query->bindValue(':d', $categoriaHospede->getDescricao(), PDO::PARAM_STR);


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
                $query = BD::getConexao()->prepare("SELECT * FROM categoria_hospede");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaHospedes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $hospede = new CategoriaHospede(); //classe feijao
                    $hospede->setId($linha['idcategoria_hospede']);
                    $hospede->setDescricao($linha['descricao']);
                    
                    array_push($listaHospedes, $hospede);
                }

                return $listaHospedes;

            }
            catch(PDOExeption $e){
                echo "Erro #2: " . $e->getMessage();
            }

        }
    }