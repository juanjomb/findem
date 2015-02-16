<?php echo $this->Form->create('Language'); ?>
<div class="container content">
    <h2 class="formHeader">Add Language</h2>
    <div class="form-group">
        <?php
        echo $this->Form->input('title', array(
            'type' => 'text',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-6'
        ));
        echo $this->Form->input('level_id', array(
            'empty' => '(Selecciona tu nivel)',
            'options' => $levels,
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-6'
        ));
        $options = array(
            'label' => 'Save Language',
            'class' => 'btn btn-default send',
            'div'=>'col-xs-12 col-md-12'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>