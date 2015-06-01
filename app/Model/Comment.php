<?php
App::uses('AppModel', 'Model');

class Comment extends AppModel {
    var $name = 'Comment';
    
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id'
        )
    );
    public $validate = array(
        'comment' => array(
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