<section id="ads">
    <div class="actuality">
        <h1>Actualités</h1>
        <span class="annonces-border"></span>
    </div>

    <div class="Form d-flex flex-column justify-content-center align-items-center">
        <div class="form-group col-md-6">
            <p class="text-center">SELECTIONNER UNE LIGUE</p>
            <select id="annee" class="custom-select">
            <option value="0">Séléctionner une ligue</option>
            <?php foreach ($ligues as $value): ?>
                <option value="<?php echo $value->getId(); ?>"><?php echo $value->getLibelle(); ?></option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <?php if(count($actualities) <= 0 ): ?>
    <p class="text-center more"><i class="fas fa-info-circle"></i> Pas d'actualités pour le moments !</p>
    <?php else: ?>
    <div id="result" class="container-fluid d-flex flex-row justify-content-center align-items-center">
        <div class="row"> 
            <?php foreach ($actualities as $value): ?>
            <div class="col-lg-12 d-flex flex-row justify-content-center align-items-center">
                <article class="actualities">
                    <a class="actualities-links" href="<?php echo RACINE . 'detail-actualite?id=' . $value->getId(); ?>">
                        <div class="row">
                            <div class="right col-lg-3 col-md-3 col-sm-12 d-flex flex-row justify-content-center align-items-center">
                              <?php if($value->getPhoto() != null): ?>
                                    <img class="actuality-img img-responsive" src="<?php echo RACINE_IMG_UPLOADS . 'actualities/' . $value->getPhoto(); ?>">
                                <?php else: ?>
                                    <img class="actuality-img img-responsive" src="<?php echo RACINE_IMG_UPLOADS . 'actualities/ffp.jpg'; ?>">
                                <?php endif; ?>
                            </div>
                            <div class="left col-lg-9 col-md-9 col-sm-12 d-flex flex-column justify-content-start">
                                <p class="actuality-date"><?php echo ucwords($value->getFrenchDate($value->getDate())); ?></p>
                                <h2 class="actuality-title"><?php echo $value->getTitle(); ?></h2>
                                <p class="actuality-desc"><?php echo $value->getExtract($value->getContenu()); ?></p>
                                <p class="actuality-ligue text-muted"><?php echo $value->getLigue(); ?></p>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if($total > 1): ?>
    <div class="pagination d-flex flex-row justify-content-center">
       
        <?php if ($page > 1): ?> 
        <a href="<?php echo RACINE; ?>actualites?page=<?php echo $page - 1; ?>">Actualité Précedante</a>
        <?php endif; ?>
        <?php if ($page < $total): ?> 
        <a href="<?php echo RACINE; ?>actualites?page=<?php echo $page + 1; ?>">Actualité Suivante</a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
</section>

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous">   
</script>
<script>window.jQuery || document.write('<script src="<?php echo RACINE_JS . 'jquery.js'; ?>"><\/script>');</script>

<script>
    $(function() {
      $('#annee').change(function(){
      	if ($(this).val() === 0) {
      		$('#result').empty();
      	}else{
      		$.ajax({
      			url: '<?php echo RACINE . 'AjaxActuality'; ?>',
      			method: 'GET',
      			dataType: 'json',
      			data: {
      				id: $(this).val()
      			},
      			error: function(){
		      		$('#result').html('<i class="fas fa-info-circle"></i> Erreur lors du chargment de la page !');
		      	}, 
		      	success: function(data){
		      		console.log(data.test);
		      		if (data.test) {
		      			console.log(data.test);
		      			$('#result').html('<div class="row"><div class="col-lg-12 d-flex flex-row justify-content-center align-items-center"><article class="actualities"></article></div></div>');
		      			for (var i = 0; i < data.list.length; i++) {
		      				$('#result .row .actualities').append('<a class="actualities-links d-flex flex-row justify-content-center align-items-center" href="<?php echo RACINE; ?>detail-actualite?id=' + data.list[i].id + '"><div class="row"><div class="right col-lg-3 col-md-3 col-sm-12 d-flex flex-row justify-content-center align-items-center"><img class="actuality-img img-responsive" src="<?php echo RACINE_IMG_UPLOADS .'actualities/'; ?>' + data.list[i].photo + '"></div><div class="left col-lg-9 col-md-9 col-sm-12 d-flex flex-column justify-content-start"><p class="actuality-date">' + data.list[i].date_actuality + '</p><h2 class="actuality-title">' + data.list[i].title + '</h2><p class="actuality-desc">' + data.list[i].contenu + '</p><p class="actuality-ligue text-muted">' + data.list[i].ligue + '</p></div></a>');
		      			}
		      		}else{
		      			$('#result').append('<i class="fas fa-info-circle"></i>' + data.list);
		      		}
		      	}
      		});
      	}
  	});

    });
</script>
