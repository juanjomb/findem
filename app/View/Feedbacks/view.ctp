<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="popupBg">  
        <div class="popup js-popup-reply-feedback">
            <i class="fa fa-close closePopup"></i>
            <h3>Responder<h3>
             <?php echo $this->Form->create('Response') ?>

            <div class="form-group">
<?php
echo $this->Form->hidden('email', array('value' => $feedback['Feedback']['email']));

echo $this->Form->input('message', array('rows' => '3',
    'class' => 'col-xs-12 col-md-12 form-control',
    'div' => 'col-xs-12 col-md-12',
    'label'=> false
));

echo '<div class="col-xs-4 col-md-8 "></div>';
$options = array(
    'label' => 'Enviar respuesta',
    'class' => 'btn btn-default col-xs-8 col-md-4 js-send-reply',
    'div' => false
);
echo $this->Form->end($options);
?>
        </div>
    </div> 
    </div>
<div class="container">
    <div class="dataBlock row view-feedback">
        <h2><?php echo $feedback['Feedback']['email']; ?></h2>
        <p><?php echo $feedback['Feedback']['created']; ?></p>
        <p><?php echo $feedback['Feedback']['message']; ?></p>
        <div class="col-sm-3 col-xs-3"></div>
         <button type="button" class="profileadd js-reply-feedback">
                <i class="fa fa-reply"></i> Responder
            </button>
    </div>
        
</div>