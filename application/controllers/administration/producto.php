<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Producto extends CI_Controller
    {        

        public function index()
        {
            //              modelo        metodo listausuarios
            $lista=$this->producto_model->listaproductos();
            //      nombre de posicion usuarios
            $data['productos']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/producto_lista',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregar()
        {
            //mostar un formulario(vista) para agregar nuevo usuario.
            $this->load->view('view_administration/admidesing/formHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/producto_formulario');
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregarbd()
        {
            //  atributo.  BDD = name de formulario
            $data['nombre']=$_POST['nombre'];
            $data['descripcion']=$_POST['descripcion'];
            $data['precioUnitario']=$_POST['precioUnitario'];
            $data['stock']=$_POST['stock'];
            $data['codigo']=$_POST['codigo'];
            $data['foto']=$_POST['foto'];
            $data['idCategoria']=$_POST['idCategoria'];

            $this->producto_model->agregarproducto($data); //hasta ahi ya guarda en BDD

            redirect('administration/producto/index','refresh');//con el refresh refrescamos de forma forsoza si es que hay problema

        }

        public function modificar()
        {   // variable         formulario
            $idproducto=$_POST['idproducto'];
            //variable de transferencia de informacion 
            $data['infoproducto']=$this->producto_model->recuperarproductos($idproducto); //asi hago llegar el idcliente al modelo

            //cargar la vista
            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/producto_modificar',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function modificarbd()
        {// variable         formulario
            $idproducto=$_POST['idproducto'];//almacena el id
            // BDD              formulario
            $data['nombre']=$_POST['nombre'];
            $data['descripcion']=$_POST['descripcion'];
            $data['precioUnitario']=$_POST['precioUnitario'];
            $data['stock']=$_POST['stock'];
            $data['codigo']=$_POST['codigo'];
            $data['foto']=$_POST['foto'];
            $data['idCategoria']=$_POST['idCategoria'];
            //$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

            $this->producto_model->modificarproducto($idproducto,$data);

            redirect('administration/producto/index','refresh');
        }

        public function deshabilitarbd(){
            $idproducto=$_POST['idproducto'];
            $data['estado']='0';

            $this->producto_model->modificarproducto($idproducto,$data);

            redirect('administration/producto/index','refresh');
        }

        
    }