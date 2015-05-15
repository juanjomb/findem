<div class="dataBlock firstelement">
    <h2>Enviar mensaje a <?php echo $user['User']['name'].' '.$user['User']['surname1'];?></h2>
 <?php 
    echo $this->Form->create('SentMessage',array(
        'url' => array('controller' => 'users', 'action' => 'send_message')
    )); 
    echo $this->Form->hidden('to_id',array('value'=> $user['User']['id']));
    echo $this->Form->hidden('from_id',array('value'=> $this->Session->read('Auth.User.id')));
    echo $this->Form->input('subject',array(
            'label' => false,
            'type' => 'mail',
            'class'=>'feedbackInput js-required',
            'placeholder'=>"Asunto"
            
        ));
    echo $this->Form->input('body',array(
        'label' => false,
        'type' => 'textarea',
        'rows' => '8',
        'cols' => '8',
        'class'=>'feedbackTextarea js-required',
        'placeholder'=>"Escribe aquí tu mensaje"

    ));
    $options = array('label' => 'Enviar','class'=>'feedbackBtn');
    echo $this->Form->end($options); ?>
</div>