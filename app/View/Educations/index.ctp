<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Educations</h2></div>
    </div>

<div class="row">

        <div class="col-xs-12 col-md-12"> <?php 
                        echo $this->Html->link('<span class="btn btn-success">Create education</span>', array('controller' => 'educations', 'action' => 'add'),
                                array('escape' => false)
                                );?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Actions</th>

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
                        echo $this->Html->link('<i class="fa fa-pencil editIcon"></i>', array('controller' => 'educations', 'action' => 'edit', $education['Education']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon"></i>', array('controller' => 'educations', 'action' => 'delete', $education['Education']['id']),
                                array('escape' => false),
                                array('confirm' => 'Are you sure?')
                                );
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <?php unset($education); ?>
        </table>
    </div>
</div>