<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Controller extends CI_Controller {
    private $settings;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('barcode_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        //load config
        $this->config->load('hutch_config',TRUE);
        $this->settings = $this->config->item('hutch_config');
        //change language labels in /system/language folder files
        $language = $this->settings['language'];
        $this->lang->load('products',$language);
    }

    public function create_product()
    {
        $data['lang'] = $this->lang;
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //required fields
            $name = $this->input->post('name');
            $barcode = $this->input->post('barcode');
            $stock = $this->input->post('stock');
            if(isset($name) && isset($stock))
            {
                //insert product
                $brand = $this->input->post('brand');
                $price = $this->input->post('price');
                $color = $this->input->post('color');
                $notes = $this->input->post('notes');
                $expires_at = $this->input->post('expires_at');
                $data = array(
                    'name' => $this->input->post('name'),
                    'stock' => $this->input->post('stock'),
                    'date_created' => date("Y-m-d H:i:s")
                );
                if(!empty($price))
                {
                    $data['price'] = $price;
                }
                if(!empty($brand))
                {
                    $data['brand'] = $brand;
                }
                if(!empty($color))
                {
                    $data['color'] = $color;
                }
                if(!empty($notes))
                {
                    $data['notes'] = $notes;
                }
                if(!empty($expires_at))
                {
                    $data['expires_at'] = date($expires_at);
                }
                $item_id = $this->item_model->insert($data);
                //insert barcode
                if(isset($barcode))
                {
                    $b_data = array(
                        'code' => $barcode,
                        'item_id' => $item_id
                    );
                    $this->barcode_model->insert($b_data);
                }
                $this->session->set_flashdata('notification', 'One new product with the name '.$name.' has been added.');
                redirect(base_url() .'index.php', 'refresh');
            }
        }
    }
    public function delete_item()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $id = $this->input->get('id');
            $this->item_model->deleteById($id);
            $this->session->set_flashdata('notification', 'Item has been deleted.');
        }
        else
        {
            $this->session->set_flashdata('error', 'Item not found');
        }
        redirect(base_url() .'index.php','refresh');
    }
    public function view_product()
    {
        $data['lang'] = $this->lang;
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
           $id = intval($this->input->get('id'));
           $barcode = $this->input->get('barcode');
           if(isset($barcode) || isset($id))
           {
               if(isset($barcode))
               {
                //barcode-fix
                $barcode = str_replace(' ','',$barcode);
                $item = $this->barcode_model->getItem($barcode);
               }
               elseif(isset($id))
               {
                $item =$this->item_model->getById($id);
               }
               $barcodes = $this->barcode_model->getItemBarcodes($item['id']);
               if($item)
               {
                    $data['app_name'] = 'Hutch';
                    $data['item'] = $item;
                    $data['barcodes'] = $barcodes;
                    $this->load->view('basics/header',$data);
                    $this->load->view('storage/view_product',$data);
                    $this->load->view('basics/footer',$data);
               }
               else
               {
                    $this->session->set_flashdata('error','The barcode ' .$barcode. ' not found on database.');
                    redirect(base_url() .'index.php','refresh');
               }
           }
           else
           {
               redirect(base_url() .'index.php','refresh');
           }
        }
    }

    public function list_products()
    {
        $data['app_name'] = 'Hutch';
        $data['lang'] = $this->lang;
        $data['items'] = $this->item_model->getAll();
        $flashdata = $this->session->flashdata();
        if(isset($flashdata['notification']))
        {
            $data['notification'] = $flashdata['notification'];
        }
        if(isset($flashdata['error']))
        {
            $data['error'] = $flashdata['error'];
        }
        $this->load->view('basics/header',$data);
        $this->load->view('storage/list_products',$data);
        $this->load->view('basics/footer',$data);
    }
}