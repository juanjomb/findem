<?php

class UsersController extends AppController {

    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('users', $this->User->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $user);
    }

    public function add() {
        
            $this->getLists();
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
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
    
    private function getLists($user=null){
        
        $regions = $this->User->Region->find('list', array(
        'fields' => array('Region.comunidad')
    ));
        
        $this->set(compact('regions'));
    }
    public function getProvinces($region_id){
        if($this->request->is('ajax')){
            $this->autoRender=false;
        $provinces= $this->User->Province->find('list', array(
            'conditions' => array('Province.region_id' => $region_id),
            'fields' => array('Province.province')
            ));
            echo json_encode($provinces);
        }
        
    }
    
     public function getCities($province_id){
        if($this->request->is('ajax')){
            $this->autoRender=false;
        $cities= $this->User->City->find('list', array(
            'conditions' => array('City.province_id' => $province_id),
            'fields' => array('City.municipio')
            ));
            echo json_encode($cities);
        }
        
    }

}
