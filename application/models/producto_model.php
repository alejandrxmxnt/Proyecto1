<?php
    class Producto_model extends CI_Model{
        
        public function listaproductos()
        {  
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('estado','1');
            return $this->db->get(); 
        } 
        //INSERTAR DATOS.
        //recibe una data de valores y es cargado
        public function agregarproducto($data)
        {
            $this->db->insert('producto',$data);
        }
        //ACTUALIZAR 
        //recibe el id y revibira los datos de este y que luego seran cargados a un data que luego pasara a modificarcliente.
        public function recuperarproductos($idproducto)
        {
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('id',$idproducto);//se compara el id de tabla con id que recibe
            return $this->db->get();
        }
        //ACTUALIZAR - parte 2
        //con los valores cargados en el formulario este los enviara en una data para hacer el update.
        public function modificarproducto($idproducto,$data)
        {
            $this->db->where('id',$idproducto); //coinsida el id con el que le llega
            $this->db->update('producto',$data);
        }
        //LISTA DE CLIENTES DESHABILITADOS
        //se enlistara los clientes que fueron dados de baja.
        public function listacproductosdeshabilitados(){
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('estado','0');
            return $this->db->get(); 
        }
    }