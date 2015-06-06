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
       <a href="/inbox"><i class="fa fa-envelope"></i>    Inbox</a>
        <?php
        if ($user['User']['role'] == 'admin') {
            ?>
    <a href="/users/index/"><i class="fa fa-users"></i>     Usuarios</a>
    <a href="/feedbacks/index/"><i class="fa fa-bullhorn"></i>     Feedbacks</a>
    <a href="/languages/index/"><i class="fa fa-inbox"></i>    Idiomas</a>
    <a href="/skills/index/"><i class="fa fa-institution"></i>     Habilidades</a>
    <a href="/categories/index/"><i class="fa fa-tags"></i>     Categorías</a>
    <a href="/posts/index/"><i class="fa fa-book"></i>     Posts</a>
    <a href="/estadisticas"><i class="fa fa-bar-chart "></i>     Estadísticas</a>
    
            <?php
        }
        if ($user['User']['role'] == 'company') {
            ?>
    <a href="/users/search/"><i class="fa fa-search"></i>    Búsqueda</a>
    <a href="/users/selected/"><i class="fa fa-bookmark"></i>     Candidatos</a>
            <?php
        }
       ?>
    <a href="/users/logout"><i class="fa fa-close"></i>     Cerrar sesión</a>
  
    <?php } else { ?>
    <a href="/iniciar-sesion"><i class="fa fa-send"></i>     Inicia sesión</a>
    <a href="#about"><i class="fa fa-info-circle"></i>     ¿Qué es Findem?</a>
    <a href="#prof"><i class="fa fa-briefcase"></i>     Quiero registrarme</a>
    <a href="/blog"><i class="fa fa-book"></i>     Blog</a>
    <a href="/terminos"><i class="fa fa-warning"></i>     Términos y condiciones</a>
    <a href="/contacto"><i class="fa fa-desktop"></i>     Contacto</a>
    <?php } ?>


</nav>
<div class="pushmenu-bg"></div>