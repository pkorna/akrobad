<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Helper', 'View');

class FilemanagerHelper extends AppHelper {

	public function getImageUrl($imageKey, $width = null, $height = null){
		return '/files/getImage/' . $imageKey . '/' . $width . '/' . $height;
	}
	
	public function getDeleteImageUrl($imageId){
		return '/files/deleteFile/' . $imageId;
	}
	
	public function getEditTitleImageUrl($galleryId, $imageId){
		return '/administration/images/editTitle/' . $galleryId . '/' . $imageId;
	}
	
}


