<?php

    class Postagem {
        public static function selecionaTodos() {
            $con = Connection::getConn(); # Singleton 
            
            # Consulta ao banco de dados
            $sql = "SELECT * FROM Postagem ORDER BY id DESC";
            $sql = $con->prepare($sql);
            $sql->execute();

            # Armazenar os resultados em um array de objetos Postagem
            $resultado = array();
            while($row = $sql->fetchObject('Postagem')) {
                $resultado[] = $row;
            }
            
            # Caso não encontre nada lance uma excessão
            if(!$resultado) {
                throw new Exception("Não foi encontrado nenhum registro no banco");
            }

            return $resultado;
        }

        public static function selecionaPorId($idPost) {
            $con = Connection::getConn(); # Singleton 
            
            # Consulta ao banco de dados
            $sql = "SELECT * FROM Postagem WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
            $sql->execute();

            # Armazenar os resultados em um array de objetos Postagem
            $resultado = $sql->fetchObject('Postagem');
            
            # Caso não encontre nada lance uma excessão
            if(!$resultado) {
                throw new Exception("Não foi encontrado nenhum registro no banco");
            }

            return $resultado;
        }
    }