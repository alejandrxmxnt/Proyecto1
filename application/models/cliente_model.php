<?php
    class Cliente_model extends CI_Model{
        public function listacliente()
        {
            $this->db->select('*');
            $this->db->from('cliente');
            return $this->db->get(); 
        } 
    }