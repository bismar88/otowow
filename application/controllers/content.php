<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	public function __construct() {
      	parent::__construct();

	    $this->load->library(array('form_validation'));
	    $this->load->model(array('banner_model','maintenance_model','category_model','pages_model','galeri_model','news_model'));
	    $this->_limit = $this->config->item('urbaniva_limit');
	    // $this->_limit2 = $this->config->item('urbaniva_limit_2');
    }

	public function product()
	{
		/* s: logical proces */
		$page = $this->input->get('p') ? $this->input->get('p') : 0;
		$cat = $this->input->get('c') ? $this->input->get('c') : 32;
		$id = $this->input->get('id') ? $this->input->get('id') : NULL;
		$limit = $this->_limit;
		// $limit = 1;

		$hl_product = $this->product_model->getDetail($cat, $id);

		if (! $hl_product)
			show_404();

		$id_exclude = isset($hl_product['ProductId']) ? $hl_product['ProductId'] : 1;
		
		$get_total_data = $this->product_model->totalData($cat, $id_exclude);
        if (($page + 1) > $get_total_data) {
            $page = 0;
        }

        // $list_data = $this->product_model->getList($limit, $page, $conditions_list);
        $list_data = $this->product_model->getList($limit, $page, $cat, $id_exclude);
		
		/* s: set pagination */
        $config                         = $this->config->item('paging');
        $config['base_url']             = site_url('product').'?';
        // $config['uri_segment']          = $get_segment['uri_segment'];
        $config['total_rows']           = $get_total_data;
        $config['per_page']             = $limit;
        $config['page_query_string']    = TRUE;
        $config['query_string_segment'] = 'p';
        
        $query_string = $this->input->get();
        if (isset($query_string['p'])) {
            unset($query_string['p']);
        }

        if ($query_string <> '' && count($query_string) > 0) {
            $config['suffix']    = '&' . http_build_query($query_string, '', "&");
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($query_string, '', "&");
        }
        $this->pagination->initialize($config);
        /* e: set pagination */

        //get pages contact
		$about_us = $this->pages_model->get('about-us-home');
		$contact_us = $this->pages_model->get('contact-us');
		$contact_us_head = $this->pages_model->get('contact-us-head');

		// get banner R-1
		$banner_r1 = $this->banner_model->getCategoryBanner(9);

		// get banner R-2
		$banner_r2 = $this->banner_model->getCategoryBanner(10);
		/* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['hl_product']	 = ($hl_product) ? $hl_product : NULL;
		$data['result'] 	 = ($list_data) ? $list_data : NULL;
		$data['total_data']  = $get_total_data;
		$data['pagination']  = $this->pagination->create_links();
		$data['banner_r1']	 = ($banner_r1) ? $banner_r1 : NULL;
		$data['banner_r2']	 = ($banner_r2) ? $banner_r2 : NULL;
		$data['cat']		 = $cat;
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = 'product';
		$data_header['contact_us_head'] = ($contact_us_head) ? $contact_us_head : NULL;

		$data_footer = array();
		$data_footer['about_us_home'] = ($about_us) ? $about_us : NULL;
		$data_footer['contact_us'] = ($contact_us) ? $contact_us : NULL;
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Wilco - Products';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('product',$data,TRUE);
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

	public function detail($cat = NULL, $id = NULL, $title = NULL)
	{
		/* s: logical proces */
		if (empty($cat))
			show_404();

		// load config cat read
		$cat_read = $this->config->item('cat_read');
		$cat = strtolower($cat);
		if (! in_array($cat,$cat_read))
			show_404();

		if (empty($id))
			show_404();

		$set_model = $cat.'_model';
		$get_data = $this->$set_model->get($id);

		if (! $get_data)
			show_404();

		/* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['result']  = $get_data;
		$data['cat'] = $cat;
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = $cat;

		$data_footer = array();
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Otowow - Detail';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		// $view['head'] = $this->load->view('head_section/home','',TRUE);
		$data_head_meta['result'] = $get_data;
		$get_head_s = $cat;
		$view['head_meta'] = $this->load->view('head_section/'.$get_head_s,$data_head_meta,TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('detail',$data,TRUE);
		$view['footer'] = $this->load->view('footer','',TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

	public function gallery()
	{
		/* s: logical proces */
		$page = $this->input->get('p') ? $this->input->get('p') : 0;
		//$limit = $this->_limit;
		$limit = 12;

		// get highlight product
		$conditions = NULL;
		$get_total_data = $this->galeri_model->totalData($conditions);
        if (($page + 1) > $get_total_data) {
            $page = 0;
        }

        $list_data = $this->galeri_model->getList($limit, $page, $conditions);
		
		/* s: set pagination */
        $config                         = $this->config->item('paging');
        $config['base_url']             = site_url('gallery').'?';
        // $config['uri_segment']          = $get_segment['uri_segment'];
        $config['total_rows']           = $get_total_data;
        $config['per_page']             = $limit;
        $config['page_query_string']    = TRUE;
        $config['query_string_segment'] = 'p';
        
        $query_string = $_GET;
        if (isset($query_string['p'])) {
            unset($query_string['p']);
        }

        if (count($query_string) > 0) {
            $config['suffix']    = '&' . http_build_query($query_string, '', "&");
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($query_string, '', "&");
        }
        $this->pagination->initialize($config);
        /* e: set pagination */

        //get pages contact
		$about_us = $this->pages_model->get('about-us-home');
		$contact_us = $this->pages_model->get('contact-us');
		$contact_us_head = $this->pages_model->get('contact-us-head');

		// get banner R-1
		$banner_r1 = $this->banner_model->getCategoryBanner(9);

		// get banner R-2
		$banner_r2 = $this->banner_model->getCategoryBanner(10);
		/* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['result'] 	 = ($list_data) ? $list_data : NULL;
		$data['total_data']  = $get_total_data;
		$data['pagination']  = $this->pagination->create_links();
		$data['banner_r1']	 = ($banner_r1) ? $banner_r1 : NULL;
		$data['banner_r2']	 = ($banner_r2) ? $banner_r2 : NULL;
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = 'gallery';
		$data_header['contact_us_head'] = ($contact_us_head) ? $contact_us_head : NULL;

		$data_footer = array();
		$data_footer['about_us_home'] = ($about_us) ? $about_us : NULL;
		$data_footer['contact_us'] = ($contact_us) ? $contact_us : NULL;
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Wilco - Galeri';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('galeri',$data,TRUE);
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

	public function news()
	{
		/* s: logical proces */
		$page = $this->input->get('p') ? $this->security->xss_clean($this->input->get('p')) : 0;
		$limit = $this->_limit;
		// $limit = 1;

		$conditions = 'A.NewsStatus = 2';
		
		$get_total_data = $this->news_model->totalData($conditions);
		
		if (($page + 1) > $get_total_data) {
            $page = 0;
        }

        $list_data = $this->news_model->getList($limit, $page, $conditions);
		
		/* s: set pagination */
        $config                         = $this->config->item('paging');
        $config['base_url']             = site_url('news').'?';
        // $config['uri_segment']          = $get_segment['uri_segment'];
        $config['total_rows']           = $get_total_data;
        $config['per_page']             = $limit;
        $config['page_query_string']    = TRUE;
        $config['query_string_segment'] = 'p';
        
        $query_string = $this->input->get();
        
        if (isset($query_string['p'])) {
            unset($query_string['p']);
        }

        if ($query_string <> '' && count($query_string) > 0) {
            $config['suffix']    = '&' . http_build_query($query_string, '', "&");
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($query_string, '', "&");
        }
        $this->pagination->initialize($config);
        /* e: set pagination */

        /* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['result'] 	 = ($list_data) ? $list_data : NULL;
		$data['total_data']  = $get_total_data;
		$data['pagination']  = $this->pagination->create_links();
		
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = 'news';
		
		$data_footer = array();
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Otowow - News';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('news',$data,TRUE);
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

	public function maintenance()
	{
		/* s: logical proces */
		/* s: logical proces */
		$page = $this->input->get('p') ? $this->security->xss_clean($this->input->get('p')) : 0;
		$limit = $this->_limit;
		// $limit = 1;

		$conditions = 'A.MaintenanceStatus = 2';
		
		$get_total_data = $this->maintenance_model->totalData($conditions);
		
		if (($page + 1) > $get_total_data) {
            $page = 0;
        }

        $list_data = $this->maintenance_model->getList($limit, $page, $conditions);
		
		/* s: set pagination */
        $config                         = $this->config->item('paging');
        $config['base_url']             = site_url('Maintenance').'?';
        // $config['uri_segment']          = $get_segment['uri_segment'];
        $config['total_rows']           = $get_total_data;
        $config['per_page']             = $limit;
        $config['page_query_string']    = TRUE;
        $config['query_string_segment'] = 'p';
        
        $query_string = $this->input->get();
        
        if (isset($query_string['p'])) {
            unset($query_string['p']);
        }

        if ($query_string <> '' && count($query_string) > 0) {
            $config['suffix']    = '&' . http_build_query($query_string, '', "&");
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($query_string, '', "&");
        }
        $this->pagination->initialize($config);
        /* e: set pagination */

        /* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['result'] 	 = ($list_data) ? $list_data : NULL;
		$data['total_data']  = $get_total_data;
		$data['pagination']  = $this->pagination->create_links();
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = 'maintenance';
		
		$data_footer = array();
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Otowow - Maintenance';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('jadwal',$data,TRUE);
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}
}

/* End of file content.php */
/* Location: ./application/controllers/content.php */