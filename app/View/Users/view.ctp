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
            <p class="profile-category"><?php echo h($user['Category']['title']); ?></p>
            <p class="profile-data"><?php echo h($user['User']['description']); ?></p>
            <p class="profile-data"><?php echo h($user['User']['phone']); ?></p>
            <p class="profile-data"><?php echo h($user['User']['email']); ?></p>
            <p class="profile-data js-location" data-latitude="<?php echo h($user['City']['latitud']); ?>" data-longitude="<?php echo h($user['City']['longitud']); ?>"><i class="fa fa-map-marker"></i><?php echo ' '.h($user['City']['municipio']); ?></p>
            <p class="profile-data"><?php echo h($user['Province']['province']); ?></p>
            <p class="profile-data"><?php echo h($user['Region']['comunidad']); ?></p>
        </div>
    </div>
    <?php if($user['User']['role']=='user'){ ?>
    <div class="dataBlock educationData row">
        <div class="col-xs-12 col-md-8">
            <h3>Formación</h3>
        </div>
        <?php  if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
        <div class="col-xs-12 col-md-4">
            <button type="button" class="profileadd js-add-education">
                <i class="fa fa-institution"></i> Añadir formación
            </button>
        </div>
        <?php  } ?>
        <?php
        foreach ($educations as $education) {
            ?>
            <div class="singleEducation col-xs-12 col-md-12">
                <p><?php print $education['Education']['title']; ?></p>
                <p><?php print $education['Education']['description'] . ' ' . $education['Education']['start_date'] . ' - ' . $education['Education']['end_date']; ; ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="dataBlock experienceData row">
        <div class="col-xs-12 col-md-8">
            <h3>Experiencia</h3>
        </div>
        <?php  if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
        <div class="col-xs-12 col-md-4">
            <button type="button" class="profileadd js-add-experience">
                <i class="fa fa-briefcase"></i> Añadir experiencia
            </button>
        </div>
        <?php  } ?>
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
    <div class="dataBlock row">
        <div class="col-xs-12 col-md-8">
            <h3>Habilidades</h3>
        </div>
           <?php  if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
            <div class="col-xs-12 col-md-4">
            <button type="button" class="profileadd js-add-skill">
                <i class="fa fa-cubes"></i> Añadir habilidad
            </button>
        </div>
            <?php } ?>
        <div class="col-md-12 js-skills-block">
        <?php
        
        foreach ($userskills as $skill) {
            ?>
            <p class="skillPill" data="<?php print $skill['Skill']['id']?>"><?php print $skill['Skill']['title'].'   '; 
            if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
                <span class="fa fa-trash js-removeSkill"></span>
         <?php   }
?> </p>
        <?php } ?>

</div>
    </div>
        <div class="dataBlock row">
        <div class="col-xs-12 col-md-8">
            <h3>Idiomas</h3>
        </div>
           <?php  if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
            <div class="col-xs-12 col-md-4">
            <button type="button" class="profileadd js-add-language">
                <i class="fa fa-language"></i> Añadir Idioma
            </button>
        </div>
            <?php } ?>
        <div class="col-md-12 js-languages-block">
        <?php
        
        foreach ($userlanguages as $languages) {
            ?>
            <p class="skillPill" data="<?php print $languages['Language']['id']?>"><?php print $languages['Language']['title'].'   '; 
            if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
                <span class="fa fa-trash js-removeLanguage"></span>
         <?php   }
?> </p>
        <?php } ?>

</div>
    </div>
    <?php } ?>
</div>



<div class="popupBg">  
        <div class="popup js-popup-add-education">
            <i class="fa fa-close closePopup"></i>
            <h3>Añadir educación</h3>
            <div class="form-group">
                <?php
                echo $this->Form->hidden('user_id', array('value' => $user['User']['id'],'class'=>'js-educationuser'));
                echo $this->Form->input('title', array('class' => 'col-xs-12 col-md-12 form-control js-educationtitle',
                    'div' => 'col-xs-12 col-md-12'
                ));
                echo $this->Form->input('description', array('rows' => '3',
                    'class' => 'col-xs-12 col-md-12 form-control js-educationdescription',
                    'div' => 'col-xs-12 col-md-12'
                ));
                echo $this->Form->input('start_date', array(
                    'type' => 'select',
                    'options' => $years,
                    'class' => 'col-xs-12 col-md-12 form-control js-startdate js-educationstart',
                    'div' => 'col-xs-12 col-md-6'
                ));
                echo $this->Form->input('end_date', array(
                    'type' => 'select',
                    'class' => 'col-xs-12 col-md-12 form-control js-enddate js-educationend',
                    'div' => 'col-xs-12 col-md-6 '
                ));
                echo '<div class="col-xs-4 col-md-8 "></div>';
                $options = array(
                    'label' => 'Save Education',
                    'class' => 'btn btn-default col-xs-8 col-md-4 saveEducation',
                    'div' => false
                );
                echo $this->Form->end($options);
                ?>

            </div>
        </div>
    </div> 
<div class="popupBg">  
        <div class="popup js-popup-add-experience">
            <i class="fa fa-close closePopup"></i>
            <h3>Añadir experiencia</h3>
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
echo '<div class="col-xs-4 col-md-8 "></div>';
$options = array(
    'label' => 'Save Experience',
    'class' => 'btn btn-default col-xs-8 col-md-4 saveExperience',
    'div' => false
);
echo $this->Form->end($options);
?>

            </div>


            </div>
        </div>
    </div> 
    
    <div class="popupBg">  
        <div class="popup js-popup-view-map">
            <i class="fa fa-close closePopup"></i>

            <div class="user-map" id="mapuser"></div>


            </div>
        </div>
    </div> 
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<?php echo $this->Html->script('mapview', array('inline' => false));?>