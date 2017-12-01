<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
        $this->auth->check();
        $this->load->model('usersmodel');
		$this->load->library('auth');
	}
    public function index(){
        $this->data['title']    = 'Dashboard';
        $this->data['email_header'] = $this->session->userdata('adminemail');
        $this->load->model('ordersmodel');
        $this->load->model('customersmodel');
		
		$newest_orders = $this->ordersmodel->getOrdersToday();
		if ($newest_orders || ($newest_orders !='')) {
			$this->data['count_ordersnew'] = count($newest_orders);
			$total = 0;
			foreach ($newest_orders as $row) {
				$total = $total + $row->total_price;
			}
			$this->data['total_ordersnew'] = $total;
		}
		
        $this->load->view('admin/common/header',  $this->data);
        $this->load->view('admin/index');
        $this->load->view('admin/common/footer');
    }
}
