<?php
App::uses('AppModel', 'Model');

class Gallery extends AppModel {

	public $displayField = 'title';
	
	public $actsAs = array('Containable');

	public $hasAndBelongsToMany = array(
		'Image' => array(
			'className' => 'Image',
			'joinTable' => 'galleries_images',
			'foreignKey' => 'gallery_id',
			'associationForeignKey' => 'image_id',
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

}
