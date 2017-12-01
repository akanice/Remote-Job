<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
        $this->auth->check();
        $this->data['email_header'] = $this->session->userdata('adminemail');
		$this->data['admingroup'] = $this->session->userdata('admingroup');
		$user_id = $this->session->userdata('adminid');
        $this->load->model('customersmodel');
		$this->data['groups_permission'] = array(1,2,4,6);
	}
    public function index(){
        if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			$userid = $this->session->userdata('adminid');
			$groupid = $this->session->userdata('admingroup');
			$this->load->model('qrcodemodel');
			$this->data['title']    = 'Dế Việt CRM - Quản lý khách hàng';
			$this->data['type'] = $this->input->get('type');
			if(!$this->data['type']) $this->data['type'] = 'new';

			$whereArray = array('email'=>'%'.$this->input->get('email').'%',
									'firstname'=>'%'.$this->input->get('firstname').'%',
									'address'=>'%'.$this->input->get('address').'%',
									'lastname'=>'%'.$this->input->get('lastname').'%',
									'type'=>$this->data['type']
								   );
			if($groupid != 1 && $groupid != 5){
				$whereArray['staff_create_id'] = $userid;
			}
			$total = $this->customersmodel->readCount($whereArray);
			$this->data['email'] = $this->input->get('email');
			$this->data['firstname'] = $this->input->get('firstname');
			$this->data['lastname'] = $this->input->get('lastname');
			$this->data['address'] = $this->input->get('address');

			if($this->input->get('email') != "" || $this->input->get('firstname') != "" || $this->input->get('lastname') != "" || $this->input->get('address') != "" || $this->input->get('type') != ""){
				$config['suffix'] = '?email='.urlencode($this->data['email']).'&firstname='.urlencode($this->data['firstname']).'&lastname='.urlencode($this->data['lastname']).'&address='.urlencode($this->data['address']).'&type='.urlencode($this->data['type']);
			}
			//Pagination
			$this->load->library('pagination');
			$config['base_url'] = base_url() . 'admin/customers/';
			$config['total_rows'] = $total;
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			$page_number = $this->uri->segment(3);
			if (empty($page_number)) $page_number = 1;
			$start = ($page_number - 1) * $config['per_page'];
			$this->data['page_links'] = $this->pagination->create_links();
			if($this->input->get('email') != "" || $this->input->get('firstname') != "" || $this->input->get('lastname') != "" || $this->input->get('address') != "" || $this->input->get('type') != ""){
				$this->data['list'] = $this->customersmodel->read(array(
																		'email'=>'%'.$this->input->get('email').'%',
																		'firstname'=>'%'.$this->input->get('firstname').'%',
																		'address'=>'%'.$this->input->get('address').'%',
																		'lastname'=>'%'.$this->input->get('lastname').'%',
																		'type'=>$this->data['type']
																	   ),array(),false,$config['per_page'],$start);
			}else{
				$this->data['list'] = $this->customersmodel->read(array('staff_create_id'=>$userid),array('id'=>false),false,$config['per_page'],$start);
			}
			$customer_id = $this->data['list'][0]->id;
			// $this->data['qr_code'] = $this->qrcodemodel->read(array('customer_id'=>$customer_id),array(),true);
			$this->data['base'] = site_url('admin/customers/');
			$this->load->view('admin/common/header',$this->data);
			$this->load->view('admin/customers/list');
			$this->load->view('admin/common/footer');
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }

    public function add() {
		$user_id = $this->session->userdata('adminid');
        if($this->input->post('submit') != null){
            $uploaddir = 'assets/uploads/customers/';
            if (!file_exists($uploaddir) || !is_dir($uploaddir)) mkdir($uploaddir,0777,true);
            $this->load->library("upload");

            //Upload cover image
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir . basename($_FILES['avatar']['name']))) {
                $avatar = $uploaddir . $_FILES['avatar']['name'];
            }
            else{
                $avatar = '';
            }
            //Create avatar thumb
            if ($avatar != '') {
                $dir_thumb = 'assets/uploads/thumb/customers/';
                if (!file_exists($dir_thumb) || !is_dir($dir_thumb)) mkdir($dir_thumb,0777,true);
                $this->load->library('image_lib');
                $config2 = array();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $avatar;
                $config2['new_image'] = $dir_thumb;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 300;
                $config2['height'] = 300;
                $this->image_lib->clear();
                $this->image_lib->initialize($config2);
                if(!$this->image_lib->resize()){
                    print $this->image_lib->display_errors();
                }
            }
            $birthday = $this->input->post("birthday");
            $date = DateTime::createFromFormat('d/m/Y', $birthday);
            $birthday = $date->format('Y-m-d');
            $data = array(
                "firstname" 		=> $this->input->post("firstname"),
                "lastname" 			=> $this->input->post("lastname"),
                "avatar" 	    	=> $avatar,
                "phone" 			=> $this->input->post("phone"),
                "id_card" 			=> $this->input->post("id_card"),
                "address" 			=> $this->input->post("address"),
                "address2" 			=> $this->input->post("address2"),
                "career" 			=> $this->input->post("career"),
                "workplace" 		=> $this->input->post("workplace"),
                "email" 		    => $this->input->post("email"),
                "gender" 		    => $this->input->post("gender"),
                "birthday" 		    => strtotime($birthday),
                "type" 		        => $this->input->post("type"),
				"staff_create_id"	=> $this->session->userdata('adminid'),
				"marital_status"	=> $this->session->userdata('adminid'),
                "note" 				=> $this->session->userdata('note'),
                "createdate" 		=> time(),
            );
            $id = $this->customersmodel->create($data);
            for($i = 1; $i <= 50; $i++){
                $code = md5($id);
            }
            $this->customersmodel->update(array('customer_code' => $code),array('id'=>$id));
            redirect(base_url() . "admin/customers");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/customers/add');
            $this->load->view('admin/common/footer');
        }
    }

    public function edit($id) {
		$user_id = $this->session->userdata('adminid');
        $this->data['customer'] = $customer = $this->customersmodel->read(array('id'=>$id),array(),true);
        if($this->input->post('submit') != null){
            $uploaddir = 'assets/uploads/customers/';
            if (!file_exists($uploaddir) || !is_dir($uploaddir)) mkdir($uploaddir,0777,true);
            $this->load->library("upload");

            //Upload cover image
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir . basename($_FILES['avatar']['name']))) {
                $avatar = $uploaddir . $_FILES['avatar']['name'];
            }
            else{
                $avatar = '';
            }

            if($avatar == '') $avatar = $customer->avatar;
            for($i = 1; $i <= 50; $i++){
                $code = md5($id);
            }
            $birthday = $this->input->post("birthday");
            $date = DateTime::createFromFormat('d/m/Y', $birthday);
            $birthday = $date->format('Y-m-d');
            $data = array(
                "firstname" 		=> $this->input->post("firstname"),
                "lastname" 			=> $this->input->post("lastname"),
                "avatar" 	    	=> $avatar,
                "phone" 			=> $this->input->post("phone"),
                "id_card" 			=> $this->input->post("id_card"),
                "address" 			=> $this->input->post("address"),
                "address2" 			=> $this->input->post("address2"),
                "career" 			=> $this->input->post("career"),
                "workplace" 		=> $this->input->post("workplace"),
                "email" 		    => $this->input->post("email"),
                "gender" 		    => $this->input->post("gender"),
                "birthday" 		    => strtotime($birthday),
                "type" 		        => $this->input->post("type"),
				"staff_create_id"	=> $this->session->userdata('adminid'),
				"marital_status"	=> $this->session->userdata('adminid'),
                "note" 				=> $this->session->userdata('note'),
                "createdate" 		=> time(),
            );
            $this->customersmodel->update($data,array('id'=>$id));
            redirect(base_url() . "admin/customers");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/customers/edit');
            $this->load->view('admin/common/footer');
        }
    }

    public function delete($id){
        if(isset($id)&&($id>0)&&is_numeric($id)){
            $this->customersmodel->delete(array('id'=>$id));
            redirect(base_url() . "admin/customers");
            exit();
        }
    }
}
