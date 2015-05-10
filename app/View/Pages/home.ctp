<section class="uno" id="top">
    <div class="content-uno">
        <h2>Encuentra el profesional que necesitas.</h2>
        <button class="info"><a href="#about">Saber mas</a></button>
    </div>
</section>
<section id="about" class="dos">
    <h3 class="home-title-info">¿Qué es Findem?</h3>
    <div class="info-Block">
        <div class="info-round">
            <i class="fa fa-briefcase fa-5x"></i>
        </div>
<p>
Findem es un servicio de empleo para profesionales del sector informático. Con nuestro buscador podrás encontrar al profesional que mejor se adecúe a tus necesidades            </p>
    </div>
    <div class="info-Block">
        <div class="info-round">
            <i class="fa fa-code fa-5x"></i>
        </div>
<p>
Al contrario que en otras páginas de empleo, en Findem no hay ofertas de trabajo ni candidaturas. Findem actúa de nexo entre empresas y profesionales, sin tediosos procesos de selección.            </p>
    </div>
    <div class="info-Block">
        <div class="info-round">
            <i class="fa fa-puzzle-piece fa-5x"></i>
        </div>
            <p>
            En Findem sabemos que para que un proyecto llegue a buen término todo debe encajar. Queremos ayudarte a encontrar la pieza que te falta para completar el puzzle.
            </p>
    </div>
    <span id="emp"></span>
</section>
<section id="prof" class="tres">
    <div class="info-Register">
        <h4>Soy una empresa<h4>
        <p>Soy una empresa y busco un profesional del sector de la informática.</p>
        <button class="alta js-com">Registrarme</button>
    </div>
<div class="info-Register">
        <h4>Soy un profesional<h4>
        <p>Soy un profesional del mundo de la informática y busco trabajo.</p>
        <button class="alta js-us">Registrarme</button>
    </div>
</section>
<section id="reg" class="cuatro">
     <?php echo $this->element('popular'); ?>
</section>
<div class="popupBg">  
        <div class="popup js-loginformuser">
            <i class="fa fa-close closePopup"></i>
            <h4>Registro de usuario</h4>
               <?php echo $this->Form->create('User'); 
        echo $this->Form->input('username',array(
            'label' => false,
            'class'=>'loginInput',
            'placeholder'=>"Username"
            
        ));
        echo $this->Form->hidden('role',array(
            'value'=>'user'
        ));
        echo $this->Form->input('password',array(
            'label' => false,
            'class'=>'loginInput',
            'placeholder'=>"Password"
            
        ));
         $options = array(
            'label' => 'Register',
            'class' => 'register'
        );
    ?>
<?php echo $this->Form->end($options); ?>
<br>
        <div class="registermessage"></div>
        </div>
    </div> 

<div class="popupBg">  
        <div class="popup js-loginformcompany">
            <i class="fa fa-close closePopup"></i>
            <h4>Registro de empresa</h4>
            <?php echo $this->Form->create('User'); 
        echo $this->Form->input('username',array(
            'label' => false,
            'class'=>'loginInput',
            'placeholder'=>"Username"
        ));
        echo $this->Form->hidden('role',array(
            'value'=>'company'
        ));
        echo $this->Form->input('password',array(
            'label' => false,
            'class'=>'loginInput',
            'placeholder'=>"Password"
        ));
    ?>
<?php 
$options = array(
            'label' => 'Register',
            'class' => 'register'
        );

echo $this->Form->end($options); ?>
<br>
        <div class="registermessage"></div>
        </div>
    </div> 




