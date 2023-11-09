<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Empleado extends CI_Controller
    {        

        public function index()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    redirect('administration/producto/index','refresh');
                }else{
                    //              modelo        metodo listausuarios
                    $lista=$this->producto_model->listaproductos();
                    //      nombre de posicion usuarios
                    $data['productos']=$lista;

                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/producto_lista_View_Empleado',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }
            }else{
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

    }