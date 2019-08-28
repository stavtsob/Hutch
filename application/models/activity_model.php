<?php
    class activity_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        public function insert($data)
        {
            $this->db->insert('activity', $data);
        }
        public function getAll()
        {
            $this->db->get('activity');
        }
    }
?>