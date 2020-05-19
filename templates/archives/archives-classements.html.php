<?php
//2019
$annee = $_GET['annee'];
?>
<section id="archives">
    
    <h1>Archives</h1>
    <div class="container">
        <form class="d-flex flex-row justify-content-center" name="archivesForm" method="GET" action="">
            <div class="form-group col-md-6">
                <label class="text-center" for="annee">Année de participation</label>
                <select class="custom-select" name="annee" id="annee" <<!--onChange="this.form.submit();"-->>
                    <?php foreach ($archives as $value) { ?>
                    <option <?php if (isset($annee) && $annee === $value->getId()) { ?> selected <?php } ?> value="archives-classements?id=<?php echo $ligues->getId() . '&annee=' . $value->getId(); ?>"><?= $value->getAnnee(); ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" value="Changer" />
        </form>
        
        <div class="classement">
            <h2>Classement et Résultats</h2>
            <h3><?php echo $ligues->getLibelle(); ?></h3>
        </div>
        
    </div>

</section>
