<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {
        private $settings;
        
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->config->load('hutch_config',TRUE);
                $this->settings = $this->config->item('hutch_config');
                //change language labels in /system/language folder files
                $language = $this->settings['language'];
                $this->lang->load('products',$language);
        }

	public function index()
	{
                $data['app_name'] = $this->settings['app_name'];
                $this->load->view('basics/header',$data);
                $this->load->view('storage/list_products',$data);
                $this->load->view('basics/footer',$data);
        }
        public function add_product_view()
        {
                $data['lang'] = $this->lang;
                $data['app_name'] = $this->settings['app_name'];
                $this->load->view('basics/header',$data);
                $this->load->view('storage/add_product',$data);
                $this->load->view('basics/footer',$data);
        }
}
