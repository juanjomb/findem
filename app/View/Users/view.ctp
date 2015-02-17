<div class="profileContainer container">
    <div class="personalData row">
        <div class="col-xs-12 col-md-4">
            <img class="profileImg img-rounded" src="/findem/img/uploads/users/<?php echo $user['User']['image'] ?>" alt="imagen usuario">
        </div>
        <div class="col-xs-12 col-md-8">
        <h2><?php echo h($user['User']['name']) . " " . h($user['User']['surname1']) . " " . h($user['User']['surname2']); ?></h2>
        <p><?php echo h($user['User']['description']); ?></p>
        <p><?php echo h($user['User']['phone']); ?></p>
        <p><?php echo h($user['User']['email']); ?></p>
        </div>
    </div>
    <div class="educationData row"></div>
    <div class="experienceData row"></div>
    <div class="skillsData row">
        <h3>Skills</h3>
        <?php
        foreach ($skills as $skill) {
            ?>
            <p class="skillPill"><?php print $skill; ?></p>
        <?php } ?>


    </div>
</div>




