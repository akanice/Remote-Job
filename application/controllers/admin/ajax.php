<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->data = array();
    }

	public function edit_user_avatar() {
		$user_id = $this->session->userdata('adminid');
		$avatar_image = $this->input->post('avatar_image');

		$this->load->helper('url');
		$this->load->model('usersmodel');
		$result = new stdClass();
        $result->ok = false;
        $result->msg = '';
		$uploaddir = 'assets/uploads/users/';
		$this->load->library("upload");

		//Upload avatar
		if (move_uploaded_file($_FILES['avatar_image']['tmp_name'], $uploaddir . basename($_FILES['avatar_image']['name']))) {
			$avatar = $uploaddir . $_FILES['avatar_image']['name'];
		}
		$data = array();
		$data = array(
			'avatar'			=>	$avatar,
		);
		$result->avatar = base_url($avatar);
		$r = $this->usersmodel->update($data,array('id'=>$user_id));

		if (!$r){
			$result->msg = 'Có lỗi xảy ra';
			echo json_encode($result);die();
		}

		$result->ok = true;
		echo json_encode($result);die();
	}

	public function edit_user_info() {

		$user_id = $this->session->userdata('adminid');
		$this->load->helper('url');
		$this->load->model('usersmodel');
		$result = new stdClass();
        $result->ok = false;
        $result->msg = '';
		
		$password = $this->input->post('pwd');
		for($i = 0; $i < 50; $i++){
			$password = md5($password);
		}
		$email = $this->input->post('email');
		$data = array();
		$data = array(
			'firstname'			=>	$this->input->post('fname'),
			'lastname'			=>	$this->input->post('lname'),
			'email'				=>	$email,
			'address'			=>	$this->input->post('address'),
			'phone'				=>	$this->input->post('phone'),
			'password'			=>	$password,
		);
		$r = $this->usersmodel->update($data,array('id'=>$user_id));
		if (!$r){
			$result->msg = 'Có lỗi xảy ra';
			echo json_encode($result);die();
		}

		$result->ok = true;
		echo json_encode($result);die();
	}

	public function assignOrder(){
        $result = new stdClass();
        $result->ok = false;
        $result->msg = '';

        $staff_technique_id = $this->input->post('staff_technique_id');
        $order_id = $this->input->post('order_id');
        $note = $this->input->post('note');

        if (!$staff_technique_id){
            $result->msg = 'Bạn chưa chọn nhân viên kĩ thuật!';
            echo json_encode($result);die();
        }
        
        $this->load->model('ordersmodel');
        $this->load->model('notificationmodel');
		$data = array(
			'staff_technique_id' => $staff_technique_id,
			'note' => $note,
		);
        $this->ordersmodel->update($data, array('id' => $order_id));
        $notifications = array('id_user_from' => $this->session->userdata('adminid'),
                                  'id_user_to'  => $staff_technique_id,
                                  'status' => 'new',
                                  'content'  => 'gán đơn hàng cho bạn.',
                                  'order_id' => $order_id
                                );
        $this->notificationmodel->create($notifications);
		
		$this->load->model('usershistorymodel');
		$history = $this->usershistorymodel->read(array('id_order'=>$order_id,'action'=>'assign'),array(),true);
		if($order_id){
			//history (log)
			$staff_create_id = $this->session->userdata('adminid');
				$create_date = time();
				$data2 = array(
					'id_user' => $staff_create_id,
					'id_order' => $order_id,
					'action' => 'assign',
					'datetime' => $create_date,
					'type' => '',
					'id_user_to' => $staff_technique_id,
				);
			if (!isset($history) || ($history == '') || ($history == null)) {
				$this->usershistorymodel->create($data2);
			} else {
				$this->usershistorymodel->update($data2, array('id'=>$history->id));
			}
		}
		
		$this->load->model('usersmodel');
		$staff_technique = $this->usersmodel->read(array('id'=>$staff_technique_id),array(),true);
        $result->ok = true;
		$result->staff_firstname = $staff_technique->firstname;
		$result->staff_lastname = $staff_technique->lastname;
		$result->item_id = $order_id;
		$result->item_note = $note;
        echo json_encode($result);die();
    }
	
	public function backOrder(){
        $result = new stdClass();
        $result->ok = false;
        $result->msg = '';

        $order_id = $this->input->post('order_id');
        $note = $this->input->post('note');

        $this->load->model('ordersmodel');
        $this->load->model('notificationmodel');
		$data = array(
			"status" => 'new',
			"complete_date" => 0,
			"staff_technique_id" => 0,
			"note" => $note,
		);
        $this->ordersmodel->update($data, array('id' => $order_id));
		$staff_create_id = $this->ordersmodel->read(array('id'=>$order_id),array(),true)->id;
		
        $notifications = array('id_user_from' => $this->session->userdata('adminid'),
                                  'id_user_to'  => $staff_create_id,
                                  'status' => 'new',
                                  'content'  => 'báo hoãn đơn hàng tới bạn.',
                                  'order_id' => $order_id
                                );
        $this->notificationmodel->create($notifications);
		
		$this->load->model('usershistorymodel');
		$history = $this->usershistorymodel->read(array('id_order'=>$order_id,'action'=>'assign'),array(),true);
		if($order_id){
			//history (log)
			$current_user = $this->session->userdata('adminid');
				$create_date = time();
				$data2 = array(
					'id_user' => $current_user,
					'id_order' => $order_id,
					'action' => 'delayed',
					'datetime' => $create_date,
					'type' => '',
					'id_user_to' => $staff_create_id,
				);
			$this->usershistorymodel->create($data2);
		}
		
		$this->load->model('usersmodel');
        $result->ok = true;
		$result->item_id = $order_id;
		$result->item_note = $note;
        echo json_encode($result);die();
    }

    public function getNotifications(){
        $result = new stdClass();
        $result->ok = false;
        $result->message = '';

        $this->load->model('notificationmodel');
        $this->load->model('usersmodel');
        $user_id = $this->input->post('user_id');
        $notifications = $this->notificationmodel->read(array('id_user_to' => $user_id, 'status' => 'new'));
        if(!$notifications){
            $notifications = array();
        }else{
            foreach ($notifications as $notification) {
                $notification->from_user = $this->usersmodel->read(array('id' => $notification->id_user_from), array(), true);
            }
        }
        $result->notifications = $notifications;
        $result->ok = true;
		echo json_encode($result);die();
    }

    public function readNotification(){
        $result = new stdClass();
        $result->ok = false;
        $result->message = '';
        $this->load->model('notificationmodel');
        $notification_id = $this->input->post('notification_id');
        if(!$notification_id || !is_numeric($notification_id)){
            $result->message = 'Invalid Notification.';
            echo json_encode($result); die();
        }
        $this->notificationmodel->update(array('status' => 'read'), array('id' => $notification_id));
        $result->ok = true;
        $result->message = 'success';
        echo json_encode($result); die();
    }
	
	private function _password_encrypt($email='',$password=''){
        $str = $password;
        for ($i=0;$i<(100+strlen($email));$i++){
            $str = md5($email.'|'.$str);
        }
        return $str;
    }
	
	public function assignQrCode(){
        $result = new stdClass();
        $result->ok = false;
        $result->msg = '';

        $qr_number = $this->input->post('qr_number');
		$qr_code = $this->genQrCode($qr_number);
        $customer_id = $this->input->post('customer_id');

        if (!$qr_number){
            $result->msg = 'Bạn hãy điền số QRCode!';
            echo json_encode($result);die();
        }
		
        $this->load->model('qrcodemodel');
        $this->load->model('customersmodel');

		$this->customersmodel->update(array('alias'=>$qr_code),array('id'=>$customer_id));
		$this->qrcodemodel->update(array('customer_id'=>$customer_id,'status'=>'used'),array('number'=>$qr_number));

        $result->ok = true;
		$result->qr_number = $qr_number;
		$result->customer_id = $customer_id;
		$result->item_id = $customer_id;
        echo json_encode($result);die();
    }
	
	private function genQrCode($number) {
		$key = 'locnuoccrm';
		$string = $number.$key;
		return md5($string);
	}
}
