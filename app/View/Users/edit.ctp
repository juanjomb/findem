<h1>Add User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('surname1');
echo $this->Form->input('surname2');
echo $this->Form->input('email');
echo $this->Form->input('phone');
echo $this->Form->input('description',array('rows' => '3'));
echo $this->Form->end('Save User');
?>