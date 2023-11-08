<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Producto extends CI_Controller
    {        

        public function index()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //              modelo        metodo listausuarios
                    $lista=$this->producto_model->listaproductos();
                    //      nombre de posicion usuarios
                    $data['productos']=$lista;

                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/producto_lista',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

        public function agregar()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $lista = $this->categoria_model->listacategorias();
                    $data['listaCategorias'] = $lista;
                    //mostar un formulario(vista) para agregar nuevo usuario.
                    $this->load->view('view_administration/admidesing/productoFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/producto_formulario', $data);
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

        public function agregarbd()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //Validación nombre
                    $this->form_validation->set_rules('nombre','Ingrese el nombre','required|min_length[4]|max_length[250]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ\d,.\-]+$/]',array('required'=>'Ingrese el nombre del producto','min_length'=>'Nombre de producto demasiado corto','max_length'=>'Nombre demasiado largo','regex_match'=>'Solo se perminte texto'));
                    //Validación precio unitario
                    $this->form_validation->set_rules('precioUnitario','Precio de producto','required|min_length[2]|max_length[16]|regex_match[/^\d+(\.\d{1,2})?$/]',array('required'=>'Se requiere del precio','min_length'=>'Defina un precio','max_length'=>'Capacidad maxima de recibir 16 números','regex_match'=>'Solo se permiten números y punto'));
                    //Validación Stock
                    $this->form_validation->set_rules('stock','Stock disponible','required|min_length[1]|max_length[3]|regex_match[/^\d+(\.\d{1,2})?$/]',array('required'=>'Ingrese almenos el valor de 1 para el stock','min_length'=>'Ingrese un valor numerico','max_length'=>'logintud maxima de 3 digitos','regex_match'=>'Solo se permiten números enteros'));
                    //Validación Codigo
                    $this->form_validation->set_rules('codigo','Codigo de producto','min_length[4]|max_length[50]|regex_match[/^[a-zA-Z0-9-\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Codigo debe ser mayor a 4 caracteres','max_length'=>'Codigo excede de los 50 caracteres','regex_match'=>'Solo se permite letras mayúsculas y minúsculas, y números del 0 al 9'));

                    if($this->form_validation->run()==FALSE){
                        //mostar un formulario(vista) para agregar nuevo usuario.
                        $this->load->view('view_administration/admidesing/productoFormHeader');
                        $this->load->view('view_administration/admidesing/menuSuperior');
                        $this->load->view('view_administration/admidesing/menuLateral');
                        $this->load->view('view_administration/producto_formulario');
                        $this->load->view('view_administration/admidesing/foot');
                        
                    }else{
                        //CARGA LA DATA DE LOS VALORES 
                        $data['nombre']=$_POST['nombre'];
                        $data['descripcion']=$_POST['descripcion'];
                        $data['precioUnitario']=$_POST['precioUnitario'];
                        $data['stock']=$_POST['stock'];
                        $data['codigo']=$_POST['codigo'];
                        //$data['foto'] = $_POST['foto'];
                        $data['idCategoria']=$_POST['categoria'];

                        $this->producto_model->agregarproducto($data); //hasta ahi ya guarda en BDD
                        

                        $idProductoReciente = $this->producto_model->imagenproductoReciente(); //recupera el id reciente de producto
                        foreach($idProductoReciente->result() as $row){
                            $idProducto=$row->id;
                        }/*
                        if($idProducto>0){
                            redirect('administration/producto/subir2' . $idProducto);  
                        }*/
                        //redirect('administration/producto/subir2' . $idProducto);

                        if($idProducto){
                            $idproducto=$idProducto;
                            //$idproducto = $idProductoReciente;
                            $nombrearchivo=$idproducto.".jpg"; //nos aseguramos que el archivo tenga un nombre unico
                            //configuracion de subida
                            $config['upload_path']='./uploads/productos/';  //direccion de subida // ./ dice que trabaja con la raiz del sistema
                            $config['file_name']=$nombrearchivo; //juntamos la direccion del archivo
                            $direccion='./uploads/productos/'.$nombrearchivo;//donde va estar ese archivo

                            if(file_exists($direccion)){//si existe el archivo se borrara el anterior y agrega el nuevo
                                unlink($direccion);
                            }//si no existe significa que es la primera vez que se esta cargando una imagen
                            $config['allowed_types']='jpg|png'; //tipos de archivos que voy a permitir |gif
                            $this->load->library('upload',$config); //libreria upload nativa del modelo vista controlador con todos nuestros parametros de configuracion
                            //PRUEBA DE SUBIDA
                            if(!$this->upload->do_upload())
                            {//si no se logra subir la foto //do_upload() hace el intento de subir
                                //si no se ejecuta de manera efectiva
                                $data['error']=$this->upload->display_errors(); //almancena todos los errores que salgan
                                //archivos pesados, archivo no compatible
                            }else{
                                $data['foto']=$nombrearchivo; //data en el campo foto va almacenar el nombre del archivo que cuenta con la direccion 
                                //trabajar en base de datos
                                $this->producto_model->modificarproducto($idproducto,$data);
                                //subir el archibo
                                $this->upload->data();
                            }
                            redirect('administration/producto/index','refresh');
                        }

                        //redirect('administration/producto/agregar','refresh');
                    }
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            } 
        }

        //ACTUALIZAR FOTO
        public function subirfoto()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //  recibir el id del producto  
                    //$variable['BDD']=FORMULARIO
                    $data['id']=$_POST['id'];

                    $this->load->view('view_administration/admidesing/productoFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/subirproducto',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        public function subir()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //$variable['BDD']=FORMULARIO
                    $idproducto=$_POST['id']; //resepcionar el id del producto
                    $nombrearchivo=$idproducto.".jpg"; //nos aseguramos que el archivo tenga un nombre unico
                    //configuracion de subida
                    $config['upload_path']='./uploads/productos/';  //direccion de subida // ./ dice que trabaja con la raiz del sistema
                    $config['file_name']=$nombrearchivo; //juntamos la direccion del archivo
                    $direccion='./uploads/productos/'.$nombrearchivo;//donde va estar ese archivo

                    if(file_exists($direccion)){//si existe el archivo se borrara el anterior y agrega el nuevo
                        unlink($direccion);
                    }//si no existe significa que es la primera vez que se esta cargando una imagen
                    $config['allowed_types']='jpg|png'; //tipos de archivos que voy a permitir |gif
                    $this->load->library('upload',$config); //libreria upload nativa del modelo vista controlador con todos nuestros parametros de configuracion
                    //PRUEBA DE SUBIDA
                    if(!$this->upload->do_upload())
                    {//si no se logra subir la foto //do_upload() hace el intento de subir
                        //si no se ejecuta de manera efectiva
                        $data['error']=$this->upload->display_errors(); //almancena todos los errores que salgan
                        //archivos pesados, archivo no compatible
                    }else{
                        $data['foto']=$nombrearchivo; //data en el campo foto va almacenar el nombre del archivo que cuenta con la direccion 
                        //trabajar en base de datos
                        $this->producto_model->modificarproducto($idproducto,$data);
                        //subir el archibo
                        $this->upload->data();
                    }
                    redirect('administration/producto/index','refresh');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

        public function subir2($idProducto)
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //$variable['BDD']=FORMULARIO
                    $idproducto=$idProducto; //resepcionar el id del producto
                    $nombrearchivo=$idproducto.".jpg"; //nos aseguramos que el archivo tenga un nombre unico
                    //configuracion de subida
                    $config['upload_path']='./uploads/productos/';  //direccion de subida // ./ dice que trabaja con la raiz del sistema
                    $config['file_name']=$nombrearchivo; //juntamos la direccion del archivo
                    $direccion='./uploads/productos/'.$nombrearchivo;//donde va estar ese archivo

                    if(file_exists($direccion)){//si existe el archivo se borrara el anterior y agrega el nuevo
                        unlink($direccion);
                    }//si no existe significa que es la primera vez que se esta cargando una imagen
                    $config['allowed_types']='jpg|png'; //tipos de archivos que voy a permitir |gif
                    $this->load->library('upload',$config); //libreria upload nativa del modelo vista controlador con todos nuestros parametros de configuracion
                    //PRUEBA DE SUBIDA
                    if(!$this->upload->do_upload())
                    {//si no se logra subir la foto //do_upload() hace el intento de subir
                        //si no se ejecuta de manera efectiva
                        $data['error']=$this->upload->display_errors(); //almancena todos los errores que salgan
                        //archivos pesados, archivo no compatible
                    }else{
                        $data['foto']=$nombrearchivo; //data en el campo foto va almacenar el nombre del archivo que cuenta con la direccion 
                        //trabajar en base de datos
                        $this->producto_model->modificarproducto($idproducto,$data);
                        //subir el archibo
                        $this->upload->data();
                    }
                    redirect('administration/producto/index','refresh');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

        public function modificar()
        {   
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    // variable         formulario
                    $idproducto=$_POST['idproducto'];
                    //variable de transferencia de informacion 
                    $data['infoproducto']=$this->producto_model->recuperarproductos($idproducto); //asi hago llegar el idcliente al modelo

                    //cargar la vista
                    $this->load->view('view_administration/admidesing/productoFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/producto_modificar',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }

        public function modificarbd()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    // variable         formulario
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
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            } 
        }

        public function deshabilitarbd(){
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $idproducto=$_POST['idproducto'];
                    $data['estado']='0';

                    $this->producto_model->modificarproducto($idproducto,$data);

                    redirect('administration/producto/index','refresh');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }  
        }
    }