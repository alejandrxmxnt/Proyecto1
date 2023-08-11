<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Usuario extends CI_Controller
    {
        public function index()
        {
            //              modelo        metodo listausuarios
            $lista=$this->usuario_model->listausuarios();
            //      nombre de posicion usuarios
            $data['usuarios']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/panel');
            $this->load->view('view_administration/usuario_lista',$data);//ahi llega la informacion.
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