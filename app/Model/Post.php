<?php
App::uses('AppModel', 'Model');

class Post extends AppModel {
    var $name = 'Post';
    
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
     public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'post_id',
            'dependent' => true
        )
        
    );
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A title is required'
            )
        )
    );


public function dateFormatBeforeSave($dateString) {
    return date('Y-m-d', strtotime($dateString));
}
}