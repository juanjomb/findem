<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data')); ?>
<div class="container content">
    <h2 class="formHeader">Editar usuario</h2>
    <div class="form-group">
        <?php
        echo $this->Form->hidden('id');
        echo $this->Form->input('username', array(
            'label' => 'Username',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-2'
        )); 
       
        echo $this->Form->input('name', array(
            'label' => 'Nombre',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-2'));

        echo $this->Form->input('surname1', array(
            'label' => 'Primer apellido',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-2'
        ));
        echo $this->Form->input('surname2', array(
            'label' => 'Segundo apellido',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-2'
        ));
        echo $this->Form->input('category_id', array(
            'label' => 'Categoría',
            'options' => $categories,
            'empty' => '(Selecciona una categoría)',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-4'
        ));
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <?php
        echo $this->Form->input('Skill.Skill', array(
            'label'=>'Habilidades',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-2'
        ));
        echo $this->Form->input('Language.Language', array(
            'label'=>'Idiomas',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-2'
        ));
        echo $this->Form->input('description', array(
            'label'=>'Descripción',
            'rows' => '3',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-5'
        ));
        echo $this->Form->input("birthdate", array(
             'label' => "Fecha de nacimiento : ",
             'type' => 'text',
             'error' => false ,
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-3',
             'id' => 'datepicker'));
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <?php
        echo $this->Form->input('email', array(
            'label' => 'Email',
            'class' => 'col-xs-12 col-md-12 form-control js-required js-email',
            'div' => 'col-xs-12 col-md-4'));
        echo $this->Form->input('phone', array(
            'label' => 'Teléfono',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-4'));
        echo $this->Form->hidden('image');
        echo $this->Form->input('upload', array(
            'label' => 'Subir imagen',
            'type' => 'file',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-4'));
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <?php
        echo $this->Form->input('region_id', array(
            'label' => 'Comunidad',
            'options' => $regions,
            'empty' => '(Selecciona tu comunidad)',
            'class' => 'js-region col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-4'
        ));
        echo $this->Form->input('province_id', array(
            'label' => 'Provincia',
            'empty' => '(Selecciona tu provincia)',
            'class' => 'js-province col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-4'
        ));

        echo $this->Form->input('city_id', array(
            'label' => 'Ciudad',
            'empty' => '(Selecciona tu ciudad)',
            'class' => 'js-city col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-4'
        ));

        $options = array(
            'label' => 'Guardar usuario',
            'class' => 'btn btn-default send',
            'div'=>'col-xs-12 col-md-12'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>