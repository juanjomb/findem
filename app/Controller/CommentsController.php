<?php

class CommentsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('postComment');
    }

    public function index($post_id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            $this->paginate = array(
            'limit' => 10,
            'order' => array('created' => 'asc'),
            'conditions'=>array('Comment.post_id'=>$post_id)
        );
        $comments = $this->paginate('Comment');
        $this->set(compact('comments','post_id'));
        } else {
            $this->redirect('/pages/denied');
        }
    }


    public function add($post_id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            $this->getLists();
            $this->Comment->create();
            if (!empty($this->request->data)) {
                if (!isset($item)) {
                    $item = $this->request->data;
                }
                if ($this->Comment->save($item)) {
                    $this->Session->setFlash(__('El comentario ha sido guardado.'));
                    return $this->redirect(array('action' => 'index',$post_id));
                }
                $this->Session->setFlash(__('No se ha podido guardar el comentario.'));
            }
            $this->set(compact('post_id'));
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function edit($id = null) {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            if (!$id) {
                throw new NotFoundException(__('Comentario no válido'));
            }

            $comment = $this->Comment->findById($id);
            if (!$comment) {
                throw new NotFoundException(__('Comentario no válido'));
            }
            $this->set('comment', $comment);
            $this->getLists($comment);
            if ($this->request->is(array('comment', 'put'))) {
                $this->Comment->id = $id;
                if ($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash(__('El comentario ha sido editado.'));
                    return $this->redirect(array('action' => 'index',$comment['Comment']['post_id']));
                }
                $this->Session->setFlash(__('No se ha podido editar el comentario.'));
            }

            if (!$this->request->data) {
                $this->request->data = $comment;
            }
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function delete($id,$post_id) {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }

            if ($this->Comment->delete($id)) {
                $this->Session->setFlash(
                        __('El comentario con id: %s ha sido borrado.', h($id))
                );
            } else {
                $this->Session->setFlash(
                        __('El comentario con id: %s no ha podido ser borrado.', h($id))
                );
            }

            return $this->redirect(array('action' => 'index',$post_id));
        } else {
            $this->redirect('/pages/denied');
        }
    }

    private function getLists() {
    }
public function postComment(){
     if ($this->request->is('ajax')) { 
            $this->autoRender = false;
            $this->Comment->create();
            $data['comment']=$this->request->data['comment'];
            $data['post_id']=$this->request->data['post_id'];
            $data['user_id']=$this->request->data['user_id'];
            if ($this->Comment->save($data)) {
                $this->Comment->Post->recursive=2;
                $this->Comment->unBindModel(array(
                 'belongsTo' => array('Post')
                 ));
                $this->Comment->Post->unBindModel(array(
                 'belongsTo' => array('User')
                 ));
                $post=$this->Comment->Post->findById($this->request->data['post_id']);
                
                $this->set(compact('post'));
                $this->render('/Elements/comments','ajax');
            } 
        }
}
}
