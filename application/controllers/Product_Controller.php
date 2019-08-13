<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function create_product()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //required fields
            $name = $this->input->post('name');
            $barcode = $this->input->post('barcode');
            $stock = $this->input->post('stock');
            if(isset($name) && isset($barcode) && isset($stock))
            {
                $brand = $this->input->post('brand');
                $price = $this->input->post('price');
                $color = $this->input->post('color');
                $notes = $this->input->post('notes');
                $expires_at = $this->input->post('expires_at');
                $data = array(
                    'name' => $this->input->post('name'),
                    'barcode' => $this->input->post('barcode'),
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
                    $data['expires_at'] = $expires_at;
                }
                $this->item_model->insert($data);
                redirect(base_url() .'index.php', 'refresh');
            }
            else{
                echo 'test';
            }
        }
    }
}