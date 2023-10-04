<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Categoria extends CI_Controller
    {
        public function index()
        {
            //              modelo        metodo listaclientes
            $lista=$this->categoria_model->listacategorias();
            //      nombre de posicion usuarios
            $data['categorias']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/categoria_lista',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregar(){
            //mostrar un formulario para agregar nuevo Cliente.
            //este formulario va estar una vista
            $this->load->view('view_administration/admidesing/categoriaFormHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/categoria_formulario');//direccion de vista.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregarbd()
        {
            //validación nombres
            $this->form_validation->set_rules('nombre','Ingrese el nombre','required|min_length[5]|max_length[100]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Se require un nombre de categoria','min_length'=>'Nombre de categoria demasiado corta','max_length'=>'Cantidad maxima 200 letras','regex_match'=>'Solo se perminten letras'));
            //validación primer Apellido
            $this->form_validation->set_rules('detalle','Ingrese un apellido','min_length[1]|max_length[30000]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ,.\d]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 30000 letras','regex_match'=>'Solo se perminten letras y numeros'));

            if($this->form_validation->run()==FALSE){
                //SI NO SUPERA LA VALIDACION CARGA NUEVAMENTE EL FORMULARIO
                $this->load->view('view_administration/admidesing/categoriaFormHeader');
                $this->load->view('view_administration/admidesing/menuSuperior');
                $this->load->view('view_administration/admidesing/menuLateral');
                $this->load->view('view_administration/categoria_formulario');//direccion de vista.
                $this->load->view('view_administration/admidesing/foot');  
            }else{
                //  atributo.  BDD = name de formulario
                $data['nombre']=$_POST['nombre'];
                $data['descripcion']=$_POST['detalle'];

                $this->categoria_model->agregarcategoria($data); //hasta ahi ya guarda en BDD

                redirect('administration/categoria/index','refresh');//con el refresh refrescamos de forma forsoza si es que hay problema
            }

        }
        
        public function modificar()
        {   // variable         formulario
            $idcategoria=$_POST['idcategoria'];
            //variable de transferencia de informacion 
            $data['infocategoria']=$this->categoria_model->recuperarcategorias($idcategoria); //asi hago llegar el idcliente al modelo

            //cargar la vista
            $this->load->view('view_administration/admidesing/categoriaFormHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/categoria_modificar',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function modificarbd()
        {// variable         formulario
            $idcategoria=$_POST['idcategoria'];//almacena el id
            // BDD              formulario
            $data['nombre']=$_POST['nombre'];
            $data['descripcion']=$_POST['detalle'];

            $this->categoria_model->modificarcategoria($idcategoria,$data);

            redirect('administration/categoria/index','refresh');
        }
        public function deshabilitarbd(){
            $idcategoria=$_POST['idcategoria'];
            $data['estado']='0';

            $this->categoria_model->modificarcategoria($idcategoria,$data);

            redirect('administration/categoria/index','refresh');
        }
        //Los clientes dados de baja se enlistaran en una lista de clientes deshabilitados.
        public function deshabilitados(){
            //              modelo        metodo listaclientes
            $lista=$this->categoria_model->listacategoriasdeshabilitados();
            //      nombre de posicion usuarios
            $data['categorias']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/categoria_lista_deshabilitados',$data);//ahi llega la informacion de todos los clientes deshabilitados.
            $this->load->view('view_administration/admidesing/foot');
        }
        public function habilitarbd(){
            $idcategoria=$_POST['idcategoria'];
            $data['estado']='1';

            $this->categoria_model->modificarcategoria($idcategoria,$data);

            redirect('administration/categoria/deshabilitados','refresh');
        }
    }