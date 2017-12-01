<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersCart extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth = new Auth();
        $this->auth->check();
        if($this->session->userdata('admingroup') == "mod"){
            show_404();
        }
        $this->data['email_header'] = $this->session->userdata('adminemail');
        $this->load->model('userscartmodel');
    }
	
    public function index(){
        $this->data['title']    = 'Quản lý giỏ đồ';
		$id_current_user = $this->session->userdata('adminid');
		$this->data['name'] = $this->input->get('name');
		if($this->data['name'] != ""){
            $config['suffix'] = '?name='.urlencode($this->data['name']);
        }

		if($this->data['name'] != ""){
            $this->data['list'] = $this->userscartmodel->getProductsByUser($id_current_user,$this->input->get('name'));
        }else{
            $this->data['list'] = $this->userscartmodel->getProductsByUser($id_current_user);
        }
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/userscart/list');
        $this->load->view('admin/common/footer');
    }
	
	public function submittowarehouse() {
		$this->data['title']    = 'Chốt đơn với kho';
		$id_current_user = $this->session->userdata('adminid');
		$this->load->model('warehousemodel');
		$this->data['warehouse'] = $this->warehousemodel->getWarehouse();
		
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/userscart/submittowarehouse');
        $this->load->view('admin/common/footer');
	}
}