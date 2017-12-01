<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DeviceModel extends MY_Model {
    protected $tableName = 'device';

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
		'cat_id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'sku' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'made_in' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'createtime' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'price' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'sell_price' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'description' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'specifications' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'short_description' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'description' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'image' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'thumb' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'specify_image' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'packpage_accessories' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
		'device_tag' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
		'media' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'featured' => array(
            'isIndex'   => false,
            'nullable'  => true,
            'type'      => 'integer'
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
	
	public function getListDevice($name,$limit,$offset) {
        $this->db->select('device.*');
        $this->db->like('device.name', $name);
		$this->db->order_by("id","DESC");
        if ($limit != "") {
            $query = $this->db->get('device', $limit, $offset);
        }
        if ($query->num_rows > 0) return $query->result();
        return false;
    }
}