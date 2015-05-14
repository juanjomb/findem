<?php
App::uses('AppModel', 'Model');

class Language extends AppModel {
     var $name = 'Language';
     public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A title is required'
            )
        )
    );
}