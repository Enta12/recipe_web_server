<?php $title = 'Inscription'; ?>

<?php  ob_start(); ?>
    <section>
        <h2 class="themeTitle">Bienvenue ô très chère courgette </h2>
        <form class="register" action="index.php" method="post">
                <label for="username">Votre pseudo :</label>
                <label for="password1">Votre mot de passe :</label>
                <label for="password2">confirmation du mot de passe :</label>
                <label for="email">Votre adresse mail :</label>
                <input name="username" type="text" required placeholder="pseudo">
                <input name="password1" type="password" required>
                <input name="password2" type="password" required>
                <input name="email" type="email" required placeholder="courgette@courmail.fr">
                <input type="checkbox" checked name="action" class="unseen" value="register">
                <input type="submit" value="Envoyer">
        </form>
        <div class="error">
            <?php
                if(isset($errorRegister)){
                        echo $errorRegister;
                    }
            ?>
        </div>
        <h2 style="margin-top : 20px;">Pourquoi devenir une courgette ? Qu'est ce que cela m'apporte ?</h2>
        <p>Très chère courgette ! Sache qu'en devenant une courgette tu recevras la possibilité de partager des recettes, et cela sera alors une précieuse contributions pour toutes la patrie, car oui ô très chère légume, la force de la pépintrie vient de ses courgette, alors rejoins nous ! Contribue à nos recettes, et prends de la couleur !</p>
    </section>
<?php  $content = ob_get_clean(); ?>
<?php require('template.php'); ?>