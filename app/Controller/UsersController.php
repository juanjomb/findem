<?php

class UsersController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $user = $this->User->findByUsername($this->request->data['User']['username']);
                $this->Session->write('user', $user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
                return $this->redirect('/');
            }
        }
    }

    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->set('users', $this->User->find('all'));
    }

    public function isAdmin($user) {
        if ($user['role'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        $this->getLists($user);

        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $user);
    }

    public function add() {

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
                $this->Session->setFlash(__('Your user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your user.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
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
                $this->Session->setFlash(__('Your user has been updated.'));
                
                return $this->redirect(array('action' => 'view',$id));
            }
            $this->Session->setFlash(__('Unable to update your user.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(
                    __('The user with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                    __('The user with id: %s could not be deleted.', h($id))
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
        $userskills = $this->User->UserSkill->find('all',array('conditions' => array('UserSkill.user_id' => $user['User']['id'])));
        $experiences = $this->User->Experience->find('all', array('conditions' => array('Experience.user_id' => $user['User']['id'])));
        $educations = $this->User->Education->find('all', array('conditions' => array('Education.user_id' => $user['User']['id'])));
        $this->set(compact('regions','experiences','years','userskills','skills', 'educations'));
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
                echo json_encode($this->request->data);
            } else {
                $data['ko']=0;
                echo json_encode($data);
            }
        }
    }
    
    public function saveSkill() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
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
    
    
       public function saveExperience() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->User->Experience->create();
            if ($this->User->Experience->save($this->request->data)) {
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

    public function register() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $user = $this->User->findByUsername($this->request->data['username']);
            if (empty($user)) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $result['ok']='Your account have been successfully registered';
                    echo json_encode($result);
                } else {
                    $result['ko']='Error on registering';
                    echo json_encode($result);
                }
            } else {
                $result['ko']='Username already exists';
                echo json_encode($result);
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

}
