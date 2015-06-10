<?php
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
        $this->Auth->allow('register');
        $this->Auth->allow('view');
        $this->Auth->allow('recover');
    }

    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $user = $this->User->findByUsername($this->request->data['User']['username']);
                $this->Session->write('user', $user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Nombre de usuario o contraseña incorrectos'));
                return $this->redirect('/iniciar-sesion');
            }
        }
    }

    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('name' => 'desc')
        );
        $users = $this->paginate('User');
        $this->set('users', $users);
    }

    public function isAdmin($user) {
        if ($user['role'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }
    
    public function inbox(){
        $this->layout='home';
        $order=array('SentMessage.created'=>'DESC');
        $message = $this->User->SentMessage->find('first',array('conditions' => array('SentMessage.from_id' => $this->Session->read('Auth.User.id')),'order'=>array('SentMessage.created'=>'DESC')));
     $sent = $this->User->SentMessage->find('all',array('conditions' => array('SentMessage.from_id' => $this->Session->read('Auth.User.id')),'order'=>array('SentMessage.created'=>'DESC')));
     $received = $this->User->SentMessage->find('all',array('conditions' => array('SentMessage.to_id' => $this->Session->read('Auth.User.id')),'order'=>array('SentMessage.created'=>'DESC')));
     $this->set(compact('message','sent','received'));
    }
    
    

    public function view($id) {
        
        if (!$id) {
            throw new NotFoundException(__('Usuario no válido'));
        }

        $user = $this->User->findById($id);
        
        $this->getLists($user);

        if (!$user) {
            throw new NotFoundException(__('Usuario no válido'));
        }
        $this->set('user', $user);
        if($user['User']['id']!= $this->Session->read('Auth.User.id')){
             $this->User->updateAll(array(
                'User.views' => 'User.views + 1'),
                array('User.id' => $user['User']['id']
            ));
        }
    }

    public function add() {
    if($this->Session->read('Auth.User.role')=='admin'){
        //echo '<pre>';print_r($this->request->data);die();
        $this->getLists();
        $this->User->create();
        if (!empty($this->request->data)) {

            //Comprueba si la imagen se ha subido
            if (!empty($this->request->data['User']['upload']['name'])) {
                $file = $this->request->data['User']['upload'];

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //obtener la extensión
                $arr_ext = array('jpg', 'jpeg', 'gif'); //obtener las extensiones permitidas
                //solo procesa las extensiones permitidas
                if (in_array($ext, $arr_ext)) {
                    //primer argumento lugar temporal, segundo a donde lo movemos
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);

                    //prepara el nombre del archivo para la bbdd
                    $item = $this->data;
                    $item['User']['image'] = $file['name'];
                }
            }

            if (!isset($item)) {
                $item = $this->request->data;
            }
            
            if ($this->User->save($item)) {
                $this->Session->setFlash(__('El usuario ha sido guardado.'));
                 
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('No se ha podido guardar el usuario.'));
        }
         }else{
                 $this->redirect('/pages/denied');
             }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Usuario no válido'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Usuario no válido'));
        }
        if($user['User']['id']== $this->Session->read('Auth.User.id')||
             $this->Session->read('Auth.User.role')=='admin'){
        $this->getLists($user);
        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
             //Comprueba si la imagen se ha subido
            if (!empty($this->request->data['User']['upload']['name'])) {
                $file = $this->request->data['User']['upload'];

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //obtener la extensión
                $arr_ext = array('jpg', 'jpeg', 'gif'); //obtener las extensiones permitidas
                //solo procesa las extensiones permitidas
                if (in_array($ext, $arr_ext)) {
                    //primer argumento lugar temporal, segundo a donde lo movemos
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);

                    //prepara el nombre del archivo para la bbdd
                    $item = $this->data;
                    $item['User']['image'] = $file['name'];
                }
            }

            if (!isset($item)) {
                $item = $this->request->data;
            }
            if ($this->User->save($item)) {
                $this->Session->setFlash(__('El usuario ha sido actualizado.'));
                    if($this->request->data['User']['id'] == AuthComponent::User('id')){ //if current logged in user  update user session data

                  $this->Session->write('Auth.User.name', $this->request->data['User']['name']);           

                  $this->Session->write('Auth.User', array_merge(AuthComponent::User(), $this->request->data['User']) );   //updating all user session data

                }
                return $this->redirect(array('action' => 'view',$id));
            }
            $this->Session->setFlash(__('No se ha podido actualizar el usuario.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
             }else{
                 $this->redirect('/pages/denied');
             }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(
                    __('El usuario con id: %s ha sido borrado.', h($id))
            );
        } else {
            $this->Session->setFlash(
                    __('El usuario con id: %s no ha podido ser borrado.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    private function getLists($user = null) {

        $regions = $this->User->Region->find('list', array(
            'fields' => array('Region.comunidad')
        ));
        $j=0;
        for($i=1970;$i<=2015;$i++){
            $years[$i]=$i;
        }
        $this->User->UserSkill->unBindModel(array('belongsTo' => array('User')));
        $skills = $this->User->Skill->find('list');
        $languages = $this->User->Language->find('list');
        $categories = $this->User->Category->find('list');
        $userskills = $this->User->UserSkill->find('all',array('conditions' => array('UserSkill.user_id' => $user['User']['id'])));
        $userlanguages = $this->User->UserLanguage->find('all',array('conditions' => array('UserLanguage.user_id' => $user['User']['id'])));
        $experiences = $this->User->Experience->find('all', array('conditions' => array('Experience.user_id' => $user['User']['id'])));
        $educations = $this->User->Education->find('all', array('conditions' => array('Education.user_id' => $user['User']['id'])));
        if($user){
            if(!empty($user[$this->modelClass]['region_id'])){
                $conditions = array('region_id' => $user[$this->modelClass]['region_id']);
                $fields=array('Province.province');
                $this->User->Province->recursive = -1;
                $provinces = $this->User->Province->find('list',compact('conditions','fields'));        
            }
            if(!empty($user[$this->modelClass]['province_id'])){
                $conditions = array('province_id' => $user[$this->modelClass]['province_id']);
                $fields=array('City.municipio');
                $this->User->City->recursive = -1;
                $cities = $this->User->City->find('list',compact('conditions','fields'));        
            }
            $this->set(compact('provinces','cities'));
        }  
        $this->set(compact('categories','regions','experiences','years','userskills','skills', 'educations','languages','userlanguages'));
    }

    public function getProvinces($region_id) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $provinces = $this->User->Province->find('list', array(
                'conditions' => array('Province.region_id' => $region_id),
                'fields' => array('Province.province')
            ));
            echo json_encode($provinces);
        }
    }

    public function saveEducation() {
        if ($this->request->is('ajax')) { 
            $this->autoRender = false;
            $this->User->Education->create();
            if ($this->User->Education->save($this->request->data)) {
                $id=$this->User->Education->getLastInsertID();
                $this->request->data['id']=$id;
                echo json_encode($this->request->data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        }
    }
    public function showMessageBody() {
        if ($this->request->is('ajax')) {
            $message = $this->User->SentMessage->findById($this->request->data['id']);
            $this->set(compact('message'));
            $this->render('/Elements/bodymessage','ajax');
        }
    }
    
    public function saveSkill() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $conditions = array(
                'UserSkill.user_id'=>$this->Session->read('Auth.User.id'),
                'UserSkill.skill_id'=>$this->request->data['id']
                );
            $userskill=$this->User->UserSkill->find('all',  compact('conditions'));
            if(!$userskill){
            $this->User->UserSkill->create();
            $datos['user_id'] = $this->Session->read('Auth.User.id');
            $datos['skill_id'] = $this->request->data['id'];
            if ($this->User->UserSkill->save($datos)) {
                echo json_encode($datos);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
            }
            
            }
    }
    
      public function saveLanguage() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $conditions = array(
                'UserLanguage.user_id'=>$this->Session->read('Auth.User.id'),
                'UserLanguage.language_id'=>$this->request->data['id']
                );
            $userskill=$this->User->UserLanguage->find('all',  compact('conditions'));
            if(!$userskill){
            $this->User->UserLanguage->create();
            $datos['user_id'] = $this->Session->read('Auth.User.id');
            $datos['language_id'] = $this->request->data['id'];
            if ($this->User->UserLanguage->save($datos)) {
                echo json_encode($datos);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
            }
            
            }
    }
    
    
       public function saveExperience() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->User->Experience->create();
            if ($this->User->Experience->save($this->request->data)) {
                $id=$this->User->Experience->getLastInsertID();
                $this->request->data['id']=$id;
                echo json_encode($this->request->data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        }
    }
    public function removeSkill(){
       if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if ($this->User->UserSkill->deleteAll(array('UserSkill.user_id' => $this->Session->read('Auth.User.id'),
                'UserSkill.skill_id' => $this->request->data['id']))) {
                $data['ok']=1;
                echo json_encode($data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        } 
    }
    
    public function removeLanguage(){
       if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if ($this->User->UserLanguage->deleteAll(array('UserLanguage.user_id' => $this->Session->read('Auth.User.id'),
                'UserLanguage.language_id' => $this->request->data['id']))) {
                $data['ok']=1;
                echo json_encode($data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        } 
    }
    public function removeExperience(){
       if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if ($this->User->Experience->deleteAll(array('Experience.id' => $this->request->data['id'] ))) {
                $data['ok']=1;
                echo json_encode($data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        } 
    }
   public function removeEducation(){
       if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if ($this->User->Education->deleteAll(array('Education.id' => $this->request->data['id'] ))) {
                $data['ok']=1;
                echo json_encode($data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        } 
    }

    public function search() {
        if($this->Session->read('Auth.User.role')!='user'){
            $this->getLists();
		if($this->request->is('ajax')){
                     
            $this->autoRender=false;
            if (!empty($this->request->data)) {
                $conditions=array();
                $usersarray=array();
                if(!empty($this->request->data['skills'])){
                    
                    $userskills=array();
                    $fields=array('UserSkill.user_id');
                    foreach ($this->request->data['skills'] as $skill){
                        $conditions['UserSkill.skill_id'] =  $skill;
            		$users=$this->User->UserSkill->find('list',  compact('fields','conditions'));
                    foreach ($users as $key=>$value){
                              $userskills[]=$value;  
                    }
                    }
                    $recuento=array_count_values ( $userskills );
                    foreach ($recuento as $key => $value) {
                        if($value==count($this->request->data['skills'])){
                           $usersarray[]=$key; 
                        }
                    }
                         $conditions=array();
                         $conditions['and']['User.id']=$usersarray;
                        
            	}
                if(!empty($this->request->data['languages'])){
                    if(!empty($this->request->data['skills'])){
                        $conditions=array();
                    }
                    $userlanguages=array();
                    $fields=array('UserLanguage.user_id');
                    foreach ($this->request->data['languages'] as $language){
                        $conditions['UserLanguage.language_id'] =  $language;
            		$users=$this->User->UserLanguage->find('list',  compact('fields','conditions'));
                    foreach ($users as $key=>$value){
                              $userlanguages[]=$value;  
                    }
                    }
                    $recuento=array_count_values ( $userlanguages );
                    $langs=array();
                    foreach ($recuento as $key => $value) {
                        if($value==count($this->request->data['languages'])){
                           $langs[]=$key;
                        }
                    }
                    if(!empty($this->request->data['skills'])){
                        foreach ($usersarray as $key => $value) {
                           if(!in_array($value, $langs)){
                               unset($usersarray[$key]);
                           } 
                        }
                    }else{
                        $usersarray=$langs;
                    }
                         $conditions=array();
                        $conditions['and']['User.id']=$usersarray;
            	}
                
            	$conditions['and']['User.role'] = 'user';
            	if(!empty($this->request->data['region_id'])){
            		$conditions['and']['User.region_id'] =$this->request->data['region_id'];
            	}
                if(!empty($this->request->data['province_id'])){
            		$conditions['and']['User.province_id'] =$this->request->data['province_id'];
            	}
                if(!empty($this->request->data['city_id'])){
            		$conditions['and']['User.city_id'] =$this->request->data['city_id'];
            	}
                if(!empty($this->request->data['category_id'])){
            		$conditions['and']['User.category_id'] =$this->request->data['category_id'];
            	}
		
				
             }
             
             $this->User->recursive=2;
             $this->User->unBindModel(array(
                 'belongsTo' => array('Province','Region'),
                 'hasMany'=>array('Education','SentMessage','Experience'),
                 'hasAndBelongsToMany'=>array('Skill','Language','SuitableUser')
                 
                 ));
            $users = $this->User->find('all',  compact('conditions'));
           	$this->set(compact('users'));
			
			
            $this->render('/Elements/userresults','ajax');    
        }
	}else{
                 $this->redirect('/pages/denied');
             }
	}
        
    public function register() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $user = $this->User->findByUsername($this->request->data['username']);
            if (empty($user)) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $result['ok']=1;
                    echo json_encode($result);
                } else {
                    $result['ko']=0;
                    $result['message']='Ha ocurrido un problema. Intentelo de nuevo o contacte con el administrador';
                    echo json_encode($result);
                }
            } else {
                $result['ko']='El nombre de usuario está en uso';
                echo json_encode($result);
            }
        }
    }
    
     public function bookmarkuser() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $conditions= array(
                'SuitableUser.user_id'=>$this->Session->read('Auth.User.id'),
                'SuitableUser.suitable_id'=>$this->request->data['user_id']
            );
            $suitable = $this->User->SuitableUser->find('all',compact('conditions'));
            if(empty($suitable)){
                $this->User->SuitableUser->create();
                $data['user_id']= $this->Session->read('Auth.User.id');
                $data['suitable_id']= $this->request->data['user_id'];
                if ($this->User->SuitableUser->save($data)) {
                    $result['ok']='Usuario añadido a favoritos';
                    echo json_encode($result);
                } else {
                    $result['ko']='Error al añadir el usuario a favoritos';
                    echo json_encode($result);
                }
        }else{
             $result['ko']='El usuario ya está en favoritos';
                    echo json_encode($result);
        }
        }
    }
    
      public function unbookmarkuser() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
           if ($this->User->SuitableUser->deleteAll(array('SuitableUser.user_id' => $this->Session->read('Auth.User.id'),
                'SuitableUser.suitable_id' => $this->request->data['user_id']))) {
                $data['ok']=1;
                echo json_encode($data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        }
    }

    public function getCities($province_id) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $cities = $this->User->City->find('list', array(
                'conditions' => array('City.province_id' => $province_id),
                'fields' => array('City.municipio')
            ));
            echo json_encode($cities);
        }
    }
    
    public function selected(){
        $fields=array('SuitableUser.suitable_id');
        $conditions = array('SuitableUser.user_id' =>$this->Session->read('Auth.User.id'));
        $selected = $this->User->SuitableUser->find('list',compact('fields','conditions'));
        $conditions = array('User.id' =>$selected);
        $users = $this->User->find('all',compact('conditions'));
        
        $this->set(compact('users'));
    }
    
    public function send_message($user_id=null){
        if($user_id){
            $user = $this->User->findById($user_id);
            $this->set(compact('user'));
        }
            $this->User->SentMessage->create();
            if(!empty($this->request->data)){
                if(!isset($item)){
                    $item=$this->request->data;
                }
            if ($this->User->SentMessage->save($item)) {
                $this->Session->setFlash(__('Su mensaje ha sido enviado.'));
                return $this->redirect(array('action' => 'inbox'));
            }
            $this->Session->setFlash(__('No se ha podido enviar el mensaje.'));
        }
    }
    
    public function stats(){
        $fields=array('count(UserSkill.skill_id) as count','Skill.title');
        $group=array('UserSkill.skill_id');
        $limit=10;
        $order=array('count(UserSkill.skill_id)'=> 'DESC');
        $skills= $this->User->UserSkill->find('all',compact('fields','group','order','limit'));
        
        $fields=array('count(UserLanguage.language_id) as count','Language.title');
        $group=array('UserLanguage.language_id');
        $limit=10;
        $order=array('count(UserLanguage.language_id)'=> 'DESC');
        $languages= $this->User->UserLanguage->find('all',compact('fields','group','order','limit'));
        
        $order=array('User.views'=> 'DESC');
        $fields=array('User.name','User.surname1','User.views');
        
        $this->User->recursive=-1;
         $users= $this->User->find('all',compact('fields','order','limit'));
         
         $this->set(compact('users','skills','languages'));
         
    }
    
     public function recover($reset=null){
         if($this->request->data){
          if (isset($this->request->data['User']['email'])) {
            $user= $this->User->findByEmail($this->request->data['User']['email']);
            if(!empty($user)){
                $md5=uniqid(); 
                $user['User']['reset_key']=$md5;
                $this->User->save($user);
                $message='<p>Hola, '.$user['User']['username'].', pulsa <a href="http://findem.es/recuperar-datos/'.$md5.'">aquí</a> para restablecer tu contraseña</p>';
            	try {
                    $email = new CakeEmail('gmail');
                    $email->from('no-reply@gmail.com','Findem');
                    $email->replyTo('no-reply@gmail.com','Findem');
                    $email->to($this->request->data['User']['email']);
                    $email->subject('Restablecer contraseña');
                    $success = $email->send($message);
                    $this->Session->setFlash(__('Te hemos enviado un email con los detalles para restablecer tu contraseña.'));
                } catch (SocketException $e) {
                    $this->log(sprintf('Error enviando mail : %s', $e->getMessage()));
                    }
                    }else{
                       $this->Session->setFlash(__('No hay ningún usuario registrado con ese email.')); 
                    }
                    
        }
         if (isset($this->request->data['User']['password'])) {
            $user= $this->User->findById($this->request->data['User']['id']);
            $user['User']['password']=$this->request->data['User']['password'];
            if(!empty($user)){
                if($this->User->save($user)){
                    $this->Session->setFlash(__('Su contraseña ha sido cambiada')); 
                    $this->redirect(array('action' => 'login'));
                }
                
                    }
                    
        }
         }
        if($reset){
            $user= $this->User->findByResetKey($reset);
             if(!empty($user)){
               $id=$user['User']['id'];
               $this->set(compact('id'));
                    }
        }
    }
   

}
