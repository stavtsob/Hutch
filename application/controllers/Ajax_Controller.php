<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('item_model');
            $this->load->model('barcode_model');
            $this->load->helper('url');
            $this->load->library('session');
        }

        public function increase_item_stock()
        {
            $item_id = $this->input->post('id');
            $quantity = $this->input->post('quantity');
            $result = $this->item_model->increaseStock($item_id, $quantity);
            if($result === FALSE)
            {
                echo 'ERROR 500';
                return;
            }
            $updated_item = $this->item_model->getById($item_id);
            echo json_encode($updated_item);
        }
        public function decrease_item_stock()
        {
            $item_id = $this->input->post('id');
            $quantity = $this->input->post('quantity');
            $result = $this->item_model->decreaseStock($item_id, $quantity);
            if($result === FALSE)
            {
                echo 'ERROR 500';
                return;
            }
            $updated_item = $this->item_model->getById($item_id);
            echo json_encode($updated_item);
        }
}
?>