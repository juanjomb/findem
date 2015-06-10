<?php

class CategoriesController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index() {
        if($this->Session->read('Auth.User.role')=='admin'){
    $this->paginate = array(
        'limit' => 10,
        'order' => array('title' => 'desc')
    );
    $categories = $this->paginate('Category');
    $this->set('categories', $categories);
     }else{
                 $this->redirect('/pages/denied');
             }
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Categoría no válida'));
        }

        $category = $this->Category->findById($id);
        $this->getLists();
        if (!$category) {
            throw new NotFoundException(__('Categoría no válida'));
        }
        $this->set('category', $category);
    }

    public function add() {
if($this->Session->read('Auth.User.role')=='admin'){
        $this->getLists();
        $this->Category->create();
        if (!empty($this->request->data)) {
            if (!isset($item)) {
                $item = $this->request->data;
            }
            if ($this->Category->save($item)) {
                $this->Session->setFlash(__('La categoría ha sido guardada'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('No se ha podido guardar la categoría'));
        }
         }else{
                 $this->redirect('/pages/denied');
             }
    }

    public function edit($id = null) {
        if($this->Session->read('Auth.User.role')=='admin'){
    
        if (!$id) {
            throw new NotFoundException(__('Categoría no válida'));
        }

        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Categoría no válida'));
        }
         $this->set('category', $category);
        $this->getLists($category);
        if ($this->request->is(array('post', 'put'))) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('La categoría ha sido actualizada'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('No se ha podido actualizar la categoría'));
        }

        if (!$this->request->data) {
            $this->request->data = $category;
        }
         }else{
                 $this->redirect('/pages/denied');
             }
    }

    public function delete($id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Category->delete($id)) {
            $this->Session->setFlash(
                    __('La categoría con id: %s ha sido borrada.', h($id))
            );
        } else {
            $this->Session->setFlash(
                    __('La categoría con id: %s no ha podido ser borrada.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
         }else{
                 $this->redirect('/pages/denied');
             }
    }

    private function getLists() {
       
    }

}
