<section class="uno" id="top">
    <div class="content-uno">
        <h2>Encuentra el profesional que necesitas.</h2>
        <button class="info"><a href="#about">Saber mas</a></button>
    </div>
</section>
<section id="about" class="dos">
    <h3>¿Qué es Findem?</h3>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>
    <span id="emp"></span>
    <h3>¿Cómo puedo registrarme?</h3>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
    <div class="botones"><button class="alta js-us">Alta profesional</button> <button class="alta js-com">Alta empresa</button></div>

</section>
<section id="prof" class="tres color-primary-2">
    <article>
        <div class="redondo"></div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur</p>
        <button class="btn-art">Action</button>
    </article>
    <article><div class="redondo"></div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur</p>
        <button class="btn-art">Action</button>
    </article>
    <article><div class="redondo"></div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur</p>
        <button class="btn-art">Action</button>
    </article>

</section>
<div class="bgopacity"></div>
    <div class="loginForm js-loginformuser">
<i class="fa fa-close"></i>
        <h4>Registro de usuario</h4>
        <?php echo $this->Form->create('User'); 
        echo $this->Form->input('username',array(
            'class'=>'loginInput',
            'placeholder'=>"Username"
            
        ));
        echo $this->Form->hidden('role',array(
            'value'=>'user'
        ));
        echo $this->Form->input('password',array(
            'class'=>'loginInput',
            'placeholder'=>"Password"
            
        ));
         $options = array(
            'label' => 'Register',
            'class' => 'btn btn-default register',
            'div'=>'col-xs-12 col-md-12'
        );
    ?>
<?php echo $this->Form->end($options); ?>
<br>
        <div class="registermessage"></div>
    </div>



    <div class="loginForm js-loginformcompany">
<i class="fa fa-close"></i>
        <h4>Registro de empresa</h4>
        <?php echo $this->Form->create('User'); 
        echo $this->Form->input('username',array(
            'class'=>'loginInput',
            'placeholder'=>"Username"
        ));
        echo $this->Form->hidden('role',array(
            'value'=>'company'
        ));
        echo $this->Form->input('password',array(
            'class'=>'loginInput',
            'placeholder'=>"Password"
        ));
    ?>
<?php echo $this->Form->end(__('Registro')); ?>
<br>
        <div class="registermessage"></div>

    </div>
