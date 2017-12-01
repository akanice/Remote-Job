<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salary extends MY_Controller{
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
        $this->load->model('salarymodel');
        $this->load->model('usersmodel');
    }
    public function index(){
        $this->data['title']    = 'Quản lý quỹ lương nhân viên';
        $total = $this->devicemodel->readCount($this->input->get('name'),$this->input->get('category'),"","");
        $this->data['name'] = $this->input->get('name');
        $this->data['category'] = $this->input->get('category');
        if($this->data['name'] != ""){
            $config['suffix'] = '?name='.urlencode($this->data['name']).'&category='.urlencode($this->data['category']);
        }
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/device/';
        $config['total_rows'] = $total;
        $config['uri_segment'] = 3;
        $config['per_page'] = 12;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        
        $this->pagination->initialize($config);
        $page_number = $this->uri->segment(3);
        if (empty($page_number)) $page_number = 1;
        $start = ($page_number - 1) * $config['per_page'];
        $this->data['page_links'] = $this->pagination->create_links();
        if($this->data['name'] != "" || $this->data['category'] != ""){
            $this->data['list'] = $this->devicemodel->read(array('name'=>'%'.$this->input->get('name').'%','category'=>'%'.$this->input->get('category').'%'),array(),false,$config['per_page'],$start);
        }else{
            $this->data['list'] = $this->devicemodel->read(array(),array(),false,$config['per_page'],$start);
        }
        $this->data['devicecategory'] = $this->devicecategorymodel->read();
        $this->data['base'] = site_url('admin/device/');
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/device/list');
        $this->load->view('admin/common/footer');
    }

    public function add() {
        $this->data['device_tag'] = $this->devicetagmodel->read();
        $this->data['devicecategory'] = $this->devicecategorymodel->read(array(),array(),false);
        if($this->input->post('submit') != null){
            $uploaddir = 'assets/uploads/device/';
            $this->load->library("upload");
            //upload image
			if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . basename($_FILES['image']['name']))) {
                $image = $uploaddir . $_FILES['image']['name'];
            }
            else{
                $image = 'assets/img/sample_device.png';
            }
			//upload specify image
			if (move_uploaded_file($_FILES['specify_image']['tmp_name'], $uploaddir . basename($_FILES['specify_image']['name']))) {
                $specify_image = $uploaddir . $_FILES['specify_image']['name'];
            }
            else{
                $specify_image = 'assets/img/sample_device.png';
            }
            //Create thumb
			if ($image != '') {
				$dir_thumb = 'assets/uploads/device/thumb/';
				if (!file_exists($dir_thumb) || !is_dir($dir_thumb)) mkdir($dir_thumb,0777,true);
				$this->configPagination($image, $dir_thumb);
				if(!$this->image_lib->resize()){
					print $this->image_lib->display_errors();
				}else{
					$image_thumb = $dir_thumb.basename($_FILES['image']['name'], '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)) . '_thumb.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				}
			} else {
				$image_thumb = 'assets/img/sample_device.png';
			}
			//upload media
            $media = array();
            foreach($_FILES['media']['name'] as $n => $name) {
                if(move_uploaded_file($_FILES['media']['tmp_name'][$n], $uploaddir . basename($_FILES['media']['name'][$n])))
                {
                    $media[] = $uploaddir . $_FILES['media']['name'][$n];
                }
            }
			//upload specify image
			if (move_uploaded_file($_FILES['specify_image']['tmp_name'], $uploaddir . basename($_FILES['specify_image']['name']))) {
                $specify_image = $uploaddir . $_FILES['specify_image']['name'];
            }
            else{
                $specify_image = 'assets/img/sample_device.png';
            }
			
			$device_tag = $this->input->post("device_tag");
			
            $data = array(
                "name" => $this->input->post("name"),
                "sku" => $this->input->post("sku"),
                "made_in" => $this->input->post("made_in"),
                "alias" => make_alias($this->input->post("name")),
                "image" => $image,
                "specify_image" => $specify_image,
                "specifications" => $this->input->post("specifications"),
				"packpage_accessories" => "",
				"media" => json_encode($media),
                "thumb" => $image_thumb,
                "sku" => $this->input->post("sku"),
                "cat_id" => $this->input->post("cat_id"),
                "price" => $this->input->post("price"),
                "sell_price" => $this->input->post("sell_price"),
                "description" => $this->input->post("description"),
                "short_description" => $this->input->post("short_description"),
                "createtime" => time(),
                "featured" => $this->input->post("featured"),
                "device_tag" => json_encode($device_tag),
				"meta_title" => $this->input->post("meta_title"),
				"meta_description" => $this->input->post("meta_description"),
				"meta_keywords" => $this->input->post("meta_keywords"),
            );
            $device_id = $this->devicemodel->create($data);
			$device = $this->devicemodel->read(array('id'=>$device_id),array(),true);
			$this->devicemodel->update(array('alias'=>$device->alias.'-'.$device_id),array('id'=>$device->id));
            //$category_alias = $this->devicecategorymodel->read(array('id'=>$this->input->post("cat_id")),array(),true)->alias;
            
            redirect(base_url() . "admin/device");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/device/add');
            $this->load->view('admin/common/footer');
        }
    }

    public function edit($id){
        $this->data['devicecategory'] = $this->devicecategorymodel->read();
        $this->data['devicetag'] = $this->devicetagmodel->read();
        $this->data['device'] = $this->devicemodel->read(array('id'=>$id),array(),true);
		$device = $this->data['device'];
        $this->data['device_tag'] = json_decode($this->data['device']->device_tag);
		$this->data['device']->cat_id = json_decode($this->data['device']->cat_id);

        if($this->input->post('submit') != null){
            $uploaddir = 'assets/uploads/';
            $this->load->library("upload");
            if(isset($_FILES['image']) && count($_FILES['image']) > 0 && $_FILES['image']['name'] != "") {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . basename($_FILES['image']['name']))) {
                    $image = $uploaddir . $_FILES['image']['name'];
                    //@unlink($this->data['device']->image);
                    //@unlink($this->data['device']->thumb);
                } else {
                    $image = $this->data['device']->image;
                }
                //Create thumb
                $dir_thumb = 'assets/uploads/thumb/';
                if (!file_exists($dir_thumb) || !is_dir($dir_thumb)) mkdir($dir_thumb,0777,true);
                $this->configPagination($image,$dir_thumb);
				
                if(!$this->image_lib->resize()){
                    print $this->image_lib->display_errors();
                }else{
                    $image_thumb = $dir_thumb.basename($_FILES['image']['name'], '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)) . '_thumb.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                }
            }else{
                $image = $this->data['device']->image;
                $image_thumb = $this->data['device']->thumb;
            }
			//upload specify image
			if (move_uploaded_file($_FILES['specify_image']['tmp_name'], $uploaddir . basename($_FILES['specify_image']['name']))) {
                $specify_image = $uploaddir . $_FILES['specify_image']['name'];
            }
            else{
                $specify_image = $this->data['device']->specify_image;
            }
			
			//upload media
            $device->media = @json_decode($device->media);
            if (!$device->media) $device->media = array();
            $deletePic = $this->input->post('deletePic');
            if (!$deletePic) $deletePic = array();
            $tmp = array();
            foreach ($device->media as $i => $img){
                if (!in_array($i,$deletePic)){
                    $tmp[] = $img;
                }
            }

            $media = array();
            foreach($_FILES['media']['name'] as $n => $name) {
                if(move_uploaded_file($_FILES['media']['tmp_name'][$n], $uploaddir . basename($_FILES['media']['name'][$n])))
                {
                    $media[] = $uploaddir . $_FILES['media']['name'][$n];
                }
            }
            $media = array_merge($tmp,$media);
			$device_tag = $this->input->post("devicetag");
			$categories = $this->input->post("category");
			
            $data = array(
                "name" => $this->input->post("name"),
                "sku" => $this->input->post("sku"),
                "made_in" => $this->input->post("made_in"),
                "alias" => make_alias($this->input->post("name")),
                "image" => $image,
                "specify_image" => $specify_image,
                "specifications" => $this->input->post("specifications"),
				"packpage_accessories" => "",
				"media" => json_encode($media),
                "thumb" => $image_thumb,
                "sku" => $this->input->post("sku"),
                "cat_id" => $this->input->post("cat_id"),
                "price" => $this->input->post("price"),
                "sell_price" => $this->input->post("sell_price"),
                "description" => $this->input->post("description"),
                "short_description" => $this->input->post("short_description"),
                "createtime" => time(),
                "featured" => $this->input->post("featured"),
                "device_tag" => json_encode($device_tag),
				"meta_title" => $this->input->post("meta_title"),
				"meta_description" => $this->input->post("meta_description"),
				"meta_keywords" => $this->input->post("meta_keywords"),
            );
            $this->devicemodel->update($data,array('id'=>$id));
            //$category_alias_old = $this->devicecategorymodel->read(array('id'=>$this->data['device']->cat_id),array(),true)->alias;
            redirect(base_url() . "admin/device");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/device/edit');
            $this->load->view('admin/common/footer');
        }
    }

    public function delete($id){
        if(isset($id)&&($id>0)&&is_numeric($id)){
            $device = $this->devicemodel->read(array('id'=>$id),array(),true);
            //@unlink($device->image);
            //@unlink($device->thumb);
            $this->devicemodel->delete(array('id'=>$id));
            redirect(base_url() . "admin/device");
            exit();
        }
    }
	
	private function configPagination($image,$dir_thumb) {
		$this->load->library('image_lib');
		$config2 = array();
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $image;
		$config2['new_image'] = $dir_thumb;
		$config2['create_thumb'] = TRUE;
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = 300;
		$config2['height'] = 300;
		$this->image_lib->clear();
		$this->image_lib->initialize($config2);
	}
}