<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller{
    private $data;
    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel','UsersModel');
		$this->load->library('auth');
    }
    public function index(){
        $this->load->view('admin/login');
    }
    public function error404(){
        $this->load->view('admin/error404');
    }

    public function loginAdmin(){
        $data = array();
        $data['error'] = '';
        if($this->input->post('email') && $this->input->post('pass')){
            $email = $this->input->post('email');
            $email = $this->db->escape_str($email);
            $pass = $this->input->post('pass');
            $admin = $this->UsersModel->read(array('email'=>$email),array(),true);
            if($admin){
                for($i = 0; $i < 50; $i++){
                    $pass = md5($pass);
                }
                if($pass === $admin->password){
                    $this->auth->login($admin);
                    redirect(site_url('admin'));
                }
            }
            $this->data['error'] = "Tên đăng nhập hoặc mật khẩu không đúng";
        }
        $this->load->view('admin/login',$this->data);
    }
    public function logoutAdmin(){
        $this->auth->logoutAdmin();
        redirect(site_url('admin'));
    }
	public function access_denied() {
		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/access_denied');
		$this->load->view('admin/common/footer');
	}
}
