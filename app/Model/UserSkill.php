<?php

class UserSkill extends AppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Skill' => array(
            'className' => 'Skill',
            'foreignKey' => 'skill_id'
        )
    );
}