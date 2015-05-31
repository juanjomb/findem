<?php $paginator = $this->Paginator;?>
<div class="posts-container">
    <div class="dataBlock firstelement">
    <h2 class="blog-header">Blog de Findem</h2>
    <p class="blog-header-description">Aquí iremos publicando todas las noticias sobre findem o sobre tendencias del sector que creamos que os puedan resultar interesantes.</p>
   </div>
 <?php foreach ($posts as $post){?>
    <div class="single-post">
        <div class="post-title"><?php echo $post['Post']['title']; ?></div>
        <div class="post-data"><?php echo 'Escrito por '.$post['User']['username'].' el '.date('d-m-Y H:i:s',strtotime($post['Post']['created'])); ?></div>
        <div class="post-body"><?php echo substr($post['Post']['post'], 0, 250).'...'; ?></div>
         <?php echo $this->Html->link('Leer post', array('controller' => 'posts', 'action' => 'view', $post['Post']['slug']),array('class'=>'post-view-link'));
                        ?>
    </div>
    <?php }?>
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

    </div>
</div>
