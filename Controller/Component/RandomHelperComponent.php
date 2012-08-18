<?php 
class RandomHelperComponent extends Object {

	/**
	 * Random string generator function
	 *
	 * This function will randomly generate a password from a given set of characters
	 *
	 * @param int = 8, length of the password you want to generate
	 * @param string = 0123456789abcdefghijklmnopqrstuvwxyz all possible values
	 * @return string, the password
	 */
	function generateRandomString ($length = 8, $possible = '0123456789abcdefghijklmnopqrstuvwxyz') {
		// initialize variables
		$password = "";
		$i = 0;

		// add random characters to $password until $length is reached
		while ($i < $length) {
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

			// we don't want this character if it's already in the password
			if (!strstr($password, $char)) {
				$password .= $char;
				$i++;
			}
		}
		return $password;
	}

	//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		// saving the controller reference for later use
		$this->controller =& $controller;
	}
	//called after Controller::beforeFilter()
	function startup(&$controller) {
	}
	//called after Controller::beforeRender()
	function beforeRender(&$controller) {
	}
	//called after Controller::render()
	function shutdown(&$controller) {
	}
	//called before Controller::redirect()
	function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
	}
}
?>