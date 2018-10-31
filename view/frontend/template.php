<!doctype html>

<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/css/template.css" />
        <? if(isset($cssSheet)){
            echo '<link rel="stylesheet" href="public/css/' . $cssSheet . '" />';
        } ?>
    </head>
    <body>
        <?php
            require('view/frontend/header.php');
            require('view/frontend/nav.php');
            ?>
            <div id='content'>
                <?php
                    echo $content;
                ?>
            </div>
            <?php
            require('view/frontend/footer.php');
        ?>
    </body>
    <?php
    if(isset ($js)){
        echo '<script src="public/js/'. $js .'"></script>';
    }
    ?>
</html>