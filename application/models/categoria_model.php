<?php
    class Categoria_model extends CI_Model{
        
        public function listacategorias()
        {
            $this->db->select('*');
            $this->db->from('categoria');
            $this->db->where('estado','1');
            return $this->db->get(); 
        } 
        //INSERTAR DATOS.
        //recibe una data de valores y es cargado
        public function agregarcategoria($data)
        {
            $this->db->insert('categoria',$data);
        }
        //ACTUALIZAR 
        //recibe el id y revibira los datos de este y que luego seran cargados a un data que luego pasara a modificarcliente.
        public function recuperarcategorias($idcategoria)
        {
            $this->db->select('*');
            $this->db->from('categoria');
            $this->db->where('id',$idcategoria);//se compara el id de tabla con id que recibe
            return $this->db->get();
        }
        //ACTUALIZAR - parte 2
        //con los valores cargados en el formulario este los enviara en una data para hacer el update.
        public function modificarcategoria($idcategoria,$data)
        {
            $this->db->where('id',$idcategoria); //coinsida el id con el que le llega
            $this->db->update('categoria',$data);
        }
        //LISTA DE CLIENTES DESHABILITADOS
        //se enlistara los clientes que fueron dados de baja.
        public function listacategoriasdeshabilitados(){
            $this->db->select('*');
            $this->db->from('categoria');
            $this->db->where('estado','0');
            return $this->db->get(); 
        }
    }