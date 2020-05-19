<div class="container-fluid">
    <div class="banner"></div>
</div>
    
<section id="ads">
    
    <h1>Les dernières Annonces</h1>
    <span class="annonces-border"></span>
    
    <?php if(count($annonces) <= 0 ): ?>
    <p class="text-center more"><i class="fas fa-info-circle"></i> Pas d'annonces pour le moments !</p>
    <?php else: ?>
    <div id="result" class="container-fluid d-flex flex-row justify-content-center align-items-center">
        <div class="row"> 
            <?php foreach ($annonces as $value): ?>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <article>
                    <div class="ads-card">
                        <p class="text-muted d-flex flex-row justify-content-center align-items-center"><?php echo $value['category']; ?></p>
                        <h2 class="ads-title"><?php echo $value['title']; ?></h2>
                        <p class="ads-desc"><?php echo $value['contenu']; ?></p>
                        <div class="text-muted d-flex flex-row justify-content-around">
                            <p class="ads-ligue"><?php echo $value['ligue']; ?></p>
                            <p class="ads-skill"><?php echo $value['skill']; ?></p>
                        </div>
                        <p class="ads-date">
                            <small class="text-muted"><?php echo ucwords($value['date_annonce']); ?></small>
                        </p>
                        <div class="ads-infos d-flex flex-row justify-content-center align-items-center">
                            <?php if($value['photo'] != null || $value['photo'] != ''): ?>
                        <img class="ads-img" src="<?php echo RACINE_IMG_UPLOADS . 'users/' . $value['photo']; ?>">
                    <?php else: ?>
                        <img class="ads-img" src="<?php echo RACINE_IMG_UPLOADS . 'users/user-icon.png'; ?>">
                    <?php endif; ?>
                            <span class="ads-user"><?php echo $value['user']; ?></span>
                        </div>
                        <a class="ads-link d-flex flex-row justify-content-end align-items-center" href="<?php echo RACINE . 'detail-annonce?id=' . $value['id'];; ?>">Voir la suite</a>
                        </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="div_action_button d-flex flex-row justify-content-center align-items-center">
        <a class="action_button d-flex flex-row justify-content-center align-items-center" href="<?php echo RACINE . 'annonces'; ?>">Voir toutes les annonces
        </a>
    </div>

</section>
    