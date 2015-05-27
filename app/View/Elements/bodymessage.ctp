    <?php if(!empty($message)){ ?>
<p class="message-body-from">De: <?php echo $message['From']['name']; ?></p>
    <p class="message-body-to">Para: <?php echo $message['To']['name']; ?></p>
    <p class="message-body-subject">Asunto: <?php echo $message['SentMessage']['subject']; ?></p>
    <p class="message-body-body">Mensaje: <?php echo $message['SentMessage']['body']; ?></p>
    <?php if($message['From']['id']!= $this->Session->read('Auth.User.id')){ ?>
    <?php echo $this->Html->link('<i class="fa fa-paper-plane fa-2x user-send-response" title="Enviar respuesta"></i>', array('controller' => 'users', 'action' => 'send_message',$message['From']['id']), array('escape' => false));?>
    
    <?php }} ?>

