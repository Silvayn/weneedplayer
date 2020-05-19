<h1 class="h1-admin text-center">Liste des Actualités</h1>

<a href="<?php echo RACINE_MAJ . 'add-actuality' ?>">Ajouter une Actualité</a>

<?php if(count($actualities) === 0): ?>
        <p class="text-left more"><i class="fas fa-info-circle"></i> Pas d'actualités pour le moment !</p>
    <?php else: ?>
    <table class="table-list-annonces">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th> 
            <th>Titre</th>
            <th>Ligue</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($actualities as $value): ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['date']; ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php echo $value['ligue']; ?></td>
            <td><a href="<?php echo RACINE_MAJ; ?>update-actuality?id=<?php echo $value['id']; ?>">Modifier</a> - <a href="<?php echo RACINE_MAJ; ?>delete-actuality?id=<?php echo $value['id']; ?>">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php endif; ?>

    <?php if ($total > 1): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>    
        <li class="page-item"><a class="page-link" href="<?php echo RACINE_MAJ; ?>actualities?page=<?php echo $page - 1; ?>">Précédant</a></li>
        <?php endif; ?> 
        <?php for ($i = 1; $i <= $total; $i++) : ?>
        <li class="page-item"  <?php if ($page == $i): ?> class="active" <?php endif; ?>><a class="page-link" href="<?php echo RACINE_MAJ; ?>actualities?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
        <?php endfor ?>
        <?php if ($page < $total): ?>    
        <li class="page-item"><a class="page-link" href="<?php echo RACINE_MAJ; ?>actualities?page=<?php echo $page + 1; ?>">Suivant</a></li>
        <?php endif; ?> 
        </ul>
    </nav>
    <?php endif ?>