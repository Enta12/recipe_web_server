<?php $title = 'erreur page inexistante'; 
$cssSheet = 'error.css';
ob_start(); ?>
    <section>
        <h1>Non d'une courgette ! Tu es tombé sur le pépin 404.</h1><h2>Il semblerait donc que tu ailles un ... pépin !</h2>
    </section>
<?php $content = ob_get_clean();
require('template.php'); ?>