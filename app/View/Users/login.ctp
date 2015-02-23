<div class="loginBg">
    <div class="loginForm visible">
        <h4>Inicio de sesión</h4>
                <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); 
        echo $this->Form->input('username',array(
            'class'=>'loginInput',
            'placeholder'=>"Username"
        ));
        echo $this->Form->input('password',array(
            'class'=>'loginInput',
            'placeholder'=>"Password"
        ));
    ?>
<?php echo $this->Form->end(__('Acceder')); ?>

    </div>
</div>