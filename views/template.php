<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <link href="assets/css/template.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <title>Template do site</title>
    </head>
    <body>
        <div class="environment" style="background-color: <?php 
            if(isset($_SESSION['area']) && $_SESSION['area'] == 'suporte'){
                echo '#ff0000';
            }  elseif(isset($_SESSION['area']) && $_SESSION['area'] == 'cliente') {
                echo '#00ff00';
            }  else {
                echo '#080808';
            }
        ?>"></div>        
        <div class="container-fluid corpo-chat">
            <?php
                $this->loadViewInTemplate($viewName, $viewData);
            ?>
        </div>
    </body>
    <br><br>
    <footer>Rodapé do site!!! <?= date('Y'); ?></footer>
</html>
