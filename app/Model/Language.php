<?php
App::uses('AppModel', 'Model');

class Language extends AppModel {
     var $name = 'Language';
 public $belongsTo = array(
        'Level' => array(
            'className' => 'Level',
            'foreignKey' => 'level_id'
        )
    );
}