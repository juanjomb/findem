<div class="container content">

<h1>Languages </h1>
<table class="table table-hover">
    <tr>
        <th>Created</th>
        <th>Title</th>
        <th>Level</th>
        
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($languages as $language){?>
    <tr>
        <td><?php echo $language['Language']['created']; ?></td>
         <td>
            <?php echo $this->Html->link($language['Language']['title'],
array('controller' => 'languages', 'action' => 'view', $language['Language']['id'])); ?>
        </td>
        <td><?php echo $language['Level']['title']; ?></td>
    </tr>
    <?php } ?>
    <?php unset($language); ?>
</table>
</div>