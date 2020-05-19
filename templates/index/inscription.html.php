<section id="inscription">

    <h2>Inscription</h2>
    <span class="annonces-border"></span>

    <div class="container">
        <?php if($this->request->hasFlash('errors')): ?>
        <?php foreach ($this->request->getFlash('errors') as $errors): ?>
        <div class="alert alert-danger" id="errors" role="alert"><i class="fas fa-times-circle"></i> <?php echo $errors; ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
        <form method="POST" enctype="multipart/form-data" action="">
            <div class="form-row d-flex flex-row justify-content-around">
                <div class="textbox-register col-md-8">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nom" id="nom" placeholder="Nom" required>
                </div>
            </div>
            <div class="form-row d-flex flex-row justify-content-around">
                <div class="textbox-register col-md-8">
                    <i class="far fa-user"></i>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
                </div>
            </div>
            <div class="form-row d-flex flex-row justify-content-around">
                <div class="textbox-register col-md-8">
                    <i class="fas fa-at"></i>
                    <input type="email" name="mail" id="mail" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row d-flex flex-column justify-content-around align-content-center">
                <div class="textbox-register col-md-8 d-flex flex-row">
                    <i class="fas fa-sign-in-alt"></i>
                    <input type="text" name="login" id="login" placeholder="Login" required>
                    <div id="checkingLogin"></div>
                </div>
                <div id="checkingLogintxt"></div>
            </div>
            <div class="form-row d-flex flex-column justify-content-around align-content-center">
                <div class="textbox-register col-md-8">
                    <i class="fas fa-lock"></i>
                    <input pattern=".{6,}" type="password" name="pwd" id="pwd" placeholder="Mot de Passe*" required>
                </div>
                <p class="inscription-message">*Le mot de passe doit contenir au moins 6 caractères, une majuscule, un chiffre et des caratères spéciaux</p>
            </div>
            <div class="form-row d-flex flex-column justify-content-around align-content-center">
                <div class="textbox-register col-md-8">
                    <i class="fas fa-lock"></i>
                    <input pattern=".{6,}" type="password" name="pwdCheck" id="pwdCheck" placeholder="Confirmer Mot de Passe" required>
                </div>
                <p class="inscription-message">*Le mot de passe doit contenir au moins 6 caractères, une majuscule, un chiffre et des caratères spéciaux</p>
            </div>
            <br>
            <br>
            <div class="form-group d-flex flex-row justify-content-center">
                <input class="btn btn_custom_submit" type="submit" value="s'inscrire" name="incription">
            </div>
            <div class="form-group text-center">
                Vous avez déjà un compte, <a href="<?php echo RACINE . 'connexion'; ?>">Connexion</a>.
            </div>
        </form>
            <p class="inscription-message text-center">*En vous inscrivant, vous acceptez nos <a href="">conditions générales d'utilisation</a> et <a href="">notre politique de confidentialité</a>.</p>
    </div>
    
</section>

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous">   
</script>
<script>window.jQuery || document.write('<script src="<?php echo RACINE_JS . 'jquery.js'; ?>"><\/script>');</script>

<script>
    $(function() {
        $('#login').blur(function(){
            if($(this).val().length >= 3){
                $('#checkingLogin').html('<img class="wait" src="<?php echo RACINE_IMG_WEB ?>/icons/ajax-loader.gif">');
                $.ajax({
                    url: '<?php echo RACINE . 'ajaxLogin'; ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        login: $(this).val()
                    },
                    error: function(){
                        $('#errors').html('<i class="fas fa-info-circle"></i> Erreur lors du chargment de la page !');
                    }, 
                    success: function(data){
                        if(data.check === true){
                            $('#checkingLogin').html('<i class="fas fa-times-circle" style="color: #FF0000;"></i>');
                            $('#checkingLogintxt').html('<p style="color: #FF0000;">Login déjà utilisé !</p>');
                        }else{
                           $('#checkingLogin').html('<i class="fas fa-check-circle" style="color: #82c91e;"></i>');
                           $('#checkingLogintxt').html('<p style="color: #82c91e;">Login disponible !</p>');
                        }
                    }
                });
            }
        });
    });
</script>