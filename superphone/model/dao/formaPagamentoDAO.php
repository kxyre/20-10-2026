<?php
    class formaPagamentoDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM formapagamento");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaFormaPagamento = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $formaPagamento = new formaPagamento(); // Classe bean
                    $formaPagamento->setId($linha['idformaPagamento']);
                    $formaPagamento->setDescricao($linha['descricao']);
                  
                    array_push($listaFormaPagamento, $formaPagamento);
                }
                
                return $listaFormaPagamento;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }


         public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM formaPagamento WHERE idformaPagamento = :ip");
                $query->bindValue(':ip', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                 if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $formaPagamento = new formaPagamento(); // Classe bean
                    $formaPagamento->setId($linha['idformaPagamento']);
                    $formaPagamento->setNome($linha['descricao']);
                }
                
                return $formaPagamento;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }
        public function update($formaPagamento) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE formaPagamento
                     SET descricao = :d,
                     WHERE idformaPagamento = :ip" 
            
                );
                $query->bindValue(':d', $formaPagamento->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':ip', $formaPagamento->getId(), PDO::PARAM_INT);
                

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

         public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM formaPagamento
                     WHERE idformaPagamento = :ip" 
            
                );
                 $query->bindValue(':i', $id->getId(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }

    }