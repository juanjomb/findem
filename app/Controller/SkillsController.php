<?php

class SkillsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            $this->paginate = array(
                'limit' => 10,
                'order' => array('title' => 'desc')
            );
            $skills = $this->paginate('Skill');
            $this->set('skills', $skills);
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function view($id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            if (!$id) {
                throw new NotFoundException(__('Invalid skill'));
            }

            $skill = $this->Skill->findById($id);
            $this->getLists();
            if (!$skill) {
                throw new NotFoundException(__('Invalid skill'));
            }
            $this->set('skill', $skill);
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function add() {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            $this->getLists();
            $this->Skill->create();
            if (!empty($this->request->data)) {
                if (!isset($item)) {
                    $item = $this->request->data;
                }
                if ($this->Skill->save($item)) {
                    $this->Session->setFlash(__('Your skill has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your skill.'));
            }
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function edit($id = null) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
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
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function delete($id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
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
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function getSkill() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $skills = $this->Skill->find('all', array(
                'conditions' => array('Skill.title LIKE ' => $this->request->data['sk'] . '%')));
            return json_encode($skills);
        }
    }

    private function getLists($skill = null) {
        
    }

}
