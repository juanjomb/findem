<?php

class City extends AppModel {
    public $belongsTo = array(
        'Province' => array(
            'className' => 'Province',
            'foreignKey' => 'province_id'
        )
    );
}