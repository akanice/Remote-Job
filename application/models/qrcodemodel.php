<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class QrcodeModel extends MY_Model {
    protected $tableName = 'qrcode';

    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'number' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'code' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'link' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'string'
        ),
		'qrcode_image' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'customer_id' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'status' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }
	
}