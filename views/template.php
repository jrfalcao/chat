<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <link href="assets/css/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <title>Template do site</title>
    </head>
    <body>
        <div class="environment"></div>        
        <div class="container">
            <?php
                $this->loadViewInTemplate($viewName, $viewData);
            ?>
        </div>
    </body>
    <br><br>
    <footer>Rodapé do site!!! <?= date('Y'); ?></footer>
</html>
