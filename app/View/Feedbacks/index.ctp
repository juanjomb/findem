<?php $paginator = $this->Paginator;?>
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Feedbacks</h2></div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-md-12">
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Fecha</th>
                <th>Email</th>
                <th>Acciones</th>

            </tr>


            <?php foreach ($feedbacks as $feedback) { ?>
                <tr>
                    <td>
                        <?php echo $feedback['Feedback']['created'];
                        ?>
                    </td>
                    <td>
                        <?php echo $feedback['Feedback']['email'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-eye editIcon" title="Ver feedback"></i>', array('controller' => 'feedbacks', 'action' => 'view', $feedback['Feedback']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon" title="Borrar feedback"></i>', array('controller' => 'feedbacks', 'action' => 'delete', $feedback['Feedback']['id']), array('escape' => false), array('confirm' => 'Are you sure?')
                        );
                        ?>
                    </td>
                </tr>
                    <?php } ?>
                    <?php unset($feedback); ?>
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
