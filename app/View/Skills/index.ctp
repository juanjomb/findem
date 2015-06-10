<?php $paginator = $this->Paginator;?>
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Habilidades</h2></div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-md-12"> <?php
            echo $this->Html->link('<span class="btn btn-success">Crear habilidad</span>', array('controller' => 'skills', 'action' => 'add'), array('escape' => false)
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


            <?php foreach ($skills as $skill) { ?>
                <tr>
                    <td>
                        <?php echo $skill['Skill']['title'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-pencil editIcon" title="Editar habilidad"></i>', array('controller' => 'skills', 'action' => 'edit', $skill['Skill']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon" title="Borrar habilidad"></i>', array('controller' => 'skills', 'action' => 'delete', $skill['Skill']['id']), array('escape' => false), array('confirm' => 'Está seguro?')
                        );
                        ?>
                    </td>
                </tr>
                    <?php } ?>
                    <?php unset($skill); ?>
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
