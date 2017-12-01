<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersGoods extends MY_Controller{
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
		$this->load->model('usersmodel');
    }
	
    public function index(){
        $this->data['title']    = 'Quản lý hàng hóa giao dịch với nhân viên';
		$total = $this->usersmodel->readCount(array('email'=>'%'.$this->input->get('email').'%','firstname'=>'%'.$this->input->get('firstname').'%','address'=>'%'.$this->input->get('address').'%'));
        
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/users/';
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

		$this->data['list'] = $this->usersmodel->read(array(),array(),false,$config['per_page'],$start);
		$this->data['group_sale'] 				= $this->usersmodel->read(array("group_id"=>[2,3,4]),array(),false);
		$this->data['group_tech'] 				= $this->usersmodel->read(array("group_id"=>5),array(),false);
		
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/usersgoods/list');
        $this->load->view('admin/common/footer');
    }
	
	public function transfer($id) {
		$this->load->model('productsmodel');
		$this->load->model('ordersmodel');
		$this->data['title']    = 'Quản lý hàng hóa giao dịch với nhân viên';
		
		$this->data['id'] = $id;
        $this->data['products'] = $this->productsmodel->read();
        
		if(isset($_POST['submit'])){
			$this->load->model('userscartmodel');
			$this->load->model('warehousemodel');
			$this->load->model('warehousehistorymodel');
			$this->load->model('product_inwaremodel');
			$this->load->model('userscarthistorymodel');
            $products = $_POST['products'];
			$id_user = $this->session->userdata('adminid');
            $product_arrays = json_decode($_POST['products']);
            foreach ($product_arrays as $item) {
                $row = $this->userscartmodel->read(array('id_user'=>$id_user,'id_product'=>$item->pro_id),array(),true);
				$current_number = $row->product_number + $item->quantity;
				$data = array(
					'product_number' => $current_number,
				);
				$this->userscartmodel->update($data, array('id_user'=>$id_user,'id_product'=>$item->pro_id));
				
				//update warehouse_history
				$warehouse = $this->warehousemodel->read(array('id_user'=>$id_user),array(),true);
				// print_r($warehouse);
				// die();
				$data2 = array(
					'id_user' => $id_user,
					'id_warehouse' => $warehouse->id,
					'id_product' => $item->pro_id,
					'id_order' => 0,
					'number_input' => 0,
					'number_output' => $item->quantity,
					'id_user_to' => $id,
					'action' => 'export',
					'note' => '',
					'createtime' => time(),
				);
				$this->warehousehistorymodel->create($data2);		
				
				//update product in warehouse ...
				$piw = $this->product_inwaremodel->read(array('id_warehouse'=>$warehouse->id,'id_product'=>$item->pro_id),array(),true);
				$current_in_ware = $piw->number_product - $item->quantity;
				$data3 = array(
					'number_product' => $current_in_ware,
				);
				$this->product_inwaremodel->update($data3, array('id_warehouse'=>$warehouse->id,'id_product'=>$item->pro_id));
            }
            redirect(base_url() . "admin/usersgoods/");
            exit();
		} else {
			$this->load->view('admin/common/header',$this->data);
			$this->load->view('admin/usersgoods/transfer');
			$this->load->view('admin/common/footer');
		}
	}
	
	public function multiadd() {
		$this->data['title']    	= 'Quản lý mã khách hàng QR Code';
		$this->data['last_number']	= $this->usersgoodsmodel->read(array(),array("id"=>false),true,1); 
		if($this->input->post('submit') != null){
			$from_number = $this->input->post("from_number");
			$to_number = $this->input->post("to_number");
			for ($i=$from_number; $i<=$to_number;$i++) {
				$number = $i;
				$code = $this->genQrCode($number);
				$link = base_url('customer/'.$code);
				$qrcode_image = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$link;
				$status = 'new';
				$data = array(
					"number" 			=> $i,
					"code" 	    		=> $code,
					"link" 				=> $link,
					"qrcode_image" 		=> $qrcode_image,
					"status" 			=> $status,
					"customer_id"		=> "",
				);
				$qrcode_id = $this->usersgoodsmodel->create($data);
			}
			
			redirect(base_url() . "admin/qrcode");
            exit();
		} else {
			$this->load->view('admin/common/header',$this->data);
			$this->load->view('admin/qrcode/multiadd');
			$this->load->view('admin/common/footer');
		}
	}

	private function genQrCode($number) {
		$key = 'locnuoccrm';
		$string = $number.$key;
		return md5($string);
	}
}