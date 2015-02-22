<?php
App::uses('AppModel', 'Model');

class Experience extends AppModel {
    var $name = 'Experience';
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
        'company' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A company is required'
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
                'message' => 'Please enter a valid year'
            )
        ),
         'end_date' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a valid year'
            )
        ),
    );


public function dateFormatBeforeSave($dateString) {
    return date('Y-m-d', strtotime($dateString));
}
}