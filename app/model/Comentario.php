<?php

class Comentario
{
    public static function selecionarComentarios($idPost)
    {
        $con = Connection::getConn(); # Singleton 

        # Consulta ao banco de dados
        $sql = "SELECT * FROM Comentario WHERE id_postagem = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        # Armazenar os resultados em um array de objetos Postagem
        $resultado = array();
        while ($row = $sql->fetchObject('Comentario')) {
            $resultado[] = $row;
        }

        # Caso não encontre nada lance uma excessão
        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }

        return $resultado;
    }
}
