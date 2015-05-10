<?php 
$Model = ClassRegistry::init('User');
$Model->recursive = 1;
$conditions = array('User.role' => 'user');
$order = array('User.views' => 'desc');
$limit=3;
$professionals=$Model->find('all',compact('conditions','order', 'limit'));
?>
<h3>Estos son los profesionales más populares</h3>
<div class="users-most-viewed row">
    <?php
   foreach ($professionals as $user){ 
       ?>
<div class="user-result-block col-md-3 col-xs-11" data="<?php echo $user['User']['id']; ?>">
    <?php if(!empty($user['User']['image'])){ 
               echo $this->Html->image('/img/uploads/users/'.$user['User']['image'], array('alt' => 'User image','class'=>'user-result-image'));
                } ?>
                <p class="user-result-data-title"><?php echo $user['User']['name'].' '.$user['User']['surname1']; ?></p>
                <p class="user-result-data-category"><?php echo $user['Category']['title']; ?></p>
                <p class="user-result-data-description"><?php echo $user['User']['description']; ?></p>
                <p class="user-result-data-location"><?php echo $user['City']['municipio']; ?></p>
                <?php echo $this->Html->link('<i class="fa fa-eye fa-2x user-result-viewprofile"></i>', array('controller' => 'users', 'action' => 'view',$user['User']['id']), array('escape' => false));?>
</div>
    <?php
} ?>
</div>