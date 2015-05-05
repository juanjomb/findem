<?php

class UserSuitable extends AppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Suitable' => array(
            'className' => 'User',
            'foreignKey' => 'suitable_id'
        )
    );
}