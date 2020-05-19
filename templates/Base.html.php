<?php
$title = 'Acceuil | We Need Player';
$meta = '';
$LigueManager = new \EntityManager\LigueManager();
$ligues = $LigueManager->getAllLigue();
$ActualityManager = new \EntityManager\ActualityManager();
$actualities = $ActualityManager->getAllActualitiesLimit3();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $meta; ?>">
        <meta name="author" lang="fr" content="Sylvain N.">
        <meta name="keywords" content="Paintball">
        <link rel="icon" type="image/png" href="<?php echo RACINE_IMG_WEB . 'favicon/favicon_32x32.png'; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

        <!-- FONTAWSOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <!-- BOOTSTRAP 4.3.1 - CSS -->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo RACINE_CSS.'bootstrap.min'; ?>"> -->
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo RACINE_CSS.'styles.css'; ?>">
        
        <!-- COOKIE BAR -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
        
    </head>
<body>
    <header>
        <!-- NAVBAR -->
        <nav>
            <div class="menu-brand">
                <li class="nav-item d-flex flex-row justify-content-center">
                    <a class="menu-brand" href="<?php echo RACINE; ?>"><img width="160" src="<?php echo RACINE_IMG_WEB . 'logo/logo.png'; ?>" alt="Logo WeNeedPlayer"></a>
                </li>
            </div>
            <a id="resp-menu" class="responsive-menu" href="#"><i class="fas fa-hamburger"></i> Menu</a>
                <ul class="menu m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RACINE . 'annonces'; ?>">Annonces</a>
                    </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="#">Ligue 2018 - 2019</a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Les Équipes</a>
                            <ul class="sub-menu">
                            <?php foreach ($ligues as $value): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RACINE . 'equipes?id=' . $value->getId(); ?>"><?php echo $value->getLibelle(); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>   
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Classements</a>
                            <ul class="sub-menu">
                            <?php foreach ($ligues as $value): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RACINE . 'classements?id=' . $value->getId(); ?>"><?php echo $value->getLibelle(); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>   
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RACINE . 'actualites'; ?>">Actualités</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link"  href=""> Archives</a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Les Équipes</a>
                            <ul class="sub-menu">
                            <?php foreach ($ligues as $value): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RACINE . 'archives-equipes?id=' . $value->getId(); ?>"><?php echo $value->getLibelle(); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>   
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Classements</a>
                            <ul class="sub-menu">
                            <?php foreach ($ligues as $value): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RACINE . 'archives-classements?id=' . $value->getId() .'&annee=3'; ?>"><?php echo $value->getLibelle(); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>   
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <?php if(isset($_SESSION['auth']) && $_SESSION['auth'] === true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RACINE; ?>"><i style="font-size:26px" class="fas fa-user-circle"></i></a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RACINE . 'profil'; ?>"><i class="fas fa-user-edit"></i> Mon profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RACINE . 'add-annonce'; ?>"><i class="fas fa-plus-circle"></i> Déposer une annonce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RACINE . 'mes-annonces'; ?>"><i class="fas fa-eye"></i> Mes annonces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RACINE . 'deconnexion'; ?>"><i class="fas fa-power-off"></i> Déconnexion</a>
                        </li>
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RACINE . 'connexion'; ?>"><i class="fas fa-user"></i> Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RACINE . 'inscription'; ?>"><i class="fas fa-sign-in-alt"></i> Inscription</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- END NAVBAR -->
    </header>
    
    <!-- GENERE LE CONTENU DE LA PAGE -->
    <?php echo $buffering; ?>
    
    <!-- Footer -->
<footer class="page-footer font-small unique-color-dark">
    <div style="background-color: #212121;">
      <div class="container">
        <div class="row py-4 d-flex align-items-center">
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
              <h6 class="color-white mb-0">Suivez-nous sur les réseaux sociaux !</h6>
          </div>
          <div class="col-md-6 col-lg-7 text-center text-md-right">
              <a href="#" class="fb-ic">
                <i class="fab fa-facebook-f white-text mr-4"> </i>
              </a>
              <!-- Twitter -->
              <a href="#" class="tw-ic">
                <i class="fab fa-twitter white-text mr-4"> </i>
              </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center text-md-left mt-5">
      <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="color-white text-uppercase font-weight-bold">WeNeedPlayer</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p class="color-white">WeNeedPlayer. La référence des petites annonces gratuites de paintball sportif en France !
              </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="color-white text-uppercase font-weight-bold">Menu</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p class="color-white">
                  <a href="<?php echo RACINE . 'annonces'; ?>">Annonces</a>
              </p>
              <p class="color-white">
                  <a href="<?php echo RACINE . 'equipes?id=1'; ?>">Ligue 2018 - <?php echo date('Y'); ?></a>
              </p>
              <p class="color-white">
                  <a href="<?php echo RACINE . 'actualites'; ?>">Actualités</a>
              </p>
              <!--<p class="color-white">
                  <a href="<?php echo RACINE . 'archives-equipes?id=1'; ?>">Archives</a>
              </p>-->
          </div>
          <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
              <h6 class="color-white text-uppercase font-weight-bold">Dernières Actualités</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <?php foreach ($actualities as $value): ?>
              <p>
                  <a href="<?php echo RACINE . 'detail-actualite?id=' . $value->getId(); ?>"><?php echo $value->getTitle(); ?></a>
              <p class="footer-act-date"><small class="text-muted"><?php echo ucwords($value->getFrenchDate($value->getDate())); ?></small></p>
              </p>
              <?php endforeach; ?>
          </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">
        © <?php echo date('Y'); ?> Copyright Sylvain N.
    </div>
</footer>
<!-- END Footer -->
</body>

<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#f1d600"
    }
  },
  "position": "bottom-left",
  "content": {
    "message": "Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.",
    "dismiss": "J'accepte",
    "link": "En savoir plus",
    "href": "http://localhost/weneedplayer/mentions-legales/"
  }
});
</script>
<script src="<?php echo RACINE_JS . 'jquery.js'; ?>"></script>
<script src="<?php echo RACINE_JS . 'bootstrap.min.js'; ?>"></script>
<script src="<?php echo RACINE_JS . 'bootnavbar.js'; ?>"></script>
<script src="<?php echo RACINE_JS . 'navbar.js'; ?>"></script>
<script>
    $(function () {
        $('#main_navbar').bootnavbar();
    })
</script>
<!-- TINYMCE -->
<script src="<?php echo RACINE_JS . 'tinymce/tinymce.min.js'; ?>"></script>
<script>
tinymce.init({
  selector: '#contenu'
});
</script>

</html>