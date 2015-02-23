<div class="container content">

<h1>Levels </h1>
<table class="table table-hover">
    <tr>
        <th>Title</th>
        <th>Actions</th>
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($levels as $level){?>
    <tr>
        <td><?php echo $level['Level']['title']; ?></td>
         <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-pencil editIcon"></i>', array('controller' => 'levels', 'action' => 'edit', $level['Level']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon"></i>', array('controller' => 'levels', 'action' => 'delete', $level['Level']['id']), array('escape' => false), array('confirm' => 'Are you sure?')
                        );
                        ?>
                    </td>
    </tr>
    <?php } ?>
    <?php unset($level); ?>
</table>
</div>