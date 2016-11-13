<?php
App::uses('AppModel', 'Model');
/**
 * Roomtype Model
 *
 * @property Roomfeature $Roomfeature
 */
class Roomtype extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'type' => array(
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
		'Reservation' => array(
			'className' => 'Reservation',
			'foreignKey' => 'roomtype_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Roomfeature' => array(
			'className' => 'Roomfeature',
			'foreignKey' => 'roomtype_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Roomslider' => array(
			'className' => 'Roomslider',
			'foreignKey' => 'roomtype_id',
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

		public function totalRoomtypes()
	    {
	      	$total = $this->find('count');

	      	return $total;
	    } 

}
