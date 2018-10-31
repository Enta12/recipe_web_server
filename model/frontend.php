<?php
function hashGroupFromUsername($username){
    $db = dbConnect();
    $rp = $db->prepare('SELECT id_group, hash FROM members WHERE username = :username'); //le probleme vient à l'ajout d'id group
    $rp->execute(array(
    'username'=> $username));
    $hashGroup = $rp->fetch();
    $rp->closeCursor();
    return $hashGroup;
}

function getGroupName($idGroup){
    $db = dbConnect();
    $rp = $db->prepare('SELECT name FROM groups WHERE id = :id_group');
    $rp->execute(array(
    'id_group'=>$idGroup));
    $groupName = $rp->fetch();
    $rp-> closeCursor();
    return $groupName['name'];
}

function getMembersNameAndEmail(){
    $db = dbConnect();
    $rp = $db->query('SELECT username, email FROM  members');
    return $rp;
}

function adddMember($username, $email, $hash){
    $db = dbConnect();
    $rq = $db->prepare('INSERT INTO members(username, hash, email) VALUES(:username, :hash, :email)');
    $rq->execute(array(
    'username' => $username,
    'hash' => $hash,
    'email' => $email
    ));
    //$rq->closeCursor();
}

function sendRecipe($name, $picture, $tools, $type, $vegan, $summer, $autumn, $winter, $spring){
    //var_dump($name);
    //var_dump($picture);
    //var_dump($tools);
    //var_dump($type);
    //var_dump($vegan);
    //var_dump($summer);
    //var_dump($autumn);
    //var_dump($winter);
    //var_dump($spring);

    $db = dbConnect(); //La requette ne s'envoie pas
    var_dump($db);
    $rq = $db->prepare('INSERT INTO recipes(name, picture, tools, type, vegan, summer, autumn, winter, spring) VALUES(:name, :picture, :tools, :type, :vegan, :summer, :autumn, :winter, :spring');
    var_dump($rq);
    $rq->execute(array(
        'name'=>$name,
        'picture'=>$picture,
        'tools'=>$tools,
        'type'=>$type,
        'vegan'=>$vegan,
        'summer'=>$summer,
        'autumn'=>$autumn,
        'winter'=>$winter,
        'spring'=>$spring));
    var_dump($rq);
    
    
    $rp = $db->prepare('SELECT id FROM recipes WHERE name = :name');
    $rp->execute(array(
        'name'=>$name));
    $id = $rp->fetch();
    $rp-> closeCursor();
    echo ('ici :');
    var_dump ($id);
    echo ('je vais envoyé ça : ' . '<br>');
    return $id['id'];
}

function sendRecipeLks($ingredients, $idRecipe, $steps){
    $db = dbConnect();
    foreach($ingredients as &$ingredient){
        $rqIngredient = $db->prepare('INSERT INTO recipe_ingredients_lk(level, quantity, id_recipe, id_ingredient) VALUES(:level, :quantity, :id_recipe, :id_ingredient');
        $rqIngredient->execute(array(
            'level' => $ingredient->level,
            'quantity' => $ingredient->quantity,
            'id_recipe' => $idRecipe,
            'id_ingredient' => $ingredient->idIngredient));
    }
    forEach($steps as &$step){
        $rqStep = $db->prepare('INSERT INTO step(id_recipe, content) VALUES(:id_recipe, :step');
        $rqStep->execute(array(
            'id_recipe' => $idRecipe,
            'step' => $step));
    }
}

function sendIngredient($newIngredient){
    $db = dbConnect();
    $rq = $db->prepare('INSERT INTO ingredients(name) VALUES(:name)');
    $rq->execute(array(
        'name' => $newIngredient));
    $rq->closeCursor();
    
}

function isAlreadyExist($ingredient){
}
    
function getIgredientId($name){
    $db = dbConnect();
    $rp = $db->prepare('SELECT id FROM ingredients WHERE name = :name');
    $rp->execute(array(
    'name'=> $name));
    $id = $rp->fetch();
    $rp->closeCursor();
    return $id['id'];
}

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=pepintrie;charset=utf8', 'root', '');
    return $db;
}
