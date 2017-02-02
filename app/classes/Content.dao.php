<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('Content.class.php');
include_once ('Conexao.php');
class ContentDAO{
    static public function retornaTodosUltimos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.question_id, c.title, c.owner_name, c.score, c.creation_date, c.link, c.is_answered
                                    FROM content AS c
                                    INNER JOIN last_update as l ON c.question_id = l.content
                                    WHERE l.last_update = (SELECT MAX(last_update) FROM last_update)");
        $arrContent = array();
        foreach ($resultSet as $linha) {
            $arrContent[] = new Content($linha['question_id'], $linha['title'], $linha['owner_name'],
                    $linha['score'], $linha['creation_date'], $linha['link'], $linha['is_answered']);
        }
        return $arrContent;
    }
    # RETORNA TODOS OS REGISTROS EM FORMATO JSON
    static public function retornaTodosJSON() {
        $db = Conexao::getInstance();
        $resultSet = $db->prepare("SELECT * FROM content");
        $resultSet->execute();
        return json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
    }
    # INSERE NOVO REGISTRO 
    static public function insere() {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT INTO content() values ()");
        $cmd->execute();
       
    }
   
}

