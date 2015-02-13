<?php
App::uses('AppModel', 'Model');

class Language extends AppModel {
 public $belongsTo = array(
        'Level' => array(
            'className' => 'Level',
            'foreignKey' => 'level_id'
        )
    );
}