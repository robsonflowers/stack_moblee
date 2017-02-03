<?php 
    include_once(BASE_PATH.'app/classes/Content.dao.php');
    include_once(BASE_PATH.'app/classes/Update.dao.php');
?>
<div class="panel">
    <h1>PHP - StackOverflow</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="persistir">
        <input type="submit" value="Persistir dados" name="persistir" class="but but-primary but-shadow but-tc" id="persistir"/>
    </form>

    <div class="loader">
        <img src="<?php echo BASE_URL?>files/images/icons/ajax_circle_loader.gif" alt=""/>
    </div>

    <div class="message"></div>

    <h3>Buscar na API</h3>
    <form action="" method="GET" enctype="multipart/form-data" class="buscar" >
        <!-- -->
        <label class="" for="page">Page</label>
        <input type="text" name="page" class="ip" placeholder="">
        <!-- -->
        <label class="" for="rpp">RPP</label>
        <input type="text" name="rpp" class="ip" placeholder="">
        <!-- -->
        <label class="" for="sort">Sort</label>
        <input type="text" name="sort" class="ip" placeholder="">
        <!-- -->
        <label class="" for="score">Score</label>
        <input type="text" name="score" class="ip" placeholder="">
        <button type="submit" class="but but-shadow but-tc">Buscar</button>
    </form>
</div>