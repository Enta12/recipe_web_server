<!doctype html>

<html>
    <head>
        <meta charset="utf-8">
        <title>La page de test !</title>
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <p>OUIIIIIIII</p>
        <?php
            echo 'Email : ' . isset($_POST['email']);
            echo ' Username : ' . isset($_POST['ursername']);
            echo ' mdp1 : ' . isset($_POST['password1']);
            echo ' mdp2 : ' . isset($_POST['password2']);
            

    
    
    
        ?>
    </body>
</html>