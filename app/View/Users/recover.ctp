<div class="dataBlock firstelement">
    <?php if(!isset($id)){?>
    <h2>Recupera tus datos</h2>
    <p>Si has olvidado tus datos, introduce el email con el que te registraste en Findem y te enviaremos un mail con la información.</p>
 <?php echo $this->Form->create('User',array(
    'url' => array('controller' => 'users', 'action' => 'recover')
)); 
        echo $this->Form->input('email',array(
            'label' => false,
            'type' => 'mail',
            'class'=>'feedbackInput js-required js-email',
            'placeholder'=>"Tu email"
            
        ));
         $options = array('label' => 'Enviar','class'=>'feedbackBtn');
    ?>
<?php echo $this->Form->end($options); ?>
    <?php }else{?>
     <h2>Restablece tu contraseña</h2>
 <?php echo $this->Form->create('User',array(
    'url' => array('controller' => 'users', 'action' => 'recover')
)); echo $this->Form->hidden('id',array(
            'value' => $id
            
        ));
        echo $this->Form->input('password',array(
            'label' => false,
            'type' => 'password',
            'class'=>'feedbackInput js-required',
            'placeholder'=>"Tu nuevo password"
            
        ));
         $options = array('label' => 'Enviar','class'=>'feedbackBtn');
    ?>
<?php echo $this->Form->end($options); ?>
    <?php }?>
</div>