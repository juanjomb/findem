<div class="dataBlock firstelement">
    <h2>Búsqueda de profesionales</h2>
 <?php 
 echo $this->Form->create('Search',array(
    'url' => array('controller' => 'users', 'action' => 'search')
)); ?>
     <div class="form-group">
        <?php
        echo $this->Form->input('region_id', array(
            'options' => $regions,
            'empty' => '(Selecciona una comunidad)',
            'class' => 'js-region col-xs-12 col-md-12 form-control searchinput',
            'div' => 'col-xs-12 col-md-4'
        ));
        echo $this->Form->input('province_id', array(
            'empty' => '(Selecciona una provincia)',
            'class' => 'js-province col-xs-12 col-md-12 form-control searchinput ',
            'div' => 'col-xs-12 col-md-4'
        ));

        echo $this->Form->input('city_id', array(
            'empty' => '(Selecciona una ciudad)',
            'class' => 'js-city col-xs-12 col-md-12 form-control searchinput ',
            'div' => 'col-xs-12 col-md-4'
        )); 
        echo $this->Form->input('category_id', array(
            'options' => $categories,
            'empty' => '(Selecciona una categoría)',
            'class' => 'js-category col-xs-12 col-md-12 form-control searchinput',
            'div' => 'col-xs-12 col-md-4'
        ));
        echo $this->Form->input('skills', array(
            'options' => $skills,
            'multiple' => true,
            'class' => 'col-xs-12 col-md-12 form-control searchinput js-skills-input',
            'div' => 'col-xs-12 col-md-4'
        ));
        echo $this->Form->input('languages', array(
            'options' => $languages,
            'multiple' => true,
            'class' => 'col-xs-12 col-md-12 form-control searchinput js-languages-input',
            'div' => 'col-xs-12 col-md-4'
        ));
        $options = array(
        'label' => 'Buscar',
        'class' => 'btn feedbackBtn js-search-sm'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>
<div class="user-results js-results-container row">
<?php echo $this->element('userresults'); ?>
</div>