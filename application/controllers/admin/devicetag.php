<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class DeviceTag extends MY_Controller{
    private $data;
    function __construct() {
        parent::__construct();
        $this->auth = new Auth();
        $this->auth->check();
        if($this->session->userdata('admingroup') == "mod"){
            show_404();
        }
        $this->data['email_header'] = $this->session->userdata('adminemail');
        $this->load->model('devicetagmodel');
        $this->load->library('auth');
    }
    public function index(){
        $this->data['title']    = 'Quản lý tag';
        $total = $this->devicetagmodel->readCount(array('name'=>'%'.$this->input->get('name').'%'));
        $this->data['name'] = $this->input->get('name');
        if($this->data['name'] != ""){
            $config['suffix'] = '?name='.urlencode($this->data['name']);
        }
        //Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/devicetag/';
        $config['total_rows'] = $total;
        $config['uri_segment'] = 3;
        $config['per_page'] = 20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page_number = $this->uri->segment(3);
        if (empty($page_number)) $page_number = 1;
        $start = ($page_number - 1) * $config['per_page'];
        $this->data['page_links'] = $this->pagination->create_links();
        if($this->data['name'] != ""){
            $this->data['list'] = $this->devicetagmodel->read(array('name'=>'%'.$this->data['name'].'%'),array(),false,$config['per_page'],$start);
        }else{
            $this->data['list'] = $this->devicetagmodel->read(array(),array(),false,$config['per_page'],$start);
        }
        $this->data['base'] = site_url('admin/devicetag/');
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/devicetag/list');
        $this->load->view('admin/common/footer');
    }

    public function add() {
        if($this->input->post('submit') != null){
            $data = array(
                "name" 			=> $this->input->post("name"),
                "alias" 		=> make_alias($this->input->post("name"))
            );
            $this->devicetagmodel->create($data);
            redirect(base_url() . "admin/devicetag");
            exit();
        }
        else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/devicetag/add');
            $this->load->view('admin/common/footer');
        }
    }

    public function edit($id) {
        $this->data['tag'] = $this->devicetagmodel->read(array('id'=>$id),array(),true);
        if($this->input->post('submit') != null){
            $data = array(
                "name" => $this->input->post("name"),
                "alias" => make_alias($this->input->post("name")),
            );
            $this->devicetagmodel->update($data,array('id'=>$id));
            redirect(base_url() . "admin/devicetag");
            exit();
        }
        else {
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/devicetag/edit');
            $this->load->view('admin/common/footer');
        }
    }

    public function delete($id) {
        if(isset($id)&&($id>0)&&is_numeric($id)){
            $this->devicetagmodel->delete(array('id'=>$id));
            redirect(base_url() . "admin/devicetag");
            exit();
        }
    }

}