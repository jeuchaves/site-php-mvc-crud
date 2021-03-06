<?php

class HomeController
{
    public function index()
    {
        try {
            
            # Carregar para objetos Postagem os valores obtidos do banco de dados
            $postagens = Postagem::selecionaTodos();

            # Carregamento do Twig
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            # Informando parametros da página dinâmica
            $parametros = array();
            $parametros['postagens'] = $postagens;

            # Renderizando e mostrando na tela o resultado da página dinâmica
            $conteudo = $template->render($parametros);
            echo $conteudo;

        } catch (Exception $e) {
            # Tratamento da excessão gerada quando a tabela é vazia
            echo $e->getMessage();
        }
    }
}
