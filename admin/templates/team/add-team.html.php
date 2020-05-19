<h1 class="h1-admin text-center">Ajouter une équipe</h1>

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
                <input class="form-control" type="text" name="nom" id="nom" required>
            </div>
            <div class="form-group col-md-6">
                <label for="ville">Ville</label>
                <input class="form-control" type="text" name="ville" id="ville" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="ligue">Ligue</label>
                <select class="custom-select" name="ligue" id="ligue" required>
                    <option value="0">Sélectionner une Ligue</option>
                    <?php foreach ($ligues as $value): ?>
                            <option value="<?php echo $value->getId(); ?>"><?php echo $value->getLibelle(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="archive">Année de participation</label>
                <select class="custom-select" name="archive" id="archive" required>
                    <option value="0">Sélectionner une Année</option>
                    <?php foreach ($archives as $value): ?>
                            <option value="<?php echo $value->getId(); ?>"><?php echo $value->getAnnee(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="format">Format Poule (Championat D1)</label>
                <select class="custom-select" name="format" id="format">
                    <option value="0">Sélectionner un format</option>
                    <?php foreach ($format_d1 as $value): ?>
                            <option value="<?php echo $value->getId(); ?>"><?php echo $value->getLibelle(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="custom-file">
              <label>Image <small>(formats : png,jpeg,gif)</small><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input type="file" name="photo">
            </div>
        </div>
    <br>
    <br>
    <div class="form-group d-flex flex-row justify-content-center">
        <input class="btn btn_custom_submit" type="submit" value="Valider" name="addTeam">
    </div>
</form>
