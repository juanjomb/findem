

<?php 
if($this->Session->check('Auth.User')&& $this->params['action']!='edit'){
if($this->Session->read('Auth.User.name')==''){?>
<div class="popupBg">  
        <div class="popup js-popup-complete">
            <span class="fa fa-close closePopup"></span>
            <p class="popup-header">Completa tu perfil</p>
            <p>Tu perfil aún no dispone de suficientes datos. Edítalo para que las empresas puedan encontrarte.<p>
            <?php echo $this->Html->link('<button class="profileadd centered-25">Editar mi perfil</button>', array('controller' => 'users', 'action' => 'edit',$this->Session->read('Auth.User.id')),
                                array('escape' => false)
                                );?>
        </div>
    </div> 
<?php }
}?>

<header class="color-primary-0">
<?php 
if($this->Session->check('Auth.User')&& $this->params['action']!='edit'){
if($this->Session->read('Auth.User.name')!=''){
$prof=1;
}else{
$prof=0;
}}?>
<div class="js-profilecompleted" aria-label="<?php if(isset($prof)){echo $prof;}?>"></div>
    <a href="/" class="nolink"><h1>Findem <?php echo $this->Html->image('findemw_1.png', array('alt' => 'Logo findem'));?></h1></a>
     
</header>