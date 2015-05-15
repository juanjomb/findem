<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>



<div class="container">
    <div class="dataBlock row view-feedback">
        <h2><?php echo $feedback['Feedback']['email']; ?></h2>
        <p><?php echo $feedback['Feedback']['created']; ?></p>
        <p><?php echo $feedback['Feedback']['message']; ?></p>
        <button type="button" class="reply-feedback-btn js-reply-feedback">
            <i class="fa fa-reply"></i> Responder
        </button>
        <div class="reply-feedback" style="display: none;">
             <?php echo $this->Form->create('Response') ?>

            <?php
            echo $this->Form->hidden('email', array('value' => $feedback['Feedback']['email']));

            echo $this->Form->input('message', array('rows' => '3',
                'class' => 'col-xs-12 col-md-12 feedbackTextarea js-required',
                'div' => 'col-xs-12 col-md-12',
                'label'=> false
            ));

            $options = array(
                'label' => 'Enviar respuesta',
                'class' => 'reply-feedback-btn js-send-reply',
                'div' => false
            );
            echo $this->Form->end($options);
            ?>
        </div> 
    </div>

</div>