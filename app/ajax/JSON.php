<?php

if(isset($_GET['login'])){
    $login = $_GET['login'];
    include_once('../classes/Tecnicos.dao.php');
    $tecnicoJSON = TecnicoDAO::retornaTecnicoPorLoginJSON($login);
    echo $tecnicoJSON;
    
}
if(isset($_GET['buscatecnico'])){
    $idtecnico = $_GET['buscatecnico'];
    include_once('../classes/Tecnicos.dao.php');
    $tecnicoJSON = TecnicoDAO::retornaTecnicoPorIDJSON($idtecnico);
    echo $tecnicoJSON;
}
if(isset($_GET['buscausuario'])){
    $idtecnico = $_GET['buscausuario'];
    include_once('../classes/Usuarios.dao.php');
    $usuarioJSON = UsuariosDAO::retornaUsuarioPorTecnicoJSON($idtecnico);
    echo $usuarioJSON;
}
?>
