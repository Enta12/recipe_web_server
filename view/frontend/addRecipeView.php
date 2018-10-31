<?php $title = 'Ajout d\'une rectte';
$js = 'addRecipe.js';
$cssSheet = 'addRecipe.css';
ob_start(); ?>
<section>
    <h2>Merci à toi, ô noble courgette, de rajouter une recette ! </h2>
    <form method="post" id="addRecipeForm">
        <h3>Informations générales :</h3>
        <input class="unseen" name="action" value="postRecipe" checked>
        <label for="name">Nom de la recette : </label><input type="text" name="name" placeholder="Gratin de courgettes" required><br>
        <label for="pictureLink">Photo de la recette : </label><input type="file" name="pictureLink" placeholder="Gratin de courgettes"><br>
        <label for="tools">Listes des ustensile nécessaire : </label><input type="text" name="tools" placeholder="four, chinois" required>
        <p class="noMargin info">Ne mettre que les ustensiles que l'ont est succeptible de ne pas avoir (batteur, four, etc et pas couteaux, bols, etc)</p>
        <label for="type">Entrée, plat ou dessert ? : </label>
        <select name="type" required>
            <option value="starter">Entrée</option>
            <option value="mainCourse">Plat</option>
            <option value="desert">Dessert</option>
        </select> <br>
        <label for="isVegan">Est-ce une recette végétalienne ? </label><input type="checkbox" name="isVegan"><br>
        <span style="margin-right:5px;">Saison de la recette : </span><label for="summer">Été : </label><input type="checkbox" name="summer"><label for="autumn">Automne : </label><input type="checkbox" name="autumn"><label for="winter">Hiver : </label><input type="checkbox" name="winter"><label for="spring">Printemps : </label><input type="checkbox" name="spring"><br>
        <h3>Les ingrédients</h3>
        <input type="button" value="Ajouter un ingrédient" id="addIngredient">
        <input type="button" value="Suprimer un ingrédient" id="rmIngredient">
        <h3>La recette</h3>
        <input type="button" value="Ajouter une étape" id="addStep">
        <input type="button" value="Suprimer une étape" id="rmStep">
        <br><br>
        <input type="submit" value="soumettre (Demande la validation d'un )">
    </form>
</section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>