<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('barcode_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        //change language labels in /system/language folder files
        $this->lang->load('products','english');
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
                $this->session->set_flashdata('new_product', 'Ένα νέο προιόν με όνομα '.$name.' προστέθηκε.');
                redirect(base_url() .'index.php', 'refresh');
            }
        }
    }
    public function delete_item()
    {
        $barcode = $this->input->post('barcode');
        $this->item_model->deleteByBarcode($barcode);
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
               if(isset($id))
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
                    $this->session->set_flashdata('error','Δεν βρέθηκε το barcode ' .$barcode. ' στην βάση δεδομένων.');
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
        if(isset($flashdata['new_product']))
        {
            $data['notification'] = $flashdata['new_product'];
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