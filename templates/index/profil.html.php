<section id="profil">

    <h2>Profil : <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></h2>
    <span class="user-border"></span>
    
    <div class="container">
        <?php if($this->request->hasFlash('errors')): ?>
            <?php foreach ($this->request->getFlash('errors') as $errors): ?>
                <div class="alert alert-danger" role="alert"><i class="fas fa-times-circle"></i> <?php echo $errors; ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($this->request->hasFlash('success')): ?>
            <?php foreach ($this->request->getFlash('success') as $flash): ?>
                <div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> <?php echo $flash; ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data" action="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $userEdit->getNom(); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="prenom">Prénom</label>
                    <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo $userEdit->getPrenom(); ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input class="form-control" type="text" name="adresse" id="adresse" value="<?php echo $userEdit->getAdresse(); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="ville">Ville</label>
                    <input class="form-control" type="text" name="ville" id="ville" value="<?php echo $userEdit->getVille(); ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="mail">Mail</label>
                    <input class="form-control" type="email" name="mail" id="mail" value="<?php echo $userEdit->getMail(); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Téléphone</label>
                    <input class="form-control" type="phone" name="phone" id="phone" value="<?php echo $userEdit->getPhone(); ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user_team">Équipe</label>
                    <input class="form-control" type="text" name="user_team" id="user_team" value="<?php echo $userEdit->getUser_team(); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="ligue">Ligue</label>
                    <select class="custom-select" name="ligue" id="ligue" required>
                        <option value="0">Sélectionner une Ligue</option>
                        <?php foreach ($ligues as $value): ?>
                        <option <?php if($userEdit->getLigue() === $value->getId()): ?> selected <?php endif; ?> value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="photo">
                    <label class="custom-file-label" for="photo">Modifier l'image <small>(formats : png, jpeg, gif)</small></label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                </div>
            </div>
            <?php if($userEdit->getPhoto() != null): ?>
                <img name="photo" class="img-circle img-responsive" src="<?php echo RACINE_IMG_UPLOADS . 'users/' . $userEdit->getPhoto(); ?>" width="150" height="150" alt="Image utilisateur">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="delete-photo">
                    <label class="custom-control-label" name="delete-photo" for="delete-photo">Supprimer</label>
                </div>
            <?php endif ?>
            <br>
            <br>
            <div class="form-group d-flex flex-row justify-content-center">
                <input class="btn btn_custom_submit" type="submit" value="modifier" name="edit">
                <input type="hidden" value="<?php echo $_SESSION['token']; ?>" name="token">
            </div>
        </form>
    </div>
    
</section>