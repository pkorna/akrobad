
<?php if(!isset($images)) return;?>

<?php 
$ret_array = array();

foreach ($images as $key => $value){
	$tmp = array();
	$tmp['name'] = $value['imageRealName'];
	$tmp['size'] = '';
	$tmp['title'] = $value['description'];
	$tmp['url'] = $this->Html->url($this->Filemanager->getImageUrl($value['imageKey']));
	$tmp['thumbnail_url'] = $this->Html->url($this->Filemanager->getImageUrl($value['imageKey'], 75, 75));
	$tmp['delete_url'] = $this->Html->url($this->Filemanager->getDeleteImageUrl($value['id']));
	$tmp['delete_type'] = "DELETE";
	$tmp['titleUrl'] = $this->Html->url($this->Filemanager->getEditTitleImageUrl($gallery_id, $value['id']));
	
	$ret_array[] = $tmp;
}?>

<?php echo json_encode($ret_array); ?>