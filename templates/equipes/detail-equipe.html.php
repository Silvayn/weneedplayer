<section id="teams">
    <h1><?php echo $team->getNom(); ?></h1>
    <span class="equipes-border"></span>
    
    <div class="container players">
        <h2 class="text-left player-title">Les Joueurs</h2>
        <span class="player-border"></span>
        <?php if(count($players) <= 0): ?>
            <p class="text-left more"><i class="fas fa-info-circle"></i> Il n'y à pas d'infomation sur les joueurs de cette équipe pour l'instant !</p>
        <?php else: ?>
        <table class="table-list">
            <tbody>
            <?php foreach ($players as $value): ?>
            <tr>
                <td>
                    <span class="player-number"><?php echo '#' . $value['numero']; ?></span>
                    <img class="player-country" src="<?php echo RACINE_IMG_UPLOADS . 'nationalites/' . $value['image']; ?>">
                    <span class="player-name"><?php echo strtoupper($value['nom']) . ' ' . ucfirst($value['prenom']); ?></span>
                </td>
                <td>
                    <?php echo $value['ville'] . ', ' . $value['nationality']; ?>
                </td>
                <td>
                    <?php echo $value['position']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <h2 class="text-left player-title">Le Staff Techniques</h2>
        <span class="player-border"></span>
        <?php if(count($staffs) <= 0): ?>
            <p class="text-left more"><i class="fas fa-info-circle"></i> Il n'y à pas d'infomation sur le Staff Techniques de cette équipe pour l'instant !</p>
        <?php else: ?>
        <table class="table-list">
            <tbody>
            <?php foreach ($staffs as $value): ?>
            <tr>
                <td>
                    <span class="player-number"><?php echo '#00'; ?></span>
                    <img class="player-country" src="<?php echo RACINE_IMG_UPLOADS . 'nationalites/' . $value['image']; ?>">
                    <span class="player-name"><?php echo strtoupper($value['nom']) . ' ' . ucfirst($value['prenom']); ?></span>
                </td>
                <td>
                    <?php echo $value['nationality']; ?>
                </td>
                <td>
                    <?php echo $value['position']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

</section>

