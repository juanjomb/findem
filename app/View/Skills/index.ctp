<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-12"> <h2>Skills</h2></div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-md-12"> <?php
            echo $this->Html->link('<span class="btn btn-success">Create skill</span>', array('controller' => 'skills', 'action' => 'add'), array('escape' => false)
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


            <?php foreach ($skills as $skill) { ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($skill['Skill']['title'], array('controller' => 'skills', 'action' => 'view', $skill['Skill']['id']));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-pencil editIcon"></i>', array('controller' => 'skills', 'action' => 'edit', $skill['Skill']['id']), array('escape' => false)
                        );
                        echo $this->Form->postLink('<i class="fa fa-trash deleteIcon"></i>', array('controller' => 'skills', 'action' => 'delete', $skill['Skill']['id']), array('escape' => false), array('confirm' => 'Are you sure?')
                        );
                        ?>
                    </td>
                </tr>
                    <?php } ?>
                    <?php unset($skill); ?>
        </table>
    </div>
</div>
