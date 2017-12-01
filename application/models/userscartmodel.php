<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersCartModel extends MY_Model {
    protected $tableName = 'users_cart';

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
        'id_product' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
		'product_number' => array(
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
		$this->db->select('users_cart.*,products.*');
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

}