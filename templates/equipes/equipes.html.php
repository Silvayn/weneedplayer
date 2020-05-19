<section id="teams">

    <h1><?php echo $ligues->getLibelle(); ?></h1>
    <span class="equipes-border"></span>

    <?php if(count($teams) === 0){ ?>
        <p class="text-center more"><i class="fas fa-info-circle"></i> Pas d'équipes disponibles pour cette Ligue !</p>
    <?php }else{ ?>
        
        <?php if(count($teamsD1Champion) > 0){ ?>
        <div class="container">
            <h2 class="text-left">D1 Champion</h2>
            <span class="team-border"></span>
            <div class="row">
                <?php foreach ($teamsD1Champion as $value) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a class="team-hyperlink" href="detail-equipe?id=<?php echo $value->getId(); ?>">
                            <div class="team-card mb-4">
                                <?php if($value->getPhoto() != null): ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/' . $value->getPhoto(); ?>">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/ffp.jpg'; ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                   <h2 class="card-title"><?php echo $value->getNom(); ?></h2>
                                </div>
                             </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if(count($teamsD1Challenger) > 0){ ?>
        <div class="container">
            <h2 class="text-left">D1 Challenger</h2>
            <span class="team-border"></span>
            <div class="row">
                <?php foreach ($teamsD1Challenger as $value) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a class="team-hyperlink" href="detail-equipe?id=<?php echo $value->getId(); ?>">
                            <div class="team-card mb-4">
                                <?php if($value->getPhoto() != null): ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/' . $value->getPhoto(); ?>">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/ffp.jpg'; ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                   <h2 class="card-title"><?php echo $value->getNom(); ?></h2>
                                </div>
                             </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if(count($teamsD2) > 0){ ?>
        <div class="container">
            <h2 class="text-left">D2</h2>
            <span class="team-border"></span>
            <div class="row">
                <?php foreach ($teamsD2 as $value) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a class="team-hyperlink" href="detail-equipe?id=<?php echo $value->getId(); ?>">
                            <div class="card mb-4">
                                <?php if($value->getPhoto() != null): ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/' . $value->getPhoto(); ?>">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/ffp.jpg'; ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                   <h2 class="card-title"><?php echo $value->getNom(); ?></h2>
                                </div>
                             </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if(count($teamsD3) > 0){ ?>
        <div class="container">
            <h2 class="text-left">D3</h2>
            <span class="team-border"></span>
            <div class="row">
                <?php foreach ($teamsD3 as $value) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a class="team-hyperlink" href="detail-equipe?id=<?php echo $value->getId(); ?>">
                            <div class="card mb-4">
                                <?php if($value->getPhoto() != null): ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/' . $value->getPhoto(); ?>">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/ffp.jpg'; ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                   <h2 class="card-title"><?php echo $value->getNom(); ?></h2>
                                </div>
                             </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if(count($teamsD4) > 0){ ?>
        <div class="container">
            <h2 class="text-left">D4</h2>
            <span class="team-border"></span>
            <div class="row">
                <?php foreach ($teamsD4 as $value) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a class="team-hyperlink" href="detail-equipe?id=<?php echo $value->getId(); ?>">
                            <div class="card mb-4">
                                <?php if($value->getPhoto() != null): ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/' . $value->getPhoto(); ?>">
                                <?php else: ?>
                                    <img class="card-img-top" src="<?php echo RACINE_IMG_UPLOADS . 'teams/ffp.jpg'; ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                   <h2 class="card-title"><?php echo $value->getNom(); ?></h2>
                                </div>
                             </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        
    <?php } ?>

</section>
    