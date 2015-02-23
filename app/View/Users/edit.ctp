<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data')); ?>
<div class="container content">
    <h2 class="formHeader">Edit User</h2>
    <div class="form-group">
        <?php
        
        echo $this->Form->input('username', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-3'
        )); 
       
        echo $this->Form->input('name', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-3'));

        echo $this->Form->input('surname1', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-3'
        ));
        echo $this->Form->input('surname2', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-3'
        ));
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <?php
        echo $this->Form->input('Skill.Skill', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-3'
        ));
        echo $this->Form->input('Language.Language', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-3'
        ));
        echo $this->Form->input('description', array('rows' => '3',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-6'
        ));
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <?php
        echo $this->Form->input('email', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-4'));
        echo $this->Form->input('phone', array('class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-4'));
        echo $this->Form->hidden('image');
        echo $this->Form->input('upload', array('type' => 'file',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-4'));
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <?php
        echo $this->Form->input('region_id', array(
            'options' => $regions,
            'empty' => '(Selecciona tu comunidad)',
            'class' => 'js-region col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-4'
        ));
        echo $this->Form->input('province_id', array(
            'empty' => '(Selecciona tu provincia)',
            'class' => 'js-province col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-4'
        ));

        echo $this->Form->input('city_id', array(
            'empty' => '(Selecciona tu ciudad)',
            'class' => 'js-city col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-4'
        ));

        $options = array(
            'label' => 'Save User',
            'class' => 'btn btn-default send',
            'div'=>'col-xs-12 col-md-12'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>