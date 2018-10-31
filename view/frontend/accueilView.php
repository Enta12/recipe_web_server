<?php $title = 'Bienvenu à la patrie des courgette'; ?>

<?php ob_start(); ?>
<span id="jsTest"></span>
<section>
    <div class="pictureHomeContainer">
        <div class="pictureHome"><img src="public/img/zucchini1.jpg" alt="une courgette"><p>Une courgette pour les trouver</p></div>
        <div class="pictureHome"><img src="public/img/zucchini2.jpg" alt="une courgette"><p>Une courgette pour les amener tous</p></div>
        <div class="pictureHome"><img src="public/img/zucchini3.jpg" alt="une courgette"><p>Et dans les soupes les lier</p></div>
        <div class="pictureHome"><img src="public/img/zucchini4.jpg" alt="une courgette"><p>A la pépintrie, là où s'étendent les légumes</p></div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>