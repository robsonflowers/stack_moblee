
<?php 
/* Pagina para manipulacao de dados via ajax*/
include_once('../classes/Utils.php');
include_once('../classes/Content.dao.php');
include_once('../classes/Update.dao.php');
if(isset($_GET['limpartabela'])){
    ContentDAO::delete();
}
if(isset($_GET['questionid'])){
    
    $questionid = (isset($_GET['questionid']))?$_GET['questionid']:'';
    $title = Utils::cleanWords($_GET['title']);
    $ownername = (isset($_GET['ownername']))?$_GET['ownername']:'';
    $score = (isset($_GET['score']))?$_GET['score']:'';
    $creationdate = (isset($_GET['creationdate']))?$_GET['creationdate']:'';
    $link = (isset($_GET['link']))?$_GET['link']:'';
    $isanswered = (isset($_GET['isanswered']))?(($_GET['isanswered']==true)?1:0):0;
    
    $insert = ContentDAO::insere($questionid, $title, $ownername, $score, $creationdate, $link, $isanswered);
    UpdateDAO::insere();
}    
    
    
    
   
    