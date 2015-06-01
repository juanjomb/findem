<?php echo $this->Form->create('Comment'); ?>
<div class="container content">
    <h2 class="formHeader">Crear Comentario</h2>
    <div class="form-group">
        <?php
        echo $this->Form->hidden('post_id',array('value'=> $post_id));
         echo $this->Form->input('comment', array('rows' => '3',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-12'
        ));
        $options = array(
            'label' => 'Guardar comentario',
            'class' => 'btn btn-default',
            'div'=>false
        );
        
        ?>
    
</div>
     
          <?php
          echo $this->Form->end($options);
          ?>
        
</div>