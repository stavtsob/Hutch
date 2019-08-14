<?php
    class item_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        public function insert($data)
        {
            $this->db->insert('item', $data);            
        }
        public function getAll()
        {
            $query = $this->db->get('item');
            return $query->result_array();
        }

        public function getByBarcode($barcode)
        {
            $this->db->where('barcode',$barcode);
            $query = $this->db->get('item');
            if($query)
            {
                return $query->row_array();
            }
            return false;
        }
        public function increaseStock($barcode,$quantity)
        {
            //retrieve old value
            $this->db->where('barcode',$barcode);
            $query = $this->db->get('item');
            if($query === FALSE)
            {
                return false;
            }
            $result = $query->row_array();
            //make quantity a positive value
            if($quantity <0)
            {
                $quantity = $quantity * (-1);
            }
            $new_stock = $result['stock'] + $quantity;
            $data = array(
                'stock' => $new_stock
            );
            //update stock value on the database
            $this->db->set($data);
            $this->db->where('barcode',$barcode);
            $query = $this->db->update('item');
        }
        public function decreaseStock($barcode,$quantity)
        {
            //retrieve old value
            $this->db->where('barcode',$barcode);
            $query = $this->db->get('item');
            if($query === FALSE)
            {
                return false;
            }
            $result = $query->row_array();
            //make quantity a positive value
            if($quantity <0)
            {
                $quantity = $quantity * (-1);
            }
            //check if there is any product left in warehouse
            if($result['stock'] == 0)
            {
                return false;
            }
            $new_stock = $result['stock'] - $quantity;
            if($new_stock <0)
            {
                return false;
            }
            $data = array(
                'stock' => $new_stock
            );
            //update stock value on the database
            $this->db->set($data);
            $this->db->where('barcode',$barcode);
            $query = $this->db->update('item');
        }
        public function deleteById($id)
        {
            $this->db->where('doli_id',$id);
            $this->db->delete('project');
        }
        public function wipeItems()
        {
            $this->db->empty_table('project');
        }
    }
?>