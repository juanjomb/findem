<?php

class PostsController extends AppController {

    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('blog','view');
    }

    public function index() {
        if ($this->Session->read('Auth.User.role') == 'admin') {
            $this->paginate = array(
            'limit' => 10,
            'order' => array('created' => 'DESC')
        );
        $posts = $this->paginate('Post');
        $this->set('posts', $posts);
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function view($slug) {
        if (!$slug) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        $this->Post->recursive=2;
        $this->Post->Comment->unBindModel(array(
                 'belongsTo' => array('Post')
                 ));
        $post = $this->Post->findBySlug($slug);
        $this->getLists();
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->Post->updateAll(array(
                'Post.views' => 'Post.views + 1'),
                array('Post.id' => $post['Post']['id']
            ));
        $this->set('post', $post);
    }

    public function add() {
        if ($this->Session->read('Auth.User.role') == 'admin') {

           
            $this->Post->create();
            if (!empty($this->request->data)) {
                $slug = preg_replace('/\s/', '-', $this->request->data['Post']['title']);
                 $post=$this->Post->findBySlug($slug);
            if(!$post){
                $this->request->data['Post']['slug']=$slug;
                $this->request->data['Post']['user_id']=$this->Session->read('Auth.User.id');
                if (!isset($item)) {
                    $item = $this->request->data;
                }
                if ($this->Post->save($item)) {
                    $this->Session->setFlash(__('Tu post ha sido guardado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your post.'));
                }else{
               $this->Session->setFlash(__('El slug está en uso')); 
            }
            }
            $this->set(compact('user_id'));
            
        } else {
            $this->redirect('/pages/denied');
        }
    }

    public function edit($id = null) {
        if ($this->Session->read('Auth.User.role') == 'admin') {

            if (!$id) {
                throw new NotFoundException(__('Invalid post'));
            }

            $post = $this->Post->findById($id);
            if (!$post) {
                throw new NotFoundException(__('Invalid post'));
            }
            $this->set('post', $post);
            $this->getLists($post);
            if ($this->request->is(array('post', 'put'))) {
                $this->Post->id = $id;
                if ($this->Post->save($this->request->data)) {
                    $this->Session->setFlash(__('Your post has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your post.'));
            }

            if (!$this->request->data) {
                $this->request->data = $post;
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

            if ($this->Post->delete($id)) {
                $this->Session->setFlash(
                        __('The post with id: %s has been deleted.', h($id))
                );
            } else {
                $this->Session->setFlash(
                        __('The post with id: %s could not be deleted.', h($id))
                );
            }

            return $this->redirect(array('action' => 'index'));
        } else {
            $this->redirect('/pages/denied');
        }
    }
    
     public function blog() {
            $this->paginate = array(
            'limit' => 5,
            'order' => array('created' => 'asc')
        );
        $posts = $this->paginate('Post');
        
        $order=array('Post.views'=>'DESC');
        $limit=10;
        $mostviewed=$this->Post->find('all',compact('limit','order'));
        
        $this->set(compact('posts','mostviewed'));
        
    }

    private function getLists() {

        for ($i = 1970; $i <= 2015; $i++) {
            $years[$i] = $i;
        }
        $this->set(compact('years'));
    }

}
