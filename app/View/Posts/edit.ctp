<?php echo $this->Form->create('Post'); ?>
<div class="container content">
    <h2 class="formHeader">Editar post</h2>
    <div class="form-group">
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array(
            'type' => 'text',
            'class' => 'col-xs-12 col-md-6 form-control js-required',
            'div' => 'col-xs-12 col-md-12'
        ));
        echo $this->Form->input('post', array(
            'type' => 'textarea',
            'id'=>  'post',
            'rows' => '8',
            'cols' => '8',
            'class' => 'col-xs-12 col-md-12 form-control js-required',
            'div' => 'col-xs-12 col-md-12'
        ));
        
        $options = array(
            'label' => 'Guardar post',
            'class' => 'btn btn-default send',
            'div'=>'col-xs-12 col-md-12'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'post',{
                    uiColor: '#276169'
                } );
            </script>