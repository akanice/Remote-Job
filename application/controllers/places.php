<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places extends MY_Controller{
    public function __construct(){
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->data = array();
		$this->load->model('hotelsmodel');
		$this->load->model('hotelscategorymodel');
		$this->data['list_category'] = $this->hotelscategorymodel->read();
        if($this->session->userdata('language')){
            $lang = $this->session->userdata('language');
        }else{
            $lang = 'vietnamese';
        }
		$this->data['language'] = $lang;
        $this->lang->load("home",$lang);
        $this->lang->load("blog",$lang);
        //Get Mega Menu 
        $this->load->model('menusmodel');
        $this->load->model('menuitemsmodel');
        //Set up mega menu
        $menus = $this->menusmodel->read(array('language'=>$lang,'nav'=>1));
        foreach ($menus as &$m) {
            if($m->type=="list"){
                $m->list_content = $this->menuitemsmodel->read(array('menu_id'=>$m->id));
            }
            if($m->type=="mega"){
                $m->list_col = $this->menuitemsmodel->read(array('menu_id'=>$m->id));
                foreach ($m->list_col as &$c) {
                    if($c->content_type!="text"){
                        $c->list_content = $this->menuitemsmodel->read(array('parent_id'=>$c->id));
                    }
                }
            }
        }
        $this->data['menus'] = $menus;

        $footer = $this->menusmodel->read(array('language'=>$lang,'nav'=>0));
        foreach ($footer as &$m) {
			$m->list_content = $this->menuitemsmodel->read(array('menu_id'=>$m->id));
        }
        $this->data['footer'] = $footer;
		
		$this->load->model('optionsmodel');
		$options = array_swap_index($this->optionsmodel->read(), 'name');
        $this->data['options'] = $options;
		$this->data['home_logo']					= $options['home_logo']->value;
        $this->data['tour_banner'] 					= $options['tour_banner']->value;
        $this->data['home_hotline']					= $options['home_hotline']->value;
		$this->data['home_short_introduction'] 		= @$options['home_short_introduction']->value;
        $this->data['link_facebook'] 				= $options['link_facebook']->value;
        $this->data['link_twitter'] 				= $options['link_twitter']->value;
        $this->data['link_gplus'] 					= $options['link_gplus']->value;
        $this->data['link_instagram'] 				= $options['link_instagram']->value;
		//widget
		$this->load->model('widgetmodel');
		$this->data['w_footeruser1'] = array_swap_index($this->widgetmodel->read(array('section_name'=>"footeruser1")),'position');
		$this->data['w_footeruser2'] = array_swap_index($this->widgetmodel->read(array('section_name'=>"footeruser2")),'position');
	}

    public function index(){
        $this->load->model('testimonialsmodel');
		$this->load->model('toursmodel');
        $this->load->model('widgetmodel');
		$total = $this->hotelsmodel->readCount();
        //Pagination
        $this->load->library('pagination2');
        $config['base_url'] = base_url() . 'place/page';
        $config['total_rows'] = $total;
		$config['uri_segment'] = 3;
		$config['per_page'] = 5;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination2->initialize($config);
		$page_number = $this->uri->segment(3);
		if (empty($page_number)) $page_number = 1;
		$start = ($page_number - 1) * $config['per_page'];
		$this->data['page_links'] = $this->pagination2->create_links();
		$this->data['hotels'] = $this->hotelsmodel->read(array(),array(),false,$config['per_page'],$start);
		$this->data['testimonials'] = $this->testimonialsmodel->random_rows();
		$biggest_id = $this->widgetmodel->read(array("section_name"=>"featured_tour","position"=>"biggest"),array(),true);
		$this->data['biggest_tour'] = $this->toursmodel->read(array("id"=>$biggest_id->value),array(),true);
		
		$this->data['title']  		= 'Khách sạn - Nhà nghỉ - Bungalow';
		$this->data['meta_title'] 				= 'Khách sạn - Nhà nghỉ - Bungalow';
        $this->data['meta_description'] 		= 'Khách sạn - Nhà nghỉ - Bungalow';
        $this->data['meta_keywords'] 			= 'Khách sạn, Nhà nghỉ, Bungalow';
		$this->load->view('home/common/header',$this->data);
        $this->load->view('home/hotels_list');
        $this->load->view('home/common/footer');
    }    
	
	public function placesList($alias=null){
		$this->load->model('testimonialsmodel');
		$this->load->model('toursmodel');
		$this->load->model('widgetmodel');
		$this->data['testimonials'] = $this->testimonialsmodel->random_rows();
		if(!isset($alias) || $alias == ''){
		   redirect(base_url('places/'));
		}
		$hotels_category = $this->hotelscategorymodel->read(array('alias'=>$alias),array(),true);
        $total = $this->hotelsmodel->readCount(array('categoryid'=>$hotels_category->id));
        //Pagination
        $this->load->library('pagination2');
        $config['base_url'] = base_url() . 'places/'.$alias;
        $config['total_rows'] = $total;
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        
        $this->pagination2->initialize($config);
        $page_number = $this->uri->segment(3);
        if (empty($page_number)) $page_number = 1;
        $start = ($page_number - 1) * $config['per_page'];
        $this->data['page_links'] = $this->pagination2->create_links();
		$this->data['hotels'] = $this->hotelsmodel->read(array('categoryid'=>$hotels_category->id),array(),false,$config['per_page'],$start);
		$this->data['allhotels'] = $this->hotelsmodel->read(array(),array(),false,10);
		$this->data['hotels_category'] = $hotels_category;
		$biggest_id = $this->widgetmodel->read(array("section_name"=>"featured_tour","position"=>"biggest"),array(),true);
		$this->data['biggest_tour'] = $this->toursmodel->read(array("id"=>$biggest_id->value),array(),true);
		
		$this->data['title']  		= @$hotels_category->name.' - Mai Chau Tourist';
		$this->data['meta_title'] 				= $hotels_category->meta_title;
        $this->data['meta_description'] 		= $hotels_category->meta_description;
        $this->data['meta_keywords'] 			= $hotels_category->meta_keywords;
		
		$this->load->view('home/common/header',$this->data);
        $this->load->view('home/hotels_list');
        $this->load->view('home/common/footer');
    }
	
	public function placesDetail($alias) {
		$hotels = $this->data['hotels'] = $this->hotelsmodel->read(array('alias'=>$alias),array(),true);
		if (($this->data['hotels'] == null) or ($this->data['hotels'] == '')) {
			header("Location:".base_url('404_override'));
		} else {
			$hotels_category = $this->hotelscategorymodel->read(array('alias'=>$alias),array(),true);
			$this->data['hotels_category'] = $hotels_category;
			
			$hotels_cat_id 	= $hotels->categoryid;
			$this->data['category'] = $this->hotelscategorymodel->read(array('id'=>$hotels_cat_id),array(),true);
			
			$this->data['related_hotels'] = $this->hotelsmodel->getRelatedHotels($alias, 4);
			$this->data['title'] = $this->data['hotels']->name;
			$this->data['meta_title'] = $this->data['hotels']->meta_title;
			$this->data['meta_description'] = $this->data['hotels']->meta_description;
			$this->data['meta_keywords'] = $this->data['hotels']->meta_keywords;
			$this->load->view('home/common/header',$this->data);
			$this->load->view('home/hotels_detail');
			$this->load->view('home/common/footer');
		}
	}

}