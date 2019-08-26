<?php
    class barcode_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
            $this->load->model('item_model');
        }
        
        public function insert($data)
        {
            if(isset($data['code']) && isset($data['item_id']))
            {
                $res = $this->db->insert('barcode',$data);
                $barcode_id = $this->db->insert_id();
                return $barcode_id;
            }
            else
            {
                return false;
            }
        }
        public function getItem($code)
        {
            //retrieving barcode from database
            $this->db->where('code',$code);
            $barcode = $this->db->get('barcode')->row_array();
            if($barcode)
            {
                //retrieving item from database
                $item = $this->item_model->getById($barcode['item_id']);
                return $item;
            }
            else
            {
                return false;
            }
        }
        public function deleteById($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('barcode');
        }
        public function getItemBarcodes($item_id)
        {
            $this->db->where('item_id',$item_id);
            $res = $this->db->get('barcode');
            return $res->result_array();
        }
        public function wipeBarcodes()
        {
            $this->db->empty_tables('barcode');
        }
        public function deleteProduct($code)
        {
            //retrieving barcode from database
            $this->db->where('code',$code);
            $barcode = $this->db->get('barcode')->row_array();
            if($barcode)
            {
                $item = $this->item_model->deleteById($barcode['item_id']);
                $this->deleteById($barcode['id']);
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>