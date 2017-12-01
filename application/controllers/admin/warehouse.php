<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Warehouse extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
        $this->auth->check();
        $this->data['email_header'] = $this->session->userdata('adminemail');
		$this->data['id_user'] = $this->session->userdata('adminid');
        $this->load->model('warehousemodel');
        $this->load->model('productsmodel');
	}
    public function index(){
        $this->data['title']    = 'Quản lý kho hàng';
		$this->data['name'] = $this->input->get('name');
        $total = $this->warehousemodel->getCountwarehouse($this->input->get('name'));
        if($this->data['name'] != ""){
            $config['suffix'] = '?name='.urlencode($this->data['name']);
        }
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/warehouse/';
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
            $this->data['list'] = $this->warehousemodel->getListwarehouse($this->input->get('name'),$config['per_page'],$start);
        }else{
            $this->data['list'] = $this->warehousemodel->getListwarehouse("",$config['per_page'],$start);
        }
        $this->data['base'] = site_url('admin/warehouse/');

        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/warehouse/list');
        $this->load->view('admin/common/footer');
    }

    public function add() {
        if($this->input->post('submit') != null){
            $data = array(
                "name" 				=> $this->input->post("name"),
				"alias" 			=> make_alias($this->input->post("name")),
                "phone" 			=> $this->input->post("phone"),
                "address" 			=> $this->input->post("address"),
                "note" 				=> $this->input->post("note"),
                "capacity" 			=> '',
				"id_user"			=> $this->session->userdata('adminid'),
				"access"			=> 0,	
            );
            $id = $this->warehousemodel->create($data);
            redirect(base_url() . "admin/warehouse/updateProductinWare/".$id);
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/warehouse/add');
            $this->load->view('admin/common/footer');
        }
    }

    public function edit($id) {
        $this->data['warehouse'] = $warehouse = $this->warehousemodel->read(array('id'=>$id),array(),true);
        if($this->input->post('submit') != null){
            $data = array(
                "name" 				=> $this->input->post("name"),
				"alias" 			=> make_alias($this->input->post("name")),
                "phone" 			=> $this->input->post("phone"),
                "address" 			=> $this->input->post("address"),
                "note" 				=> $this->input->post("note"),
                "capacity" 			=> '',
            );
            $this->warehousemodel->update($data,array('id'=>$id));
            redirect(base_url() . "admin/warehouse");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/warehouse/edit');
            $this->load->view('admin/common/footer');
        }
    }

	public function viewlog($id) {
		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/warehouse/viewlog');
		$this->load->view('admin/common/footer');
	}

	public function viewnumberproduct($id) {
		$this->load->model('product_inwaremodel');
		$this->data['result'] = $this->product_inwaremodel->read(array(),array("id"=>false),false);
		$this->data['name'] = $this->input->get('name');

		$total = $this->product_inwaremodel->getCountPiw($this->input->get('name'));
        if($this->data['name'] != ""){
            $config['suffix'] = '?name='.urlencode($this->data['name']);
        }
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/warehouse/viewnumberproduct/'.$id.'/';
        $config['total_rows'] = $total;
        $config['uri_segment'] = 5;
        $config['per_page'] = 20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);
        $page_number = $this->uri->segment(5);
        if (empty($page_number)) $page_number = 1;
        $start = ($page_number - 1) * $config['per_page'];
        $this->data['page_links'] = $this->pagination->create_links();
        if($this->data['name'] != ""){
            $this->data['list'] = $this->product_inwaremodel->getListProducts($id,$this->input->get('name'),$config['per_page'],$start);
        }else{
            $this->data['list'] = $this->product_inwaremodel->getListProducts($id,"",$config['per_page'],$start);
        }

		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/warehouse/viewnumberproduct');
		$this->load->view('admin/common/footer');
	}

	public function updateProductinWare($id) {
		$this->load->model('product_inwaremodel');
		$this->data['products'] = $this->productsmodel->read();
		$this->data['warehouse'] = $warehouse = $this->warehousemodel->read(array('id'=>$id),array(),true);

        if($this->input->post('submit') != null){
            $post = $this->input->post();
            array_pop($post);
            foreach ($post as $key => $value) {
                $pro_in_ware = $this->product_inwaremodel->read(array('id_warehouse' => $id, 'id_product' => $key),array(),true);
                if(!$pro_in_ware){
                    $this->product_inwaremodel->create(
                        array(
                            'id_warehouse' => $id,
                            'id_product' => $key,
                            'number_product' => $value
                        )
                    );
                }else {
                    $this->product_inwaremodel->update(array('number_product' => $value), array('id_warehouse' => $id, 'id_product' => $key));
                }
            }
			$data2 = array(
				'access' => 1,
			);
			$this->warehousemodel->update($data2, array('id'=>$id));
			
            redirect(base_url() . "admin/warehouse");
            exit();
        } else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/warehouse/updateproduct');
            $this->load->view('admin/common/footer');
        }
	}

	public function getorder($alias) {
		if (isset($alias) || ($alias != null)) {
			$this->load->model('ordersmodel');
			$status = 'confirm';
			$this->data['notif_popup'] = '';
			$list_order = $this->data['list'] = $this->ordersmodel->getOrderToSubmit($this->data['id_user'],$status);
			$this->data['warehouse_alias'] = $alias;
			$this->data['warehouse'] = $warehouse = $this->warehousemodel->read(array('alias'=>$alias),array(),true);
			if (isset($warehouse) && ($warehouse != null)) {
				$this->data['warehouse_id'] = $this->data['warehouse']->id;
				$submitForm = $this->input->post('submitall');
				if ($submitForm == 'submitForm') {
					foreach ($list_order as $item) {
						// print_r($item->id);
						$data = array(
							'status' => 'pending',
							'id_warehouse' => $this->data['warehouse']->id,
							'close_date' => time(),
						);
						$this->ordersmodel->update($data, array('id'=>$item->id));
					}
					$this->data['notif_popup'] = 'done';
					$this->data['list'] = '';
				}
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/warehouse/submitorder');
				$this->load->view('admin/common/footer');
			} else {
				redirect(base_url().'404_override');
			}	
		} else {
			redirect(base_url() . "admin");
		}
	}
	
	public function orderprocessing() {
		$this->load->model('ordersmodel');
		$this->load->model('warehousemodel');
		$this->load->model('usersmodel');
		$warehouse = $this->data['warehouse'] = $this->warehousemodel->read(array('id_user'=>$this->data['id_user']),array(),true);
		$order_pending = $this->data['order_pending'] = $this->ordersmodel->read(array('status'=>'pending','id_warehouse'=>$this->data['warehouse']->id),array(),false);
		$user_data = array();
		if (isset($order_pending) && ($order_pending != '')) {
			foreach ($order_pending as $item) {
				$user_data[] = $this->usersmodel->read(array('id'=>$item->staff_technique_id),array(),true);
			}
			$this->data['user_submit'] = $user_data;
		}
		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/warehouse/orderprocessing');
		$this->load->view('admin/common/footer');
	}
	
    public function delete($id){
        if(isset($id)&&($id>0)&&is_numeric($id)){
            $this->warehousemodel->delete(array('id'=>$id));
            redirect(base_url() . "admin/warehouse");
            exit();
        }
    }

}
