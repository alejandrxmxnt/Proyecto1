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

        public function eliminarcliente($idcliente)
        {       //          BDD     formulario
            $this->db->where('id',$idcliente);
            $this->db->delete('cliente');
        }
        public function recuperarclientes($idcliente)
        {
            $this->db->select('*');
            $this->db->from('cliente');
            $this->db->where('id',$idcliente);//se compara el id de tabla con id que recibe
            return $this->db->get();
        }
        public function modificarcliente($idcliente,$data)
        {
            $this->db->where('id',$idcliente); //coinsida el id con el que le llega
            $this->db->update('cliente',$data);
        }
    }