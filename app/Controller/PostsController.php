<?php
class PostsController extends AppController {
    var $helpers = array ('Html','Form');
    var $name = 'Posts';

    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }

	public function add() {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }		
	}
}