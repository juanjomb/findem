<?php

class SkillsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }


    public function index() {
        $this->set('skills', $this->Skill->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid skill'));
        }

        $skill = $this->Skill->findById($id);
        $this->getLists();
        if (!$skill) {
            throw new NotFoundException(__('Invalid skill'));
        }
        $this->set('skill', $skill);
    }

    public function add() {

            $this->getLists();
            $this->Skill->create();
            if(!empty($this->request->data)){
                if(!isset($item)){
                    $item=$this->request->data;
                }
            if ($this->Skill->save($item)) {
                $this->Session->setFlash(__('Your skill has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your skill.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid skill'));
        }

        $skill = $this->Skill->findById($id);
        if (!$skill) {
            throw new NotFoundException(__('Invalid skill'));
        }
        $this->getLists($skill);
        if ($this->request->is(array('post', 'put'))) {
            $this->Skill->id = $id;
            if ($this->Skill->save($this->request->data)) {
                $this->Session->setFlash(__('Your skill has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your skill.'));
        }

        if (!$this->request->data) {
            $this->request->data = $skill;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Skill->delete($id)) {
            $this->Session->setFlash(
                    __('The skill with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                    __('The skill with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    private function getLists($skill = null) {

        $levels = $this->Skill->Level->find('list', array(
            'fields' => array('Level.title')
        ));
        $this->set(compact('levels'));
    }

  

}
