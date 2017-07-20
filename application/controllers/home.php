<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
      	parent::__construct();

	    $this->load->library(array('form_validation'));
	    $this->load->model(array('banner_model','category_model','pages_model','news_model','maintenance_model'));
	    $this->_limit = $this->config->item('urbaniva_limit');
	    // $this->_limit2 = $this->config->item('urbaniva_limit_2');
    }

	public function index()
	{
		/* s: logical proces */
		// get banner h-1
		$banner_b1 = $this->banner_model->getCategoryBanner(12);
		
		// get banner h-1
		$banner_h1 = $this->banner_model->getCategoryBanner(1);

		// get banner h-2
		$banner_h2 = $this->banner_model->getCategoryBanner(2);

		// get banner h-3
		$banner_h3 = $this->banner_model->getCategoryBanner(3);

		// get banner h-4
		$banner_h4 = $this->banner_model->getCategoryBanner(4);

		// get banner h-5
		$banner_h5 = $this->banner_model->getCategoryBanner(5);

		// get banner R-1
		$banner_r1 = $this->banner_model->getCategoryBanner(9);

		// get banner R-2
		$banner_r2 = $this->banner_model->getCategoryBanner(10);

		//get pages contact
		$about_us = $this->pages_model->get('about-us-home');
		$contact_us = $this->pages_model->get('contact-us');
		$contact_us_head = $this->pages_model->get('contact-us-head');

		// set top news
		$condition_top_hn = 'A.NewsSetHome = 1 AND A.NewsStatus = 2';
		$news_top = $this->news_model->getList(1, 0, $condition_top_hn);
		/* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['banner_b1'] = ($banner_b1) ? $banner_b1 : NULL;
		$data['banner_h1'] = ($banner_h1) ? $banner_h1 : NULL;
		$data['banner_h2'] = ($banner_h2) ? $banner_h2 : NULL;
		$data['banner_h3'] = ($banner_h3) ? $banner_h3 : NULL;
		$data['banner_h4'] = ($banner_h4) ? $banner_h4 : NULL;
		$data['banner_h5'] = ($banner_h5) ? $banner_h5 : NULL;
		$data['banner_r1'] = ($banner_r1) ? $banner_r1 : NULL;
		$data['banner_r2'] = ($banner_r2) ? $banner_r2 : NULL;
		$data['top_news']  = ($news_top) ? $news_top : NULL;
		
		$data_header = array();
		$data_header['menu'] = 'home';
		$data_header['contact_us_head'] = ($contact_us_head) ? $contact_us_head : NULL;

		$data_footer = array();
		$data_footer['about_us_home'] = ($about_us) ? $about_us : NULL;
		$data_footer['contact_us'] = ($contact_us) ? $contact_us : NULL;
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Otowow - Home';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('home',$data,TRUE);
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

	public function contact($param='')
	{
		/* s: logical proces */
		if ($this->input->post('submit') == 'save-submit'):
			$this->form_validation->set_rules('nama_pengirim', 'Nama', 'required|xss_clean');
			$this->form_validation->set_rules('email_pengirim', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('alamat_pengirim', 'Alamat', 'required|xss_clean');
			$this->form_validation->set_rules('pesan_pengirim', 'Pesan Anda', 'required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button data-dismiss="alert" class="close">×</button>', '</div>');
			if ($this->form_validation->run()) :
				$name = $this->input->post('nama_pengirim');
				$alamat = $this->input->post('alamat_pengirim');
				$message = $this->input->post('pesan_pengirim');
				$email = $this->input->post('email_pengirim');

				$this->load->library('email');
				//$config_email['useragent']    = 'CodeIgniter';
				// $config_email['protocol']     = 'sendmail';
				// $config_email['smtp_host']    = 'mail.smtp2go.com';
				// $config_email['smtp_user']    = 'bismar.jun@gmail.com'; // Your gmail id
				// $config_email['smtp_pass']    = '3688bismar'; // Your gmail Password
				// $config_email['smtp_port']    = 2525;
				$config_email['protocol']     = 'smtp';
				$config_email['smtp_crypto'] = 'ssl';
				$config_email['smtp_host']    = 'mail.smtp2go.com';
				$config_email['smtp_user']    = 'bismar.jun@gmail.com'; // Your gmail id
				$config_email['smtp_pass']    = '3688bismar';
				$config_email['smtp_port']    = 465;
				$config_email['to_email']     = 'order@wilcopapercup.com';//'xomapu@tverya.com';//'cs@wilcopapercup.com';
				$config_email['to_email_name'] = 'Order Wilcopapercup';
				$config_email['wordwrap']     = TRUE;    
				$config_email['wrapchars']    = 76;
				$config_email['mailtype']     = 'html';
				$config_email['charset']      = 'iso-8859-1';
				$config_email['validate']     = FALSE;
				$config_email['priority']     = 3;
				$config_email['newline']      = "\r\n";
				$config_email['crlf']         = "\r\n";
               	$this->email->initialize($config_email);

               	$this->email->from($email);
                $this->email->to($config_email["to_email"]);//$config['to_mail']);

            	$this->email->subject('New Mail From Visitor');
				// $params = array();
				// $params['mail_message'] = "Dear <b>". $config["to_email_name"] ."</b>,<br/>
    //                                    <br/>
    //                                    You have email contact which shown below:<br/>
    //                                    <br/>
    //                                    Name: ". $title." ".$name ."<br/>
    //                                    Job Title: ".$jobTitle."<br/>
    //                                    Company: ".$company."<br/>
    //                                    Phone: ".$phone."<br/>
    //                                    Country: ".$negara."<br/>
    //                                    Subject: ".$subject."<br/>
    //                                    Message: ".$message."<br/>
    //                                    <br/>
    //                                    Do not forget for replying the user.<br/><br/>

    //                                    Thank you.
    //                                    ";
				// $message = $this->visitor_model->template_message($params);
				$email_message = "Dear <b>". $config_email["to_email_name"] ."</b>,<br/>
                                       <br/>
                                       You have email contact which shown below:<br/>
                                       <br/>
                                       Name: ".$name ."<br/>
                                       Address: ".$alamat."<br/>
                                       Message: ".$message."<br/>
                                       <br/>
                                       Do not forget for replying the user.<br/><br/>

                                       Thank you.
                                       ";
				$this->email->message($email_message);
				if ($this->email->send()) {
                    // SIMPAN SESSION
                    // $this->session-> set_flashdata("success_msg", "Your new password was sent to <strong>". $username ."</strong>.<br>Please check your email for your new password.");
                	$data_insert = array();
                	$data_insert['MessageName'] = $name;
                	$data_insert['MessageEmail'] = $email;
                	$data_insert['MessageAlamat'] = $alamat;
                	$data_insert['MessagePesan'] = $message;

                	$this->pages_model->addMessage($data_insert);
                	redirect('contact/success');	
                } else {
                    //$this->session-> set_flashdata("error_msg", "Send email failed. Please try again.");
                	redirect('contact');
                }
			endif;
		endif;

		//get pages contact
		$about_us = $this->pages_model->get('about-us-home');
		$contact_us = $this->pages_model->get('contact-us');
		$contact_us_detail = $this->pages_model->get('contact-us-detail');
		$contact_us_head = $this->pages_model->get('contact-us-head');
		// get banner R-1
		$banner_r1 = $this->banner_model->getCategoryBanner(9);

		// get banner R-2
		$banner_r2 = $this->banner_model->getCategoryBanner(10);
		/* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['contact'] = ($contact_us_detail) ? $contact_us_detail : NULL;
		$data['banner_r1']	 = ($banner_r1) ? $banner_r1 : NULL;
		$data['banner_r2']	 = ($banner_r2) ? $banner_r2 : NULL;
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = 'contact';
		$data_header['contact_us_head'] = ($contact_us_head) ? $contact_us_head : NULL;

		$data_footer = array();
		$data_footer['about_us_home'] = ($about_us) ? $about_us : NULL;
		$data_footer['contact_us'] = ($contact_us) ? $contact_us : NULL;
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Bola24 - Contact Us';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		if ($param == 'success'):
			$view['content'] = $this->load->view('contact_success',$data,TRUE);
		else:
			$view['content'] = $this->load->view('contact',$data,TRUE);
		endif;
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

	public function about()
	{
		/* s: logical proces */
		// get banner a-1
		$banner_a1 = $this->banner_model->getCategoryBanner(7);

		// get banner a-2
		$banner_a2 = $this->banner_model->getCategoryBanner(11);

		// get banner R-1
		$banner_r1 = $this->banner_model->getCategoryBanner(9);

		// get banner R-2
		$banner_r2 = $this->banner_model->getCategoryBanner(10);

		//get pages content
		$page_about = $this->pages_model->get('about-us');

		//get pages contact
		$about_us = $this->pages_model->get('about-us-home');
		$contact_us = $this->pages_model->get('contact-us');
		$contact_us_head = $this->pages_model->get('contact-us-head');
		/* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['banner_a1'] = ($banner_a1) ? $banner_a1 : NULL;
		$data['banner_a2'] = ($banner_a2) ? $banner_a2 : NULL;
		$data['banner_r1'] = ($banner_r1) ? $banner_r1 : NULL;
		$data['banner_r2'] = ($banner_r2) ? $banner_r2 : NULL;
		$data['about'] = ($page_about) ? $page_about : NULL;
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = 'about';
		$data_header['contact_us_head'] = ($contact_us_head) ? $contact_us_head : NULL;

		$data_footer = array();
		$data_footer['about_us_home'] = ($about_us) ? $about_us : NULL;
		$data_footer['contact_us'] = ($contact_us) ? $contact_us : NULL;
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Bola24 - About Us';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('about',$data,TRUE);
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

	public function search()
	{
		/* s: logical proces */
		$page = $this->input->get('p') ? $this->input->get('p') : 0;
		$search = $this->input->post('search') ? $this->input->post('search') : NULL;
		$search = $this->input->get('s') ? $this->input->get('s') : $search;
		// print_r($_POST);die();
		$limit = $this->_limit;

		$conditions = NULL;

		if ($search <> NULL):
			$search = mysql_real_escape_string(trim(strip_tags(stripslashes($search))));
			$conditions .= "TempSearch LIKE '%".$search."%'";
		endif;
		
		$get_total_data = $this->news_model->totalDataSearch($conditions);
        if (($page + 1) > $get_total_data) {
            $page = 0;
        }

        $list_data = $this->news_model->getListSearch($limit, $page, $conditions);
		
		/* s: set pagination */
        $config                         = $this->config->item('paging');
        $config['base_url']             = site_url('home/search').'?';
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
	            $config['first_url'] = $config['base_url'] . http_build_query($query_string, '', "&");
	        }
		else
		{
	    	$config['suffix']    = '&s=' . url_title(strtolower($search));
	    	$config['first_url'] = $config['base_url'] . url_title(strtolower($search));
        }

		$this->pagination->initialize($config);
        /* e: set pagination */

       /* e: logical process */

		/* s: set data variable */
		$data = array();
		$data['result'] 	 = ($list_data) ? $list_data : NULL;
		$data['total_data']  = $get_total_data;
		$data['pagination']  = $this->pagination->create_links();
		$data['search'] = ($search <> NULL) ? $search : NULL;
		// $data['success_msg'] = $this->session->flashdata("success_msg");
		// $data['error_msg'] = $this->session->flashdata("error_msg");
		// $data['info_msg'] = $this->session->flashdata("info_msg");
		$data_header = array();
		$data_header['menu'] = 'home';
		
		$data_footer = array();
		/* e: set data variable */

		/* s: load data to view */
		$view['title'] = 'Otowow - Search';
		$view['head'] = $this->load->view('head_section/home','',TRUE);
		$view['header'] = $this->load->view('header',$data_header,TRUE);
		$view['content'] = $this->load->view('search',$data,TRUE);
		$view['footer'] = $this->load->view('footer',$data_footer,TRUE);
		$view['foot'] = $this->load->view('foot_section/home','',TRUE);
		/* e: load data to view */

		/* s: load view to main template */
		$this->load->view('main_template', $view);
		/* e: load view to main template */
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */