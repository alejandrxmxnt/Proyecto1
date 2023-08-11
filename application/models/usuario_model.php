<?php
    class Usuario_model extends CI_Model{
        public function listausuarios()
        {
            $this->db->select('*');
            $this->db->from('usuario');
            return $this->db->get();
        } 
    }