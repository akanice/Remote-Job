<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class NotificationModel extends MY_Model {
    protected $tableName = 'notification';

    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'id_user_from' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'id_user_to' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'order_id' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'status' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'content' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        )
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }

    public function getTotalOrders($customer){
        $this->db->select('order.*,customers.email as customer_email,users.email as user_email');
        $this->db->join('customers', 'order.customer_id = customers.id', 'left');
        $this->db->join('users', 'order.staff_technique_id = users.id', 'left');

        if($customer){
            $this->db->like('customers.email', $customer);
        }
        $query = $this->db->count_all_results('order');
        return $query;
    }

    public function getListOrders($customer,$limit, $offset) {
        $this->db->select('order.*,customers.email as customer_email, customers.firstname as customer_first_name, customers.lastname as customer_last_name, users.email as user_email');
        $this->db->join('customers', 'order.customer_id = customers.id', 'left');
        $this->db->join('users', 'order.staff_technique_id = users.id', 'left');

        if($customer){
            $this->db->like('customers.email', $customer);
        }
        if ($limit != "") {
            $query = $this->db->get('order', $limit, $offset);

        }else{
            $query = $this->db->get('order');
        }
        if ($query->num_rows > 0) return $query->result();
        return false;
    }
}
