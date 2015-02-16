<?php

class UserLanguage extends AppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Language' => array(
            'className' => 'Language',
            'foreignKey' => 'language_id'
        )
    );
}