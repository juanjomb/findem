<?php

class EducationsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index($user_id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            $conditions = array('user_id' => $user_id);
            $educations = $this->Education->find('all', compact('conditions'));
            $this->set(compact('educations','user_id'));
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Formación no válida'));
        }

        $education = $this->Education->findById($id);
        $this->getLists();
        if (!$education) {
            throw new NotFoundException(__('Formación no válida'));
        }
        $this->set('education', $education);
    }

    public function add($user_id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {


            $this->getLists();
            $this->Education->create();
            if (!empty($this->request->data)) {
                if (!isset($item)) {
                    $item = $this->request->data;
                }
                if ($this->Education->save($item)) {
                    $this->Session->setFlash(__('La formación ha sido guardada'));
                    return $this->redirect(array('action' => 'index',$user_id));
                }
                $this->Session->setFlash(__('No se ha podido guardar la formación'));
            }
            $this->set(compact('user_id'));
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function edit($id = null) {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            if (!$id) {
                throw new NotFoundException(__('Formación no válida'));
            }

            $education = $this->Education->findById($id);
            if (!$education) {
                throw new NotFoundException(__('Formación no válida'));
            }
            $this->set('education', $education);
            $this->getLists($education);
            if ($this->request->is(array('post', 'put'))) {
                $this->Education->id = $id;
                if ($this->Education->save($this->request->data)) {
                    $this->Session->setFlash(__('La educación ha sido actualizada'));
                    return $this->redirect(array('action' => 'index',$education['Education']['user_id']));
                }
                $this->Session->setFlash(__('La educación no ha podido ser actualizada'));
            }

            if (!$this->request->data) {
                $this->request->data = $education;
            }
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function delete($id,$user_id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }

            if ($this->Education->delete($id)) {
                $this->Session->setFlash(
                        __('La educación con id: %s ha sido borrada.', h($id))
                );
            } else {
                $this->Session->setFlash(
                        __('La educación con id: %s no ha podido ser borrada.', h($id))
                );
            }

            return $this->redirect(array('action' => 'index',$user_id));
        } else {
            $this->redirect('/pages/denied');
        }
    }

    private function getLists() {

        for ($i = 1970; $i <= 2015; $i++) {
            $years[$i] = $i;
        }
        $this->set(compact('years'));
    }

}
