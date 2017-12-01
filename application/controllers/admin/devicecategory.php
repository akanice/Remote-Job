<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class DeviceCategory extends MY_Controller{
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
        $this->load->model('devicecategorymodel');
    }
    public function index(){
        $this->data['title']    = 'Quản lý danh mục sản phẩm';
        $total = $this->devicecategorymodel->readCount(array('name'=>'%'.$this->input->get('name').'%'));
        $this->data['name'] = $this->input->get('name');
        if($this->data['name'] != ""){
            $config['suffix'] = '?name='.urlencode($this->data['name']);
        }
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/devicecategory/';
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
            $this->data['list'] = $this->devicecategorymodel->read(array('name'=>'%'.$this->input->get('name').'%'),array(),false,$config['per_page'],$start);
        }else{
            $this->data['list'] = $this->devicecategorymodel->read(array(),array(),false,$config['per_page'],$start);
        }
        $this->data['base'] = site_url('admin/devicecategory/');
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/devicecategory/list');
        $this->load->view('admin/common/footer');
    }

    public function add(){
        if($this->input->post('submit') != null){
            $uploaddir = 'assets/uploads/devicecategory/';
            $this->load->library("upload");
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . basename($_FILES['image']['name']))) {
                $image = $uploaddir . $_FILES['image']['name'];
            }
            else{
                $image = '';
            }
            //Create thumb
            if ($image != '') {
				$dir_thumb = 'assets/uploads/devicecategory/thumb/';
				if (!file_exists($dir_thumb) || !is_dir($dir_thumb)) mkdir($dir_thumb,0777,true);
				$this->load->library('image_lib');
				$config2 = array();
				$config2['image_library'] = 'gd';
				$config2['source_image'] = $image;
				$config2['new_image'] = $dir_thumb;
				$config2['create_thumb'] = TRUE;
				$config2['maintain_ratio'] = TRUE;
				$config2['width'] = 320;
				$config2['height'] = 320;
				$this->image_lib->clear();
				$this->image_lib->initialize($config2);
				if(!$this->image_lib->resize()){
					print $this->image_lib->display_errors();
				}else{
					$image_thumb = $dir_thumb.basename($_FILES['image']['name'], '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)) . '_thumb.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				}
			} else {
				$image_thumb = 'assets/img/sample_thumb.png';
			}
            $data = array(
                "name" 				=> $this->input->post("name"),
                "alias" 			=> make_alias($this->input->post("name")),
                "image" 			=> $image,
                "thumb" 			=> $image_thumb,
				"description" 		=> $this->input->post("description"),
                "meta_title" 		=> $this->input->post("meta_title"),
                "meta_description"	=> $this->input->post("meta_description"),
                "meta_keywords"		=> $this->input->post("meta_keywords"),
            );
            $this->devicecategorymodel->create($data);
            redirect(base_url() . "admin/devicecategory");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/devicecategory/add');
            $this->load->view('admin/common/footer');
        }
    }

    public function edit($id) {
        $this->data['devicecategory'] = $this->devicecategorymodel->read(array('id'=>$id),array(),true);
        if($this->input->post('submit') != null){
            $uploaddir = 'assets/uploads/';
            $this->load->library("upload");
            if(isset($_FILES['image']) && count($_FILES['image']) > 0 && $_FILES['image']['name'] != "") {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . basename($_FILES['image']['name']))) {
                    $image = $uploaddir . $_FILES['image']['name'];
                    @unlink($this->data['devicecategory']->image);
                    @unlink($this->data['devicecategory']->thumb);
                } else {
                    $image = $this->data['devicecategory']->image;
                }
                //Create thumb
                $dir_thumb = 'assets/uploads/thumb/';
                if (!file_exists($dir_thumb) || !is_dir($dir_thumb)) mkdir($dir_thumb,0777,true);
                $this->load->library('image_lib');
                $config2 = array();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $image;
                $config2['new_image'] = $dir_thumb;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 320;
                $config2['height'] = 320;
                $this->image_lib->clear();
                $this->image_lib->initialize($config2);
                if(!$this->image_lib->resize()){
                    print $this->image_lib->display_errors();
                }else{
                    $image_thumb = $dir_thumb.basename($_FILES['image']['name'], '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)) . '_thumb.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                }
            }else{
                $image = $this->data['devicecategory']->image;
                $image_thumb = $this->data['devicecategory']->thumb;
            }
            $data = array(
                "name" => $this->input->post("name"),
                "parent_id" => $this->input->post("parent"),
                "alias" => make_alias($this->input->post("name")),
                "image" => $image,
                "thumb" => $image_thumb,
				"description" => $this->input->post("description"),
                "meta_title" => $this->input->post("meta_title"),
                "meta_description" => $this->input->post("meta_description"),
                "meta_keywords" => $this->input->post("meta_keywords"),
            );
            $this->devicecategorymodel->update($data,array('id'=>$id));
            redirect(base_url() . "admin/devicecategory");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/devicecategory/edit');
            $this->load->view('admin/common/footer');
        }
    }

    public function delete($id){
        if(isset($id)&&($id>0)&&is_numeric($id)){
            $devicecategory = $this->devicecategorymodel->read(array('id'=>$id),array(),true);
            @unlink($devicecategory->image);
            @unlink($devicecategory->thumb);
            $this->devicecategorymodel->delete(array('id'=>$id));
            redirect(base_url() . "admin/devicecategory");
            exit();
        }
    }

}