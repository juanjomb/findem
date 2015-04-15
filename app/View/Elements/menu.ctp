<?php

$user = $this->Session->read('user'); ?>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <?php if ($user) { 
        if(!empty($user['User']['image'])){?>
    <img class="userImage" src="/img/uploads/users/<?php echo $user['User']['image'] ?>" alt="imagen usuario">
        <?php }else{ ?>
    <img class="userImage" src="/img/placeholder-user.jpg" alt="imagen usuario">
        <?php } ?>
    <p class="userName"><?php echo $user['User']['name'] . ' ' . $user['User']['surname1'] ?></p>

    <a href="/users/view/<?php echo $user['User']['id']; ?>"><i class="fa fa-user"></i>    Mi perfil</a>
     <a href="/users/edit/<?php echo $user['User']['id']; ?>"><i class="fa fa-pencil"></i>    Editar perfil</a>
        <?php
        if ($user['User']['role'] == 'admin') {
            ?>
    <a href="/users/index/"><i class="fa fa-users"></i>     Users</a>
    <a href="/languages/index/"><i class="fa fa-inbox"></i>    Languages</a>
    <a href="/skills/index/"><i class="fa fa-institution"></i>     Skills</a>
            <?php
        }
    }
    ?>
<?php if ($user) { ?>
    <a href="/users/logout"><i class="fa fa-close"></i>     Cerrar sesión</a>
    <?php } else { ?>
    <a href="/users/login"><i class="fa fa-send"></i>     Inicia sesión</a>
    <a href="#about"><i class="fa fa-info-circle"></i>     Sobre Findem</a>
    <a href="#emp"><i class="fa fa-institution"></i>     Empresas</a>
    <a href="#prof"><i class="fa fa-briefcase"></i>     Profesionales</a>
    <a href="#"><i class="fa fa-desktop"></i>     Contacto</a>
    <?php } ?>


</nav>
