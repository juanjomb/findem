<?php

class FeedbacksController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }


    public function index() {
        $this->set('feedbacks', $this->Feedback->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid feedback'));
        }

        $feedback = $this->Feedback->findById($id);
        $this->getLists();
        if (!$feedback) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        $this->set('feedback', $feedback);
    }

    public function add() {    
        $this->autoRender=false;
            $this->Feedback->create();
            if(!empty($this->request->data)){
                if(!isset($item)){
                    $item=$this->request->data;
                }
            if ($this->Feedback->save($item)) {
                $this->Session->setFlash(__('Your feedback has been saved.'));
                return $this->redirect($this->referer());
            }
            $this->Session->setFlash(__('Unable to add your feedback.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid feedback'));
        }

        $feedback = $this->Feedback->findById($id);
        if (!$feedback) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        $this->getLists($feedback);
        if ($this->request->is(array('post', 'put'))) {
            $this->Feedback->id = $id;
            if ($this->Feedback->save($this->request->data)) {
                $this->Session->setFlash(__('Your feedback has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your feedback.'));
        }

        if (!$this->request->data) {
            $this->request->data = $feedback;
        }
    }
    private function getLists($feedback = null) {
    }
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Feedback->delete($id)) {
            $this->Session->setFlash(
                    __('The feedback with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                    __('The feedback with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }


  

}
