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

    <a href="/users/view/<?php echo $user['User']['id']; ?>"><span class="fa fa-user"></span>    Mi perfil</a>
     <a href="/users/edit/<?php echo $user['User']['id']; ?>"><span class="fa fa-pencil"></span>    Editar perfil</a>
       <a href="/inbox"><span class="fa fa-envelope"></span>    Inbox</a>
        <?php
        if ($user['User']['role'] == 'admin') {
            ?>
    <a href="/users/index/"><span class="fa fa-users"></span>     Usuarios</a>
    <a href="/feedbacks/index/"><span class="fa fa-bullhorn"></span>     Feedbacks</a>
    <a href="/languages/index/"><span class="fa fa-inbox"></span>    Idiomas</a>
    <a href="/skills/index/"><span class="fa fa-institution"></span>     Habilidades</a>
    <a href="/categories/index/"><span class="fa fa-tags"></span>     Categorías</a>
    <a href="/posts/index/"><span class="fa fa-book"></span>     Posts</a>
    <a href="/estadisticas"><span class="fa fa-bar-chart "></span>     Estadísticas</a>
    
            <?php
        }
        if ($user['User']['role'] == 'company') {
            ?>
    <a href="/users/search/"><span class="fa fa-search"></span>    Búsqueda</a>
    <a href="/users/selected/"><span class="fa fa-bookmark"></span>     Candidatos</a>
            <?php
        }
       ?>
    <a href="/users/logout"><span class="fa fa-close"></span>     Cerrar sesión</a>
  
    <?php } else { ?>
    <a href="/iniciar-sesion"><span class="fa fa-send"></span>     Inicia sesión</a>
    <a href="/blog"><span class="fa fa-book"></span>     Blog</a>
    <a href="/terminos"><span class="fa fa-warning"></span>     Términos y condiciones</a>
    <a href="/contacto"><span class="fa fa-desktop"></span>     Contacto</a>
    <?php } ?>


</nav>
<div class="pushmenu-bg"></div>