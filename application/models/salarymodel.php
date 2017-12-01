<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SalaryModel extends MY_Model {
    protected $tableName = 'salary';

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
        'hard_salary' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'target' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'actual_salary' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'month' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'year' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }

    public function getTotalOrders($customer){
        $userid = $this->session->userdata('adminid');
        $groupid = $this->session->userdata('admingroup');
        $this->db->select('order.*,customers.email as customer_email,users.email as user_email');
        $this->db->join('customers', 'order.customer_id = customers.id', 'left');
        $this->db->join('users', 'order.staff_technique_id = users.id', 'left');

        if($customer){
            $this->db->like('customers.firstname', $customer);
            $this->db->or_like('customers.lastname', $customer);
        }
        if($groupid != 1 && $groupid != 5){
             $this->db->where('order.staff_create_id', $userid);
        }
        $query = $this->db->count_all_results('order');
        return $query;
    }

}
