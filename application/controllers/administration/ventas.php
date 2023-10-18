<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Ventas extends CI_Controller
    {//PAGINA PRINCIPAL DONDE SE CARGARA LA LISTA DE VENTAS 
        /*public __construct() {
            parent:: __construct();
            if(!$this->session->userdata('login')){
                redirect(base_url());
            }
            $this->load->model('venta_model'); 
        }*/

        public function index() //pagina principal de venta
        {
            if($this->session->userdata('login'))
            {
                $lista=$this->venta_model->listadoventas();//Consulta para la lista venta
                $data['ventas']=$lista;
                $this->load->view('view_administration/admidesing/ventaheadboard');
                $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                $this->load->view('view_administration/admidesing/menuLateral');
                $this->load->view('view_administration/venta_lista',$data);//TABLA DE VENTAS
                $this->load->view('view_administration/admidesing/foot');
            } 
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }
        //
        public function viewsAddSale()//vista agregar venta
        { 
            if($this->session->userdata('login'))//VERIRICA SI EXISTE SESION ABIERTA
            {   
                $lista = $this->cliente_model->listaclientes();
                $data['clientes'] = $lista;
                $lista = $this->producto_model->listaproductos();
                $data['productos'] = $lista;
                //Se carga formulario
                $this->load->view('view_administration/admidesing/ventaheadboard');
                $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                $this->load->view('view_administration/admidesing/menuLateral');
                $this->load->view('view_administration/formventa', $data);
                $this->load->view('view_administration/admidesing/foot');
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

        public function venta()
        {

            $data['ventas'] = $this->venta_model->listaventas();
            //$data['contents'] = 'admin/listaventa';
            $data['contents'] = 'administration/ventas/listaventa';
            $this->load->view('layout/index', $data);
        }


        /////////////////////////////////////////////////////////////
        ////////////        VENTAS             //////////////////////
        /////////////////////////////////////////////////////////////

        public function realizarventa()
        {
            if($this->session->userdata('login'))//VERIRICA SI EXISTE SESION ABIERTA
            {   
                $lista = $this->cliente_model->listaclientes();
                $data['clientes'] = $lista;
                $lista = $this->producto_model->listaproductos();
                $data['productos'] = $lista;

                $this->load->view('view_administration/admidesing/ventaheadboard');
                $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                $this->load->view('view_administration/admidesing/menuLateral');
                $this->load->view('view_administration/formventa', $data);
                $this->load->view('view_administration/admidesing/foot');
            }
            else
            {
                redirect('administration/ventas/index','refresh');//cargara el login
            }
            

            //$data['contents'] = 'view_administration/formventa'; //direccion de formulario
            //$this->load->view('layout/index', $data);
            //$this->load->view('layout/index', $data);
        }


        public function realizarTransaccionVenta()
        {
            if($this->session->userdata('login'))//VERIRICA SI EXISTE SESION ABIERTA
            {   
                $idCliente = $_POST['cliente'];
                //$fechaVenta = $_POST['fechaVenta'];
                $total = $_POST['total']; //costoFinal
                $detalle_data = $_POST['detalle_data'];
                $idUsuario = $this->session->userdata('id');

                // Llama al modelo para agregar la venta
                $resultado = $this->venta_model->agregarVenta($idCliente, $total, $idUsuario, $detalle_data);
                
                if ($resultado) 
                {
                    //$data['ventas'] = $this->venta_model->listaventas();
                    //$data['contents'] = 'administration/ventas/listaventa';
                    //$this->load->view('layout/index', $data);
                    redirect('administration/ventas/index','refresh');
                }
            }
            else
            {
                redirect('administration/ventas/index','refresh');//cargara el login
            }
        }

        public function deshabilitarbd(){
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $idventas=$_POST['idventas'];
                    $data['estado']='0';

                    $this->venta_model->deshablitarventa($idventas,$data);

                    redirect('administration/ventas/index','refresh');
                }else{
                    redirect('administration/ventas/index','refresh');
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }  
        }

        
    }