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

        //////////////////////////////////////////////////////////////
        ////////////////    REPORTE POR RANGOS    ////////////////////
        //////////////////////////////////////////////////////////////

        public function ventaFechasRango($Inicio,$Fin) //select
        {
            $query="SELECT V.id, V.fechaVenta, C.ciNit, C.nombre, C.primerApellido, C.segundoApellido ,C.razonSocial, V.total
            FROM venta V
            INNER JOIN cliente C ON C.id=V.idCliente
            WHERE V.estado=1 AND V.fechaVenta BETWEEN '".$Inicio." 00:00:00 ' AND '".$Fin." 23:59:59'
            ORDER BY 1";
            return $this->db->query($query);
        }

        public function ventaFechasRangoEmpleado($Inicio,$Fin,$idUsuario) //select
        {
            $query="SELECT V.id, V.fechaVenta, C.ciNit, C.nombre, C.primerApellido, C.segundoApellido ,C.razonSocial, V.total
            FROM venta V
            INNER JOIN cliente C ON C.id=V.idCliente
            WHERE V.estado=1 AND V.idUsuario='". $idUsuario ."' AND V.fechaVenta BETWEEN '".$Inicio." 00:00:00 ' AND '".$Fin." 23:59:59'
            ORDER BY 1";
            return $this->db->query($query);
        }

        /////////////////////////////////////////
        ////////  REPORTE GENERAL   /////////////
        /////////////////////////////////////////
        // PDF -> Reporte datos de la empresa y usuario
        public function ventashistorial() //select
        {
            $query="SELECT V.id, V.fechaVenta, C.ciNit, C.nombre, C.primerApellido, C.segundoApellido ,C.razonSocial, V.total
            FROM venta V
            INNER JOIN cliente C ON C.id=V.idCliente
            WHERE V.estado=1
            ORDER BY 1";
            return $this->db->query($query);
        }

        public function reporteTotal()
        {
            $this->db->select('sum(total)');
            $this->db->from ('venta');
            return $this->db->get(); 
        }

        /////////////////////////////////////////
        ////////  REPORTE EMPLEADO  /////////////
        /////////////////////////////////////////

        //PDF -> Reporde datos de la empresa y usuario ventas realizadas por el idEmpleado
        public function ventashistorialEmpleado($idEmpleado) //select
        {
            $query="SELECT V.id, V.fechaVenta, C.ciNit, C.nombre, C.primerApellido, C.segundoApellido ,C.razonSocial, V.total
            FROM venta V
            INNER JOIN cliente C ON C.id=V.idCliente
            WHERE V.estado=1 AND V.idUsuario = " . $idEmpleado . "
            ORDER BY 1";
            return $this->db->query($query);
        }
        public function reporteTotalEmpleado($idEmpleado)
        {
            $this->db->select('sum(total)');
            $this->db->from ('venta');
            $this->db->where('idUsuario',$idEmpleado);
            return $this->db->get(); 
        }

        public function reporteGeneralTotal(){
            $query="SELECT IFNULL(SUM(V.total),0) AS total_ventas
                FROM venta V
                WHERE V.estado = 1 ";
            return $this->db->query($query);
        }



    }