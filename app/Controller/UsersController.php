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
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your user.'));
        }
    }
}
