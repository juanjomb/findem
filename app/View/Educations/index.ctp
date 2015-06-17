<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Formación</h2></div>
    </div>

<div class="row">

        <div class="col-xs-12 col-md-12"> <?php 
                        echo $this->Html->link('<span class="btn btn-success">Crear formación</span>', array('controller' => 'educations', 'action' => 'add',$user_id),
                                array('escape' => false)
                                );?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Acciones</th>

            </tr>

            <!-- Here is where we loop through our $posts array, printing out post info -->

            <?php foreach ($educations as $education) { ?>
                <tr>
                    <td><?php echo $education['Education']['title']; ?></td>
                    <td><?php echo $education['Education']['description']; ?></td>
                    <td><?php echo $education['Education']['start_date']; ?></td>
                    <td><?php echo $education['Education']['end_date']; ?></td>
                    <td>
                        <?php 
                        echo $this->Html->link('<i class="fa fa-pencil editIcon" title="Editar formación"></i>', array('controller' => 'educations', 'action' => 'edit', $education['Education']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon" title="Borrar formación"></i>', array('controller' => 'educations', 'action' => 'delete', $education['Education']['id'],$education['Education']['user_id']),
                                array('escape' => false),
                                array('confirm' => 'Está seguro?')
                                );
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <?php unset($education); ?>
        </table>
    </div>
</div>