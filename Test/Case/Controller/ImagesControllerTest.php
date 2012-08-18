<?php
App::uses('ImagesController', 'Controller');

/**
 * TestImagesController *
 */
class TestImagesController extends ImagesController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * ImagesController Test Case
 *
 */
class ImagesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.image', 'app.gallery', 'app.galleries_image');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Images = new TestImagesController();
		$this->Images->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Images);

		parent::tearDown();
	}

/**
 * testAdministrationIndex method
 *
 * @return void
 */
	public function testAdministrationIndex() {

	}
/**
 * testAdministrationView method
 *
 * @return void
 */
	public function testAdministrationView() {

	}
/**
 * testAdministrationAdd method
 *
 * @return void
 */
	public function testAdministrationAdd() {

	}
/**
 * testAdministrationEdit method
 *
 * @return void
 */
	public function testAdministrationEdit() {

	}
/**
 * testAdministrationDelete method
 *
 * @return void
 */
	public function testAdministrationDelete() {

	}
}
