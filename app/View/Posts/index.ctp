<?php $paginator = $this->Paginator;?>

<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Posts</h2></div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-md-12"> <?php
            echo $this->Html->link('<span class="btn btn-success">Crear post</span>', array('controller' => 'posts', 'action' => 'add'), array('escape' => false)
            );
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Título</th>
                <th>Acciones</th>

            </tr>


            <?php foreach ($posts as $post) { ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['slug']));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-pencil editIcon" title="Editar post"></i>', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']), array('escape' => false)
                        );
                        echo $this->Html->link('<i class="fa fa-comment editIcon" title="Ver comentarios"></i>', array('controller' => 'comments', 'action' => 'index', $post['Post']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon" title="Borrar post"></i>', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('escape' => false), array('confirm' => '¿Está seguro?')
                        );
                        ?>
                    </td>
                </tr>
                    <?php } ?>
                    <?php unset($post); ?>
        </table>
        
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
