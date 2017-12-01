<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainCustomer extends MY_Controller{
    private $data;
    public function __construct() {
        parent::__construct();
        $this->load->model('customersmodel');
		$this->load->library('auth');
    }
	
	public function error404(){
        $this->load->view('admin/error404');
    }
	
	public function index($alias) {
		$customer = $this->data['customer'] = $this->customersmodel->read(array('alias'=>$alias),array(),true);
		if (!isset($this->data['customer']) or ($this->data['customer'] == '') or ($this->data['customer'] == null)) {
			header("Location:".base_url('404_override'));
		} else {
			$this->load->model('devicemodel');
			$this->load->model('customersproductmodel');
			$this->load->model('ordersmodel');
			
			$this->data['device'] = $this->devicemodel->read(array('id'=>$customer->id_device),array(),true);
			$this->data['product'] = $this->customersproductmodel->getProductOfCustomer($customer->id);
			$orders = $this->data['orders'] = $this->ordersmodel->read(array('customer_id'=>$customer->id),array('id'=>false),true);
			
			$this->load->model('productsmodel');
			$this->data['product_array'] = @json_decode(json_decode($orders->product_array));
			foreach ($this->data['product_array'] as $item) {
				$row = $this->productsmodel->read(array('id'=>$item->pro_id),array(),true);
				$item->product_name = $row->name;
				$item->sku = $row->sku;
				$item->sell_price = $row->sell_price;
				$item->longevity = $row->longevity;
				$data[] = $item; 
			}
			$this->data['product_array'] = $data;
			
			$this->load->view('customer/common/header',$this->data);
			$this->load->view('customer/general');
			$this->load->view('customer/common/footer');
		}
	}
	
	public function editprofile($id) {
		$this->data['customer'] = $this->customersmodel->read(array('id'=>$id));
		$this->load->view('customer/common/header',$this->data);
		$this->load->view('customer/edit_profile');
		$this->load->view('customer/common/footer');
	}
}
