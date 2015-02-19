<?php
App::uses('AppModel', 'Model');

class Education extends AppModel {
    var $name = 'Education';
 public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
}