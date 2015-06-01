<?php $paginator = $this->Paginator;?>
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Comentarios</h2></div>
    </div>

<div class="row">

        <div class="col-xs-12 col-md-12"> <?php 
                        echo $this->Html->link('<span class="btn btn-success">Crear comentarios</span>', array('controller' => 'comments', 'action' => 'add',$post_id),
                                array('escape' => false)
                                );?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Acciones</th>

            </tr>

            <!-- Here is where we loop through our $posts array, printing out post info -->

            <?php foreach ($comments as $comment) { 
                if(!empty($comment['User']['username'])){
            $name=$this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view',$comment['User']['id']));
        }else{
            $name='Anónimo';
        }
                ?>
            
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $comment['Comment']['created']; ?></td>
                    <td>
                        <?php 
                        echo $this->Html->link('<i class="fa fa-pencil editIcon"></i>', array('controller' => 'comments', 'action' => 'edit', $comment['Comment']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon"></i>', array('controller' => 'comments', 'action' => 'delete', $comment['Comment']['id'],$post_id),
                                array('escape' => false),
                                array('confirm' => 'Estás seguro?')
                                );
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <?php unset($comment); ?>
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