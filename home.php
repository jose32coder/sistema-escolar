<?php

header('Content-Type: text/html; charset=UTF-8');

if (include_once 'modules/security.php') {
    $_SESSION['raiz'] = dirname(__FILE__);
}
include_once './modules/conexion.php';
include_once './modules/notif_info_unset.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <meta name="robots" content="noindex">
    <meta name="google" value="notranslate">
    <link rel="icon" type="image/png" href="/images/icon.png" />
    <title>Sistema Escolar</title>
    <meta name="description" content="Sistema Escolar, gestión de asistencias." />
    <link rel="stylesheet" href="css/style.css?v=<?php echo (rand()); ?>" media="screen, projection" type="text/css" />
    <script src="./js/external/jquery.min.js" type="text/javascript"></script>
    <script src="./js/external/prefixfree.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
</head>

<body>
    
    <div class="loader"></div>
    <header class="header">
        <?php
            $file = "./modules/sections/section-info-title.php";
            if(file_exists($file)) include_once $file;
        ?>
    </header>
    <aside class="aside">
        <?php
        
        if (!empty($_SESSION['section-admin']) == 'go-' . $_SESSION['user']) {
            $file_admin = 'modules/sections/section-admin.php';
            if(file_exists($file_admin)) include_once $file_admin; else die("No encontrada");
        } elseif (!empty($_SESSION['section-editor']) == 'go-' . $_SESSION['user']) {
            die("11111111111111111");
            $file_editor = 'modules/sections/section-editor.php';
            if(file_exists($file_editor)) include_once $file_editor; else die("No encontrada");
        }else{
            die("dddddddddddddd");
        }
        ?>
    </aside>
</body>
<script src="./js/controls/buttons.js" type="text/javascript"></script>

</html>