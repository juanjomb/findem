<?php echo $this->Form->create('Education'); ?>
<div class="container content">
    <h2 class="formHeader">Edit Education</h2>
    <div class="form-group">
        <?php
        echo $this->Form->hidden('user_id',array('value'=>$education['User']['id']));
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
            'class' => 'btn btn-default',
            'div'=>false
        );
        
        ?>
    
</div>
     
      <div class="modal-footer">
          <?php
          echo $this->Form->end($options);
          ?>
        ?>
    </div>
</div>