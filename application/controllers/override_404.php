<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class override_404 extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
    }
    
	public function index() {
		$this->data['title'] = 'Page not found';
		$this->data['pagetitle']    = 'Page not found';
		$this->output->set_status_header('404'); 
		
		$this->load->view('admin/common/header',$this->data);
        $this->load->view('home/404_page');
        $this->load->view('admin/common/footer');
	}
}
