<?php

class LanguagesController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index() {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            $this->paginate = array(
                'limit' => 10,
                'order' => array('title' => 'desc')
            );
            $languages = $this->paginate('Language');
            $this->set('languages', $languages);
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function view($id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            if (!$id) {
                throw new NotFoundException(__('Invalid language'));
            }

            $language = $this->Language->findById($id);
            $this->getLists();
            if (!$language) {
                throw new NotFoundException(__('Invalid language'));
            }
            $this->set('language', $language);
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function add() {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            $this->getLists();
            $this->Language->create();
            if (!empty($this->request->data)) {
                if (!isset($item)) {
                    $item = $this->request->data;
                }
                if ($this->Language->save($item)) {
                    $this->Session->setFlash(__('Your language has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your language.'));
            }
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function edit($id = null) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            if (!$id) {
                throw new NotFoundException(__('Invalid language'));
            }

            $language = $this->Language->findById($id);
            if (!$language) {
                throw new NotFoundException(__('Invalid language'));
            }
            $this->getLists($language);
            if ($this->request->is(array('post', 'put'))) {
                $this->Language->id = $id;
                if ($this->Language->save($this->request->data)) {
                    $this->Session->setFlash(__('Your language has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your language.'));
            }

            if (!$this->request->data) {
                $this->request->data = $language;
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

            if ($this->Language->delete($id)) {
                $this->Session->setFlash(
                        __('The language with id: %s has been deleted.', h($id))
                );
            } else {
                $this->Session->setFlash(
                        __('The language with id: %s could not be deleted.', h($id))
                );
            }

            return $this->redirect(array('action' => 'index'));
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function getLanguage() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $languages = $this->Language->find('all', array(
                'conditions' => array('Language.title LIKE ' => $this->request->data['sk'] . '%')));
            return json_encode($languages);
        }
    }

    private function getLists($language = null) {
        
    }

}
