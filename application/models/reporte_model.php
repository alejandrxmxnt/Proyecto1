<?php
    class Reporte_model extends CI_Model{
        //LISTA DE REGISTROS DE VENTA REGISTRADAS
        public function reporteDatos($idventas){
            $this->db->select('V.id, U.nombre, U.primerApellido, C.nombre, C.primerApellido, C.razonSocial, C.ciNit, P.nombre, P.precioUnitario, D.cantidad, D.descuento, D.importe, V.total');
            $this->db->from('venta V');
            $this->db->join('usuario U', 'V.idUsuario = U.id');
            $this->db->join('cliente C', 'V.idCliente = C.id');
            $this->db->join('detalleventa D', 'D.idVenta = V.id');
            $this->db->join('producto P', 'D.idProducto = P.id');
            $this->db->where('D.idVenta',$idventas);
            return $this->db->get();
        }

        ///////////////////////////////////////////////////////
        ////////////   IGUAL A reporteDatos()   ///////////////
        // para evitar ambiguedades se realizo por serparado //
        ///////////////////////////////////////////////////////

        public function reporteDatosVentaCliente($idventas){
            $this->db->select('V.id, C.nombre, C.primerApellido, C.razonSocial, C.ciNit, V.total, V.fechaVenta');
            $this->db->from('venta V');
            $this->db->join('cliente C', 'V.idCliente = C.id');
            $this->db->where('V.id',$idventas);
            return $this->db->get();
        }
        public function reporteDatosVentaUsuario($idventas){
            $this->db->select('U.nombre, U.primerApellido');
            $this->db->from('venta V');
            $this->db->join('usuario U', 'V.idUsuario = U.id');
            $this->db->where('V.id',$idventas);
            return $this->db->get();
        }
        public function reporteDatosDetalleProducto($idventas){
            $this->db->select('P.nombre, P.precioUnitario, D.cantidad, D.descuento, D.importe');
            $this->db->from('detalleventa D');
            $this->db->join('venta V', 'V.id = D.idVenta');
            $this->db->join('producto P', 'D.idProducto = P.id');
            $this->db->where('D.idVenta',$idventas);
            return $this->db->get();
        }

        public function reporteReciente(){
            $this->db->select('V.id');
            $this->db->from('venta V');
            $this->db->where('V.id = (SELECT MAX(id) FROM venta)', NULL, FALSE);
            return $this->db->get();
            //$query = $this->db->get();
            //return $query->row(); // Obtiene una única fila de resultados.
        }



    }