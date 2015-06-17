<?php echo $this->Form->create('Education'); ?>
<div class="container content">
    <h2 class="formHeader">Añadir formación</h2>
    <div class="form-group">
        <?php
        echo $this->Form->hidden('user_id',array('value'=>$user_id));
        echo $this->Form->input('title', array(
            'label' => 'Título',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-12'
        ));
        echo $this->Form->input('description', array(
            'label' => 'Descripción',
            'rows' => '3',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-12'
        ));
        echo $this->Form->input('start_date', array(
            'label' => 'Fecha inicio',
            'type' => 'select',
            'options' => $years,
            'class' => 'col-xs-12 col-md-12 form-control js-startdate js-required',
            'div' => 'col-xs-12 col-md-6'
        ));
        echo $this->Form->input('end_date', array(
            'label' => 'Fecha fin',
            'type' => 'select',
            'class' => 'col-xs-12 col-md-12 form-control js-enddate js-required',
            'div' => 'col-xs-12 col-md-6 '
        ));
        $options = array(
            'label' => 'Guardar formación',
            'class' => 'btn btn-default send',
            'div'=>false
        );
        
        ?>
    <div class="error-message"></div>
</div>
     
          <?php
          echo $this->Form->end($options);
          ?>
</div>