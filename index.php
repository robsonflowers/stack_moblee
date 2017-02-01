<?php include_once('app/default.php');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR" xmlns:og="http://opengraphprotocol.org/schema/">
    <head>
        <link rel="icon" href="<?php echo BASE_URL; ?>files/images/icons/favicon.png" size="16x16">
        <meta name="robots" content="index, follow"/>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="author" content="Robson Flores"/>
        
        <title><?php echo $title;?></title>
        
        <link href="<?php echo BASE_URL; ?>files/css/style.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo BASE_URL; ?>files/js/jquery.js"></script>
        <script src="<?php echo BASE_URL; ?>files/js/functions.js"></script>
        <script src="<?php echo BASE_URL; ?>files/js/ajax.js"></script>
    </head>
    <body>
        <div class="">
            <div class="">
                <div role="main" class="">
                    <h2 class="sub-header text-left"><!--Section title--></h2>
                    <?php include_once(BASE_PATH . 'pages/' . $page . '.php');?>
                </div>
            </div>
        </div>
    </body>
</html>
