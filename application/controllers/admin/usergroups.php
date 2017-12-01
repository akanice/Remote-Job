<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserGroups extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth = new Auth();
        //$this->auth->checkAdministratorPermission();
        $this->data['permission'] = $this->auth->adminPermissionList;
        $this->data['email_header'] = $this->session->userdata('adminemail');
        $this->load->model('usergroupmodel');
        $this->load->model('usersmodel');
        $this->data['adminid'] = $this->session->userdata('adminid');
        $this->data['admingroup'] = $this->session->userdata('admingroup');
        $this->data['auth'] = $this->auth;
    }
    public function index(){
        if ($this->data['admingroup'] == 1) {
			$this->data['title'] = 'Danh sách nhóm nhân viên';
			$total = $this->usergroupmodel->readCount(array('name'=>'%'.$this->input->get('name').'%'));
			$this->data['name'] = $this->input->get('name');
			if($this->data['name'] != ""){
				$config['suffix'] = '?name='.urlencode($this->data['name']);
			}
			//Pagination
			$this->load->library('pagination');
			$config['base_url'] = base_url() . 'admin/admingroups/';
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
			if($this->data['name'] != ""){
				$this->data['list'] = $this->usergroupmodel->read(array('name'=>'%'.$this->data['name'].'%'),array(),false,$config['per_page'],$start);
			}else{
				$this->data['list'] = $this->usergroupmodel->read(array(),array(),false,$config['per_page'],$start);
			}
			$this->data['base'] = site_url('admin/usergroups/');
			$this->load->view('admin/common/header',$this->data);
			$this->load->view('admin/usergroups/list');
			$this->load->view('admin/common/footer');
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }

    public function add(){
        if ($this->data['admingroup'] == 1) {
			$this->data['title']    = 'Thêm mới nhóm nhân viên';
			if($this->input->post('submit') != null){
				$permission = array();
				foreach($_POST['permission'] as $selected){
					$array = explode(',',$selected);
					if (array_key_exists($array[0],$permission)){
						array_push($permission[$array[0]],$array[1]);
					}else{
						$permission[$array[0]] = array();
						array_push($permission[$array[0]],$array[1]);
					}
				}
				$data = array(
					"name" => $this->input->post("name"),
					"permission" => json_encode($permission),
				);
				$this->usergroupmodel->create($data);
				redirect(base_url() . "admin/usergroups");
				exit();
			} else {
				$this->data = array();
				$this->data['permission'] = $this->auth->adminPermissionList;
				$this->data['email_header'] = $this->session->userdata('adminemail');
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/usergroups/add');
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }

    public function edit($id){
        if ($this->data['admingroup'] == 1) {
			$this->data['title']    = 'Sửa nhóm nhân viên';
			$group = $this->usergroupmodel->read(array('id'=>$id),array(),true);
			$group->permission = (array)json_decode($group->permission);
			$this->data['usergroup'] = $group;
			$this->data['permission'] = $this->data['permission'];
			if($this->input->post('submit') != null){
				$permission = array();
				foreach($_POST['permission'] as $selected){
					$array = explode(',',$selected);
					if (array_key_exists($array[0],$permission)){
						array_push($permission[$array[0]],$array[1]);
					}else{
						$permission[$array[0]] = array();
						array_push($permission[$array[0]],$array[1]);
					}
				}
				$data = array(
					"name" => $this->input->post("name"),
					"permission" => json_encode($permission),
				);
				$this->usergroupmodel->update($data,array('id'=>$id));
				redirect(base_url() . "admin/usergroups");
				exit();
			} else {
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/usergroups/edit');
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }

    public function delete($id){
        if ($this->data['admingroup'] == 1) {
				if(isset($id)&&($id>0)&&is_numeric($id)){
				$this->usergroupmodel->delete(array('id'=>$id));
				redirect(base_url() . "admin/usergroups");
				exit();
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }

}
