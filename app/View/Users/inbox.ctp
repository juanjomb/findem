<?php  //echo '<pre>';print_r($sent);die();?>

<div class="inbox-container">
    
    <div class="inbox-messages">
        <ul class="inbox-tabs">
            <li class="inbox-single-tab active js-sent-tab"><i class="fa fa-arrow-up"></i> Enviados</li>
            <li class="inbox-single-tab js-received-tab"><i class="fa fa-arrow-down"></i> Recibidos</li>
        </ul>
        <ul class="ul-messages">
        <?php if(!empty($sent)){ ?>
        
            <?php foreach($sent as $message){
                $d = new DateTime($message['SentMessage']['created']);?>
            <li class="single-Message js-single-sent" data-id="<?php echo $message['SentMessage']['id'];?>">
                <?php if(!empty($message['To']['image'])){ 
               echo $this->Html->image('/img/uploads/users/'.$message['To']['image'], array('alt' => 'User image','class'=>'inbox-bar-userImage'));
                } ?>
                <p class="inbox-bar-User"><?php echo $d->format( 'd/m' ).' - '.$message['To']['name'];?></p>
                <p class="inbox-bar-Subject"><?php echo $message['SentMessage']['subject'];?></p>
            </li>
            
        <?php } }?>
            <?php if(!empty($received)){  ?>
            <?php foreach($received as $message){
                $d = new DateTime($message['SentMessage']['created']);?>
            <li class="single-Message js-single-received hidden" data-id="<?php echo $message['SentMessage']['id'];?>">
                <?php if(!empty($message['From']['image'])){ 
               echo $this->Html->image('/img/uploads/users/'.$message['From']['image'], array('alt' => 'User image','class'=>'inbox-bar-userImage'));
                } ?>
                <p class="inbox-bar-User"><?php echo $d->format( 'd/m' ).' - '.$message['From']['name'];?></p>
                <p class="inbox-bar-Subject"><?php echo $message['SentMessage']['subject'];?></p>
            </li>
            
            <?php }} ?>
        </ul>
    </div>
    <div class=" inbox-body js-msgbodycontainer">
        <?php echo $this->element('bodymessage'); ?>
    </div>
       
</div>
