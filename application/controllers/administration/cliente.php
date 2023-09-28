<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Cliente extends CI_Controller
    {
        public function index()
        {
            //              modelo        metodo listaclientes
            $lista=$this->cliente_model->listaclientes();
            //      nombre de posicion usuarios
            $data['clientes']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/cliente_lista',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregar(){
            //mostrar un formulario para agregar nuevo Cliente.
            //este formulario va estar una vista
            $this->load->view('view_administration/admidesing/clienteFormHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/cliente_formulario');//direccion de vista.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregarbd()
        {
            echo '
            <script src="<?php echo base_url();?>bootstrap/js/formulario/formularioCliente.js"></script> 
            ';
            //  atributo.  BDD = name de formulario
            $data['nombre']=$_POST['nombre'];
            $data['primerApellido']=$_POST['primerApellido'];
            $data['segundoApellido']=$_POST['segundoApellido'];
            $data['ciNit']=$_POST['ciNit'];
            $data['telefono']=$_POST['telefono'];
            $data['direccion']=$_POST['direccion'];
            $data['razonSocial']=$_POST['razonSocial'];

            $this->cliente_model->agregarcliente($data); //hasta ahi ya guarda en BDD

            redirect('administration/cliente/index','refresh');//con el refresh refrescamos de forma forsoza si es que hay problema

        }
        //PARA HARD DELETE
        public function eliminarbd()
        { // variable         formulario
            $idcliente=$_POST['idcliente'];
            $this->cliente_model->eliminarcliente($idcliente);
            redirect('administration/cliente/index','refresh');
        }

        public function modificar()
        {   // variable         formulario
            $idcliente=$_POST['idcliente'];
            //variable de transferencia de informacion 
            $data['infocliente']=$this->cliente_model->recuperarclientes($idcliente); //asi hago llegar el idcliente al modelo

            //cargar la vista
            $this->load->view('view_administration/admidesing/clienteFormHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/cliente_modificar',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function modificarbd()
        {// variable         formulario
            $idcliente=$_POST['idcliente'];//almacena el id
            // BDD              formulario
            $data['nombre']=$_POST['nombre'];
            $data['primerApellido']=$_POST['apellido1'];
            $data['segundoApellido']=$_POST['apellido2'];
            $data['ciNit']=$_POST['cinit'];
            $data['telefono']=$_POST['celular'];
            $data['direccion']=$_POST['direccion'];
            $data['razonSocial']=$_POST['razonSocial'];

            $this->cliente_model->modificarcliente($idcliente,$data);

            redirect('administration/cliente/index','refresh');
        }
        public function deshabilitarbd(){
            $idcliente=$_POST['idcliente'];
            $data['estado']='0';

            $this->cliente_model->modificarcliente($idcliente,$data);

            redirect('administration/cliente/index','refresh');
        }
        //Los clientes dados de baja se enlistaran en una lista de clientes deshabilitados.
        public function deshabilitados(){
            //              modelo        metodo listaclientes
            $lista=$this->cliente_model->listaclientesdeshabilitados();
            //      nombre de posicion usuarios
            $data['clientes']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/cliente_lista_deshabilitados',$data);//ahi llega la informacion de todos los clientes deshabilitados.
            $this->load->view('view_administration/admidesing/foot');
        }
        public function habilitarbd(){
            $idcliente=$_POST['idcliente'];
            $data['estado']='1';

            $this->cliente_model->modificarcliente($idcliente,$data);

            redirect('administration/cliente/deshabilitados','refresh');
        }
    }