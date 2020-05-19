<h1 class="h1-admin text-center">Modifier un staff</h1>

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
                <label for="nom">Nom</label>
                <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $staff->getNom(); ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo $staff->getPrenom(); ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ville">Ville</label>
                <input class="form-control" type="text" name="ville" id="ville" value="<?php echo $staff->getVille(); ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="position">Position</label>
                <select class="custom-select" name="position" id="position" required>
                    <option value="0">Sélectionner une Position</option>
                    <?php foreach ($positions as $value): ?>
                        <option <?php if($staff->getPosition() === $value->getId()): ?> selected <?php endif; ?> value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="team">Equipe</label>
                <select class="custom-select" name="team" id="team" required>
                    <option value="0">Sélectionner une Equipe</option>
                    <?php foreach ($teams as $value): ?>
                        <option <?php if($staff->getTeam() === $value->getId()): ?> selected <?php endif; ?> value="<?= $value->getId(); ?>"><?= $value->getNom(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="nationality">Nationalité</label>
                <select class="custom-select" name="nationality" id="nationality" required>
                    <option value="0">Sélectionner une nationalité</option>
                    <?php foreach ($nationalities as $value): ?>
                        <option <?php if($staff->getNationality() === $value->getId()): ?> selected <?php endif; ?> value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    <br>
    <br>
    <div class="form-group d-flex flex-row justify-content-center">
        <input class="btn btn_custom_submit" type="submit" value="Valider" name="addPlayer">
    </div>
</form>
