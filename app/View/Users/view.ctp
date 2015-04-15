<div class="profileContainer container">
    <div class="dataBlock row">
        <div class="col-xs-12 col-md-4">
            <?php if (!empty($user['User']['image'])) { ?>
                <img class="profileImg img-rounded" src="/img/uploads/users/<?php echo $user['User']['image'] ?>" alt="imagen usuario">
            <?php } else { ?>
                <img class="profileImg img-rounded" src="/img/placeholder-user.jpg" alt="imagen usuario">
            <?php } ?>
        </div>
        <div class="col-xs-12 col-md-8">
            <h2><?php echo h($user['User']['name']) . " " . h($user['User']['surname1']) . " " . h($user['User']['surname2']); ?></h2>
            <p><?php echo h($user['User']['description']); ?></p>
            <p><?php echo h($user['User']['phone']); ?></p>
            <p><?php echo h($user['User']['email']); ?></p>
        </div>
    </div>
    <div class="dataBlock row">
        <div class="col-xs-12 col-md-8">
            <h3>Education</h3>
        </div>
        <div class="col-xs-12 col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary addAjax" data-toggle="modal" data-target="#educationModal">
                <i class="fa fa-plus"></i> Add education
            </button>
        </div>
        <?php
        foreach ($educations as $education) {
            ?>
            <div class="singleEducation col-xs-12 col-md-12">
                <p><?php print $education['Education']['title']; ?></p>
                <p><?php print $education['Education']['description']; ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="dataBlock row">
        <div class="col-xs-12 col-md-8">
            <h3>Experience</h3>
        </div>
        <div class="col-xs-12 col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary addAjax" data-toggle="modal" data-target="#experienceModal">
                <i class="fa fa-plus"></i> Add experience
            </button>
        </div>
        <?php
        foreach ($experiences as $experience) {
            ?>
            <div class="singleExperience col-xs-12 col-md-12">
                <p><?php echo $experience['Experience']['title']; ?></p>
                <p><?php echo $experience['Experience']['company'] . ' ' . $experience['Experience']['start_date'] . ' - ' . $experience['Experience']['end_date']; ?></p>
                <p><?php echo $experience['Experience']['description']; ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="dataBlock row js-skills-block">
        <h3>Skills</h3><i class="fa fa-plus addSkill js-add-skill"></i>
        <?php
        foreach ($userskills as $skill) {
            ?>
            <p class="skillPill" data="<?php print $skill['Skill']['id']?>"><?php print $skill['Skill']['title']; 
            if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
                <span class="fa fa-trash js-removeSkill"></span>
         <?php   }
?> </p>
        <?php } ?>


    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="Add Education" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add education</h4>
            </div>

            <?php echo $this->Form->create('Education') ?>

            <div class="form-group">
                <?php
                echo $this->Form->hidden('user_id', array('value' => $user['User']['id']));
                echo $this->Form->input('title', array('class' => 'col-xs-12 col-md-12 form-control',
                    'div' => 'col-xs-12 col-md-12'
                ));
                echo $this->Form->input('description', array('rows' => '3',
                    'class' => 'col-xs-12 col-md-12 form-control',
                    'div' => 'col-xs-12 col-md-12'
                ));
                echo $this->Form->input('start_date', array(
                    'type' => 'select',
                    'options' => $years,
                    'class' => 'col-xs-12 col-md-12 form-control js-startdate',
                    'div' => 'col-xs-12 col-md-6'
                ));
                echo $this->Form->input('end_date', array(
                    'type' => 'select',
                    'class' => 'col-xs-12 col-md-12 form-control js-enddate',
                    'div' => 'col-xs-12 col-md-6 '
                ));
                $options = array(
                    'label' => 'Save Education',
                    'class' => 'btn btn-default saveEducation',
                    'div' => false
                );
                ?>

            </div>

            <div class="modal-footer">
<?php
echo $this->Form->end($options);
?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="experienceModal" tabindex="-1" role="dialog" aria-labelledby="Add Experience" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add education</h4>
            </div>

<?php echo $this->Form->create('Experience') ?>

            <div class="form-group">
<?php
echo $this->Form->hidden('user_id', array('value' => $user['User']['id']));
echo $this->Form->input('title', array('class' => 'col-xs-12 col-md-12 form-control',
    'div' => 'col-xs-12 col-md-12'
));
echo $this->Form->input('company', array('rows' => '3',
    'class' => 'col-xs-12 col-md-12 form-control',
    'div' => 'col-xs-12 col-md-12'
));
echo $this->Form->input('description', array('rows' => '3',
    'class' => 'col-xs-12 col-md-12 form-control',
    'div' => 'col-xs-12 col-md-12'
));
echo $this->Form->input('start_date', array(
    'type' => 'select',
    'options' => $years,
    'class' => 'col-xs-12 col-md-12 form-control js-startdate',
    'div' => 'col-xs-12 col-md-6'
));
echo $this->Form->input('end_date', array(
    'type' => 'select',
    'class' => 'col-xs-12 col-md-12 form-control js-enddate',
    'div' => 'col-xs-12 col-md-6 '
));
$options = array(
    'label' => 'Save Experience',
    'class' => 'btn btn-default saveExperience',
    'div' => false
);
?>

            </div>

            <div class="modal-footer">
<?php
echo $this->Form->end($options);
?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
