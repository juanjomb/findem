<?php
App::uses('AppModel', 'Model');
class Feedback extends AppModel {
     var $name = 'Feedback';
     public $useTable = 'feedbacks';
   public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'An email is required'
            )
        ),
        'message' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A message is required'
            )
        )
        
    );
}