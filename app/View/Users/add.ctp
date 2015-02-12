<h1>Add Post</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('name');
echo $this->Form->input('surname1');
echo $this->Form->input('surname2');
echo $this->Form->input('description',array('rows' => '3'));
echo $this->Form->input('email');
echo $this->Form->input('phone');
echo $this->Form->input('region_id', array(
    'options' => $regions,
    'empty' => '(Selecciona tu comunidad)',
    'class' => 'js-region'
));
echo $this->Form->input('province_id', array(
    'empty' => '(Selecciona tu provincia)',
    'class' => 'js-province'
));
echo $this->Form->input('city_id', array(
    'empty' => '(Selecciona tu ciudad)',
    'class' => 'js-city'
));
echo $this->Form->end('Save User');
?>