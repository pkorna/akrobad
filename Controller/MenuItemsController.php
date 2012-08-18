<?php
App::uses('AppController', 'Controller');
/**
 * MenuItems Controller
 *
 * @property MenuItem $MenuItem
 */
class MenuItemsController extends AppController {
	
	public $uses = array('MenuItem');

	public function administration_index() {
		$this->set('menuItems', $this->MenuItem->find('all', array('order'=> array('MenuItem.order ASC'), 'conditions' => array('MenuItem.parent_id' => 0))));
	}

	public function administration_order($id, $mode = null) {
		$this->MenuItem->recursive = -1;
		$element = $this->MenuItem->findById($id);
	
		if($mode == 'up'){
			if(is_array($element) && sizeof($element)){
				$element2 = $this->MenuItem->find('first', array('conditions' => array('MenuItem.order < ' . $element['MenuItem']['order'], 'MenuItem.parent_id' => $element['MenuItem']['parent_id']), 'order' => array('order' => 'desc')));
			}
		}
	
		if($mode == 'down'){
			if(is_array($element) && sizeof($element)){
				$element2 = $this->MenuItem->find('first', array('conditions' => array('MenuItem.order > ' . $element['MenuItem']['order'], 'MenuItem.parent_id' => $element['MenuItem']['parent_id']), 'order' => array('order' => 'asc')));
			}
		}
	
		if(is_array($element) && sizeof($element) && is_array($element2) && sizeof($element2)){
			$this->MenuItem->read(null, $element['MenuItem']['id']);
			$this->MenuItem->set('order', $element2['MenuItem']['order']);
			$this->MenuItem->save();
	
			$this->MenuItem->read(null, $element2['MenuItem']['id']);
			$this->MenuItem->set('order', $element['MenuItem']['order']);
			$this->MenuItem->save();
		}
	
		$this->redirect(array('action' => 'index'));
	}
	
	public function administration_action($id, $mode) {
		if($mode == 'delete'){
			$this->MenuItem->delete($id);
		}
		if($mode == 'active'){
			$this->MenuItem->read(null, $id);
			$this->MenuItem->set('active', ($this->MenuItem->data['MenuItem']['active'] + 1 )  % 2);
			$this->MenuItem->save();
		}
		$this->redirect(array('action' => 'index'));
	}
	
	public function administration_edit($id = null) {
		$this->MenuItem->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$order = true;
			if($this->MenuItem->exists())
				$order = false;
			
			if ($this->MenuItem->save($this->request->data)) {
				
				if($order){
					$this->MenuItem->read(null, $this->MenuItem->id);
					$this->MenuItem->set('order', $this->MenuItem->id);
					$this->MenuItem->save();
				}

				$this->redirect(array('action' => 'index'));
			} 
		} else {
			$this->request->data = $this->MenuItem->read(null, $id);
		}
		
		$parentMenuItems = $this->MenuItem->find('list', array('conditions' => array('parent_id' => 0, 'editable' => 1, 'not' => array('id' => $id)), 'fields' => array('id', 'label')));
		$this->set(compact('parentMenuItems'));
	}
}
