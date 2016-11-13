<?php
App::uses('AppModel', 'Model');
/**
 * Roomfeature Model
 *
 * @property Roomtype $Roomtype
 */
class Roomfeature extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'roomtype_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'features' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Roomtype' => array(
			'className' => 'Roomtype',
			'foreignKey' => 'roomtype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
