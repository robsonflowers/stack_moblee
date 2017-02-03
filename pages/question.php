<?php 
/* */
include_once(BASE_PATH.'app/classes/Content.dao.php');
include_once(BASE_PATH.'app/classes/Update.dao.php');

    
    $page = (@$_GET['pag']!='')?$_GET['pag']:0;
    $rpp = (@$_GET['rpp']!='')?$_GET['rpp']:99;
    $sort = (@$_GET['sort']!='')?$_GET['sort']:'question_id';
    $score = (@$_GET['score']!='')?$_GET['score']:0;
    print_r($_GET);
    $lastUpdate = UpdateDAO::retornaUltimo();
    $registros = ContentDAO::retornaTodosUltimos($score, $sort, $page, $rpp);
    
    $arrRegistros = array();
    foreach($registros as $registros){
        $arrRegistros[] = $registros;
    }

    $array = array(
        "last_update" => (int)$lastUpdate,
        "content" => $arrRegistros,
    );
?>  
<div class="titulo">
    <h1>Resultado</h1>
</div>

<div class="resultado shadow">
    <pre>
        <?php echo json_encode($array,JSON_PRETTY_PRINT);?>
    </pre> 
</div>  
    
    
    
   
    