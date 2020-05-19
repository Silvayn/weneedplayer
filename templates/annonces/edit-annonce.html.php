<section id="edit-annonce">

    <h2>Modifier Annonce : </h2>
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
                    <label for="category">Catégorie</label>
                    <select class="custom-select" name="category" id="category" required>
                        <option value="0">Sélectionner une Catégorie</option>
                        <?php foreach ($categories as $value): ?>
                        <option <?php if($annonce->getCategory() === $value->getId()): ?> selected <?php endif; ?> value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="skill">Niveau de Jeu</label>
                    <select class="custom-select" name="skill" id="skill" required>
                        <option value="0">Sélectionner un Niveau de Jeu</option>
                        <?php foreach ($skills as $value): ?>
                                <option <?php if($annonce->getSkill() === $value->getId()): ?> selected <?php endif; ?> value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $annonce->getTitle(); ?>" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea class="form-control" name="contenu" id="contenu" rows="10" required><?php echo $annonce->getContenu(); ?></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="ligue">Ligue</label>
                    <select class="custom-select" name="ligue" id="ligue" required>
                        <option value="0">Sélectionner une Ligue</option>
                        <?php foreach ($ligues as $value): ?>
                                <option <?php if($annonce->getLigue() === $value->getId()): ?> selected <?php endif; ?> value="<?= $value->getId(); ?>"><?= $value->getLibelle(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group d-flex flex-row justify-content-center">
                <input class="btn btn_custom_submit" type="submit" value="modifier" name="edit">
                <input type="hidden" value="<?php echo $_SESSION['token']; ?>" name="token">
            </div>
        </form>
    </div>
    
</section>
