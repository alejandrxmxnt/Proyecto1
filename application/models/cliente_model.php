<?php
    class Cliente_model extends CI_Model{
        public function listaclientes()
        {
            $this->db->select('*');
            $this->db->from('cliente');
            return $this->db->get(); 
        } 
        public function agregarcliente($data)
        {//INSERTAR DATOS.
            $this->db->insert('cliente',$data);
        }
    }