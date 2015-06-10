<?php $paginator = $this->Paginator;?>
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Idiomas</h2></div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-md-12"> <?php
            echo $this->Html->link('<span class="btn btn-success">Crear idioma</span>', array('controller' => 'languages', 'action' => 'add'), array('escape' => false)
            );
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>

            </tr>


            <?php foreach ($languages as $language) { ?>
                <tr>
                    <td>
                        <?php echo $language['Language']['title'];
                        ?>
                    </td>
                    <td><?php echo $language['Language']['created'] ;?></td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-pencil editIcon" title="Editar idioma"></i>', array('controller' => 'languages', 'action' => 'edit', $language['Language']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon" title="Borrar idioma"></i>', array('controller' => 'languages', 'action' => 'delete', $language['Language']['id']), array('escape' => false), array('confirm' => 'Está seguro?')
                        );
                        ?>
                    </td>
                </tr>
                    <?php } ?>
                    <?php unset($language); ?>
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
