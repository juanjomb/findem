<?php

class Province extends AppModel {
    public $belongsTo = array(
        'Region' => array(
            'className' => 'Region',
            'foreignKey' => 'region_id'
        )
    );
}