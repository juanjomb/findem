<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Experiencias</h2></div>
    </div>

<div class="row">

        <div class="col-xs-12 col-md-12"> <?php 
                        echo $this->Html->link('<span class="btn btn-success">Crear experiencia</span>', array('controller' => 'experiences', 'action' => 'add',$user_id),
                                array('escape' => false)
                                );?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Título</th>
                <th>Empresa</th>
                <th>Descripción</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Acciones</th>

            </tr>

            <!-- Here is where we loop through our $posts array, printing out post info -->

            <?php foreach ($experiences as $experience) { ?>
                <tr>
                    <td><?php echo $experience['Experience']['title']; ?></td>
                    <td><?php echo $experience['Experience']['company']; ?></td>
                    <td><?php echo $experience['Experience']['description']; ?></td>
                    <td><?php echo $experience['Experience']['start_date']; ?></td>
                    <td><?php echo $experience['Experience']['end_date']; ?></td>
                    <td>
                        <?php 
                        echo $this->Html->link('<i class="fa fa-pencil editIcon" title="Editar experiencia"></i>', array('controller' => 'experiences', 'action' => 'edit', $experience['Experience']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon" title="Borrar experiencia"></i>', array('controller' => 'experiences', 'action' => 'delete', $experience['Experience']['id'],$experience['Experience']['user_id']),
                                array('escape' => false),
                                array('confirm' => 'Está seguro?')
                                );
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <?php unset($experience); ?>
        </table>
    </div>
</div>