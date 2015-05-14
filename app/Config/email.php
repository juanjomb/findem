<?php
class EmailConfig {
     public $gmail = array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
		'timeout' => 3,
        'username' => 'juanjosteiger@gmail.com',
        'password' => '17032007',
        'transport' => 'Smtp',
		'auth' => true,
		'emailFormat' => 'html'
    );
}