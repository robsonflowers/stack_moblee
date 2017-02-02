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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type='text/javascript' src='https://api.stackexchange.com/js/2.0/all.js'></script>
        <script src="<?php echo BASE_URL; ?>files/js/functions.js"></script>
    </head>
    <body>
        <div class="">
            <div class="">
                <div role="main" class="">
                    <?php include_once(BASE_PATH.'pages/'.$page.'.php');?>
                </div>
            </div>
        </div>
    </body>
</html>
