<h1 class="h1-admin text-center">Liste des équipes</h1>

<a href="<?php echo RACINE_MAJ . 'add-team' ?>">Ajouter une équipe</a>

<?php if(count($teams) == 0): ?>
        <p class="text-left more"><i class="fas fa-info-circle"></i> Pas d'équipes pour le moment !</p>
    <?php else: ?>
    <table class="table-list-annonces">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th> 
            <th>Ville</th>
            <th>Ligue</th>
            <th>Années</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($teams as $value): ?>
        <tr>
            <td><?php echo $value->getId(); ?></td>
            <td><?php echo $value->getNom(); ?></td>
            <td><?php echo $value->getVille(); ?></td>
            <td><?php echo $value->getLigue(); ?></td>
            <td><?php echo $value->getArchive(); ?></td>
            <td><a href="<?php echo RACINE_MAJ; ?>update-team?id=<?php echo $value->getId(); ?>">Modifier</a> - <a href="<?php echo RACINE_MAJ; ?>delete-team?id=<?php echo $value->getId(); ?>">Supprimer</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php endif; ?>

    <?php if ($total > 1): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>    
        <li class="page-item"><a class="page-link" href="<?php echo RACINE_MAJ; ?>teams?page=<?php echo $page - 1; ?>">Précédant</a></li>
        <?php endif; ?> 
        <?php for ($i = 1; $i <= $total; $i++) : ?>
        <li class="page-item"  <?php if ($page == $i): ?> class="active" <?php endif; ?>><a class="page-link" href="<?php echo RACINE_MAJ; ?>teams?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
        <?php endfor ?>
        <?php if ($page < $total): ?>    
        <li class="page-item"><a class="page-link" href="<?php echo RACINE_MAJ; ?>teams?page=<?php echo $page + 1; ?>">Suivant</a></li>
        <?php endif; ?> 
        </ul>
    </nav>
    <?php endif ?>