<?php $paginator = $this->Paginator;?>
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Usuarios</h2></div>
    </div>

<div class="row">

        <div class="col-xs-12 col-md-12"> <?php 
                        echo $this->Html->link('<span class="btn btn-success">Crear usuario</span>', array('controller' => 'users', 'action' => 'add'),
                                array('escape' => false)
                                );?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Username</th>
                <th>Creado</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Rol</th>
                <th>Teléfono</th>
                <th>Acciones</th>

            </tr>

            <!-- Here is where we loop through our $posts array, printing out post info -->

            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['User']['username']; ?></td>
                    <td><?php echo $user['User']['created']; ?></td>
                    <td>
                        <?php echo $this->Html->link($user['User']['name'], array('controller' => 'users', 'action' => 'view', $user['User']['id']));
                        ?>
                    </td>

                    <td><?php echo $user['User']['surname1']; ?></td>
                    <td><?php echo $user['User']['surname2']; ?></td>
                    <td><?php echo $user['User']['role']; ?></td>
                    <td><?php echo $user['User']['phone']; ?></td>
                    <td>
                        <?php 
                        echo $this->Html->link('<i class="fa fa-university familyIcon" title="Ver formación"></i>', array('controller' => 'educations', 'action' => 'index', $user['User']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Html->link('<i class="fa fa-briefcase familyIcon" title="Ver experiencia"></i>', array('controller' => 'experiences', 'action' => 'index', $user['User']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Html->link('<i class="fa fa-pencil editIcon" title="Editar usuario"></i>', array('controller' => 'users', 'action' => 'edit', $user['User']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon" title="Borrar usuario"></i>', array('controller' => 'users', 'action' => 'delete', $user['User']['id']),
                                array('escape' => false),
                                array('confirm' => 'Está seguro?')
                                );
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <?php unset($user); ?>
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