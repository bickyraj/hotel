<?php
App::uses('AppModel', 'Model');
/**
 * Feature Model
 *
 */
class Feature extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

		public function totalFeatures()
	    {
	      	$total = $this->find('count');

	      	return $total;
	    } 
}
