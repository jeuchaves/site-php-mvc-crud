<?php

class Core {
    
    public function start($urlGet) {

        # Ação que será chamada dentro do app/controller/PaginaController.php
        $acao = 'index';

        # Se não existir nenhum parâmetro GET chamado página então chama a HomeController
        if(isset($urlGet['pagina']))
            $controller = ucfirst($urlGet['pagina']) . 'Controller';
        else
            $controller = 'HomeController';
            
        # Se o parâmetro 'pagina' do GET não ter um Controller então chama a página ErroController 
        if(!class_exists($controller))
            $controller = 'ErroController';

        # Chama a função $acao da classe $controller sem nenhum parâmetro
        call_user_func_array(array(new $controller, $acao), array());
        
    }
}