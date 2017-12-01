<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends MY_Model {
    protected $tableName = 'users';

    protected $table = array(
        'id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'integer'
        ),
        'firstname' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'lastname' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'email' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'password' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'phone' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'address' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'position' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'user_code' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
		'avatar' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'id_warehouse' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'group_id' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        )
    );

    public function __construct() {
        parent::__construct();
        $this->checkTableDefine();
    }

    public function login($email='',$password=''){
        if (!$email){
            return false;
        }
        $user = $this->read(array('email'=>$email),array(),true);
        if (!$user){
            return false;
        }
        $encryptedPass = $this->_password_encrypt($email,$password);
		//die($encryptedPass);
        if ($user->password != $encryptedPass){
            return false;
        }
        $this->_session_set($user);

        return $user;
    }

    public function checkLogin(){
        $userid = $this->session->userdata('user_id');
        if (!$userid) return false;

        $user = $this->read(array('id'=>$userid),array(),true);
        if (!$user){
            $this->logout();
            return false;
        }

        return $user;
    }

    public function logout(){
        $this->session->sess_destroy();
        return true;
    }

    public function register($user=array()){
        if (!is_array($user) || !$user){
            return false;
        }

        // Check email exists
        $u = $this->read(array('email'=>$user['email']),array(),true);
        if ($u){
            return false;
        }

        $user['password'] = $this->_password_encrypt($user['email'],$user['password']);
        $user['create_time'] = time();

        $r = $this->create($user);
        if (!$r){
            return false;
        }

        $u = $this->read(array('id'=>$r),array(),true);

        return $u;
    }

    private function _session_set($user=''){
        if (!$user || !isset($user->email)){
            return false;
        }
        //$this->session->sess_destroy();
        $this->session->set_userdata('user_id',$user->id);
        $this->session->set_userdata('user_email',$user->email);
        $this->session->set_userdata('user_group',$user->group_id);

        return true;
    }

    private function _password_encrypt($email='',$password=''){
        $str = $password;
        for ($i=0;$i<(100+strlen($email));$i++){
            $str = md5($email.'|'.$str);
        }
        return $str;
    }
	public function isLogin() {
		$userid = $this->session->userdata('user_id');
        if (!$userid) return false;
		return true;
	}

    public function getAdmin(){
        $id = $this->session->userdata('adminid');
        if (!$id){
            return false;
        }
        $admin = array();
        $admin['id'] = $this->session->userdata('adminid');
        $admin['email'] = $this->session->userdata('adminemail');
        return $admin;
    }

    public function getUserReceiveNotifications(){
        $this->db->select('*');
        $this->db->where_in('group_id', array('3','4','5'));
        $query = $this->db->get('users');
        if ($query->num_rows > 0) return $query->result();
        return false;
    }
}
