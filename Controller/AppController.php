<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $components = array(
	'Acl',
	'Auth' => array(
		'loginAction' => array(
			'controller' => 'users',
			'action' => 'login'),
		'loginRedirect' => array(
			'controller' => 'index',
			'action' => 'index'),
		'authError' => 'Brak dostępu!',
		'authenticate' => array(
			'Form' => array(
				'fields' => array('username' => 'username', 'password'=>'password'),
				'userModel' => 'User')
			),),
	'RequestHandler',
	'Session',
	);
	
	public function beforeFilter() {
		$this->helpers[] = 'TwitterBootstrap';
		$this->helpers[] = 'UI';
		$this->helpers[] = 'Debug';
		$this->helpers[] = 'Filemanager';
		
		$this->layout = 'common';
	
		if (isset($this->params['prefix'])) {
			$prefixes = Configure::read('Routing.prefixeLayout');
			if(key_exists($this->params['prefix'], $prefixes)){
				$this->layout = $prefixes[$this->params['prefix']];
			}
		}
	}
}
