<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property Gallery $Gallery
 */
class Image extends AppModel {
/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'development';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Gallery' => array(
			'className' => 'Gallery',
			'joinTable' => 'galleries_images',
			'foreignKey' => 'image_id',
			'associationForeignKey' => 'gallery_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
// 	IMAGEROOT IMAGEROOTTHUMBS
	public function addSingleElement($uploadedFile) {
		if(count($_POST) == 0)
			return false;
	
		App::import('Component','RandomHelper');

		App::import('Utility','Folder');
		App::import('Utility','File');
	
		$this->RandomHelper = new RandomHelperComponent();
		
		$file = new File($uploadedFile['tmp_name']);
		$file_ext = strtolower(substr(strrchr($uploadedFile['name'], "."), 1));
		 
		$image_id = 0;
	
		if($file->exists() && in_array($file_ext, array('jpg', 'jpeg', 'gif', 'png'))){
	
			$randName = true;
			while($randName){
				$new_name = $this->RandomHelper->generateRandomString();
				$image = $this->find('first', array('conditions' => array('imageKey' => $new_name)));
					
				if(!is_array($image) || count($image) == 0){
					$randName = false;
	
					$this->create();
					$this->save(array(
							'imageKey' => $new_name,
							'imageRealName' => $uploadedFile['name'],
							'type' => $file->mime(),
							'extension' => $file_ext,
					));
	
					$file->copy(IMAGEROOT . $new_name . '.' . $file_ext);
	
					return $this->id;
				}
			}
		}
	
		
	}

}
