<div class="container content">

<h1>Skills </h1>
<table class="table table-hover">
    <tr>
        <th>Created</th>
        <th>Title</th>
        <th>Level</th>
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($skills as $skill){?>
    <tr>
        <td><?php echo $skill['Skill']['created']; ?></td>
         <td>
            <?php echo $this->Html->link($skill['Skill']['title'],
array('controller' => 'skills', 'action' => 'view', $skill['Skill']['id'])); ?>
        </td>
        <td><?php echo $skill['Level']['title']; ?></td>
    </tr>
    <?php } ?>
    <?php unset($skill); ?>
</table>
</div>