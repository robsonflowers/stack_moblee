<?php 
/* */
include_once(BASE_PATH.'app/classes/Content.dao.php');
include_once(BASE_PATH.'app/classes/Update.dao.php');
    
    $page = @$_GET['page'];
    $rpp = (@$_GET['rpp']!='')?$_GET['rpp']:99;
    $sort = (@$_GET['sort']!='')?$_GET['sort']:'question_id';
    $score = (@$_GET['score']!='')?$_GET['score']:0;
    
    /* INICIO DA PAGINACAO */
    if (!$page) {
        $pc = 1;
    } else {
        $pc = $page;
    }
    //Numero total de registros
    $total_registros = ContentDAO::total();
    // Verifica o número total de páginas
    $tp = $total_registros/$rpp; 
    /* FIM DA PAGINACAO */
    // Switch para ordenar os resultados
    switch ($sort){
        case 2;
            $sort = 'title';
            break;
        case 3;
            $sort = 'owner_name';
            break;
        case 4;
            $sort = 'score';
            break;
        case 5;
            $sort = 'creation_date';
            break;
        case 6;
            $sort = 'link';
            break;
        case 7;
            $sort = 'is_answered';
            break;
        default:
            $sort = 'question_id';
    }
    
    $lastUpdate = UpdateDAO::retornaUltimo();
    $registros = ContentDAO::retornaTodosUltimos($score, $sort, $page, $rpp);
    // Busca os registros para serem inseridos no array
    $arrRegistros = array();
    foreach($registros as $registros){
        $arrRegistros[] = $registros;
    }
    // Monta o array
    $array = array(
        "last_update" => (int)$lastUpdate,
        "content" => $arrRegistros,
    );
?>  
<div class="titulo">
    <h1>Resultado</h1>
</div>
<!-- IMPRIME EM FORMATO JSON, DE FORMA IDENTADA-->
<div class="resultado shadow">
    <pre>
        <?php echo json_encode($array,JSON_PRETTY_PRINT);?>
    </pre> 
</div>  
<div class="paginacao">
    <?php 
        $anterior = $pc -1;
        $proximo = $pc +1;
        if ($pc>1) {
            echo " <a href='http://localhost/stack_moblee/?pagina=question&page=$anterior&rpp=$rpp&sort=$sort&score=$score' class='but but-primary but-shadow but-tc'>&larr; Página $anterior</a> ";
        }
        if ($pc<$tp) {
            echo " <a href='http://localhost/stack_moblee/?pagina=question&page=$proximo&rpp=$rpp&sort=$sort&score=$score' class='but but-primary but-shadow but-tc'>Página $proximo &rarr;</a>";
        }
    ?>
</div>
    
    
    
   
    