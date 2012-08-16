<?php
/**
 * PostFixture
 *
 */
class PostFixture extends CakeTestFixture {
/**
 * Import
 *
 * @var array
 */
	public $import = array('table' => 'posts', 'connection' => 'development');


/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'title' => 'The title',
			'body' => 'This is the post body.'
		),
		array(
			'title' => 'A title once again',
			'body' => 'And the post body follows.',
		),
		array(
			'title' => 'Title strikes back',
			'body' => 'This is really exciting! Not.',
		),
	);
}
