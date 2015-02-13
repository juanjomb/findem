<?php
App::uses('AppModel', 'Model');

class Skill extends AppModel {
    var $name = 'Skill';
 public $belongsTo = array(
        'Level' => array(
            'className' => 'Level',
            'foreignKey' => 'level_id'
        )
    );
}