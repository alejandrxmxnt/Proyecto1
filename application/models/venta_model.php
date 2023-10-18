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


        public function listaventas()
        {
            $this->db->select('*');
            $this->db->from('venta');
            return $this->db->get();
        }
/*
        public function listadoventas() 
        {
            $this->db->select("v.id, c.nombre, c.primerApellido, d.descuento, d.cantidad, v.total, v.fechaVenta");
            $this->db->from("venta v");
            $this->db->join("detalleventa d", "v.id=d.idVenta");
            $this->db->join("cliente c", "c.id=v.idCliente");
            return $this->db->get();
        }*/

        public function listadoventas() 
        {
            $this->db->select('V.id, C.nombre, SUM(D.cantidad) as total_cantidad, V.total, V.fechaVenta');
            $this->db->from('venta V');
            $this->db->join('detalleventa D', 'V.id = D.idVenta');
            $this->db->join('cliente C', 'C.id = V.idCliente');
            $this->db->group_by('V.id, V.total, V.fechaVenta, V.estado');
            $this->db->having('V.estado',1);
            $this->db->order_by('V.id', 'desc');
            return $this->db->get();
        }

        ////////////////////////////////////////////////////////
        ///////////      VENTA         /////////////////////////
        ////////////////////////////////////////////////////////
        

        public function obtenerProductoPorId($producto_id)
        {
            $this->db->select('id, nombre, precioUnitario, stock');
            $this->db->from('producto');
            $this->db->where('estado', 1);
            $this->db->where('stock >=', 1);
            $this->db->where('id', $producto_id);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return array();
            }
        }



        public function agregarVenta($idCliente, $total, $idUsuario, $detalle_data)
        {
            // Inicia una transacción en la base de datos
            $this->db->trans_start();

            //$fecha = date("Y-m-d H:i:s");

            //primero se trabaja en la tabla venta //cargar un arreglo para la tabla venta
            $venta = array(
                //'fecha' => $fechaVenta, //fecha de venta
                'total' => $total, //costo Final
                'idUsuario' => $idUsuario, //idUsuario
                'idCliente' => $idCliente //id cliente
            );

            $this->db->insert('venta', $venta); //inserta a la tabla venta de forma directa
            $idVenta = $this->db->insert_id(); //se recupera la ultima insercion
            // Inserta los detalles de la venta en la tabla 'detalle'
            $detalleventa = json_decode($detalle_data, true); //decodificar esos datos
//INSERSION A LA TABLA detalleventa
            foreach ($detalleventa as $detalle) { //insercion de datos a la tabla detalleventa
                $detalle['idVenta'] = $idVenta;
                
                $this->db->insert('detalleventa', $detalle);
            }

            //PARA ACTUALIZAR LOS VALORES DE NUESTRAS TABLAS
            foreach ($detalleventa as $detalle) {

                $this->db->where('id', $detalle['idProducto']);
                $stockActual = (int) $this->db->get('producto')->row()->stock;

                // Asegúrate de que $detalle['cantidad'] sea un número válido
                $cantidad = (int) $detalle['cantidad'];

                if ($stockActual >= $cantidad) {
                    $newStock = $stockActual - $cantidad;
                    $this->db->where('id', $detalle['idProducto']);
                    $this->db->update('producto', array('stock' => $newStock));
                }
            }

            // Completa la transacción en la base de datos
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                // Si ocurrió un error en la transacción, puedes manejarlo aquí
                return false;
            } else {
                // La transacción se completó exitosamente
                return true;
            }
        }

        ////////////////////////////////////////////////////
        //////////////   ELIMINAR    ///////////////////////
        ////////////////////////////////////////////////////

        public function deshablitarventa($idventas,$data)
        {
            $this->db->where('id',$idventas); //coinsida el id con el que le llega
            $this->db->update('venta',$data);
        }
    }


    