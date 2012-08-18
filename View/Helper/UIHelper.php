<?php
/* /app/View/Helper/UIHelper.php */
App::uses('TwitterBootstrapHelper', 'View/Helper');

class UIHelper extends TwitterBootstrapHelper {
	/**
	 * question mark icon with tooltip
	 * @param string $label 
	 */
	public function help_icon($label)
	{
		return '<a href="#" class="tooltip_control simple" rel="tooltip" data-original-title="'.$label.'"><i class="icon-question-sign"></i></a>'; 
	}

	public function progress($percentage = 10, $status = 'info', $prefix = '')
	{
		$class = ' progress-'.$status;

		return '<div class="progress progress-striped tooltip_control active' . $class . '" data-original-title="' . $prefix . round($percentage, 1) . '%"><div class="bar"style="width: ' . $percentage . '%;"></div></div>';
	}

	public function info_icon($label)
	{
		return '<a href="#" class="tooltip_control simple" rel="tooltip" data-original-title="' . $label . '"><i class="icon-info-sign"></i></a>'; 
	}

	public function tooltip_icon($label, $icon)
	{
		return '<a href="#" class="tooltip_control simple" rel="tooltip" data-original-title="' . $label . '"><i class="' . $icon . '"></i></a>'; 
	}

	/**
	 * basic table filter component
	 * @param string $source  // filtered vals - css selector
	 * @param string $items // items to filter - css selector  
	 */
	public function filter_base($source, $items)
	{
		
		return   '		<div class="filter_control-wrapper input-prepend">'
				. '		<span class="add-on"><i class="icon-filter"></i> Filtr:</span>'
				.'		<input '
				.'				type="text" class="filter_control" '
				.'				data-items="' . $items . '"'
				.'				data-source="' . $source . '"'
				.'		>'
				.'		</div>';


	}
}