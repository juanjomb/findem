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
            <p class="profile-data js-location" data-latitude="<?php echo h($user['City']['latitud']); ?>" data-longitude="<?php echo h($user['City']['longitud']); ?>"><span class="fa fa-map-marker"></span><?php echo ' '.h($user['City']['municipio']); ?></p>
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
                <p aria-label="<?php print $education['Education']['id']; ?>"><?php print $education['Education']['title']; ?><?php  if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
                <span class="fa fa-trash js-removeEducation"></span>
         <?php   }
?> </p> 
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
                <p aria-label="<?php echo $experience['Experience']['id']; ?>"><?php echo $experience['Experience']['title']; ?><?php if($user['User']['id']==$this->Session->read('Auth.User.id')){ ?>
                <span class="fa fa-trash js-removeExperience"></span>
         <?php   } ?></p>  
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
            <p class="skillPill" aria-label="<?php print $skill['Skill']['id']?>"><?php print $skill['Skill']['title'].'   '; 
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
                <span class="fa fa-language"></span> Añadir Idioma
            </button>
        </div>
            <?php } ?>
        <div class="col-md-12 js-languages-block">
        <?php
        
        foreach ($userlanguages as $languages) {
            ?>
            <p class="skillPill" aria-label="<?php print $languages['Language']['id']?>"><?php print $languages['Language']['title'].'   '; 
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
            <span class="fa fa-close closePopup"></span>
            <h3>Añadir formación</h3>
            <?php echo $this->Form->create('Education') ?>
                <?php
                echo $this->Form->hidden('user_id', array('value' => $user['User']['id'],'class'=>'js-educationuser'));
                echo $this->Form->input('title', array(
                    'label'=>'Título',
                    'class' => 'col-xs-12 col-md-12 form-control js-educationtitle js-required',
                    'div' => 'col-xs-12 col-md-12'
                ));
                echo $this->Form->input('description', array(
                    'label'=>'Descripción',
                    'rows' => '3',
                    'class' => 'col-xs-12 col-md-12 form-control js-educationdescription js-required',
                    'div' => 'col-xs-12 col-md-12'
                ));
                echo $this->Form->input('start_date', array(
                    'label'=>'Fecha inicio',
                    'type' => 'select',
                    'empty'=>'Selecciona una fecha de inicio',
                    'options' => $years,
                    'class' => 'col-xs-12 col-md-12 form-control js-startdate js-educationstart js-required',
                    'div' => 'col-xs-12 col-md-6'
                ));
                echo $this->Form->input('end_date', array(
                    'label'=>'Fecha fin',
                    'type' => 'select',
                    'empty'=>'Selecciona una fecha de fin',
                    'class' => 'col-xs-12 col-md-12 form-control js-enddate js-educationend js-required',
                    'div' => 'col-xs-12 col-md-6 '
                ));
                echo '<div class="col-xs-4 col-md-8 "></div>';
                echo '<p class="error-message"></p>';
                $options = array(
                    'label' => 'Guardar formación',
                    'class' => 'btn btn-default col-xs-8 col-md-4 profileadd saveEducation',
                    'div' => false
                );
                echo $this->Form->end($options);
                ?>
        </div>
    </div> 
<div class="popupBg">  
        <div class="popup js-popup-add-experience">
            <span class="fa fa-close closePopup"></span>
            <h3>Añadir experiencia</h3>
           <?php echo $this->Form->create('Experience') ?>

<?php
echo $this->Form->hidden('user_id', array('value' => $user['User']['id']));
echo $this->Form->input('title', array(
    'label'=>'Título',
    'class' => 'col-xs-12 col-md-12 form-control js-required',
    'div' => 'col-xs-12 col-md-12'
));
echo $this->Form->input('company', array(
    'label'=>'Empresa',
    'rows' => '3',
    'class' => 'col-xs-12 col-md-12 form-control js-required',
    'div' => 'col-xs-12 col-md-12'
));
echo $this->Form->input('description', array(
    'label'=>'Descripción',
    'rows' => '3',
    'class' => 'col-xs-12 col-md-12 form-control js-required',
    'div' => 'col-xs-12 col-md-12'
));
echo $this->Form->input('start_date', array(
    'label'=>'Fecha inicio',
    'type' => 'select',
    'options' => $years,
    'empty'=>'Selecciona una fecha de inicio',
    'class' => 'col-xs-12 col-md-12 form-control js-startdate js-required',
    'div' => 'col-xs-12 col-md-6'
));
echo $this->Form->input('end_date', array(
    'label'=>'Fecha fin',
    'type' => 'select',
    'empty'=>'Selecciona una fecha de fin',
    'class' => 'col-xs-12 col-md-12 form-control js-enddate js-required',
    'div' => 'col-xs-12 col-md-6 '
));
echo '<div class="col-xs-4 col-md-8 "></div>';
echo '<p class="error-message"></p>';
$options = array(
    'label' => 'Save Experience',
    'class' => 'btn btn-default col-xs-8 col-md-4  profileadd saveExperience',
    'div' => false
);
echo $this->Form->end($options);
?>



            </div>
        </div>
    </div> 
    
    <div class="popupBg">  
        <div class="popup js-popup-view-map">
            <span class="fa fa-close closePopup"></span>

            <div class="user-map" id="mapuser"></div>


            </div>
        </div>
    
    
<div class="popupBg">  
        <div class="popup js-popup-languages">
            <span class="fa fa-close closePopup"></span>
            <p class="popup-header">Búsqueda de idiomas</p>
            <form action="#" method="post">
            <label for="searchlanguage"> </label>
            <input id="searchlanguage" type="text" class="js-search-language">
            <input type="submit" value="submit" style="display:none;" />
            </form>
            <div class="js-optionLanguages"></div>
        </div>
    </div> 
    <div class="popupBg">  
        <div class="popup js-popup-skills">
            <span class="fa fa-close closePopup"></span>
            <p class="popup-header">Búsqueda de habilidad</p>
            <form action="#" method="post">
            <label for="searchskill"> </label>
            <input id="searchskill" type="text" class="js-search-skill">
            <input type="submit" value="submit" style="display:none;" />
            </form>
            <div class="js-optionSkills"></div>
        </div>
    </div> 
    
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script><div>
<?php
echo $this->Html->script('mapview', array('inline' => false));?>
