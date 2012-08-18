<?php
App::uses('AppController', 'Controller');

class GalleriesController extends AppController {

	public $uses = array('Gallery', 'Image');
	
	public function administration_index() {
		$this->set('galleries', $this->Gallery->find('all', array('order' => array('Gallery.order' => 'asc'))));
	}
	
	public function administration_edit($id = 0) {
		if (empty($this->data)){
	        $this->Gallery->id = $id;
	        $this->data = $this->Gallery->read();
	    }else{
   			if($id > 0)
   				$this->Gallery->id = $id;
   			
   			$data = $this->data['Gallery'];
   			
   			$this->Gallery->save($data);
   			
   			if($id == 0){
	   			$this->Gallery->read(null, $this->Gallery->id);
				$this->Gallery->set('order', $this->Gallery->id);
				$this->Gallery->save();
   			}
   			
   			$this->redirect(array('action' => 'index'));
   		}

	}
	
	public function administration_order($id, $mode = null) {
		$this->Gallery->recursive = -1;
		$element = $this->Gallery->findById($id);
	
		if($mode == 'up'){
			if(is_array($element) && sizeof($element)){
				$element2 = $this->Gallery->find('first', array('conditions' => array('Gallery.order < ' . $element['Gallery']['order']), 'order' => array('order' => 'desc')));
			}
		}
	
		if($mode == 'down'){
			if(is_array($element) && sizeof($element)){
				$element2 = $this->Gallery->find('first', array('conditions' => array('Gallery.order > ' . $element['Gallery']['order']), 'order' => array('order' => 'asc')));
			}
		}
	
		if(is_array($element) && sizeof($element) && is_array($element2) && sizeof($element2)){
			$this->Gallery->read(null, $element['Gallery']['id']);
			$this->Gallery->set('order', $element2['Gallery']['order']);
			$this->Gallery->save();
				
			$this->Gallery->read(null, $element2['Gallery']['id']);
			$this->Gallery->set('order', $element['Gallery']['order']);
			$this->Gallery->save();
		}
	
		$this->redirect(array('action' => 'index'));
	}
	
	public function administration_action($id, $mode) {
		if($mode == 'delete'){
			$this->Gallery->delete($id);
		}
		if($mode == 'active'){
			$this->Gallery->read(null, $id);
			$this->Gallery->set('active', ($this->Gallery->data['Gallery']['active'] + 1 )  % 2);
			$this->Gallery->save();
		}
		$this->redirect(array('action' => 'index'));
	}
	
	public function administration_getimages($id = 0) {
		$data = array();
		
		if(count($this->data) > 0 && isset($this->data['Gallery']['files'][0]) && is_array($this->data['Gallery']['files'][0])){
			$ret = $this->Image->addSingleElement($this->data['Gallery']['files'][0]);
			
			if(is_numeric($ret) && $ret > 0){
				
				try{
				$relatrdmodel = ClassRegistry::init("galleries_images");
				$relatrdmodel->save(array('gallery_id' => $id, 'image_id' => $ret));
				
				$data = $this->Gallery->find('first', array(
						'conditions' => array('Gallery.id' => $id),
						'contain' => array('Image' => array('conditions' => array('Image.id' => $ret)))
				));
				}catch (Exception $e){}
			}
		} 
		
		if(!(count($data) > 0))
			$data = $this->Gallery->find('first', array('conditions' => array('Gallery.id' => $id)));
		
		if(isset($data['Image']) && is_array($data['Image']))
			$this->set('images', $data['Image']);
		
		$this->set('gallery_id', $id);
	}
	
	public function administration_images($id = 0) {
		$this->set('id', $id);
	}
}
