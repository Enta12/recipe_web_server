var ingredientNb = 0;
var stepNb = 0;
const formElt = document.getElementById("addRecipeForm");
const buttonAddIngredientElt = document.getElementById("addIngredient");
const buttonAddStepElt = document.getElementById("addStep");

document.getElementById("rmIngredient").addEventListener("click", function(e){
    Array.from(document.getElementsByClassName(`ingredient${ingredientNb}`)).forEach(function(ingredientElt){
        formElt.removeChild(ingredientElt);
    });
    ingredientNb==0 ? ingredientNb=0 : ingredientNb--;
}, false);

function addIngredient(){
    ingredientNb++;
    buttonAddIngredientElt.insertAdjacentHTML("beforebegin", `<label for="ingredient${ingredientNb}" class="ingredient${ingredientNb}">Ingredient numéro ${ingredientNb} :</label><br class="ingredient${ingredientNb}">`);
    let ingredientChooseElt = document.createElement("select");
    ingredientChooseElt.setAttribute("name",`ingredient${ingredientNb}`);
    ingredientChooseElt.setAttribute("class",`ingredient${ingredientNb}`);
    ingredientChooseElt.setAttribute("id",`newIngredient${ingredientNb}`);
    ingredientChooseElt.addEventListener("change", function(e){
        if (ingredientChooseElt=="Nouveau"){
            document.getElementById(`newIngredient${ingredientNb}`).setAttribute("display", "inline");
        }
        else{
            document.getElementById(`newIngredient${ingredientNb}`).setAttribute("display", "none");
        }
    });
    formElt.insertBefore(ingredientChooseElt, buttonAddIngredientElt);
    ingredientChooseElt.insertAdjacentHTML("afterbegin", "<option value=\"new\">Nouveau</option>");
    //demande en ajax + traitement
   ingredientChooseElt.insertAdjacentHTML("afterend", `<input id="newIngredient${ingredientNb}" class="ingredient${ingredientNb}" name="newIngredient${ingredientNb}" type="text" placeHolder="Nom de l'ingrédient ${ingredientNb}">`);
    buttonAddIngredientElt.insertAdjacentHTML("beforebegin", `<label for="quantityIngredient${ingredientNb}" class="ingredient${ingredientNb}"> Quantité (en ml/g):</label><input name="quantityIngredient${ingredientNb}" class="ingredient${ingredientNb}" placeHolder="N'ajouter pas l'unité" type="number"><br class="ingredient${ingredientNb}">
        <label for="imporstanceIngredient${ingredientNb}" class="ingredient${ingredientNb}">Importance de l'élément :</label> <input max="3" type="number" min="1" class="ingredient${ingredientNb} levelImportance" name="levelIngredient${ingredientNb}" value="1"> <p class="noMargin info ingredient${ingredientNb}">1 : essentiel, 2 : remplaçable par un subtituant, 3 : optionelle.<br>Vous pourrez ajouter des substituants à vos ingrédients dans la catégorie ingrédient.</p><br class="ingredient${ingredientNb}">`);
}

function addStep(){
    stepNb++;
    buttonAddStepElt.insertAdjacentHTML("beforebegin", `<label for="step${stepNb}" class="step${stepNb}">Quantité :</label><input name="step${stepNb}" class="step${stepNb} step" placeHolder="Description de la première étape" type="textarea"><br class="step${stepNb}">`);
}

document.getElementById("rmStep").addEventListener("click", function(e){
    Array.from(document.getElementsByClassName(`step${stepNb}`)).forEach(function(stepElt){
        formElt.removeChild(stepElt);
    });
    stepNb==0 ? stepNb=0 : stepNb--;
}, false);

addIngredient();
addStep()
buttonAddIngredientElt.addEventListener("click", addIngredient, false);
buttonAddStepElt.addEventListener("click", addStep, false);