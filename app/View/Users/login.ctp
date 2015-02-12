<div class="loginBg">
    <div class="loginForm">
        <i class="fa fa-times fa-2x close"></i> 
        <h4>Inicio de sesión</h4>
                <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); 
        echo $this->Form->input('username',array(
            'class'=>'loginInput',
            'placeholder'=>"Username"
        ));
        echo $this->Form->input('password',array(
            'class'=>'loginInput',
            'placeholder'=>"Username"
        ));
    ?>
<?php echo $this->Form->end(__('Acceder')); ?>

    </div>
</div>