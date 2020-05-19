<section id="my-adds">
    <div class="container">
    
    <h1>Mes annonces</h1>
    <span class="annonces-border"></span>
    
    <h2 class="text-left">Annonces</h2>
    <span class="annonces-border-left"></span>
        
    <?php if(count($annonces) <= 0): ?>
        <p class="text-left more"><i class="fas fa-info-circle"></i> Vous ne proposez pas d'annonces pour le moment !</p>
    <?php else: ?>
    <table class="table-list-annonces">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th> 
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($annonces as $value): ?>
        <tr>
            <td><?php echo $value->getId(); ?></td>
            <td><?php echo ucwords($value->getFrenchDate($value->getDate())); ?></td>
            <td><?php echo $value->getTitle(); ?></td>
            <td><?php echo $value->getCategory(); ?></td>
            <td><a href="<?php echo RACINE; ?>edit-annonce?id=<?php echo $value->getId(); ?>">Modifier</a> - <a href="<?php echo RACINE; ?>delete-annonce?id=<?php echo $value->getId(); ?>">Supprimer</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php endif; ?>
    
    </div>
</section>

