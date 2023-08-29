<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Empleado extends CI_Controller
    {        

        public function index()
        {
            //              modelo        metodo listaclientes
            $lista=$this->cliente_model->listaclientes();
            //      nombre de posicion usuarios
            $data['clientes']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral2');
            $this->load->view('view_administration/cliente_lista',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

    }