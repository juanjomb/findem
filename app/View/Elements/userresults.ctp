<?php
if(!empty($users)){
   foreach ($users as $user){ 
       ?>
<div class="user-result-block col-md-5 col-xs-10" data="<?php echo $user['User']['id']; ?>">
    <?php if(!empty($user['User']['image'])){ 
               echo $this->Html->image('/img/uploads/users/'.$user['User']['image'], array('alt' => 'User image','class'=>'user-result-image'));
                } ?>
                <p class="user-result-data-title"><?php echo $user['User']['name'].' '.$user['User']['surname1']; ?></p>
                <p class="user-result-data-category"><?php echo $user['Category']['title']; ?></p>
                <p class="user-result-data-description"><?php echo $user['User']['description']; ?></p>
                <p class="user-result-data-location"><?php echo $user['City']['municipio']; ?></p>
                <span class="fa fa-bookmark fa-2x user-result-bookmark js-bookmark" title="Añadir a candidatos"></span>
                <?php echo $this->Html->link('<span class="fa fa-eye fa-2x user-result-viewprofile" title="Ver perfil"></span>', array('controller' => 'users', 'action' => 'view',$user['User']['id']), array('escape' => false));?>
</div>
    <?php
} 
}else{ ?>
       <h3>Lo sentimos, ningún usuario coincide con los criterios introducidos</h3>
<?php }

?>