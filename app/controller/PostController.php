<?php

class PostController
{
    public function index($param)
    {
        try {
            
            # Carregar para objetos Postagem os valores obtidos do banco de dados
            $postagem = Postagem::selecionaPorId($param);

            # Carregamento do Twig
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            # Informando parametros da página dinâmica
            $parametros = array();
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;

            # Renderizando e mostrando na tela o resultado da página dinâmica
            $conteudo = $template->render($parametros);
            echo $conteudo;

        } catch (Exception $e) {
            # Tratamento da excessão gerada quando a tabela é vazia
            echo $e->getMessage();
        }
    }
}
