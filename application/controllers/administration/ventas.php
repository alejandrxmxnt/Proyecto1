<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Ventas extends CI_Controller
    {//PAGINA PRINCIPAL DONDE SE CARGARA LA LISTA DE VENTAS 
        /*public __construct() {
            parent:: __construct();
            if(!$this->session->userdata('login')){
                redirect(base_url());
            }
            $this->load->model('venta_model'); 
        }*/

        public function index() //pagina principal de venta
        {
            if($this->session->userdata('login'))
            {
                $lista=$this->venta_model->listaventa();//Consulta para la lista venta
                $data['venta']=$lista;
                $this->load->view('view_administration/admidesing/ventaheadboard');
                $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                $this->load->view('view_administration/admidesing/menuLateral');
                $this->load->view('view_administration/venta_lista',$data);//TABLA DE VENTAS
                $this->load->view('view_administration/admidesing/foot');
            } 
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }
        //
        public function viewsAddSale()//vista agregar venta
        { 
            if($this->session->userdata('login'))//VERIRICA SI EXISTE SESION ABIERTA
            {   
                //Se carga formulario
                $this->load->view('view_administration/admidesing/ventaheadboard');
                $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                $this->load->view('view_administration/admidesing/menuLateral');
                //$this->load->view('view_administration/venta_formulario'); //metodo de busqueda de producto
                //$this->load->view('view_administration/venta_formulario2'); // forumario sin css vacio
                $this->load->view('view_administration/formventa');
                $this->load->view('view_administration/admidesing/foot');
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

        
    }