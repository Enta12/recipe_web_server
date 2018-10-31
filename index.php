<?php
session_start();
require ('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if(isset($_POST['action'])){
            if($_POST['action'] == 'login'){
                login();
            }
            else if($_POST['action'] == 'dislogin'){
                dislogin();
            }
            else if($_POST['action'] == 'postRecipe'){
                postrecipe();
            }
        }
        elseif($_GET['action'] == 'registerForm'){
            registerForm(); 
        }
        elseif($_GET['action'] == 'addRecipe'){
            addRecipe(); 
        }
        else {
            require('view/frontend/errorView.php');
        }
    }
    else {
        if(isset($_POST['action'])){
            if($_POST['action']== 'register'){
                register();
            }
            elseif($_POST['action']== 'login'){
                login();
                require('view/frontend/accueilView.php');
            }
            elseif($_POST['action']== 'dislogin'){
                dislogin();
                require('view/frontend/accueilView.php');
            }
        }
        else {
            require('view/frontend/accueilView.php');
        }
    }
}

    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
        
        