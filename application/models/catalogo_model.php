<?php
    class Catalogo_model extends CI_Model{
        //CONSULTAS POR ACTIVE RECORD
        //consulta de solo cliente activos 1/activo | 0/inactivo
        public function listacatalogo()
        { 
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('estado','1');
            return $this->db->get(); 
        } 

        public function infocatalogo($idcatalogo)
        {
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('id',$idcatalogo); //se compara el id de tabla con id que recibe
            $this->db->where('estado','1');
            return $this->db->get();
        }
    
    }
