<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
	
		$this->Auth->allow('administration_login');
	}

	public function administration_login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
// 				$this->Session->setFlash(__('Zalogowano pomyślnie.'));
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Błędne dane do logowania.'));
			}
		}
	}
	
	public function administration_logout() {
		$this->Session->setFlash(__('Wylogowano pomyślnie'));
		$this->redirect($this->Auth->logout());
	}
	
	public function administration_password() {
		$session=$this->Session->read();
        $id=$this->Auth->User('id');
        $user=$this->User->find('first',array('conditions' => array('id' => $id)));
        $this->set('user',$user);
        if (!empty($this->data)) {
            if ($this->Auth->password($this->data['User']['password'])==$user['User']['password']) {
                if ($this->data['User']['password1']==$this->data['User']['password2']) {
	                $data=$this->data;
	                $user['User']['password']=$this->Auth->password($data['User']['password1']);
	                $this->User->id=$id;
	                $this->User->save($user);
	                $this->Session->setFlash('Password changed.');
	                $this->redirect(array('controller'=>'Toners','action' => 'index'));
                } else {
                    $this->Session->setFlash('New passwords differ.');
                    }
            } else {
                $this->Session->setFlash('Typed passwords did not match.');
            }
        }
	}

}