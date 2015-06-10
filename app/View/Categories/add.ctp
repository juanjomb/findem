<?php echo $this->Form->create('Category'); ?>
<div class="container content">
    <h2 class="formHeader">Añadir Categoría</h2>
    <div class="form-group">
        <?php
        echo $this->Form->input('title', array(
            'label' => 'Título',
            'type' => 'text',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-6'
        ));
        $options = array(
            'label' => 'Guardar categoría',
            'class' => 'btn btn-default send',
            'div'=>'col-xs-12 col-md-12'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>