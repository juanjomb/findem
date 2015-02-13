<div class="profileContainer">
    <div class="personalData">
        <h1><?php echo h($user['User']['name']) . " " . h($user['User']['surname1']) . " " . h($user['User']['surname2']); ?></h1>
        <p><?php echo h($user['User']['description']); ?></p>
        <p><?php echo h($user['User']['phone']); ?></p>
        <p><?php echo h($user['User']['email']); ?></p>
    </div>
    <div class="educationData"></div>
    <div class="experienceData"></div>
    <div class="skillsData">
        <h3>Skills</h3>
        <?php
        foreach ($skills as $skill) {
            ?>
            <p><?php print $skill; ?></p>
        <?php } ?>


    </div>
</div>




