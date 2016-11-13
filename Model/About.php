<?php
App::uses('AppModel', 'Model');
/**
 * About Model
 *
 */
class About extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'description' => array(
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
                    'thumbnailSizes' => array(
                    'xvga' => '1024x768',
                    'vga' => '640x480',
                    'thumb' => '360x240'),

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
				                ),
                'thumbnailSizes' => array(
                    'thumb' => '360x240'
                ),
            )
        )
    );
}
