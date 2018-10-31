<header role="banner">
    <div class="logo">
        <img alt="Notre logo courgette" src="public/img/logo.jpg">
    </div>
    <div class="title">
        <h1 class="noMargin">Pépintrie.com</h1>
        <p>Le site pour cuisiner de délicieuses recettes de saisons !</p>
    </div>
    <img>
    <div class="login">
        <?php
            if (isset($_SESSION['username']) and isset($_SESSION['groupName'])){
                echo '<p class="noMarginTop"> Bonjour ' .  $_SESSION['username'] .' ô trés chère ' . $_SESSION['groupName'] . '</p>';
                if (isset($_GET['action'])){
                    echo '<form method="post" action=\'index.php?action=' . $_GET['action'] . '\'>';
                }
                else{
                    echo '<form method="post" action=\'index.php\'>';
                }
                ?>      
                        <input type="checkbox" checked value="dislogin" name="action" class="unseen">
                        <input type="submit" value="Se deconnecter">
                    </form>
                <?php
            }
            elseif (!isset($_GET['login'])){
                if (isset($_GET['action'])){
                    echo '<a href="index.php?login=on&amp;action=' . $_GET['action'] . '">Se connecter</a><br><a href="index.php?action=registerForm">Rejoindre la pépintrie</a>';
                }
                else {
                    echo '<a href="index.php?login=on">Se connecter</a><br><a href="index.php?action=registerForm">Rejoindre la pépintrie</a>';
                }
            }
            else{
                if (isset($_GET['action'])){
                    echo '<form method="post" class="grid" action=\'index.php?action=' . $_GET['action'] . '\'>';
                }
                else{
                    echo '<form method="post" class="grid" action=\'index.php\'>';
                }
                ?>      
                        <div class="errorLogin">
                        <p class="noMargin">
                                <?php 
                                    if (isset($_GET['errorLogin'])){
                                        echo $_GET['errorLogin'] . '<br>';
                                    }
                                ?>
                                <a href="index.php?action=registerForm">En fait je suis pas encore une courgette.. </a>
                            </p>
                        </div>
                            <label for="username">Votre pseudo : </label>
                            <label for="password">Votre mot de passe : </label>
                            <input type="text" placeholder="pseudo" required name="username">
                            <input type="password" placeholder="courgette" name="password" required>
                            <input type="checkbox" checked value="login" name="action" class="unseen">
                            <input type="submit" value="Se connecter">
                    </form>
                <?php
            }
        ?>
    </div>
</header>