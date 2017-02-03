<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('Content.class.php');
include_once ('Conexao.php');
class ContentDAO{
    static public function retornaTodosUltimos($score, $sort, $inicio, $total_reg) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.question_id, c.title, c.owner_name, c.score, 
                                    c.creation_date, c.link, c.is_answered
                                    FROM content AS c
                                    WHERE score >= $score
                                    ORDER BY $sort ASC
                                    LIMIT $inicio,$total_reg");
        $arrContent = array();
        foreach ($resultSet as $linha) {
            $arrContent[] = new Content($linha['question_id'], $linha['title'], $linha['owner_name'],
                    $linha['score'], $linha['creation_date'], $linha['link'], $linha['is_answered']);
        }
        return $arrContent;
    }
    # RETORNA O TOTAL DE REGISTROS
    static public function total() {
        $db = Conexao::getInstance();
        $resultSet = $db->prepare("SELECT count(question_id) as total from content");
        $resultSet->execute();
        $total = $resultSet->fetch(PDO::FETCH_OBJ);
        return $total->total;
    }
    # INSERE NOVO REGISTRO 
    static public function insere($questionid, $title, $ownername, $score, $creationdate, $link, $isanswered) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT INTO content(question_id, title, owner_name, score, creation_date, link, is_answered)
                                VALUES
                            ($questionid, '$title', '$ownername', $score, $creationdate, '$link', $isanswered)");
        try{
            $cmd->execute();
            return 'ok';
        } catch (Exception $ex) {
            return 'erro: '.$ex;
        }
    }
    # DELETA TODOS OS REGISTROS DA TABELA 
    static public function delete() {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("TRUNCATE TABLE content");
        try{
            $cmd->execute();
            return 'ok';
        } catch (Exception $ex) {
            return 'erro: '.$ex;
        }
    }
   
}

