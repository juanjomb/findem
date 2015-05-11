<?php $paginator = $this->Paginator;?>
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Languages</h2></div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-md-12"> <?php
            echo $this->Html->link('<span class="btn btn-success">Create language</span>', array('controller' => 'languages', 'action' => 'add'), array('escape' => false)
            );
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Actions</th>

            </tr>


            <?php foreach ($languages as $language) { ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($language['Language']['title'], array('controller' => 'languages', 'action' => 'view', $language['Language']['id']));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-pencil editIcon"></i>', array('controller' => 'languages', 'action' => 'edit', $language['Language']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon"></i>', array('controller' => 'languages', 'action' => 'delete', $language['Language']['id']), array('escape' => false), array('confirm' => 'Are you sure?')
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
