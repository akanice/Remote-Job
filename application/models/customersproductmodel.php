<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CustomersProductModel extends MY_Model {
    protected $tableName = 'products';
    
    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'id_customer' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'id_product' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'start_date' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'expire_date' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }

	public function getProductOfCustomer($id_customer) {
		$this->db->select('customers_product.*');
		$this->db->select('products.name as product_name, products.longevity as product_longevity');
		//$this->db->join('customers','customers.id=customers_product.id_customer','left');
		$this->db->join('products', 'products.id=customers_product.id_product', 'left');
		
		$this->db->where('customers_product.id_customer', $id_customer);
		$this->db->order_by("id","DESC");
		
		$query = $this->db->get('customers_product');
		if($query->num_rows>0) return $query->result();
		return false;
	}
}