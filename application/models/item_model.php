<?php
    class item_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
            $this->load->model('barcode_model');
        }
        public function insert($data)
        {
           $res= $this->db->insert('item', $data); 
           $item_id = $this->db->insert_id();
           return $item_id;           
        }
        public function getAll()
        {
            $query = $this->db->get('item');
            return $query->result_array();
        }
        
        public function getById($id)
        {
            $this->db->where('id',$id);
            $query = $this->db->get('item');
            if($query)
            {
                return $query->row_array();
            }
            return false;
        }
        public function increaseStock($item_id,$quantity)
        {
            $result = $this->getById($item_id);
            if($result === FALSE)
            {
                return false;
            }
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
            $this->db->where('id',$item_id);
            $query = $this->db->update('item');
        }
        public function decreaseStock($item_id,$quantity)
        {
            $result = $this->getById($item_id);
            if($result === FALSE)
            {
                return false;
            }
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
            $this->db->where('id',$item_id);
            $query = $this->db->update('item');
        }
        public function deleteById($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('item');
        }
        public function wipeItems()
        {
            $this->db->empty_table('item');
        }
    }
?>