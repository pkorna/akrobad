<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class FilesController extends AppController {
	
	public $uses = array("Image");
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow("getImage");
	}

	public function getImage($imageKey = null, $width = null, $height = null) {
		$image = $this->Image->find('first', array('conditions' => array('imageKey' => $imageKey)));
		
		if(is_array($image) && count($image) > 0){
			$this->ImageTool = $this->Components->load('ImageTool');
			
			$extension = $image['Image']['extension'];
			
			if(($width == null || $height == null) || $height * $width > 1000000){
				$size = getimagesize(IMAGEROOT . $image['Image']['imageKey'] . '.' . $extension);
				$width = $size[0];
				$height = $size[1];
			}

			$file_to_upload = IMAGEROOTTHUMBS . $image['Image']['imageKey'] . '-' . $width . 'x' . $height . '.' . $extension;
			
			$real_file = new File(IMAGEROOT . $image['Image']['imageKey'] . '.' . $extension);
			$file = new File($file_to_upload);
			
			if($file->exists()){
				if($real_file->lastChange() > $file->lastChange())
					$file->delete();
			}
			
			if(!$file->exists()){
				$this->ImageTool->resize(array(
					'afterCallbacks' => null,
		            'compression' => null,
		            'keepRatio' => false,
		            'paddings' => true,
		            'enlarge' => true,
		            'quality' => null,
		            'chmod' => 0777,
		            'units' => 'px',
		            'height' => $height,
		            'output' => $file_to_upload,
		            'width' => $width,
		            'input' => IMAGEROOT . $image['Image']['imageKey'] . '.' . $extension,
		            'crop' => true
				));
			}
			
			$this->FileManager = $this->Components->load('FileManager');
			$this->FileManager->output_file($file_to_upload, $imageKey);
		}
		
		exit;
	}
	
	public function deleteFile($imageId) {
		$image = $this->Image->find('first', array('conditions' => array('id' => $imageId)));
		if(is_array($image) && count($image) > 0){
			$file = new File($IMAGEROOT . $image['Image']['imageKey'] . '.' . $image['Image']['extension']);
			$file->delete();
		}
		$this->Image->delete($imageId);
		exit;
	}
	
	
	

}
