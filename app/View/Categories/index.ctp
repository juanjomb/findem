<?php $paginator = $this->Paginator;?>

<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Categorías</h2></div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-md-12"> <?php
            echo $this->Html->link('<span class="btn btn-success">Crear categoría</span>', array('controller' => 'categories', 'action' => 'add'), array('escape' => false)
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


            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($category['Category']['title'], array('controller' => 'categories', 'action' => 'view', $category['Category']['id']));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-pencil editIcon"></i>', array('controller' => 'languages', 'action' => 'edit', $category['Category']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon"></i>', array('controller' => 'languages', 'action' => 'delete', $category['Category']['id']), array('escape' => false), array('confirm' => '¿Está seguro?')
                        );
                        ?>
                    </td>
                </tr>
                    <?php } ?>
                    <?php unset($category); ?>
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
