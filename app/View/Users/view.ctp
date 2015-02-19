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
    <div class="educationData row">
        <div class="col-xs-12 col-md-8">
             <h3>Education</h3>
        </div>
        <div class="col-xs-12 col-md-4">
             <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#educationModal">
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



<!-- Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="Add Education" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add education</h4>
      </div>
      
        <?php echo $this->Form->create('Education')?>
    
    <div class="form-group">
        <?php
        echo $this->Form->hidden('user_id',array('value'=>$user['User']['id']));
        echo $this->Form->input('title', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-12'
        ));
        echo $this->Form->input('description', array('rows' => '3',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-12'
        ));
        $options = array(
            'label' => 'Save Education',
            'class' => 'btn btn-default saveEducation',
            'div'=>false
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


