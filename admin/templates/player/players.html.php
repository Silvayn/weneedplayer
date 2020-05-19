<h1 class="h1-admin text-center">Liste des Joueurs</h1>

<a href="<?php echo RACINE_MAJ . 'add-player' ?>">Ajouter un Joueur</a>

<?php if(count($players) == 0): ?>
        <p class="text-left more"><i class="fas fa-info-circle"></i> Pas de joueurs pour le moment !</p>
    <?php else: ?>
    <table class="table-list-annonces">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th> 
            <th>Prénom</th>
            <th>Equipe</th>
            <th>Années</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($players as $value): ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['nom']; ?></td>
            <td><?php echo $value['prenom']; ?></td>
            <td><?php echo $value['teamName']; ?></td>
            <td><?php echo $value['annee']; ?></td>
            <td><a href="<?php echo RACINE_MAJ; ?>update-player?id=<?php echo $value['id']; ?>">Modifier</a> - <a href="<?php echo RACINE_MAJ; ?>delete-player?id=<?php echo $value['id']; ?>">Supprimer</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <?php endif; ?>

    <?php if ($total > 1): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>    
        <li class="page-item"><a class="page-link" href="<?php echo RACINE_MAJ; ?>players?page=<?php echo $page - 1; ?>">Précédant</a></li>
        <?php endif; ?> 
        <?php for ($i = 1; $i <= $total; $i++) : ?>
        <li class="page-item"  <?php if ($page == $i): ?> class="active" <?php endif; ?>><a class="page-link" href="<?php echo RACINE_MAJ; ?>players?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
        <?php endfor ?>
        <?php if ($page < $total): ?>    
 <li class="page-item"><a class="page-link" href="<?php echo RACINE_MAJ; ?>players?page=<?php echo $page + 1; ?>">Suivant</a></li>
        <?php endif; ?> 
        </ul>
    </nav>
    <?php endif ?>

