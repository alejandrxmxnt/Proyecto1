<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Producto extends CI_Controller
    {        

        public function index()
        {
            //              modelo        metodo listausuarios
            $lista=$this->producto_model->listaproductos();
            //      nombre de posicion usuarios
            $data['productos']=$lista;

            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/producto_lista',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregar()
        {
            //mostar un formulario(vista) para agregar nuevo usuario.
            $this->load->view('view_administration/admidesing/productoFormHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/producto_formulario');
            $this->load->view('view_administration/admidesing/foot');
        }

        public function agregarbd()
        {
            $nombrearchivo=$_POST['nombre'].".jpg";
            $config['upload_path']='./uploads/productos/'; //direccion donde se almacenara el producto
            $config['file_name']=$nombrearchivo;
            $direccion="./uploads/productos/".$nombrearchivo;

            if(file_exists($direccion)){
                unlink($direccion);//si existe el archivo se remplaza por esta
            }
            $config['allowed_types']='jpg|jpeg';//tipos de archivos que voy a permitir
            $this->load->library('upload',$config); //carga de libreria

            if(!$this->upload->do_upload())//si no se logra subir la foto
            {
                $data['error']=$this->upload->display_errors();//almacena todos los errores que salgan
                //archivos pesados
                //no hay permisos
            }
            else{
                $data['nombre']=$_POST['nombre'];
                $data['descripcion']=$_POST['descripcion'];
                $data['precioUnitario']=$_POST['precioUnitario'];
                $data['stock']=$_POST['stock'];
                $data['codigo']=$_POST['codigo'];

                $data['foto']=$nombrearchivo;
                //$databdd['foto']=$nombrearchivo;

                $this->producto_model->agregarproducto($data); //hasta ahi ya guarda en BDD
                $this->upload->data();//subir la imagen
            }
            
            redirect('administration/producto/index','refresh');//con el refresh refrescamos de forma forsoza si es que hay problema

        }

        public function modificar()
        {   // variable         formulario
            $idproducto=$_POST['idproducto'];
            //variable de transferencia de informacion 
            $data['infoproducto']=$this->producto_model->recuperarproductos($idproducto); //asi hago llegar el idcliente al modelo

            //cargar la vista
            $this->load->view('view_administration/admidesing/productoFormHeader');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/producto_modificar',$data);//ahi llega la informacion.
            $this->load->view('view_administration/admidesing/foot');
        }

        public function modificarbd()
        {// variable         formulario
            $idproducto=$_POST['idproducto'];//almacena el id
            // BDD              formulario
            $data['nombre']=$_POST['nombre'];
            $data['descripcion']=$_POST['descripcion'];
            $data['precioUnitario']=$_POST['precioUnitario'];
            $data['stock']=$_POST['stock'];
            $data['codigo']=$_POST['codigo'];
            $data['foto']=$_POST['foto'];
            $data['idCategoria']=$_POST['idCategoria'];
            //$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

            $this->producto_model->modificarproducto($idproducto,$data);

            redirect('administration/producto/index','refresh');
        }

        public function deshabilitarbd(){
            $idproducto=$_POST['idproducto'];
            $data['estado']='0';

            $this->producto_model->modificarproducto($idproducto,$data);

            redirect('administration/producto/index','refresh');
        }

        
    }