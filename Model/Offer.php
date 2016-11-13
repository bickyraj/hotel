<?php
App::uses('AppModel', 'Model');
/**
 * Offer Model
 *
 * @property Offerlist $Offerlist
 */
class Offer extends AppModel {

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
		'content' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image' => array(

                    'rule' => 'isFileUpload',
                    'message' => 'File was missing from submission'
        	),
		'image_dir' => array(
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

	public $actsAs = array(
	        'Upload.Upload' => array(
	            'image' => array(
	                'fields' => array(
					                    'dir' => 'image_dir',
					                    'size' => 'image_size',
					                    'type'=>false
					                ),
	                'thumbnailSizes' => array(
	                    'thumb' => '360x240'
	                ),
	            )
	        )
	    );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Offerlist' => array(
			'className' => 'Offerlist',
			'foreignKey' => 'offer_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
