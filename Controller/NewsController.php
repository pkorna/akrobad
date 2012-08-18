<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 */
class NewsController extends AppController {

	public function index() {
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

	public function view($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->set('news', $this->News->read(null, $id));
	}

	public function administration_index() {
		$this->set('news', $this->News->find('all', array('order'=> array('created DESC'))));
	}

	public function administration_edit($id = null) {
		$this->News->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->News->read(null, $id);
		}
	}
	
	public function administration_action($id, $mode) {
		if($mode == 'delete'){
			$this->News->delete($id);
		}
		if($mode == 'active'){
			$this->News->read(null, $id);
			$this->News->set('active', ($this->News->data['News']['active'] + 1 )  % 2);
			$this->News->save();
		}
		$this->redirect(array('action' => 'index'));
	}

}
