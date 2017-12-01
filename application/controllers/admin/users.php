<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Users extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
        $this->auth->check();
        if($this->session->userdata('admingroup') == "mod"){
            show_404();
        }
        $this->data['email_header'] = $this->session->userdata('adminemail');
        $this->load->library('form_validation');
        $this->load->model('usersmodel');
		$this->load->library('auth');
    }
    public function index(){
        $this->data['title']    = 'Users';
        $total = $this->usersmodel->readCount(array('email'=>'%'.$this->input->get('email').'%','firstname'=>'%'.$this->input->get('firstname').'%','address'=>'%'.$this->input->get('address').'%'));
        
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/users/';
        $config['total_rows'] = $total;
        $config['uri_segment'] = 3;
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config["num_tag_open"] = "<p class='paginationLink'>";
        $config["num_tag_close"] = '</p>';
        $config["cur_tag_open"] = "<p class='currentLink'>";
        $config["cur_tag_close"] = '</p>';
        $config["first_link"] = "First";
        $config["first_tag_open"] = "<p class='paginationLink'>";
        $config["first_tag_close"] = '</p>';
        $config["last_link"] = "Last";
        $config["last_tag_open"] = "<p class='paginationLink'>";
        $config["last_tag_close"] = '</p>';
        $config["next_link"] = "Next";
        $config["next_tag_open"] = "<p class='paginationLink'>";
        $config["next_tag_close"] = '</p>';
        $config["prev_link"] = "Back";
        $config["prev_tag_open"] = "<p class='paginationLink'>";
        $config["prev_tag_close"] = '</p>';
        $this->pagination->initialize($config);
        $page_number = $this->uri->segment(3);
        if (empty($page_number)) $page_number = 1;
        $start = ($page_number - 1) * $config['per_page'];
        $this->data['page_links'] = $this->pagination->create_links();

		$this->data['list'] = $this->usersmodel->read(array(),array(),false,$config['per_page'],$start);
		$this->data['group_sale'] 				= $this->usersmodel->read(array("group_id"=>[2,3,4]),array(),false);
		$this->data['group_tech'] 				= $this->usersmodel->read(array("group_id"=>5),array(),false);
		
        $this->data['base'] = site_url('admin/users/');
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/users/list');
        $this->load->view('admin/common/footer');
    }

	public function listall(){
        $this->data['title']    = 'Users';
        $total = $this->usersmodel->readCount(array('email'=>'%'.$this->input->get('email').'%','firstname'=>'%'.$this->input->get('firstname').'%','address'=>'%'.$this->input->get('address').'%'));
        $this->data['email'] = $this->input->get('email');
        $this->data['firstname'] = $this->input->get('firstname');
        $this->data['address'] = $this->input->get('address');

        if($this->data['email'] != "" || $this->input->get('firstname') != "" || $this->input->get('address') != ""){
            $config['suffix'] = '?email='.urlencode($this->data['email']).'&firstname='.urlencode($this->data['firstname']).'&address='.urlencode($this->data['address']);
        }
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/users/listall/';
        $config['total_rows'] = $total;
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config["num_tag_open"] = "<p class='paginationLink'>";
        $config["num_tag_close"] = '</p>';
        $config["cur_tag_open"] = "<p class='currentLink'>";
        $config["cur_tag_close"] = '</p>';
        $config["first_link"] = "First";
        $config["first_tag_open"] = "<p class='paginationLink'>";
        $config["first_tag_close"] = '</p>';
        $config["last_link"] = "Last";
        $config["last_tag_open"] = "<p class='paginationLink'>";
        $config["last_tag_close"] = '</p>';
        $config["next_link"] = "Next";
        $config["next_tag_open"] = "<p class='paginationLink'>";
        $config["next_tag_close"] = '</p>';
        $config["prev_link"] = "Back";
        $config["prev_tag_open"] = "<p class='paginationLink'>";
        $config["prev_tag_close"] = '</p>';
        $this->pagination->initialize($config);
        $page_number = $this->uri->segment(4);
        if (empty($page_number)) $page_number = 1;
        $start = ($page_number - 1) * $config['per_page'];
        $this->data['page_links'] = $this->pagination->create_links();
        if($this->data['email'] != "" || $this->input->get('firstname') != "" || $this->input->get('address') != ""){
            $this->data['list'] = $this->usersmodel->read(array('email'=>'%'.$this->input->get('email').'%','firstname'=>'%'.$this->input->get('firstname').'%','address'=>'%'.$this->input->get('address').'%'),array(),false,$config['per_page'],$start);
        }else{
            $this->data['list'] = $this->usersmodel->read(array("group_id!="=>1),array(),false,$config['per_page'],$start);
        }
        $this->data['base'] = site_url('admin/users/');
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/users/listall');
        $this->load->view('admin/common/footer');
    }
	
	public function add() {
		$this->load->model('usergroupmodel');
		$this->load->model('warehousemodel');
		$this->data['usergroups'] = $this->usergroupmodel->read();
		$this->data['userwarehouse'] = $this->warehousemodel->read();
		if($this->input->post('submit') != null){
			$password = $this->input->post("password");
			for($i = 0; $i < 50; $i++){
				$password = md5($password);
			}
            $data = array(
                "firstname" 			=> $this->input->post("firstname"),
                "lastname" 				=> $this->input->post("lastname"),
				"email" 				=> $this->input->post("email"),
                "phone" 				=> $this->input->post("phone"),
                "address" 				=> $this->input->post("address"),
                "avatar" 				=> 'assets/img/profile_sample_icon.png',
                "position" 				=> '1',
                "password" 				=> $password,
                "user_code" 			=> $this->input->post("user_code"),
                "group_id" 				=> $this->input->post("group_id"),
                "id_warehouse" 			=> $this->input->post("id_warehouse"),
            );
            $this->usersmodel->create($data);
            redirect(base_url() . "admin/users");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/users/add');
            $this->load->view('admin/common/footer');
        }
	}
	
    public function view($id){
        $this->data['user'] = $this->usersmodel->read(array('id'=>$id),array(),true);
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/users/edit');
        $this->load->view('admin/common/footer');
    }
	
	public function viewlog($id) {
		$this->load->model('usershistorymodel');
		$user_log = $this->usershistorymodel->viewloguser($id,15,"");
		if ($user_log) {
			foreach ($user_log as $row) {
				if ($row->id_user_to != 0) {
					$user = $this->usersmodel->read(array('id'=>$row->id_user_to),array(),true);
					$row->user2_firstname = $user->firstname;
					$row->user2_lastname = $user->lastname;
				} else {
					$row->user2_firstname = ' ';
					$row->user2_lastname = ' ';
				}
				$data[] = $row;
			}
			$this->data['user_log'] = $data;
		}
		
		$this->data['title'] = 'Lịch sử nhân viên';
		
		$this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/users/viewlog');
        $this->load->view('admin/common/footer');
	}

	public function profile() {
		$this->load->model('usershistorymodel');
		$id_user = $this->session->userdata('adminid');
		$this->data['user_data'] = $this->usersmodel->read(array('id'=>$id_user),array(),true);
		$this->data['user_log'] = $this->usershistorymodel->viewloguser($id_user,15,"");
		
		$this->load->view('admin/common/header',$this->data);
        $this->load->view('user/general');
        $this->load->view('admin/common/footer');
	}
	
    public function delete($id){
        if(isset($id)&&($id>0)&&is_numeric($id)){
            $this->usersmodel->delete(array('id'=>$id));
            redirect(base_url() . "admin/users");
            exit();
        }
    }
    
	public function updatePassword($id='', $password='', $email=''){
        $raw_password 	= $this->input->post('password');
		$email			= $this->input->post('email');
		$password		= $this->_password_encrypt($email, $raw_password);
        $id 			= $this->input->post('id');
		
        if(isset($id)&&($id>0)&&is_numeric($id)&&isset($password)){
            $this->usersmodel->update(array(
                    'password' => $password,
                ),
                array('id'=>$id)
            );
            redirect(site_url('admin/users/view/'.$id));
        }
    }
	
	private function _password_encrypt($email='',$password=''){
        $str = $password;
        for($i = 0; $i < 50; $i++){
			$str = md5($str);
		}
        return $str;
    }
}