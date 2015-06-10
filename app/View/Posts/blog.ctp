<?php $paginator = $this->Paginator;?>
<div class="posts-container">
    <div class="dataBlock firstelement">
    <h2 class="blog-header">Blog de Findem</h2>
    <p class="blog-header-description">Aquí iremos publicando todas las noticias sobre findem o sobre tendencias del sector que creamos que os puedan resultar interesantes.</p>
   </div>
    <div class="single-post-wrapper">
 <?php foreach ($posts as $post){?>
    <div class="single-post">
        <div class="post-title"><?php echo $post['Post']['title']; ?></div>
        <div class="post-data"><?php echo 'Escrito por '.$post['User']['username'].' el '.date('d-m-Y H:i:s',strtotime($post['Post']['created'])); ?><span class="comment-count"><span class="fa fa-comment"></span><?php echo ' '.count($post['Comment']).' Comentarios'; ?></span></div>
        <div class="post-body"><?php echo substr($post['Post']['post'], 0, 250).'...'; ?></div>
         <?php echo $this->Html->link('Leer post', array('controller' => 'posts', 'action' => 'view', $post['Post']['slug']),array('class'=>'post-view-link'));
                        ?>
    </div>
    <?php }?>
    </div>
    
    
</div>
<div class="most-viewed-posts">
        <h3>Posts más leídos</h3>
        
        <?php
        $count=1;
        foreach ($mostviewed as $most){?>
    <div class="most-viewed-item">
        <?php echo $count.'. '.$this->Html->link($most['Post']['title'], array('controller' => 'posts', 'action' => 'view', $most['Post']['slug']),array('class'=>'post-view-link'));
                        ?>
    </div>
    <?php $count++; }?>
    </div>
        
    <div class='paging'>
 
        <?php echo $paginator->first("Primera");
         
        
        if($paginator->hasPrev()){
            echo $paginator->prev("Anterior");
        }
         
        echo $paginator->numbers(array('modulus' => 2));
         
        if($paginator->hasNext()){
            echo $paginator->next("Siguiente");
        }
        echo $paginator->last("Última");?>
     
    </div>     


