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
                $user=  $this->User->findByUsername($this->request->data['User']['username']);
                $this->Session->write('user', $user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
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

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        //echo '<pre>';
                //print_r($user);die();
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $user);
    }

    public function add() {

            $this->getLists();
            $this->User->create();
            if(!empty($this->request->data))
        {
                
                //Check if image has been uploaded
                if(!empty($this->request->data['User']['upload']['name']))
                {
                        $file = $this->request->data['User']['upload']; //put the data into a var for easy use
                        
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                //where we are putting it
                                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);

                                //prepare the filename for database entry
                                $this->data['User']['image'] = $file['name'];
                                
                        }
                }
            if ($this->User->save($this->data)) {
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
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your user has been updated.'));
                return $this->redirect(array('action' => 'index'));
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

        $this->set(compact('regions'));
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
