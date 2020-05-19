<section id="addTeams">

    <h1>Déposer une Annonce</h1>
    <span class="annonces-border"></span>

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
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="category">Catégorie</label>
                    <select class="custom-select" name="category" id="category" required>
                        <option value="0">Sélectionner une Catégorie</option>
                        <?php foreach ($categories as $value): ?>
                                <option value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="skill">Niveau de Jeu</label>
                    <select class="custom-select" name="skill" id="skill" required>
                        <option value="0">Sélectionner un Niveau de Jeu</option>
                        <?php foreach ($skills as $value): ?>
                                <option value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea class="form-control" name="contenu" id="contenu" rows="10" required></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="ligue">Ligue</label>
                    <select class="custom-select" name="ligue" id="ligue" required>
                        <option value="0">Sélectionner une Ligue</option>
                        <?php foreach ($ligues as $value): ?>
                                <option value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group d-flex flex-row justify-content-center">
                <input class="btn btn_custom_submit" type="submit" value="Valider" name="addAnnonce">
                <input type="hidden" value="<?php echo $_SESSION['token']; ?>" name="token">
            </div>
        </form>
    </div>

</section>