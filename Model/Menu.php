<?php
App::uses('AppModel', 'Model');
/**
 * Menu Model
 *
 * @property Pagesdescription $Pagesdescription
 */
class Menu extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'pages' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */

}
