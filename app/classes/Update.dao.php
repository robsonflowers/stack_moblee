<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('Update.class.php');
include_once ('Conexao.php');
class UpdateDAO{
    # RETORNA A ULTIMA ATUALIZACAO
    static public function retornaUltimo() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT MAX(last_update) AS last_update FROM last_update");
        $arrContent = "";
        foreach ($resultSet as $linha) {
            $arrContent = $linha['last_update'];
        }
        return $arrContent;
    }
    # RETORNA TODOS OS REGISTROS EM FORMATO JSON
    static public function retornaTodosJSON() {
        $db = Conexao::getInstance();
        $resultSet = $db->prepare("SELECT * FROM last_update");
        $resultSet->execute();
        return json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
    }
    # INSERE NOVO REGISTRO 
    static public function insere($nome,$login,$telefone) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT INTO tecnico(nome,login,telefone) values ('$nome','$login','$telefone')");
        $cmd->execute();
    }
}

