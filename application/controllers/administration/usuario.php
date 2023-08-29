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
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/usuario_lista',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregar()
        {
            //mostar un formulario(vista) para agregar nuevo usuario.
            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/usuario_formulario');
            $this->load->view('view_administration/admidesing/foot');
        }

        public function iconos()
        {
            //mostar un formulario(vista) para agregar nuevo usuario.
            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/iconos_lista');
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregarbd()
        {
            //  atributo.  BDD = name de formulario
            $data['nombre']=$_POST['nombre'];
            $data['primerApellido']=$_POST['apellido1'];
            $data['segundoApellido']=$_POST['apellido2'];
            $data['celular']=$_POST['celular'];
            $data['ci']=$_POST['ci'];
            $data['login']=$_POST['userName'];
            $data['password']=md5($_POST['password']);
            $data['tipo']=$_POST['rol'];

            $this->usuario_model->agregarusuario($data); //hasta ahi ya guarda en BDD

            redirect('administration/usuario/index','refresh');//con el refresh refrescamos de forma forsoza si es que hay problema

        }

        public function modificar()
        {   // variable         formulario
            $idusuario=$_POST['idusuario'];
            //variable de transferencia de informacion 
            $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario); //asi hago llegar el idcliente al modelo

            //cargar la vista
            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/usuario_modificar',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function modificarbd()
        {// variable         formulario
            $idusuario=$_POST['idusuario'];//almacena el id
            // BDD              formulario
            $data['nombre']=$_POST['nombre'];
            $data['primerApellido']=$_POST['apellido1'];
            $data['segundoApellido']=$_POST['apellido2'];
            $data['celular']=$_POST['celular'];
            $data['ci']=$_POST['ci'];
            $data['login']=$_POST['userName'];
            $data['password']=md5($_POST['password']);
            $data['tipo']=$_POST['rol'];
            //$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

            $this->usuario_model->modificarusuario($idusuario,$data);

            redirect('administration/usuario/index','refresh');
        }

        public function deshabilitarbd(){
            $idusuario=$_POST['idusuario'];
            $data['estado']='0';

            $this->usuario_model->modificarusuario($idusuario,$data);

            redirect('administration/usuario/index','refresh');
        }

        
    }