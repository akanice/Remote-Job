<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller{
    private $data;
    public function __construct() {
        parent::__construct();
        $this->load->model('customersmodel');
		$this->load->library('auth');
    }
	
	public function index($id) {
		$this->data['customer'] = $this->customersmodel->read(array('id'=>$id));
		$this->load->view('user/common/header',$this->data);
		$this->load->view('user/general');
		$this->load->view('user/common/footer');
	}
	
	public function editprofile($id) {
		$this->data['customer'] = $this->customersmodel->read(array('id'=>$id));
		$this->load->view('user/common/header',$this->data);
		$this->load->view('user/edit_profile');
		$this->load->view('user/common/footer');
	}
}
