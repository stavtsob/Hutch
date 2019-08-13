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