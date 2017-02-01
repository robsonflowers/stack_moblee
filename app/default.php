<?php 
# Está online?
define('ONLINE', false);

# Define a timezone padrao
define('DEFAULT_TIMEZONE', 'America/Sao_Paulo');

# Seta a timezone
date_default_timezone_set(DEFAULT_TIMEZONE);

# Seta local
setlocale(LC_ALL, "pt_BR", "ptb");

# Define o caminho base da URL
define('BASE_URL', 'http://localhost/stack_moblee/');

# Define o caminho base para a pasta root
define('BASE_PATH', dirname(__FILE__).'/../');

# Inclusao e instanciamento das classes
include_once BASE_PATH.'/app/classes/Utils.php';
$Utils = new Utils();

# Define uma lista com os arquivos que poderao ser chamados na URL
$permitidos = array('index', '404', 'teste');

# Verifica se a variavel $_GET['pagina'] existe e se ela faz parte da lista de arquivos permitidos
if(isset($_GET['page'])) {
    $page = (array_search($_GET['page'], $permitidos) !== false) ? $_GET['page'] : '404';
}else{
    # Se não tiver nada, ela recebe o valor: index (referente ao arquivo pages/index.php
    $page = 'index';
}   

# Aqui setamos um diretório onde ficarao as paginas internas do site
$pasta = 'pages';
$pagina = (file_exists("{$pasta}/".$page.'.php')) ? $page : '404';

# Titulos das paginas
switch ($pagina){
    case '404';
        $title = 'Página não encontrada';
        break;
    default:
        $title = 'PHP - StackOverflow';
}
  