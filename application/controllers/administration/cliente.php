<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Cliente extends CI_Controller
    {
        public function index()
        {
            //              modelo        metodo listausuarios
            $lista=$this->cliente_model->listacliente();
            //      nombre de posicion usuarios
            $data['clientes']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/panel');
            $this->load->view('view_administration/cliente_lista',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregar()
        {
            //mostar un formulario(vista) para agregar nuevo usuario.
            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/panel');
            $this->load->view('view_administration/usuario_formulario');
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregarbd(){//se llena con los valores que vienen de usuario_formulario.php

        }
    }