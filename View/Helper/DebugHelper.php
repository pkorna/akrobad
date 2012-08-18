<?php

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class DebugHelper extends Helper {

	public function log($var){
		return  '<script type="text/javascript">'.
				"	console.log(" . json_encode($var).");".
				'</script>		';
	}
}


