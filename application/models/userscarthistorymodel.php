<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersCartHistoryModel extends MY_Model {
    protected $tableName = 'users_cart_history';

    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'id_user' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'id_order' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
		'id_product' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
		'action' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'datetime' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }
	
	public function getProductsByUser($id_user,$product_name=null,$limit=null) {
		$this->db->select('users_cart.*');
		$this->db->join('products','users_cart.id_product = products.id','left');
		$this->db->where('users_cart.id_user',$id_user);
		
		if ($product_name != "") {
			$this->db->like('products.name',$product_name);
		}
		if ($limit != "") {
            $query = $this->db->get('users_cart', $limit);
        } else {
			$query = $this->db->get('users_cart');
		}
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}
	
	public function changeNumberProduct($id_user,$id_product,$quantity) {
		$this->db->select('userscart');
		$this->db->where('users_cart.id_user',$id_user);
		$this->db->where('users_cart.id_product',$id_product);
		$query = $this->db->get('users_cart');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$current_quantity = $row->product_number;
			$current_quantity = $current_quantity - $quantity;
		}
		
	}
}