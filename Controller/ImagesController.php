<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {
	
	public $uses = array('Gallery', 'Image');

	public function administration_editTitle($gallery_id, $id) {
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			$this->redirect(array('action' => 'images', 'controller' => 'galleries', $gallery_id));
		}
		if (!empty($this->request->data)) {
			if ($this->Image->save($this->request->data))
				$this->redirect(array('action' => 'images', 'controller' => 'galleries', $gallery_id));
		} else {
			$this->request->data = $this->Image->read(null, $id);
		}
	}

}
