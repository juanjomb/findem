<?php

class LevelsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }


    public function index() {
        $this->set('levels', $this->Level->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid level'));
        }

        $level = $this->Level->findById($id);
        $this->getLists();
        if (!$level) {
            throw new NotFoundException(__('Invalid level'));
        }
        $this->set('level', $level);
    }

    public function add() {

            $this->getLists();
            $this->Level->create();
            if(!empty($this->request->data)){
                if(!isset($item)){
                    $item=$this->request->data;
                }
            if ($this->Level->save($item)) {
                $this->Session->setFlash(__('Your level has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your level.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid level'));
        }

        $level = $this->Level->findById($id);
        if (!$level) {
            throw new NotFoundException(__('Invalid level'));
        }
        $this->getLists($level);
        if ($this->request->is(array('post', 'put'))) {
            $this->Level->id = $id;
            if ($this->Level->save($this->request->data)) {
                $this->Session->setFlash(__('Your level has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your level.'));
        }

        if (!$this->request->data) {
            $this->request->data = $level;
        }
    }
    private function getLists($level = null) {
    }
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Level->delete($id)) {
            $this->Session->setFlash(
                    __('The level with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                    __('The level with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }


  

}
