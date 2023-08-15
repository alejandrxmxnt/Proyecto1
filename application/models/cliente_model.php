<?php
    class Cliente_model extends CI_Model{
        //CONSULTAS POR ACTIVE RECORD
        //consulta de solo cliente activos 1/activo | 0/inactivo
        public function listaclientes()
        {
            $this->db->select('*');
            $this->db->from('cliente');
            $this->db->where('estado','1');
            return $this->db->get(); 
        } 
        //INSERTAR DATOS.
        //recibe una data de valores y es cargado
        public function agregarcliente($data)
        {
            $this->db->insert('cliente',$data);
        }
        //HARD DELETE
        //eliminado duro
        public function eliminarcliente($idcliente)
        {       //          BDD     formulario
            $this->db->where('id',$idcliente);
            $this->db->delete('cliente');
        }
        //ACTUALIZAR 
        //recibe el id y revibira los datos de este y que luego seran cargados a un data que luego pasara a modificarcliente.
        public function recuperarclientes($idcliente)
        {
            $this->db->select('*');
            $this->db->from('cliente');
            $this->db->where('id',$idcliente);//se compara el id de tabla con id que recibe
            return $this->db->get();
        }
        //ACTUALIZAR - parte 2
        //con los valores cargados en el formulario este los enviara en una data para hacer el update.
        public function modificarcliente($idcliente,$data)
        {
            $this->db->where('id',$idcliente); //coinsida el id con el que le llega
            $this->db->update('cliente',$data);
        }
        //LISTA DE CLIENTES DESHABILITADOS
        //se enlistara los clientes que fueron dados de baja.
        public function listaclientesdeshabilitados(){
            $this->db->select('*');
            $this->db->from('cliente');
            $this->db->where('estado','0');
            return $this->db->get(); 
        }
    }