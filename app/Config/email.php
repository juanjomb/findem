<?php
class EmailConfig {
     public $gmail = array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
		'timeout' => 3,
        'username' => 'juanjosteiger@gmail.com',
        'password' => '',
        'transport' => 'Smtp',
		'auth' => true,
		'emailFormat' => 'html'
    );
}