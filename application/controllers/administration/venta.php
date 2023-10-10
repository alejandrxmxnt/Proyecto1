<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Venta extends CI_Controller
    {
        public function index()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //dentro del modal_lsita vamos a cargar la data
                    //$this->load->view('view_administration/modal_lista');
                    $lista=$this->venta_model->listaproductos();
                    //      nombre de posicion usuarios
                    $data['productos']=$lista;

                    $this->load->view('view_administration/admidesing/ventaheadboard');
                    $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/venta_formulario',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                    
                }else{
                    $this->load->view('view_administration/admidesing/ventaheadboard');
                    $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/venta_formulario');//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }
            //FUNCION PARA LLAMAR TODOS LOS CLIENTES 
        public function agregarCliente()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $lista=$this->venta_model->listaClientes();
                    //      nombre de posicion usuarios
                    $data['infoclientes']=$lista;
                    //$data=['infoclientes']=$this->venta_model->listaClientes();

                    $this->load->view('view_administration/admidesing/ventaheadboard');
                    $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/venta_formulario',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    $lista=$this->venta_model->listaClientes();
                    //      nombre de posicion usuarios
                    $data['infoclientes']=$lista;
                    //$data=['infoclientes']=$this->venta_model->listaClientes();

                    $this->load->view('view_administration/admidesing/ventaheadboard');
                    $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/venta_formulario',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }
        public function seleccionar(){
            //carga la tabla que esta por debajo de los atributos
            $idlistaProducto=$_POST['idlistaProducto'];
            //variable de transferencia de informacion 
            $dataDetalle['detalleProducto']=$this->venta_model->seleccionarProducto($idlistaProducto); //asi hago llegar el idcliente al modelo
            
            //cargar la vista
            $this->load->view('view_administration/admidesing/userFormHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/venta_formulario',$dataDetalle);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }
    }