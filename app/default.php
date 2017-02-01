<?php 

# Está online?
define('ONLINE', false);

# Timezone
define('DEFAULT_TIMEZONE', 'America/Sao_Paulo');
setlocale(LC_ALL, "pt_BR", "ptb");
# Set Timezone
date_default_timezone_set(DEFAULT_TIMEZONE);

# Dados de conexão
//if(ONLINE)
//{
//    # Dados para conexão online
//    $server = "mysql.hostinger.com.br";
//    $user = "u462788887_admin";
//    $pass = "ma4rxo";
//    $bd = "u462788887_sist";
//
//    # Base URL
//    define('BASE_URL', '');
//    define('PATH_IMG', '');
//}
//else
//{    
    # Dados para conexão local
//    $server = "localhost";
//    $user = "root";
//    $pass = "";
//    $bd = "";

    # Base URL
    define('BASE_URL', 'http://localhost/tecnet/');
//}

# Definir o caminho base para a pasta root
define('BASE_PATH', dirname(__FILE__).'/../');

//try
//{
//    $pdo = new PDO("mysql:host=$server;dbname=$bd", $user, $pass);
//    
//}
//catch(PDOException $e)
//{
//    echo '<pre>Falha na conexão com o banco de dados. <br/>Dados do erro: '.$e->getMessage().'</pre>';
//}


# Inclusão e instanciamento das classes
include_once BASE_PATH . '/app/classes/Utils.php';
$Utils = new Utils();



// Define uma lista com os arquivos que poderão ser chamados na URL
$permitidos = array('conta', 'frequencias', 'index', 'lineup', 'login', 'sobre', 'solicitacoes', 'tecnicos',);
// Verifica se a variável $_GET['pagina'] existe E se ela faz parte da lista de arquivos permitidos
if(isset($_GET['page'])) {
    $page = (array_search($_GET['page'], $permitidos) !== false) ? $_GET['page'] : '404';
}else{
     //se não tiver nada, ela recebe o valor: index (referente ao arquivo pages/index.php
    $page = 'index';
}   

//aqui setamos um diretório onde ficarão as páginas internas do site
$pasta = 'pages';
//
$pagina = (file_exists("{$pasta}/" . $page . '.php')) ? $page : '404';

#Page title
switch ($pagina){
    case 'conta';
        $title = 'Configurações de Conta';
        break;
    case 'frequencias';
        $title = 'Frequências de Canais';
        break;
    case 'lineup';
        $title = 'Line Up de Canais';
        break;
    case 'login';
        $title = 'Login';
        break;
    case 'sobre';
        $title = 'Sobre';
        break;
    case 'solicitacoes';
        $title = 'Solicitações';
        break;
    case 'tecnicos';
        $title = 'Técnicos';
        break;
    case '404';
        $title = 'Página não encontrada';
        break;
    default:
        $title = 'TecNET';
}



//# Retorna a URL atual
////    $protocolo    = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === false) ? 'http' : 'https';
////    $host         = $_SERVER['HTTP_HOST'];
////    $script       = $_SERVER['SCRIPT_NAME'];
////    $parametros   = $_SERVER['QUERY_STRING'];
////    $UrlAtual     = $protocolo . '://' . $host . $script . '?' . $parametros;
    