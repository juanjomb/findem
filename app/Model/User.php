<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $belongsTo = array(
        'Region' => array(
            'className' => 'Region',
            'foreignKey' => 'region_id'
        ),
        'Province' => array(
            'className' => 'Province',
            'foreignKey' => 'province_id'
        ),
        'City' => array(
            'className' => 'City',
            'foreignKey' => 'city_id'
        )
    );
    public $hasAndBelongsToMany = array(
        'Skill' => array(
                'className' => 'Skill',
                'with' => 'UserSkill',
                'joinTable' => 'user_skills',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'skill_id',
                'unique' => true,
                
            ),
        'Language' => array(
                'className' => 'Language',
                'with' => 'UserLanguage',
                'joinTable' => 'user_language',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'language_id',
                'unique' => true,
                
            )
    );
    
     public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
     
public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}
}