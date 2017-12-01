<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersHistoryModel extends MY_Model {
    protected $tableName = 'users_history';

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
		'id_user_to' => array(
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
        'type' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }
	
	public function viewloguser($id_user,$limit) {
		$this->db->select('users_history.*,users.firstname as user_firstname,users.lastname as user_lastname');
		$this->db->join('users','users_history.id_user = users.id','left');
		$this->db->like('id_user',$id_user);
		$this->db->or_like('id_user_to',$id_user);
		$this->db->order_by('datetime','DESC');
		if ($limit != "") {
            $query = $this->db->get('users_history', $limit);
        } else {
			$query = $this->db->get('users_history');
		}
		if ($query->num_rows() > 0) {
			// foreach ($query->result() as $row) {
				// $data[] = $row;
			// }
			// return $data;
			return $query->result();
		}
		return false;
	}
	
	public function getUserHistoryFromOrder($id_order,$action) {
		$this->db->select('users_history.*,users.firstname as user_firstname,users.lastname as user_lastname');
		$this->db->join('users','users_history.id_user_to = users.id','left');
		$this->db->where('id_order',$id_order);
		$this->db->order_by('datetime','DESC');
		if ($action != "") {
            $this->db->where('action',$action);
        }
		$query = $this->db->get('users_history');
		if ($query->num_rows() > 0) {
			// foreach ($query->result() as $row) {
				// $data[] = $row;
			// }
			// return $data;
			return $query->row();
		}
		return false;
	}
}
