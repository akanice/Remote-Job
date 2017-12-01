<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_InWareModel extends MY_Model {
    protected $tableName = 'product_in_ware';
    
    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'id_warehouse' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'id_product' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'number_product' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }

    public function getListProducts($id_warehouse,$name,$limit,$offset) {
        $this->db->select('
			products.*,
			product_in_ware.id_product as id_product,
			product_in_ware.number_product as number_product,
			warehouse.name as warehouse_name,
			warehouse.id as warehouse_id,
		');
		$this->db->join('product_in_ware','products.id = product_in_ware.id_product','left');
		$this->db->join('warehouse','warehouse.id = product_in_ware.id_warehouse','left');
        $this->db->like('products.name', $name);
        $this->db->like('warehouse.id', $id_warehouse);
		$this->db->order_by("id","DESC");
        if ($limit != "") {
            $query = $this->db->get('products', $limit, $offset);
        }
        if ($query->num_rows > 0) return $query->result();
        return false;
    }
	
    public function getCountPiw($name) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('products.name', $name);
		$this->db->order_by("id","DESC");
        return $this->db->count_all_results();
        return false;
    }
	
}