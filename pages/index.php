<h1>PHP - StackOverflow</h1>
<?php 
    include_once(BASE_PATH.'app/classes/Content.dao.php');
    include_once(BASE_PATH.'app/classes/Update.dao.php');

    $lastUpdate = UpdateDAO::retornaUltimo();
    $registros = ContentDAO::retornaTodosUltimos();
    
    $arrRegistros = array();
    foreach($registros as $registros){
        $arrRegistros[] = $registros;
    }

    $array = array(
        "last_update" => $lastUpdate,
        "content" => $arrRegistros,
    );
    
    
//    echo json_encode($array);

?>


<form action="" method="POST" enctype="multipart/form-data" class="persistir">
    <input type="submit" value="Persistir dados" name="persistir" id="persistir"/>
</form>
<div class="ver"></div>
<div class="loader">
    <img src="<?php echo BASE_URL?>files/images/icons/ajax_circle_loader.gif" alt=""/>
</div>
<div class="message"></div>

<h3>Buscar na API</h3>



<form action="question" method="GET" enctype="multipart/form-data" class="buscar" target="_blank">
    <!-- -->
    <label class="" for="page">Page</label>
    <input type="text" name="page" class="" placeholder="">
    <!-- -->
    <label class="" for="rpp">RPP</label>
    <input type="text" name="rpp" class="" placeholder="">
    <!-- -->
    <label class="" for="sort">Sort</label>
    <input type="text" name="sort" class="" placeholder="">
    <!-- -->
    <label class="" for="score">Score</label>
    <input type="text" name="score" class="" placeholder="">
    <button type="submit" class="">Buscar</button>
</form>
