<?php
$nationality = 'nationalites/fr.png';
?>
<section id="teams">

    <h1>Classement Ligue 2018 - <?php echo date('Y'); ?></h1>
    <span class="equipes-border"></span>
   
    <?php if(count($classements) <= 0): ?>
        <p class="more text-center"><i class="fas fa-info-circle"></i> Il n'y à pas d'infomation sur le classement pour l'instant !</p>
    <?php else: ?>
    
        <?php if(count($classementsD1) > 0): ?>
        <div class="container">
        <h2 class="text-left">Championnat D1 Champion</h2>
        <span class="team-border"></span>
        <table class="table-list">
            <tbody>
            <?php foreach ($classementsD1 as $value): ?>
            <tr>
                <td>
                    <span class="player-number"><?php echo $value['ordre']; ?></span>
                    <img class="player-country" src="<?php echo RACINE_IMG_UPLOADS . $nationality; ?>">
                    <span class="player-name"><?php echo strtoupper($value['team']); ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php endif; ?>
        
        <?php if(count($classementsD1Challenger) > 0): ?>
        <div class="container">
        <h2 class="text-left">Championnat D1 Challenger</h2>
        <span class="team-border"></span>
        <table class="table-list">
            <tbody>
            <?php foreach ($classementsD1Challenger as $value): ?>
            <tr>
                <td>
                    <span class="player-number"><?php echo $value['ordre']; ?></span>
                    <img class="player-country" src="<?php echo RACINE_IMG_UPLOADS . $nationality; ?>">
                    <span class="player-name"><?php echo strtoupper($value['team']); ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php endif; ?>
        
        <?php if(count($classementsD2) > 0): ?>
        <div class="container">
        <h2 class="text-left">Championnat D2</h2>
        <span class="team-border"></span>
        <table class="table-list">
            <tbody>
            <?php foreach ($classementsD2 as $value): ?>
            <tr>
                <td>
                    <span class="player-number"><?php echo $value['ordre']; ?></span>
                    <img class="player-country" src="<?php echo RACINE_MAJ_IMG_UPLOADS . $nationality; ?>">
                    <span class="player-name"><?php echo strtoupper($value['team']); ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php endif; ?>
        
        <?php if(count($classementsD3) > 0): ?>
        <div class="container">
        <h2 class="text-left">Championnat D3</h2>
        <span class="team-border"></span>
        <table class="table-list">
            <tbody>
            <?php foreach ($classementsD3 as $value): ?>
            <tr>
                <td>
                    <span class="player-number"><?php echo $value['ordre']; ?></span>
                    <img class="player-country" src="<?php echo RACINE_MAJ_IMG_UPLOADS . $nationality; ?>">
                    <span class="player-name"><?php echo strtoupper($value['team']); ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php endif; ?>
        
        <?php if(count($classementsD4) > 0): ?>
        <div class="container">
        <h2 class="text-left">Championnat D4</h2>
        <span class="team-border"></span>
        <table class="table-list">
            <tbody>
            <?php foreach ($classementsD4 as $value): ?>
            <tr>
                <td>
                    <span class="player-number"><?php echo $value['ordre']; ?></span>
                    <img class="player-country" src="<?php echo RACINE_MAJ_IMG_UPLOADS . $nationality; ?>">
                    <span class="player-name"><?php echo strtoupper($value['team']); ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php endif; ?>
        
    <?php endif; ?>

</section>