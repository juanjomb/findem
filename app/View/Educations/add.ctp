<?php echo $this->Form->create('Education'); ?>
<div class="container content">
    <h2 class="formHeader">Añadir formación</h2>
    <div class="form-group">
        <?php
        echo $this->Form->hidden('user_id',array('value'=>$user_id));
        echo $this->Form->input('title', array('class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-12'
        ));
        echo $this->Form->input('description', array('rows' => '3',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-12'
        ));
        echo $this->Form->input('start_date', array(
            'type' => 'select',
            'options' => $years,
            'class' => 'col-xs-12 col-md-12 form-control js-startdate js-required',
            'div' => 'col-xs-12 col-md-6'
        ));
        echo $this->Form->input('end_date', array(
            'type' => 'select',
            'class' => 'col-xs-12 col-md-12 form-control js-enddate js-required',
            'div' => 'col-xs-12 col-md-6 '
        ));
        $options = array(
            'label' => 'Save Education',
            'class' => 'btn btn-default send',
            'div'=>false
        );
        
        ?>
    
</div>
     
          <?php
          echo $this->Form->end($options);
          ?>
</div>