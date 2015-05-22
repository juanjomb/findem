<footer class="color-primary-4">
     <a href="/" class="nolink"><h2>Findem <?php echo $this->Html->image('findemw_1.png', array('alt' => 'Logo findem'));?></h2></a>
	<ul>
            <li><?php echo $this->Html->link('Contacto', array('controller' => 'pages', 'action' => 'contact'),array('class'=>'footerlink'));?></li>
            <li><?php echo $this->Html->link('Términos y condiciones', array('controller' => 'pages', 'action' => 'terms'),array('class'=>'footerlink'));?></li>
            <li><?php echo $this->Html->link('Iniciar sesión', array('controller' => 'users', 'action' => 'login'),array('class'=>'footerlink'));?></li>
            <li><?php echo $this->Html->link('<i class="fa fa-twitter fa-2x"></i>', 'https://twitter.com/findem_es', array('escape' => false, 'target' => '_blank','class'=>'footerlink'));?>
     <?php echo $this->Html->link('<i class="fa fa-facebook fa-2x"></i>', 'https://twitter.com/findem_es', array('escape' => false, 'target' => '_blank','class'=>'footerlink'));?>
     <?php echo $this->Html->link('<i class="fa fa-linkedin fa-2x"></i>', 'https://twitter.com/findem_es', array('escape' => false, 'target' => '_blank','class'=>'footerlink'));?></li>
        </ul>
     <p class="copy">Findem © 2015 | Todos los derechos reservados</p>
</footer>
