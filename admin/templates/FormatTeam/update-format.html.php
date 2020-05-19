<h1 class="h1-admin text-center">Modifier un format à une équipe</h1>

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
<form method="POST" action="">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="format">Formats</label>
            <select class="custom-select" name="format" id="format" required>
                <option value="0">Sélectionner un format</option>
                <?php foreach ($formats as $value): ?>
                        <option <?php if($format->getFormat() === $value->getId()): ?> selected <?php endif; ?> value="<?php echo $value->getId(); ?>"><?php echo $value->getLibelle(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="team">Equipe</label>
            <select class="custom-select" name="team" id="team" required>
                <option value="0">Sélectionner une Equipe</option>
                <?php foreach ($teams as $value): ?>
                        <option <?php if($format->getTeam() === $value->getId()): ?> selected <?php endif; ?> value="<?php echo $value->getId(); ?>"><?php echo $value->getNom() . ' - ' . $value->getArchive(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <br>
    <br>
    <div class="form-group d-flex flex-row justify-content-center">
        <input class="btn btn_custom_submit" type="submit" value="Valider" name="addFormat">
    </div>
</form>