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
        //TOTAL RECAUDADO EN UN RANGO DE FECHAS 
        //Obtengo valores deacuerdo al rango capturando el id de categoria y producto para la siguiente consulta
        public function ventaFechasRangoCategoria($Inicio,$Fin) //select
        {
            $query="SELECT
            P.idCategoria AS id_categoria,
            P.id AS id_producto,
            C.nombre AS nombre_categoria,
            P.nombre AS nombre_producto,
            SUM(D.cantidad) AS total_vendido,
            SUM(D.importe) AS recaudacion_total
            FROM
                venta V
            JOIN
                detalleventa D ON V.id = D.idVenta
            JOIN
                producto P ON D.idProducto = P.id
            JOIN
                categoria C ON P.idCategoria = C.id
            WHERE
                V.estado = 1
                AND V.fechaVenta BETWEEN '" . $Inicio . " 00:00:00 ' AND '" . $Fin . " 23:59:59' -- Reemplaza con el rango de fechas deseado
            GROUP BY
                C.id, P.nombre
            ORDER BY
                recaudacion_total DESC";
            return $this->db->query($query);
        }

        public function ventaFechasCategoria() //select
        {
            $query="SELECT
            P.idCategoria AS id_categoria,
            P.id AS id_producto,
            C.nombre AS nombre_categoria,
            P.nombre AS nombre_producto,
            SUM(D.cantidad) AS total_vendido,
            SUM(D.importe) AS recaudacion_total
            FROM
                venta V
            JOIN
                detalleventa D ON V.id = D.idVenta
            JOIN
                producto P ON D.idProducto = P.id
            JOIN
                categoria C ON P.idCategoria = C.id
            WHERE
                V.estado = 1
            GROUP BY
                C.id, P.nombre
            ORDER BY
                total_vendido DESC";
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
            ORDER BY 1 DESC";
            return $this->db->query($query);
        }

        ////////////////////////////////////////////
        /////// PRODUCTO HISTORIA GENERAL //////////
        ////////////////////////////////////////////
        public function ventashistoriaRecaudacionporcategoria() //select
        {
            $query=" SELECT
            P.idCategoria AS id_categoria,
            P.id AS id_producto,
            C.nombre AS categoria,
            P.nombre AS producto,
            SUM(D.cantidad) AS total_cantidad,
            SUM(D.importe) AS recaudacion_total
            FROM
                venta V
            JOIN
                detalleventa D ON V.id = D.idVenta
            JOIN
                producto P ON D.idProducto = P.id
            JOIN
                categoria C ON P.idCategoria = C.id
            WHERE
                V.estado = 1
            GROUP BY
                C.nombre, P.nombre
            ORDER BY
                total_cantidad DESC";
            return $this->db->query($query);
        }

        public function reporte_Categoria_General($idCategoria, $idProducto) //select
        {
            $query=" SELECT
            C.nombre AS categoria,
            P.nombre AS producto,
            D.descuento AS detalle_descuento,
            D.cantidad AS detalle_cantidad,
            D.importe AS detalle_recaudado,
            V.fechaVenta AS venta_fecha
            FROM
                venta V
            JOIN
                detalleventa D ON V.id = D.idVenta
            JOIN
                producto P ON D.idProducto = P.id
            JOIN
                categoria C ON P.idCategoria = C.id
            WHERE 
                C.id = '" . $idCategoria . "' AND P.id = '" . $idProducto . "'
            ORDER BY
                1 DESC";
            return $this->db->query($query);
        }

        public function reporte_Categoria_General_RangoFechas($idCategoria, $idProducto, $Inicio, $Fin) //select
        {
            $query=" SELECT
            C.nombre AS categoria,
            P.nombre AS producto,
            D.descuento AS detalle_descuento,
            D.cantidad AS detalle_cantidad,
            D.importe AS detalle_recaudado,
            V.fechaVenta AS venta_fecha
            FROM
                venta V
            JOIN
                detalleventa D ON V.id = D.idVenta
            JOIN
                producto P ON D.idProducto = P.id
            JOIN
                categoria C ON P.idCategoria = C.id
            WHERE 
                C.id = '" . $idCategoria . "' AND P.id = '" . $idProducto . "'
                AND V.fechaVenta BETWEEN '" . $Inicio . " 00:00:00 ' AND '" . $Fin . " 23:59:59'
            ORDER BY
                1 DESC";
            return $this->db->query($query);
        }

        public function ventashistoriaRecaudacionporcategoria2() //select
        {
            $query=" SELECT
            C.nombre AS categoria,
            P.nombre AS producto,
            SUM(D.cantidad) AS total_cantidad,
            SUM(D.importe) AS recaudacion_total
            FROM
                venta V
            JOIN
                detalleventa D ON V.id = D.idVenta
            JOIN
                producto P ON D.idProducto = P.id
            JOIN
                categoria C ON P.idCategoria = C.id
            WHERE 
                V.estado = 1
            GROUP BY
                C.nombre, P.nombre
            ORDER BY
                total_cantidad DESC";
            return $this->db->query($query);
        }

        public function filtrocategoria($id_producto)
        {
            $query="SELECT P.id AS IDProducto, P.nombre AS NombreProducto, C.nombre AS NombreCategoria
            FROM producto P
            INNER JOIN categoria C ON C.id = P.idCategoria
            WHERE P.estado = 1 AND P.id = '" . $id_producto . "'";
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
            ORDER BY 1 DESC";
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


        public function reportecategoria_fechas_ids($id_categoria, $id_producto){
            $query="SELECT
            V.id AS detalle_idVenta,
            C.nombre AS categoria,
            P.nombre AS producto,
            D.descuento AS detalle_descuento,
            D.cantidad AS detalle_cantidad,
            D.importe AS detalle_recaudado,
            V.fechaVenta AS detalle_fecha
        FROM
            venta V
        JOIN
            detalleventa D ON V.id = D.idVenta
        JOIN
            producto P ON D.idProducto = P.id
        JOIN
            categoria C ON P.idCategoria = C.id
        WHERE 
            C.id = '" . $id_categoria . "' AND P.id = '" . $id_producto . "'
        ORDER BY
            1 DESC";
            return $this->db->query($query);
        }

        public function reportecategoriaRangoFechas($idcategoria, $idproducto, $verInicio, $verFin){
            $query="SELECT
            V.id AS idVenta,
            P.idCategoria AS id_categoria,
            P.id AS id_producto,
            C.nombre AS nombre_categoria,
            P.nombre AS nombre_producto,
            D.cantidad AS cantidad_vendida,
            D.descuento AS detalle_descuento,
            D.importe AS importe_total,
            V.fechaVenta AS fechaVenta
            FROM
                venta V
            JOIN
                detalleventa D ON V.id = D.idVenta
            JOIN
                producto P ON D.idProducto = P.id
            JOIN
                categoria C ON P.idCategoria = C.id
            WHERE
                V.estado = 1 AND P.idCategoria = ' " . $idcategoria . " ' AND D.idProducto = ' " . $idproducto . " '
                AND V.fechaVenta BETWEEN ' " . $verInicio . " 00:00:00' AND ' " . $verFin . " 23:59:59' ";
            return $this->db->query($query);
        }

    }