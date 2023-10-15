<?php
    class Venta_model extends CI_Model{
        //LISTA DE REGISTROS DE VENTA REGISTRADAS
        public function modeloselectventa(){
            $this->db->where('estado <=','1');//muestre los registro de estado 1 activos
            $resultado = $this->db->get('venta');
            return $resultado->result();
        }
        //INSERTAR VENTA
        public function modeloinsertarventa($data){
            return $this->db->insert('venta',$data);
        }
        //OBTENER DATOS ACTUALIZACION
        public function modeloobtenerventa($idventa){
            $this->db->where('id',$idventa);//consulta de id
            $resultado = $this->db->get('venta'); //recupera datos de la tabla venta con el id correspondiente
            return $resultado->row();
        }
        //MODIFICAR VENTA DEL METODO modeloupdateventa
        public function modeloupdateventa($idventa, $data){
            $this->db->where('id',$idventa);
            return $this->db->update('venta',$data);
        }
    }