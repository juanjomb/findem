<?php if(!isset($comments)){ 
   $comments=$post['Comment']; 
}
?>
<h3><?php echo count($comments);?> Comentarios</h3>

<?php if(isset($comments)){ ?>

    <ul>
    <?php   foreach ($comments as $comment){ 
        
        if(!empty($comment['User'])){
            $name=$this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view',$comment['User']['id']));
        }else{
            $name='Anónimo';
        }
        ?>
        <li class="single-comment">
            <div class="single-comment-data"><?php echo $name.' escribió el '.date('d-m-Y H:i:s',strtotime($comment['created'])).' : ';?></div>
            <div class="single-comment-comment"><?php echo $comment['comment'];?></div>
        </li>
    <?php } ?>
    </ul>
<?php } ?>
  <?php echo $this->Form->create('Comment') ?>

<?php
echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'),'class'=>'js-userid'));
echo $this->Form->hidden('post_id', array('value' => $post['Post']['id'],'class'=>'js-postid'));
echo $this->Form->input('comment', array('rows' => '3',
    'label'=>'Escribe tu comentario',
    'class' => 'col-xs-12 col-md-12 form-control js-required js-comment',
    'div' => 'col-xs-12 col-md-10'
));
echo '<p class="error-message"> </p>';
$options = array(
    'label' => 'Enviar comentario',
    'class' => 'btn btn-default col-xs-8 col-md-2 sendComment js-post-comment',
    'div' => false
);
echo $this->Form->end($options);
?>