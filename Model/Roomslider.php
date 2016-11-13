<?php
App::uses('AppModel', 'Model');
/**
 * Roomslider Model
 *
 * @property Roomtype $Roomtype
 */
class Roomslider extends AppModel {

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
		'image' => array(
                    'thumbnailSizes' => array(
                    'xvga' => '1024x768',
                    'vga' => '640x480',
                    'thumb' => '360x240'),

                    'rule' => 'isFileUpload',
                    'message' => 'File was missing from submission'
        	),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
				                ),
                'thumbnailSizes' => array(
                    'thumb' => '360x240'
                ),
            )
        )
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
