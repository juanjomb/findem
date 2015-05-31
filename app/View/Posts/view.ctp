<?php ?>
<div class="single-post-container">
   <div class="blog-header"><?php echo $post['Post']['title']; ?></div>
        <div class="single-post-data"><?php echo 'Escrito por '.$post['User']['username'].' el '.date('d-m-Y H:i:s',strtotime($post['Post']['created'])); ?></div>
        <div class="single-post-body"><?php echo $post['Post']['post']; ?></div>
</div>
<div class="post-author">
    <h2>Autor</h2>
     <img class="post-author-image img-rounded" src="/img/uploads/users/<?php echo $post['User']['image'] ?>" alt="imagen usuario">
     <div class="post-author-name"><?php echo $post['User']['name'].' '.$post['User']['surname1']; ?></div>
                <?php echo $this->Html->link('<i class="fa fa-eye fa-2x post-author-viewprofile" title="Ver perfil"></i>', array('controller' => 'users', 'action' => 'view',$post['User']['id']), array('escape' => false));?>
</div>



