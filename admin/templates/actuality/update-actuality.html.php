<h1 class="h1-admin text-center">Modifier une Actualité</h1>

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
            <label for="title">Titre</label>
            <input class="form-control" type="text" name="title" id="title" value="<?php echo $actuality->getTitle(); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="ligue">Ligue</label>
            <select class="custom-select" name="ligue" id="ligue" required>
                <option value="0">Sélectionner une Ligue</option>
                <?php foreach ($ligues as $value): ?>
                    <option <?php if($actuality->getLigue() === $value->getId()): ?> selected <?php endif; ?> value="<?php echo $value->getId(); ?>"><?php echo $value->getLibelle(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea class="form-control" name="contenu" id="contenu" rows="7"><?php echo $actuality->getContenu(); ?></textarea>
    </div>
    <div class="input-group mb-3">
        <div class="custom-file">
          <label>Modifier l'image <small>(formats : png,jpeg,gif)</small><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input type="file" name="photo">
        </div>
    </div>
    <?php if($actuality->getPhoto() != null): ?>
        <img name="photo" src="<?php echo RACINE_IMG_UPLOADS . 'actualities/' . $actuality->getPhoto(); ?>" width="400" height="250" alt="Image d'actualité">
        <input  type="checkbox" name="delete-photo" >Supprimer</a>
    <?php endif ?>
    <br>
    <br>
    <div class="form-group d-flex flex-row justify-content-center">
        <input class="btn btn_custom_submit" type="submit" value="Valider">
    </div>
</form>