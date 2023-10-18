<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Catalogo extends CI_Controller
    {        

        public function index()//metodo pagina principal
        {
            $lista=$this->producto_model->listaproductos();
            $data['catalogos']=$lista;

            $this->load->view('view_customer/desing/cabecera');
            $this->load->view('view_customer/desing/menu');
            $this->load->view('view_customer/catalogo', $data);
            $this->load->view('view_customer/desing/pie');
        }

        //metodo catalogo
        public function infoProducto()
        {
            $idcatalogo=$_POST['idcatalogo'];
            //$idcatalogo=1;
            //variable de transferencia de informacion 
            $data['infocatalogo']=$this->catalogo_model->infocatalogo($idcatalogo); //asi hago llegar el idcliente al modelo

            $this->load->view('view_customer/desing/cabecera');
            $this->load->view('view_customer/desing/menu');
            $this->load->view('view_customer/catalogo_lista', $data);
            $this->load->view('view_customer/desing/pie');
        }

        public function contactanos()//metodo pagina principal
        {
            $this->load->view('view_customer/desing/cabecera');
            $this->load->view('view_customer/desing/menu');
            $this->load->view('view_customer/desing/pie');
        }

    }


