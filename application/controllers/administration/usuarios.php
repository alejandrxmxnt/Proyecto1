<?php 
                    //LOGIN -CONTROLADOR PARA ENTRAR AL SISTEMA
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Usuarios extends CI_Controller
    {
        //index Metodo Principal. - LOGIN
        //PARA EL CONTROL DE SESIONES
        public function index()
        {//CONTROL DE SECIONES ABIERTAS
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero cargada el panel principal
                redirect('administration/usuarios/panel','refresh');//carga de panel de trabajo.
            }
            else
            {//falso volvera a cargar el panel de inicio de sesion.
                $this->load->view('view_administration/login');//carga el login
            }
        }
        //METEDO PARA VALIDAR USUARIO. - ACCESO POR LOGIN.
        public function validarusuario(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('login','Nombre de Usuario','required|min_length[5]|max_length[15]',array('required'=>'Llene bien el formulario','min_length'=>'Escriba bien sus credenciales','max_length'=>'Escriba bien sus credenciales'));
            $this->form_validation->set_rules('password','Password','required|min_length[1]|max_length[15]',array('required'=>'Llene bien el formulario','min_length'=>'Contraseña no valida','max_length'=>'Escriba bien sus credenciales'));
            if($this->form_validation->run()==FALSE){
                $this->load->view('view_administration/login');//carga el login
            }
            else
            {
                $login=$_POST['login'];
                $password=md5($_POST['password']);//encriptar Password
    
                $consulta=$this->usuario_model->validar($login,$password);
                
                if($consulta->num_rows()>0)
                {//SI EL USUARIO INGRESA SU LOGIN Y PASSWORD CORRECTAMENTE.
                    //SI TIENE UN REGISTRO VALIDO TENEMOS UN USUARIO COMPLETAMENTE VALIDADO
                    foreach($consulta->result() as $row){
                        //incovacion a cada atributo de la consulta
                                    //           
                        $this->session->set_userdata('id',$row->id);
                        $this->session->set_userdata('login',$row->login);
                        $this->session->set_userdata('tipo',$row->tipo);
                        redirect('administration/usuarios/panel','refresh');
                    }
    
                }else{
                    //SI NO ES VALIDO - SI ES QUE NO HAY UNA SESION ABIERTA
                    redirect('administration/usuarios/index','refresh'); //lo volvera a mandar al login del metodo index
                }
            }
/*
            // variable | formulario
            $login=$_POST['login'];
            $password=md5($_POST['password']);//encriptar Password

            $consulta=$this->usuario_model->validar($login,$password);
            
            if($consulta->num_rows()>0)
            {//SI EL USUARIO INGRESA SU LOGIN Y PASSWORD CORRECTAMENTE.
                //SI TIENE UN REGISTRO VALIDO TENEMOS UN USUARIO COMPLETAMENTE VALIDADO
                foreach($consulta->result() as $row){
                    //incovacion a cada atributo de la consulta
                                //           
                    $this->session->set_userdata('id',$row->id);
                    $this->session->set_userdata('login',$row->login);
                    $this->session->set_userdata('tipo',$row->tipo);
                    redirect('administration/usuarios/panel','refresh');
                }

            }else{
                //SI NO ES VALIDO - SI ES QUE NO HAY UNA SESION ABIERTA
                redirect('administration/usuarios/index','refresh'); //lo volvera a mandar al login del metodo index
            }*/
        }
/*
        public function panel(){
            //TODOS LOS USUARIOS CORRECTAMENTA AUTENTICADOS.
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero - redirecciona a una ventada de un usuario correctamente autentificado.
                redirect('administration/usuario/index','refresh');//carga al menu principal
            }
            else
            {//falso volvera 
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }
*/
        public function panel(){
            //TODOS LOS USUARIOS CORRECTAMENTA AUTENTICADOS.
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero - redirecciona a una ventada de un usuario correctamente autentificado.
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    redirect('administration/usuario/index','refresh');//interfaz de admin con sesion abierta
                }else{
                    redirect('administration/empleado/index','refresh');//interfaz de empleado con sesion abierta
                }
            }
            else
            {//falso volvera 
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }


        //CADA QUE EL USUARIO CIERRE SESION
        public function logout(){
            $this->session->sess_destroy();//desctruir variables de session
            redirect('administration/usuarios/index','refresh');//redirige a login 
        }
    }
    /* 4 METODOS
    1.- index() | carga el login o carga el panel
    2.- validarusuario() | validacion del usuario y crea variables de sesion o redirige al login
    3.- panel() | carga el dasbord si es que hay una sesion abierta o si no redirige al login
    4.- logout() | mata las variables de sesion y redirecciona al login
    */