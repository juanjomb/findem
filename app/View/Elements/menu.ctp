<?php $user = $this->Session->read('user'); ?>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <?php if ($user) { ?>
        <img class="userImage" src="/findem/img/uploads/users/<?php echo $user['User']['image'] ?>" alt="imagen usuario">
        <p class="userName"><?php echo $user['User']['name'] . ' ' . $user['User']['surname1'] ?></p>

        <a href="/findem/users/view/<?php echo $user['User']['id']; ?>"><i class="fa fa-user"></i>    Mi perfil</a>
        <?php
        if ($user['User']['role'] == 'admin') {
            ?>
            <a href="/findem/languages/index/"><i class="fa fa-inbox"></i>    Languages</a>
            <a href="/findem/levels/index/"><i class="fa fa-info-circle"></i>     Levels</a>
            <a href="/findem/skills/index/"><i class="fa fa-institution"></i>     Skills</a>
            <?php
        }
    }
    ?>
    <a href="messages"><i class="fa fa-inbox"></i>    Mensajes</a>
    <a href="#about"><i class="fa fa-info-circle"></i>     Sobre Findem</a>
    <a href="#emp"><i class="fa fa-institution"></i>     Empresas</a>
    <a href="#prof"><i class="fa fa-briefcase"></i>     Profesionales</a>
    <a href="#"><i class="fa fa-desktop"></i>     Contacto</a>
<?php if ($user) { ?>
        <a href="/findem/users/logout"><i class="fa fa-close"></i>     Cerrar sesión</a>
    <?php } else { ?>
        <a href="/findem/users/login"><i class="fa fa-send"></i>     Inicia sesión</a>
    <?php } ?>


</nav>
