<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends MY_Controller{
    public function __construct(){
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->data = array();
		$this->load->model('blogcategorymodel');
		$this->load->model('blogsmodel');
		$this->data['list_category'] = $this->blogcategorymodel->read();
        if($this->session->userdata('language')){
            $lang = $this->session->userdata('language');
        }else{
            $lang = 'vietnamese';
        }
		$this->data['language'] = $lang;
		$this->data['new_cat'] = $this->blogcategorymodel->read(array('language'=>$lang));
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
        //$blog_category = $this->blogcategorymodel->read(array('language'=>$this->data['language']),array(),false);
		//$category_id = $blog_category[0]->id;
        $total = $this->blogsmodel->readCount();
        //Pagination
        $this->load->library('pagination2');
        $config['base_url'] = base_url() . 'blog/page';
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
		$this->data['blogs'] = $this->blogsmodel->read(array(),array(),false,$config['per_page'],$start);
		$this->data['allblogs'] = $this->blogsmodel->read(array(),array(),false,10);
		//$this->data['blog_category'] = $blog_category;
		
		$this->data['title']  		= 'Blog Mai Châu Tourist';
		$this->data['meta_title'] 				= 'Blog Mai Châu Tourist';
        $this->data['meta_description'] 		= 'Blog Mai Châu Tourist';
        $this->data['meta_keywords'] 			= 'Blog Mai Châu Tourist';
		$this->load->view('home/common/header',$this->data);
        $this->load->view('home/blog_list');
        $this->load->view('home/common/footer');
    }

    public function blogList($alias=null){
		if(!isset($alias) || $alias == ''){
		   redirect(base_url('blog/'));
		}
		$blog_category = $this->blogcategorymodel->read(array('alias'=>$alias),array(),true);
        $total = $this->blogsmodel->readCount(array('categoryid'=>$blog_category->id));
        //Pagination
        $this->load->library('pagination2');
        $config['base_url'] = base_url() . 'blog/'.$alias;
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
		$this->data['blogs'] = $this->blogsmodel->read(array('categoryid'=>$blog_category->id),array(),false,$config['per_page'],$start);
		$this->data['allblogs'] = $this->blogsmodel->read(array(),array(),false,10);
		$this->data['blog_category'] = $blog_category;
		
		$this->data['title']  		= @$blog_category->name.' - Mai Chau Tourist';
		$this->data['meta_title'] 				= $blog_category->meta_title;
        $this->data['meta_description'] 		= $blog_category->meta_description;
        $this->data['meta_keywords'] 			= $blog_category->meta_keywords;
		
		$this->load->view('home/common/header',$this->data);
        $this->load->view('home/blog_list');
        $this->load->view('home/common/footer');
    }

	public function blogDetail($alias) {
		$this->load->model('tagmodel');
		$blog = $this->data['blog'] = $this->blogsmodel->read(array('alias'=>$alias),array(),true);
		if (($this->data['blog'] == null) or ($this->data['blog'] == '')) {
			header("Location:".base_url('404_override'));
		} else {
			$this->data['allblogs'] = $this->blogsmodel->read(array(),array(),false,10);
			$blog_category = $this->blogcategorymodel->read(array('alias'=>$alias),array(),true);
			$this->data['blog_category'] = $blog_category;
			
			$blog_cat_id 	= $blog->categoryid;
			$this->data['category'] = $this->blogcategorymodel->read(array('id'=>$blog_cat_id),array(),true);
			
			$tags = $this->data['blog']->tag;
			$this->data['tours_by_tag'] = $this->tagmodel->getToursByTag($tags,3);
			
			$this->data['title'] = $this->data['blog']->title;
			$this->data['meta_title'] = $this->data['blog']->meta_title;
			$this->data['meta_description'] = $this->data['blog']->meta_description;
			$this->data['meta_keywords'] = $this->data['blog']->meta_keywords;
			$this->load->view('home/common/header',$this->data);
			$this->load->view('home/blog_detail');
			$this->load->view('home/common/footer');
		}
	}

}