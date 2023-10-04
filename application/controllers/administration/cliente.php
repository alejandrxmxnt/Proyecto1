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
            
            //  atributo.  BDD = name de formulario
            //validación nombres
            $this->form_validation->set_rules('nombre','Ingrese el nombre','min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
            //validación primer Apellido
            $this->form_validation->set_rules('primerApellido','Ingrese un apellido','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Se requiere un apellido','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
            //validación segundo Apellido
            $this->form_validation->set_rules('segundoApellido','Ingrese otro apellido','min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
            //validación Telefono
            $this->form_validation->set_rules('telefono','Ingrese celular/telefono','min_length[0]|max_length[50]|regex_match[/^[0-9]+$/]',array('min_length'=>'debe ser mayor a 7 digitos','max_length'=>'Solo puedes registras 3 lineas de telefono o celular','regex_match'=>'Solo se perminten numeros'));
            //validación ciNit
            $this->form_validation->set_rules('ciNit','Ingrese cedula de indentidad','required|min_length[0]|max_length[20]|regex_match[/^[a-zA-Z0-9-]+$/]',array('required'=>'Se requiere CI o NIT','min_length'=>'Debe ser mayor a 7 caracteres','max_length'=>'capacidad maxima 20 caractes','regex_match'=>'Solo puede ingresar letras, numeros y guiones'));
            //validación direccion
            $this->form_validation->set_rules('direccion','Ingrese una dirección valida','min_length[0]|max_length[200]|regex_match[/^[a-zA-Z0-9\-\/,.\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Almenos debe nombrar una calle','max_length'=>'Solo se permiten 200 letras','regex_match'=>''));
            //validación razon Social
            $this->form_validation->set_rules('razonSocial','Ingrese la razon social','min_length[0]|max_length[100]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Nombre no valido','max_length'=>'Nombre excede de los 100 caracteres','regex_match'=>'Verifique si escribio correctamente los valores'));

            if($this->form_validation->run()==FALSE){
                //SI NO SUPERA LA VALIDACION CARGA NUEVAMENTE EL FORMULARIO
                $this->load->view('view_administration/admidesing/clienteFormHeader');
                $this->load->view('view_administration/admidesing/menuSuperior');
                $this->load->view('view_administration/admidesing/menuLateral');
                $this->load->view('view_administration/cliente_formulario');//direccion de vista.
                $this->load->view('view_administration/admidesing/foot');
                
            }else{
                //SI SE SUPERO LA VALIDACION RECIEN SE ENVIA LOS VALORES
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
        {//VALIDACIONES
            //  atributo.  BDD = name de formulario
            //validación nombres
            $this->form_validation->set_rules('nombre','Ingrese el nombre','min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
            //validación primer Apellido
            $this->form_validation->set_rules('primerApellido','Ingrese un apellido','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Se requiere un apellido','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
            //validación segundo Apellido
            $this->form_validation->set_rules('segundoApellido','Ingrese otro apellido','min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
            //validación Telefono
            $this->form_validation->set_rules('telefono','Ingrese celular/telefono','min_length[0]|max_length[50]|regex_match[/^[0-9]+$/]',array('min_length'=>'debe ser mayor a 7 digitos','max_length'=>'Solo puedes registras 3 lineas de telefono o celular','regex_match'=>'Solo se perminten numeros'));
            //validación ciNit
            $this->form_validation->set_rules('ciNit','Ingrese cedula de indentidad','required|min_length[0]|max_length[20]|regex_match[/^[a-zA-Z0-9-]+$/]',array('required'=>'Se requiere CI o NIT','min_length'=>'Debe ser mayor a 7 caracteres','max_length'=>'capacidad maxima 20 caractes','regex_match'=>'Solo puede ingresar letras, numeros y guiones'));
            //validación direccion
            $this->form_validation->set_rules('direccion','Ingrese una dirección valida','min_length[0]|max_length[200]|regex_match[/^[a-zA-Z0-9\-\/,.\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Almenos debe nombrar una calle','max_length'=>'Solo se permiten 200 letras','regex_match'=>''));
            //validación razon Social
            $this->form_validation->set_rules('razonSocial','Ingrese la razon social','min_length[0]|max_length[100]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Nombre no valido','max_length'=>'Nombre excede de los 100 caracteres','regex_match'=>'Verifique si escribio correctamente los valores'));
            if($this->form_validation->run()==FALSE){
                //SI NO SUPERA LA VALIDACION CARGA NUEVAMENTE EL FORMULARIO
                $this->load->view('view_administration/admidesing/clienteFormHeader');
                $this->load->view('view_administration/admidesing/menuSuperior');
                $this->load->view('view_administration/admidesing/menuLateral');
                $this->load->view('view_administration/cliente_modificar',$data);//ahi llega la informacion.
                $this->load->view('view_administration/admidesing/foot');
                
            }else{
                //SI SE SUPERO LA VALIDACION RECIEN SE ENVIA LOS VALORES
                // variable         formulario
                $idcliente=$_POST['idcliente'];//almacena el id
                // BDD              formulario
                $data['nombre']=$_POST['nombre'];
                $data['primerApellido']=$_POST['primerApellido'];
                $data['segundoApellido']=$_POST['segundoApellido'];
                $data['ciNit']=$_POST['ciNit'];
                $data['telefono']=$_POST['telefono'];
                $data['direccion']=$_POST['direccion'];
                $data['razonSocial']=$_POST['razonSocial'];

                $this->cliente_model->modificarcliente($idcliente,$data);

                redirect('administration/cliente/index','refresh');
            }
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