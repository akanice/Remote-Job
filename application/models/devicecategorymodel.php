<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DeviceCategoryModel extends MY_Model {
    protected $tableName = 'device_category';
	protected $_sortedCategories = array();
	
    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'name' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'alias' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'description' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'image' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'thumb' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'meta_title' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'meta_description' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'meta_keywords' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }
	
}