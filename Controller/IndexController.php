<?php
App::uses('AppController', 'Controller');

class IndexController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
	
// 		$this->Auth->allow('administration_login');
	}

	public function administration_index() {
		$this->set('galleries', array());
	}

}