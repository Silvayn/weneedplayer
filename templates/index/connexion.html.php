<section id="addUser">
    
    <h1>Connexion</h1>
    <span class="annonces-border"></span>

    <div class="container">
    <?php if($this->request->hasFlash('errors')): ?>
        <?php foreach ($this->request->getFlash('errors') as $errors): ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-times-circle"></i> <?php echo $errors; ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
        <form class="d-flex flex-column justify-content-center align-items-center" method="POST" action="">
            <div class="form-group">
                <i class='fas fa-user-circle' style='font-size:120px'></i>
            </div>
            <div class="textbox col-lg-4 col-md-8 col-sm-10">
                <i class="fas fa-user"></i>
                <input type="text" name="login" id="login" placeholder="Login">
            </div>
            <div class="textbox col-lg-4 col-md-8 col-sm-10">
                <i class="fas fa-lock"></i>
                <input type="password" name="pwd" id="pwd" placeholder="Mot de passe">
            </div>
            <!--<div class="new-password d-flex flex-row justify-content-start custom-control custom-checkbox col-lg-4 col-md-8 col-sm-10">
                <input type="checkbox" class="custom-control-input" id="remember">
                <label class="custom-control-label" name="remember" for="remember">Se souvenir de moi</label>
            </div>-->
            <!--<div class="new-password d-flex flex-row justify-content-end col-lg-4 col-md-8 col-sm-10">
                <a href="set-new-password">Mot de passe oublié ?</a>
            </div>-->
            <div class="form-group">
                <input class="btn btn_custom_submit" type="submit" value="Se Connecter" name="connexion">
            </div>
            <br>
            <div class="form-group">
                Pas encore inscrit, <a href="<?php echo RACINE . 'inscription'; ?>">Inscrivez-vous gratuitement</a>
            </div>
        </form>
    </div>

</section>