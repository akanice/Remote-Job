<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth = new Auth();
        $this->auth->check();
        $this->data['email_header'] = $this->session->userdata('adminemail');
		$this->data['admingroup'] = $this->session->userdata('admingroup');
        $this->load->model('qrcodemodel');
        $this->load->model('customersmodel');
		$groups_permission = $this->data['groups_permission'] = array(1,6);
    }
	
    public function index(){
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			$this->data['title']    = 'Quản lý mã khách hàng QR Code';
			$total = $this->qrcodemodel->readCount($this->input->get('name'),"","","");
			$this->data['name'] = $this->input->get('name');
			if($this->data['name'] != ""){
				$config['suffix'] = '?name='.urlencode($this->data['name']);
			}
			//Pagination
			$this->load->library('pagination');
			$config['base_url'] = base_url() . 'admin/qrcode/';
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
			if($this->data['name'] != ""){
				$this->data['list'] = $this->qrcodemodel->read(array('name'=>'%'.$this->input->get('name').'%'),array(),false,$config['per_page'],$start);
			}else{
				$this->data['list'] = $this->qrcodemodel->read(array(),array(),false,$config['per_page'],$start);
			}
			$this->data['base'] = site_url('admin/qrcode/');
			$this->load->view('admin/common/header',$this->data);
			$this->load->view('admin/qrcode/list');
			$this->load->view('admin/common/footer');
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }
	
	public function add() {
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			$this->data['title']    = 'Quản lý mã khách hàng QR Code';
			if($this->input->post('submit') != null){
				$number = $this->input->post("number");
				$code = $this->genQrCode($number);
				$link = base_url('customer/'.$code);
				$qrcode_image = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$link;
				$status = 'new';
				$data = array(
					"number" 			=> $number,
					"code" 	    		=> $code,
					"link" 				=> $link,
					"qrcode_image" 		=> $qrcode_image,
					"status" 			=> $status,
					"customer_id"		=> "",
				);
				$qrcode_id = $this->qrcodemodel->create($data);
				redirect(base_url() . "admin/qrcode");
				exit();
			} else {
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/qrcode/add');
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
	}
	
	public function multiadd() {
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			$this->data['title']    	= 'Quản lý mã khách hàng QR Code';
			$this->data['last_number']	= $this->qrcodemodel->read(array(),array("id"=>false),true,1); 
			if($this->input->post('submit') != null){
				$from_number = $this->input->post("from_number");
				$to_number = $this->input->post("to_number");
				for ($i=$from_number; $i<=$to_number;$i++) {
					$number = $i;
					$code = $this->genQrCode($number);
					$link = base_url('customer/'.$code);
					$qrcode_image = 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$link;
					$status = 'new';
					$data = array(
						"number" 			=> $i,
						"code" 	    		=> $code,
						"link" 				=> $link,
						"qrcode_image" 		=> $qrcode_image,
						"status" 			=> $status,
						"customer_id"		=> "",
					);
					$qrcode_id = $this->qrcodemodel->create($data);
				}
				
				redirect(base_url() . "admin/qrcode");
				exit();
			} else {
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/qrcode/multiadd');
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
	}
	
	public function multidown() {
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			$this->data['title']    	= 'Tải về đồng loạt QR Code';
			$this->data['last_number']	= $this->qrcodemodel->read(array(),array("id"=>false),true,1); 
			if($this->input->post('submit') != null){
				$from_number = $this->input->post("from_number");
				$to_number = $this->input->post("to_number");
				$location_download = $this->input->post("location_download");
				for ($from_number;$from_number <= $to_number;$from_number++) {
					$url = 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.base_url('customer/'.$this->genQrCode($from_number));
					$full_path = $location_download."/".$from_number.".jpg";
					$this->download_multiple_image($url, $full_path);
				}
				
				redirect(base_url()."admin/qrcode");
				exit();
			} else {
				$this->load->view('admin/common/header',$this->data);
				$this->load->view('admin/qrcode/multidown');
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
	}
	
	private function genQrCode($number) {
		$key = 'locnuoccrm';
		$string = $number.$key;
		return md5($string);
	}
	
	private function download_multiple_image($url, $saveto) {
		$ch = curl_init ($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
		$raw=curl_exec($ch);
		curl_close ($ch);
		if(file_exists($saveto)){
			unlink($saveto);
		}
		$fp = fopen($saveto,'x');
		fwrite($fp, $raw);
		fclose($fp);
	}
	
	public function delete($id){
		if (in_array($this->data['admingroup'],$this->data['groups_permission'])) {
			if(isset($id)&&($id>0)&&is_numeric($id)){
				$this->qrcodemodel->delete(array('id'=>$id));
				redirect(base_url() . "admin/qrcode");
				exit();
			}
		} else {
			redirect(base_url()."admin/access_denied");
		}
    }
}