<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

<!-- BOOTSTRAP 4.3.1 - CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo RACINE_MAJ_CSS.'bootstrap.min'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo RACINE_MAJ_CSS.'style.css'; ?>">
    
    <link href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" rel="stylesheet">
    
</head>

<body>
<div class="nav-side-menu">
    <div class="brand">WeNeedPlayer | Admin</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <a href="<?php echo RACINE; ?>">
                    <li>Revenir sur WeNeedPlayer</li>
                </a>
                <a href="<?php echo RACINE_MAJ . 'actualities'; ?>">
                    <li>Actualités</li>
                </a>
                <a href="<?php echo RACINE_MAJ . 'players'; ?>">
                    <li>Joueurs</li>
                </a>
                <a href="<?php echo RACINE_MAJ . 'staffs'; ?>">
                    <li>Staffs</li>
                </a>
                <a href="<?php echo RACINE_MAJ . 'teams'; ?>">
                    <li>Equipes</li>
                </a>
                <a href="<?php echo RACINE_MAJ . 'formats'; ?>">
                    <li>Liaisons Formats équipes</li>
                </a>
                <a href="<?php echo RACINE_MAJ . 'classements'; ?>">
                    <li>Classements</li>
                </a>
            </ul>
     </div>
</div>

    <div class="container-admin">
        <!-- GENERE LE CONTENU DE LA PAGE -->
        <?php echo $buffering; ?>
    </div>

</body>

<script src="<?php echo RACINE_MAJ_JS . 'jquery.js'; ?>"></script>
<script src="<?php echo RACINE_MAJ_JS . 'bootstrap.min.js'; ?>"></script>
<!-- TINYMCE -->
<script src="<?php echo RACINE_MAJ_JS . 'tinymce/tinymce.min.js'; ?>"></script>
<script>
tinymce.init({
  selector: '#contenu'
});
</script>

</html>
