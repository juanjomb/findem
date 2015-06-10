<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

        Router::connect('/perfil/:id', array('controller' => 'users', 'action' => 'view'),array('pass' => array('id')));
        Router::connect('/candidatos', array('controller' => 'users', 'action' => 'selected'));
        Router::connect('/busqueda', array('controller' => 'users', 'action' => 'search'));
        Router::connect('/iniciar-sesion', array('controller' => 'users', 'action' => 'login'));
        Router::connect('/inbox', array('controller' => 'users', 'action' => 'inbox'));
        Router::connect('/blog', array('controller' => 'posts', 'action' => 'blog'));
        Router::connect('/estadisticas', array('controller' => 'users', 'action' => 'stats'));
        Router::connect('/contacto', array('controller' => 'pages', 'action' => 'display','contact'));
        Router::connect('/recuperar-datos', array('controller' => 'users', 'action' => 'recover'));
        Router::connect('/recuperar-datos/:reset', array('controller' => 'users', 'action' => 'recover'),array('pass' => array('reset')));

        /**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
