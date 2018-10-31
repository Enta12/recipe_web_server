<nav>
    <form>
        <input class="unseen" name="action" value="searchRecipe" checked>
        <label for="recipeSearch">Recherche : </label><input type="text" name="recipeSearch" placeholder="Ingrédients, recettes, type de plat">
        <?php //amène sur la page de recherche avec option avancé qui elle ne se rechargera pas en entier ?>
    </form>
    <a>Montre moi la saison</a>
    <a>Avec mon placard</a>
    <a href="index.php?action=addRecipe">Rajouter une recette</a>
    <a>Ingrédients</a>
    <a>À propose de la patrie</a>
    <?php //Si administrateur ?>
</nav>