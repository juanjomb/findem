<?php echo $this->Form->create('Level'); ?>
<div class="container content">
    <h2 class="formHeader">Edit Level</h2>
    <div class="form-group">
        <?php
        echo $this->Form->input('title', array(
            'type' => 'text',
            'class' => 'col-xs-12 col-md-12 form-control',
            'div' => 'col-xs-12 col-md-6'
        ));
        $options = array(
            'label' => 'Save Level',
            'class' => 'btn btn-default send',
            'div'=>'col-xs-12 col-md-12'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>