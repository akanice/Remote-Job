<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
        $this->auth->check();
        $this->data['email_header'] = $this->session->userdata('adminemail');
		$this->data['admingroup'] = $this->session->userdata('admingroup');
        $this->load->model('productsmodel');
		$this->data['groups_permission'] = array(1,2,4,6);
	}
    public function index(){
        $this->data['title']    = 'Quản lý linh kiện';
		$this->data['name'] = $this->input->get('name');
        $total = $this->productsmodel->getCountProducts($this->input->get('name'));
        if($this->data['name'] != ""){
            $config['suffix'] = '?name='.urlencode($this->data['name']);
        }
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/products/';
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
        if($this->data['name'] != ""){
            $this->data['list'] = $this->productsmodel->getListProducts($this->input->get('name'),$config['per_page'],$start);
        }else{
            $this->data['list'] = $this->productsmodel->getListProducts("",$config['per_page'],$start);
        }
        $this->data['base'] = site_url('admin/products/');
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/products/list');
        $this->load->view('admin/common/footer');
    }

    public function add() {
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			$this->load->model('warehousemodel');
			$this->load->model('product_inwaremodel');
			$warehouse = $this->data['warehouse'] = $this->warehousemodel->read();
			if($this->input->post('submit') != null){
				$uploaddir = 'assets/uploads/products/';
				$this->load->library("upload");

				//Upload cover image
				if (move_uploaded_file($_FILES['images']['tmp_name'], $uploaddir . basename($_FILES['images']['name']))) {
					$cover_image = $uploaddir . $_FILES['images']['name'];
				}
				else{
					$cover_image = '';
				}
				//Create cover thumb
				if ($cover_image != '') {
					$dir_thumb = 'assets/uploads/thumb/products/';
					if (!file_exists($dir_thumb) || !is_dir($dir_thumb)) mkdir($dir_thumb,0777,true);
					$this->load->library('image_lib');
					$config2 = array();
					$config2['image_library'] = 'gd2';
					$config2['source_image'] = $cover_image;
					$config2['new_image'] = $dir_thumb;
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width'] = 300;
					$config2['height'] = 300;
					$this->image_lib->clear();
					$this->image_lib->initialize($config2);
					if(!$this->image_lib->resize()){
						print $this->image_lib->display_errors();
					}else{
						$cover_image_thumb = $dir_thumb.basename($_FILES['images']['name'], '.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION)) . '_thumb.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
					}
				} else {
					$cover_image_thumb = 'assets/img/sample_thumb.png';
				}
				
				$unit = $this->input->post("unit");
				$longevity = $this->input->post("longevity");
				switch ($unit) {
					case 'months':
						$longevity = $longevity * 30;
						break;
					case 'days':
						$longevity = $longevity;
						break;
					case 'years':
						$longevity = $longevity * 365;
						break;
				}
				$data = array(
					"name" 				=> $this->input->post("name"),
					"alias" 			=> make_alias($this->input->post("name")),
					"image" 	    	=> $cover_image,
					"thumb" 			=> $cover_image_thumb,
					"sku" 				=> $this->input->post("sku"),
					"note" 				=> $this->input->post("note"),
					"input_price" 		=> $this->input->post("input_price"),
					"sell_price" 		=> $this->input->post("sell_price"),
					"longevity" 		=> $longevity,
				);
				$product_id = $this->productsmodel->create($data);
				
				redirect(base_url() . "admin/products");
				exit();
			} else {
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/products/add');
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }

    public function edit($id) {
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			$this->data['products'] = $products = $this->productsmodel->read(array('id'=>$id),array(),true);
			if($this->input->post('submit') != null){
				$uploaddir = 'assets/uploads/products/';
				$this->load->library("upload");
				
				//Upload cover image
				if (move_uploaded_file($_FILES['images']['tmp_name'], $uploaddir . basename($_FILES['images']['name']))) {
					$cover_image = $uploaddir . $_FILES['images']['name'];
				} else {
					$cover_image = $products->image;
				}
				//Create cover thumb
				if (move_uploaded_file($_FILES['images']['tmp_name'], $uploaddir . basename($_FILES['images']['name'])) || $cover_image == $uploaddir . $_FILES['images']['name']) {
					$dir_thumb = 'assets/uploads/thumb/products/';
					if (!file_exists($dir_thumb) || !is_dir($dir_thumb)) mkdir($dir_thumb,0777,true);
					$this->load->library('image_lib');
					$config2 = array();
					$config2['image_library'] = 'gd2';
					$config2['source_image'] = $cover_image;
					$config2['new_image'] = $dir_thumb;
					$config2['create_thumb'] = TRUE;
					$config2['maintain_ratio'] = TRUE;
					$config2['width'] = 300;
					$config2['height'] = 300;
					$this->image_lib->clear();
					$this->image_lib->initialize($config2);
					if(!$this->image_lib->resize()){
						print $this->image_lib->display_errors();
					}else{
						$cover_image_thumb = $dir_thumb.basename($_FILES['images']['name'], '.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION)) . '_thumb.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
					}
				} else {
					$cover_image_thumb = $products->thumb;
				}
				
				$unit = $this->input->post("unit");
				$longevity = $this->input->post("longevity");
				switch ($unit) {
					case 'months':
						$longevity = $longevity * 30;
						break;
					case 'days':
						$longevity = $longevity;
						break;
					case 'years':
						$longevity = $longevity * 365;
						break;
				}
				
				$data = array(
					"name" 				=> $this->input->post("name"),
					"alias" 			=> make_alias($this->input->post("name")),
					"image" 	    	=> $cover_image,
					"thumb" 			=> $cover_image_thumb,
					"sku" 				=> $this->input->post("sku"),
					"note" 				=> $this->input->post("note"),
					"input_price" 		=> $this->input->post("input_price"),
					"sell_price" 		=> $this->input->post("sell_price"),
					"longevity" 		=> $longevity,
				);
				$this->productsmodel->update($data,array('id'=>$id));
				redirect(base_url() . "admin/products");
				exit();
			} else {
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/products/edit');
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }
	
	public function detail($id) {
		$this->data['products'] = $products = $this->productsmodel->read(array('id'=>$id),array(),true);
		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/products/detail');
		$this->load->view('admin/common/footer');
	}
    public function delete($id){
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			if(isset($id)&&($id>0)&&is_numeric($id)){
				$this->productsmodel->delete(array('id'=>$id));
				redirect(base_url() . "admin/products");
				exit();
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }

}