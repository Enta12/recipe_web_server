<?php

require ('model/frontend.php');

function register(){
    if(isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password1']) and isset($_POST['password2'])){
        $usersEmailName = getMembersNameAndEmail();
        while($data = $usersEmailName->fetch()){
            if($data['username'] == $_POST['username']){
                $errorRegister = 'Ce pseudo est déja utilisé<br>';
            }
            if($data['email'] == $_POST['email']){
                $errorRegister = 'Cet email est déja utilisé<br>';
            }
        }
        $usersEmailName->closeCursor();
        
        if(!isset($errorRegister)){
            $hash = password_hash($_POST['password1'], PASSWORD_DEFAULT);
            adddMember($_POST['username'], $_POST['email'], $hash);
            $_SESSION['group'] = 1;
            $_SESSION['groupName'] = getGroupName(1);
            $_SESSION['username'] = $_POST['username'];
            require('view/frontend/accueilView.php');
        }
        else{
            registerForm($errorRegister);
        }
        
    }
    else{ 
        $errorRegister = 'Ils manquent des informations ! <br>';
        registerForm($errorRegister);
    }
}


function registerForm($errorRegister = ''){
    require('view/frontend/registerView.php');
}

function login(){
    $rp = hashGroupFromUsername($_POST['username']); 
    if ($rp and password_verify($_POST['password'], $rp['hash'])){
        $_SESSION['group'] = $rp['id_group'];
        $_SESSION['groupName'] = getGroupName($rp['id_group']);
        $_SESSION['username'] = $_POST['username']; 
    }
    else{
        if(isset($_GET['action'])){
            header('Location: index.php?action=' . $_GET['action'] . '&errorLogin=Pseudo ou mot de passe incorrecte&login=on');
        }
        else{
            header('Location: index.php?error=Pseudo ou mot de passe incorrecte&login=on');
        }
    }
    
}

function dislogin(){ 
    $_SESSION = array();
    session_destroy();
}

function addRecipe(){
    require('view/frontend/addRecipeView.php');
}

function postRecipe(){
    require('controller/Ingredient.php');
    $picture = false;
    $idRecipe = sendRecipe($_POST['name'], $picture, $_POST['tools'], $_POST['type'], isset($_POST['isVegan']), isset($_POST['summer']), isset($_POST['autumn']), isset($_POST['winter']), isset($_POST['spring']));
    
    $stepsNb = 1;
    $steps = [];
    while(isset($_POST['step' . $stepsNb])){
        $steps[$stepsNb] = $_POST['step' . $stepsNb];
        $stepsNb++;
    }
    $ingredientsNb = 1;
    $ingredients = [];
    while(isset($_POST['ingredient' . $ingredientsNb])){
        if ($_POST['ingredient' . $ingredientsNb] == 'new'){
            sendIngredient($_POST['newIngredient' . $ingredientsNb]);
            $ingredientId = getIgredientId($_POST['newIngredient'. $ingredientsNb]);
        }
        else{
            $ingredientId = getIgredientId($_POST['ingredient'. $ingredientsNb]);
        }
        $ingredients[$ingredientsNb] = new Ingredient($_POST['levelIngredient'. $ingredientsNb], $_POST['quantityIngredient'. $ingredientsNb], $ingredientId);
        $ingredientsNb++;
    }
    sendRecipeLks($ingredients, $idRecipe, $steps);
}