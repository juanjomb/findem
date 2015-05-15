<div class="dataBlock firstelement">
    <h2>Contacta con nosotros</h2>
    <p>¿Alguna duda, queja o sugerencia? No dudes en contactar con nosotros, el equipo de Findem estará encantado de atenderte y ayudarte en lo que necesites.</p>
 <?php echo $this->Form->create(null,array(
    'url' => array('controller' => 'feedbacks', 'action' => 'add')
)); 
        echo $this->Form->input('email',array(
            'label' => false,
            'type' => 'mail',
            'class'=>'feedbackInput js-required js-email',
            'placeholder'=>"Tu email"
            
        ));
        echo $this->Form->input('message',array(
            'label' => false,
            'type' => 'textarea',
            'rows' => '8',
            'cols' => '8',
            'class'=>'feedbackTextarea js-required',
            'placeholder'=>"Escribe aquí tu mensaje"
            
        ));
         $options = array('label' => 'Enviar','class'=>'feedbackBtn');
    ?>
<?php echo $this->Form->end($options); ?>
</div>