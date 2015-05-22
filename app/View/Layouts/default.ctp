<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$findemtitle = __d('cake_dev', 'Findem, red de profesionales informáticos');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
	<?php echo $this->Html->charset(); ?>
        <title>
		<?php echo $findemtitle ?>:
		<?php echo $this->fetch('title'); ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php
        
		echo $this->Html->meta('icon');

                echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css');
                echo $this->Html->css('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
                echo $this->Html->css('http://fonts.googleapis.com/css?family=Quattrocento+Sans');
                echo $this->Html->css('styles');
                echo $this->Html->css('jquery.mCustomScrollbar');
                echo $this->Html->css('http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css'); 
                echo $this->Html->css('jquery.cookiebar');
                
                echo $this->Html->script('http://code.jquery.com/ui/1.11.3/jquery-ui.js'); 
                echo $this->Html->script('http://code.jquery.com/jquery-1.11.0.min.js');
                echo $this->Html->script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
                echo $this->Html->script('https://code.jquery.com/ui/1.11.2/jquery-ui.min.js');
                echo $this->Html->script('util');
                echo $this->Html->script('jquery.mCustomScrollbar');
                echo $this->Html->script('canvasjs.min');
                echo $this->Html->script('jquery.cookiebar');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    </head>
    <body class="cbp-spmenu-push">
           <?php
    echo $this->element('header');
    ?>
        <div class="wrapper">
            <?php
    echo $this->element('menu');
    echo $this->element('navbuttons');
    echo $this->Session->flash(); 
    echo $this->fetch('content'); 
    ?>
        </div>
            <?php
    echo $this->element('footer');?>
    </body>
</html>
