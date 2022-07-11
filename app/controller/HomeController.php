<?php

class HomeController
{
    public function index()
    {
        try {
            
            # Carregar para objetos Postagem os valores obtidos do banco de dados
            $postagens = Postagem::selecionaTodos();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parametros = array();
            $parametros['postagens'] = $postagens;

            $conteudo = $template->render($parametros);
            echo $conteudo;

        } catch (Exception $e) {
            # Tratamento da excessão gerada quando a tabela é vazia
            echo $e->getMessage();
        }
    }
}
