
<div class="popupBg">  
        <div class="popup js-popup-skills">
            <i class="fa fa-close closePopup"></i>
            <h3>Búsqueda de habilidad</h3>
            <input type="text" class="js-search-skill">
            <div class="js-optionSkills"></div>
        </div>
    </div> 
<div class="popupBg">  
        <div class="popup js-popup-complete">
            <i class="fa fa-close closePopup"></i>
            <h3>Completa tu perfil</h3>
            <p>Tu perfil aún no dispone de suficientes datos. Edítalo para que las empresas puedan encontrarte.<p>
            <?php echo $this->Html->link('<button class="profileadd centered-25">Editar mi perfil</button>', array('controller' => 'users', 'action' => 'edit',$this->Session->read('Auth.User.id')),
                                array('escape' => false)
                                );?>
        </div>
    </div> 
<div class="popupBg">  
        <div class="popup js-popup-languages">
            <i class="fa fa-close closePopup"></i>
            <h3>Búsqueda de idiomas</h3>
            <input type="text" class="js-search-language">
            <div class="js-optionLanguages"></div>
        </div>
    </div> 
<header class="color-primary-0">
<?php 
if($this->Session->check('Auth.User')&& $this->params['action']!='edit'){
if($this->Session->read('Auth.User.name')!=''){
$prof=1;
}else{
$prof=0;
}}?>
<div class="js-profilecompleted" data="<?php if(isset($prof)){echo $prof;}?>"></div>
    <a href="/" class="nolink"><h1>Findem <?php echo $this->Html->image('findemw_1.png', array('alt' => 'Logo findem'));?></h1></a>
     
</header>