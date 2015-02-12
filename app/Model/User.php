<?php

class User extends AppModel {
    public $belongsTo = array(
        'Region' => array(
            'className' => 'Region',
            'foreignKey' => 'region_id'
        ),
        'Province' => array(
            'className' => 'Province',
            'foreignKey' => 'province_id'
        ),
        'City' => array(
            'className' => 'City',
            'foreignKey' => 'city_id'
        )
    );
}