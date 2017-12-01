<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class WarehouseHistoryModel extends MY_Model {
    protected $tableName = 'warehouse_history';
    
    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'id_warehouse' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'id_order' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'action' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'number_input' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'number_output' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'id_product' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'id_user' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'id_user_to' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
		'note' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'string'
        ),
		'createtime' =>  array(
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
}