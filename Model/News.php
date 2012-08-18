<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 */
class News extends AppModel {
/**
 * Use database config
 *
 * @var string
 */

	public $useDbConfig = 'development';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
}
