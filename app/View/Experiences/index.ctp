<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Experiences</h2></div>
    </div>

<div class="row">

        <div class="col-xs-12 col-md-12"> <?php 
                        echo $this->Html->link('<span class="btn btn-success">Create experience</span>', array('controller' => 'experiences', 'action' => 'add'),
                                array('escape' => false)
                                );?>
        </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Description</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Actions</th>

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
                        echo $this->Html->link('<i class="fa fa-pencil editIcon"></i>', array('controller' => 'experiences', 'action' => 'edit', $experience['Experience']['id']),
                                array('escape' => false)
                                
                                );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon"></i>', array('controller' => 'experiences', 'action' => 'delete', $experience['Experience']['id']),
                                array('escape' => false),
                                array('confirm' => 'Are you sure?')
                                );
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <?php unset($experience); ?>
        </table>
    </div>
</div>