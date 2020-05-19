<section id="ads">
    
    <h1>Annonces</h1>
    <span class="annonces-border"></span>

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
    
    <?php if(count($annonces) <= 0 ): ?>
    <p class="text-center more"><i class="fas fa-info-circle"></i> Pas d'annonces pour le moments !</p>
    <?php else: ?>
    <div id="result" class="container-fluid d-flex flex-row justify-content-center align-items-center">
        <div class="row"> 
            <?php foreach ($annonces as $value): ?>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <article>
                    <div class="ads-card">
                        <p class="text-muted d-flex flex-row justify-content-center align-items-center"><?php echo $value['category']; ?></p>
                        <h2 class="ads-title"><?php echo $value['title']; ?></h2>
                        <p class="ads-desc"><?php echo $value['contenu']; ?></p>
                        <div class="text-muted d-flex flex-row justify-content-around">
                            <p class="ads-ligue"><?php echo $value['ligue']; ?></p>
                            <p class="ads-skill"><?php echo $value['skill']; ?></p>
                        </div>
                        <p class="ads-date">
                            <small class="text-muted"><?php echo ucwords($value['date_annonce']); ?></small>
                        </p>
                        <div class="ads-infos d-flex flex-row justify-content-center align-items-center">
                            <?php if($value['photo'] != null || $value['photo'] != ''): ?>
                                <img class="ads-img" src="<?php echo RACINE_IMG_UPLOADS . 'users/' .  $value['photo']; ?>">
                            <?php else: ?>
                                <img class="ads-img" src="<?php echo RACINE_IMG_UPLOADS . 'users/user-icon.png'; ?>">
                            <?php endif; ?>
                            <span class="ads-user"><?php echo $value['user']; ?></span>
                        </div>
                        <a class="ads-link d-flex flex-row justify-content-end align-items-center" href="<?php echo RACINE . 'detail-annonce?id=' . $value['id'];; ?>">Voir la suite</a>
                        </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if($total > 1): ?>
    <div class="pagination d-flex flex-row justify-content-center">
       
        <?php if ($page > 1): ?> 
        <a href="<?php echo RACINE; ?>annonces?page=<?php echo $page - 1; ?>">Annonce Précedante</a>
        <?php endif; ?>
        <?php if ($page < $total): ?> 
        <a href="<?php echo RACINE; ?>annonces?page=<?php echo $page + 1; ?>">Annonce Suivante</a>
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
      			url: '<?php echo RACINE . 'ajaxAnnonce'; ?>',
      			method: 'GET',
      			dataType: 'json',
      			data: {
      				id: $(this).val()
      			},
      			error: function(){
		      		$('#result').html('<i class="fas fa-info-circle"></i> Erreur lors du chargment de la page !');
		      	}, 
		      	success: function(data){
                            console.log(data.list);
                            if (data.test) {
                                    console.log(data.test);
                                    $('#result').html('<div class="row"></div>');
                                    for (var i = 0; i < data.list.length; i++) {
                                            $('#result .row').append('<div class="col-lg-6 col-md-12 col-sm-12"><article><div class="ads-card"><p class="text-muted d-flex flex-row justify-content-center align-items-center">' + data.list[i].category + '</p><h2 class="ads-title">' + data.list[i].title + '</h2><p class="ads-desc">' + data.list[i].contenu + '</p><div class="text-muted d-flex flex-row justify-content-around"><p class="ads-ligue">' + data.list[i].ligue + '</p><p class="ads-skill">' + data.list[i].skill + '</p></div><p class="ads-date"><small class="text-muted">' + data.list[i].date_annonce + '</small></p><div class="ads-infos d-flex flex-row justify-content-center align-items-center"><img class="ads-img" src="<?php echo RACINE_IMG_UPLOADS . 'users/'; ?>'+ data.list[i].photo + '"><span class="ads-user">' + data.list[i].user + '</span></div><a class="ads-link d-flex flex-row justify-content-end align-items-center" href="<?php echo RACINE . 'detail-annonce?id='; ?>' + data.list[i].id + '">Voir la suite</a></div></article></div>');
                                    }
                            }else{
                                    $('#result').html('<i class="fas fa-info-circle"></i>' + data.list);
                            }
		      	}
      		});
      	}
  	});

    });
</script>
