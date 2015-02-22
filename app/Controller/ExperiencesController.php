<?php

class ExperiencesController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index($user_id) {
        $conditions = array('user_id' => $user_id);
        $experiences = $this->Experience->find('all', compact('conditions'));
        $this->set(compact('experiences'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid experience'));
        }

        $experience = $this->Experience->findById($id);
        $this->getLists();
        if (!$experience) {
            throw new NotFoundException(__('Invalid experience'));
        }
        $this->set('experience', $experience);
    }

    public function add() {

        $this->getLists();
        $this->Experience->create();
        if (!empty($this->request->data)) {
            if (!isset($item)) {
                $item = $this->request->data;
            }
            if ($this->Experience->save($item)) {
                $this->Session->setFlash(__('Your experience has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your experience.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid experience'));
        }

        $experience = $this->Experience->findById($id);
        if (!$experience) {
            throw new NotFoundException(__('Invalid experience'));
        }
         $this->set('experience', $experience);
        $this->getLists($experience);
        if ($this->request->is(array('post', 'put'))) {
            $this->Experience->id = $id;
            if ($this->Experience->save($this->request->data)) {
                $this->Session->setFlash(__('Your experience has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your experience.'));
        }

        if (!$this->request->data) {
            $this->request->data = $experience;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Experience->delete($id)) {
            $this->Session->setFlash(
                    __('The experience with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                    __('The experience with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    private function getLists() {
        
        for ($i = 1970; $i <= 2015; $i++) {
            $years[$i] = $i;
        }
        $this->set(compact('years'));
    }

}
