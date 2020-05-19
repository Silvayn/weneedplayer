<section id="detail-actuality">
    
    <article>
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1 class="detail-act-title"><?php echo $actuality->getTitle(); ?></h1>
            <?php if($actuality->getPhoto() != null): ?>
                <img class="detail-act-img img-responsive" src="<?php echo RACINE_IMG_UPLOADS . 'actualities/' . $actuality->getPhoto(); ?>">
            <?php else: ?>
                <img class="detail-act-img img-responsive" src="<?php echo RACINE_IMG_UPLOADS . 'actualities/ffp.jpg' ?>">
            <?php endif; ?>
            <div class="detail-act-contenu"><?php echo $actuality->getContenu(); ?></div>
        </div>
    </article>
    
</section>