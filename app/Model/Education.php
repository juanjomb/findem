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
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A title is required'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A description is required'
            )
        ),
        'start_date' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a valid date'
            )
        ),
         'end_date' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a valid date'
            )
        ),
    );


public function dateFormatBeforeSave($dateString) {
    return date('Y-m-d', strtotime($dateString));
}
}