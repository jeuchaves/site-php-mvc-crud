<?php

require_once 'app/core/Core.php';

require_once 'lib/database/Connection.php';

require_once 'app/controller/HomeController.php';
require_once 'app/controller/ErroController.php';
require_once 'app/controller/PostController.php';

require_once 'app/model/Postagem.php';

require_once 'vendor/autoload.php';

# Recupera a estrutura padrão do site
$template = file_get_contents('app/template/estrutura.html');

# Armazena em $saida o resultado do Core
ob_start();
    $core = new Core;
    $core->start($_GET);
    $saida = ob_get_contents();
ob_end_clean();

# Substitui o texto {{area_dinamica}} do html pelo resultado obtido do core
$tpl_pronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $tpl_pronto;