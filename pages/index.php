<h1>PHP - StackOverflow</h1>

<form action="" method="POST" enctype="multipart/form-data" class="persistir">
    <input type="submit" value="Persistir dados" name="persistir" id="persistir"/>
</form>
<div class="ver"></div>
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
