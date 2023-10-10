<?php
    class Venta_model extends CI_Model{
        //CONSULTAS POR ACTIVE RECORD
        //consulta de solo cliente activos 1/activo | 0/inactivo
        public function listaproductos()
        {
            $this->db->select('*');
            $this->db->from('producto');
            $this->db->where('estado','1');
            return $this->db->get(); 
        } 

        public function seleccionarProducto($idlistaProducto)
        {
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('id',$idlistaProducto);//se compara el id de tabla con id que recibe
            return $this->db->get();
        }
        
        public function listaClientes()
        {//para enlistar todos los clientes
            $this->db->select('*');
            $this->db->from('cliente');
            return $this->db->get(); 
            /*$sql = "SELECT id, primerApellido, ciNit FROM cliente WHERE ciNit LIKE ? ORDER BY ciNit ASC";
            $query->execute([$ciCliente . '%']);

            $html = "";

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $html .= "<li>".$row["id"]." - ".$row["primerApellido"]." - ".$row["ciNit"]. "</li>";
            }

            echo json_encode($html, JSON_UNESCAPED_UNICODE);*/
        } 
        
    }