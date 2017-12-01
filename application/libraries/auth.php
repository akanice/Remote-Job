<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of auth
 *
 * @author Huang
 */
class auth {
	protected $adminGroupId = 1;
    public $adminPermissionList = array(
        'admin' => array(
            'index' => 'Home page',
        ),
		'admins' => array(
		 'index' => 'List',
		 'add' => 'Create',
		 'resetPassword' => 'Reset password',
		 'delete' => 'Delete',
		),
		'admingroups' => array(
		 'index' => 'List',
		 'add' => 'Create',
		 'edit' => 'Edit',
		 'delete' => 'Delete',
		),
    );

	function __construct() {
		$this->ci =& get_instance();
	}

	function login($admin){
		$this->ci->session->set_userdata('adminid',$admin->id);
        $this->ci->session->set_userdata('admingroup',$admin->group_id);
		$this->ci->session->set_userdata('adminemail',$admin->email);
        //$this->ci->session->set_userdata('adminisadmin',$admin->isAdmin);
        //$this->ci->session->set_userdata('admindomain',$admin->domain_id);
	}
	function loginUser($user){
        $this->ci->session->set_userdata('userid',$user->id);
        $this->ci->session->set_userdata('email',$user->email);
        $this->ci->session->set_userdata('name',$user->name);
	}

	function logout(){
		$this->ci->session->sess_destroy();
	}
	function getUser(){
		$user = array();
		$user['id'] = $this->ci->session->userdata('userid');
		$user['username']=$this->ci->session->userdata('username');
        $user['email'] = $this->ci->session->userdata('email');
        $user['money'] = $this->ci->session->userdata('money');
		return $user;
	}

	function getAdmin(){
		$admin = array();
		$admin['id'] = $this->ci->session->userdata('adminid');
		$admin['username'] = $this->ci->session->userdata('adminname');
        $admin['lastlogin'] = $this->ci->session->userdata('lastlogin');
		return $admin;
	}
	function checkUserLogin(){
        if(!$this->ci->session->userdata('userid')){
            redirect(base_url());
        }
	}
	function check(){
        if (!$this->ci->session->userdata('adminid')){
            redirect(site_url('admin/login'));
        }
	}
    function checkIsAdmin(){
        if ($this->ci->session->userdata('adminisadmin') == 0){
            redirect(site_url('admin'));
        }
    }
    function checkIsAdmin2(){
        if ($this->ci->session->userdata('adminisadmin') != -1){
            redirect(site_url('admin'));
        }
    }
	function error($error='',$errorcode=404,$headtext=''){
		if (!$error){
			$error = 'Trang bạn cần không có trong máy chủ. Xin hãy kiểm tra lại đường dẫn';
		}
		if (!$headtext){
			$headtext = 'Không tìm thấy trang bạn cần';
		}
		show_error($error, $errorcode, $headtext);
	}
	function checkLoggedIn(){
		if ($this->ci->session->userdata('userid')){
			redirect(base_url('home'));
		}else{
            redirect(base_url('dang-ky'));
        }
	}
    function logoutAdmin(){
        $this->ci->session->unset_userdata("adminid");
    }
}

?>
