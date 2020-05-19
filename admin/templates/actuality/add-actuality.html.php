<h1 class="h1-admin text-center">Ajouter une Actualité</h1>

<?php if($this->request->hasFlash('errors')): ?>
    <?php foreach ($this->request->getFlash('errors') as $errors): ?>
        <div class="alert alert-danger" role="alert"><i class="fas fa-times-circle"></i> <?php echo $errors; ?></div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="POST" enctype="multipart/form-data" action="">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="title">Titre</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group col-md-6">
            <label for="ligue">Ligue</label>
            <select class="custom-select" name="ligue" id="ligue" required>
                <option value="0">Sélectionner une Ligue</option>
                <?php foreach ($ligues as $value): ?>
                        <option value="<?php echo $value->getId(); ?>"><?php echo $value->getLibelle(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea class="form-control" name="contenu" id="contenu" rows="10"></textarea>
    </div>
    <div class="input-group mb-3">
        <div class="custom-file">
            <label>Image <small>(formats : png, jpeg, gif)</small><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input type="file" name="photo">
        </div>
    </div>
    <br>
    <br>
    <div class="form-group d-flex flex-row justify-content-center">
        <input class="btn btn_custom_submit" type="submit" value="Valider" name="addActuality">
    </div>
</form>