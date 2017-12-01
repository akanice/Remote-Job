<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class WarehouseModel extends MY_Model {
    protected $tableName = 'warehouse';
    
    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'id_user' =>  array(
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
		'address' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'phone' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'note' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'capacity' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'access' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }

    public function getListwarehouse($name,$limit,$offset) {
        $this->db->select('warehouse.*');
        $this->db->like('warehouse.name', $name);
		$this->db->order_by("id","DESC");
        if ($limit != "") {
            $query = $this->db->get('warehouse', $limit, $offset);
        }
        if ($query->num_rows > 0) return $query->result();
        return false;
    }
	
    public function getCountwarehouse($name) {
        $this->db->select('*');
        $this->db->from('warehouse');
        $this->db->like('warehouse.name', $name);
		$this->db->order_by("id","DESC");
        return $this->db->count_all_results();
        return false;
    }
	
	public function getRelatedwarehouse($alias,$limit){
		if (isset($alias)) {
			$this->db->where('alias',$alias);
			$query = $this->db->get('warehouse');
			if($query->num_rows==0) return false;
			else {
				$r = $query->first_row();
				if($r->tour_cat_id){
					$this->db->like("warehouse.tour_cat_id", $r->tour_cat_id);
					$this->db->where("warehouse.alias !=", $r->alias);
					$query2 = $this->db->get("warehouse",$limit);
					if ($query2->num_rows()>0) return $query2->result();
				}
				return false;
			}
		}
	}
	
	public function getFeaturedwarehouseHome($non_show,$limit){
		if (isset($non_show)) {
			$this->db->where('show',1);
			$this->db->where('featured',1);
			$this->db->where('id !=', $non_show);
			$this->db->order_by("id","DESC");
			$query = $this->db->get("warehouse",$limit);
			if ($query->num_rows()>0) return $query->result();
		}
	}
	
	public function getCountProduct($name,$category="",$limit,$offset){
        $this->db->select('warehouse.*');
        $this->db->like('warehouse.name', $name);
		$this->db->order_by("id","DESC");
        if($category != "") {
            $this->db->where('warehouse.tour_cat_id', $category);
        }
        return $this->db->count_all_results();
    }
	
	public function getWarehouse() {
		$this->db->select('warehouse.*,users.firstname as user_firstname, users.lastname as user_lastname');
		$this->db->join('users','warehouse.id_user = users.id','left');
		$query = $this->db->get('warehouse');
		if ($query->num_rows > 0) return $query->result();
        return false;
	}
}