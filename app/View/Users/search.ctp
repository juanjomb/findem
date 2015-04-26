<div class="dataBlock firstelement">
    <h2>Búsqueda de profesionales</h2>
    <p>Introduce los criterios que desees.</p>
 <?php 
 echo $this->Form->create(null,array(
    'url' => array('controller' => 'feedbacks', 'action' => 'add')
)); ?>
     <div class="form-group">
        <?php
        echo $this->Form->input('region_id', array(
            'options' => $regions,
            'empty' => '(Selecciona tu comunidad)',
            'class' => 'js-region col-xs-12 col-md-12 form-control searchinput',
            'div' => 'col-xs-12 col-md-4'
        ));
        echo $this->Form->input('province_id', array(
            'empty' => '(Selecciona tu provincia)',
            'class' => 'js-province col-xs-12 col-md-12 form-control searchinput',
            'div' => 'col-xs-12 col-md-4'
        ));

        echo $this->Form->input('city_id', array(
            'empty' => '(Selecciona tu ciudad)',
            'class' => 'js-city col-xs-12 col-md-12 form-control searchinput',
            'div' => 'col-xs-12 col-md-4'
        )); 
        $options = array(
        'label' => 'Buscar',
        'class' => 'btn feedbackBtn'
        );
        echo $this->Form->end($options);
        ?>
    </div>
</div>