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
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //ACCESO A TODA LA LISTA DE VENTAS 
                    $lista=$this->venta_model->listadoventasUltimas();//Consulta para la lista venta
                    $data['ventas']=$lista;
                    $this->load->view('view_administration/admidesing/ventaheadboard');
                    $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/venta_lista',$data);//TABLA DE VENTAS
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    //ULTIMAS 10 VENTAS REALIZADAS POR EL EMPLEADO
                    $idUsuario = $this->session->userdata('id');
                    $lista=$this->venta_model->listadoventasUltimasEmpleado($idUsuario);//Consulta para la lista venta
                    $data['ventas']=$lista;
                    $this->load->view('view_administration/admidesing/ventaheadboard');
                    $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/venta_lista',$data);//TABLA DE VENTAS
                    $this->load->view('view_administration/admidesing/foot'); //si no hay sesion abierta direcciona al login
                } 
            } 
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }
        //lista de clientes
        public function userList(){
            //Lee los valores POST y pase $this->autocomplete_model->getUsers() para obtener la lista de clientes Array
            $postData = $this->input->post();
            $data = $this->autocomplete_model->getUsers($postData);
            //retorna la data del array en formato JSON
            echo json_encode($data);
        }
        //lista de productos
        public function productList(){
            //Lee los valores POST y pase $this->autocomplete_model->getUsers() para obtener la lista de clientes Array
            $postData = $this->input->post();
            $data = $this->autocomplete_model->getProduct($postData);
            //retorna la data del array en formato JSON
            echo json_encode($data);
        }
        //
        public function viewsAddSale()//vista agregar venta
        { 
            if($this->session->userdata('login'))//VERIRICA SI EXISTE SESION ABIERTA
            {   
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //$this->autocomplete_model->userList();
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
                }else{
                    $lista = $this->cliente_model->listaclientes();
                    $data['clientes'] = $lista;
                    $lista = $this->producto_model->listaproductos();
                    $data['productos'] = $lista;
                    //Se carga formulario
                    $this->load->view('view_administration/admidesing/ventaheadboard');
                    $this->load->view('view_administration/admidesing/menuSuperiorVenta');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/formventa', $data);
                    $this->load->view('view_administration/admidesing/foot');
                }
                
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
        ////////////        AUTOCOMPLETADO     //////////////////////
        /////////////////////////////////////////////////////////////

        public function buscarCliente() {
            //Lee los valores POST y pase $this->autocomplete_model->getUsers() para obtener la lista de clientes Array
            $postData = $this->input->post();
            $data = $this->autocomplete_model->getUsers($postData);
            //retorna la data del array en formato JSON
            echo json_encode($data);
        }

        public function buscarproducto() {
            $postData = $this->input->post();
            $data = $this->autocomplete_model->getProduct($postData);
            //retorna la data del array en formato JSON
            echo json_encode($data);
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
                $idCliente = $_POST['idCliente'];
                //$fechaVenta = $_POST['fechaVenta'];
                $total = $_POST['total']; //costoFinal
                $detalle_data = $_POST['detalle_data'];
                $idUsuario = $this->session->userdata('id');

                // Llama al modelo para agregar la venta
                $resultado = $this->venta_model->agregarVenta($idCliente, $total, $idUsuario, $detalle_data);
                
                if ($resultado) 
                {
                    echo '<script>window.open("' . site_url('administration/ventas/reporteRecientepdf') . '", "_blank");</script>';
                    redirect('administration/ventas/index','refresh');
                }/*
                if($resultado){
                    redirect('administration/ventas/index','refresh');
                }*/
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



        ///////////////////////////////////////////////////////
        ///////////////     REPORTES      /////////////////////
        ///////////////////////////////////////////////////////

        public function reportepdf(){

            $idventas=$_POST['idventas'];
            $listaventacliente=$this->reporte_model->reporteDatosVentaCliente($idventas);
            $listaventacliente=$listaventacliente->result();
            $listaventausuario=$this->reporte_model->reporteDatosVentaUsuario($idventas);
            $listaventausuario=$listaventausuario->result();
            $listadetalleproducto=$this->reporte_model->reporteDatosDetalleProducto($idventas);
            $listadetalleproducto=$listadetalleproducto->result();

            $numero = $idventas;
            $numeroComoCadena = strval($numero);
            //$longitud = strlen($numeroComoCadena);
            if(strlen($numeroComoCadena) < 8){
                $numeroComoCadena = str_pad($numeroComoCadena,8,'0', STR_PAD_LEFT);
            }
            
            //$lista=$this->reporte_model->reporteDatos($idventas);
            //$lista=$lista->result();
            //CAPTURA DE DATOS PARA VENTA Y CLIENTE
            foreach ($listaventacliente as $ventacliente) {
                $idVenta = $ventacliente->id;
                $cliente_razonSocial = $ventacliente->nombre.' '.$ventacliente->primerApellido.' '.$ventacliente->razonSocial;
                $primerapellido = $ventacliente->primerApellido;
                $cliente_nit = $ventacliente->ciNit;
                $venta_total = $ventacliente->total;
                $fecha_venta = $ventacliente->fechaVenta;
            }
            //EN CASO QUE EL CAMPO DE PRIMER APELLIDO ESTE VACIO
            if($primerapellido === ''){
                $cliente_razonSocial='Sin nombre';
            }

            if($cliente_nit === 'ANONIMO'){
                $cliente_nit = '';
            }
            //CAPTURA DE DATOS PARA USUARIO DE LA VENTA
            foreach ($listaventausuario as $ventausuario){
                $usuario = $ventausuario->nombre.' '.$ventausuario->primerApellido;
            }
            //CAPTURA DE DATOS PARA DETALLE DE VENTA Y PRODUCTO
            foreach ($listadetalleproducto as $detalleproducto){
                $producto_nombre = $detalleproducto->nombre;
                $producto_precioUnitario = $detalleproducto->precioUnitario;
                $detalle_cantidad = $detalleproducto->cantidad;
                $detalle_descuento = $detalleproducto->descuento;
                $detalle_importe = $detalleproducto->importe;
            }

            //generar texto de numeros
            $valor=$venta_total; //almacena el valor puro 
            $parte_entera = floor($valor); //capura de valor entero
            $parte_decimal = $valor - $parte_entera; //captura de decimal

            $fraccion = $parte_decimal."/100";

            $totalpagar=$parte_entera; //MANDAR EL NUMERO TOTAL

            //$totalpagar=48805.00;
            require_once APPPATH."cifrarAletras/CifrasEnLetras.php";
            $v=new CifrasEnLetras(); 
            //Convertimos el total en letras
            $letra=($v->convertirEurosEnLetras($totalpagar)); 

            $this->pdf=new Pdf(); //creacion de nuevo pdf
            $this->pdf->AddPage(); //agregando una pagina
            $this->pdf->AliasNbPages(); //paginacion
            $this->pdf->SetTitle("COMPROBANTE DE VENTA"); //titulo de reporte
            $this->pdf->SetLeftMargin(15); //margen izquierdo
            $this->pdf->SetRightMargin(15); //margen derecho

            //TITULO
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 20);
            $this->pdf->SetXY(67, 17);
            $this->pdf->Cell(89, 3,utf8_decode('COMPROBANTE DE VENTA'), '', 2, 'L', 0);
            //HASTA AQUI EL TITULO

            //importar imagenes
            $ruta=base_url()."img/logos/logomuebleria2.png"; //conocer la ruta de la imagen
            $this->pdf->Image($ruta, 17, 10, 25, 25); //Rescatar una imagen de la ruta anterior //coordenadas x pixeles //coordenada y pixeles hacia abajo // dimencianes para la imagen ancho y largo
            //configurar el tipo de letra - esto solo es texto
            
            //coordenadas para generar el numero de venta
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);
            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(165, 10);
            $this->pdf->Cell(89, 3,utf8_decode('N° '), '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(180, 10);
            $this->pdf->Cell(89, 3, $numeroComoCadena, '', 2, 'L', 0);

            $this->pdf->SetFont('Courier','B',10); //tipoi de letra, negrilla, tamaño
            $this->pdf->Ln(25);//salto de linea

            //listo para poner contenido - descripcion del negocio - estatico
            
            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,utf8_decode('MUEBLERIA LARA '),'R',2,'L',0); //100 de ancho, 3 de alto, el texto que tendra, margenes, TBLR , Aliniacion de texto a la izquierda L=izquierda | C=centro | R=derecha, 0 sin relleno 1 con relleno
            /*
            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->Cell(89);
            $this->pdf->Cell(89,0,'  Atendido por: ','L',0,'L',0);
            $this->pdf->Ln(3); //Salto de linea
            $this->pdf->Cell(89);
            $this->pdf->SetFont('Courier','B',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(55,0,''.$usuario, 'L',1,'R',0);*/
            
            $this->pdf->Ln(0); //Salto de linea
            
            $this->pdf->SetFont('Courier','B',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(2);
            $this->pdf->Cell(89,3,utf8_decode('Av. Beiging entre Av. Tadeo Haenke.'),'R',2,'L',0);
            
            $this->pdf->Ln(0);
            
            $this->pdf->Cell(2);
            $this->pdf->Cell(89,3,'Cochabamba - Bolivia','R',2,'L',0);
            $this->pdf->SetFont('Courier','B',10);
            
            $this->pdf->Ln(0);
            
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,'Telefono/Celular: ','',0,'L',0);
            $this->pdf->SetFont('Courier','B',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(51,3,'+591 62701312', 'R',1,'L',0);  
            
            //COORDENDAS PARA MOSTRA EL EMPLEADO QUE ATENDIO EN LA VENTA
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);
            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(110, 40);
            $this->pdf->Cell(89, 3, 'Atendido por: ', '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(110, 47);
            $this->pdf->Cell(89, 0,utf8_decode($usuario), '', 2, 'L', 0);

            

            $this->pdf->Ln(5);

            $this->pdf->SetDrawColor(23,15,23); //color de margen
            $this->pdf->Cell(180,0,'','B',0,'C',1);

            $this->pdf->Ln(5);
            
            $this->pdf->SetFont('Courier','B',18);
            //$this->pdf->SetFillColor(51,204,51); //color de fondo
            $this->pdf->SetTextColor(0,0,0); //color de texto
            //$this->pdf->SetDrawColor(23,15,23); //color de margen
            $this->pdf->Cell(180,10,'DATOS DEL CLIENTE','',0,'C',0); //ancho, alto, titulo, margen, , Centrado, Relleno

            $this->pdf->Ln(12);

            $this->pdf->SetFont('Courier','B',10);

            $this->pdf->Ln(0); //interlineado
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,utf8_decode('Razón Social: '),'',0,'L',0);
            $this->pdf->SetFont('Courier','',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(52,3,utf8_decode($cliente_razonSocial), '',1,'L',0);

            $this->pdf->Ln(2); //salto de linea

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->Ln(0); //interlineado
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,'CI / NIT: ','',0,'L',0);
            $this->pdf->SetFont('Courier','',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(52,3,$cliente_nit, '',1,'L',0);

            $this->pdf->Ln(2); //salto de linea

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->Ln(0); //interlineado
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,'Fecha de Venta: ','',0,'L',0);
            $this->pdf->SetFont('Courier','',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(52,3,$fecha_venta, '',1,'L',0);

            //diseño de tabla
            $this->pdf->Ln(5);
            //60   180
            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->SetFillColor(238,208,157);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetDrawColor(0,0,0);
            $this->pdf->Cell(90,5,'PRODUCTO','TBLR',0,'C',1);
            $this->pdf->Cell(22,5,'P/U','TBLR',0,'C',1);
            $this->pdf->Cell(22,5,'CANTIDAD','TBLR',0,'C',1);
            $this->pdf->Cell(24,5,'DESCUENTO %','TBLR',0,'C',1);
            $this->pdf->Cell(22,5,'IMPORTE','TBLR',0,'C',1);

            $this->pdf->Ln(5);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Courier','B',10);
            
            foreach ($listadetalleproducto as $detalleproducto){
                $this->pdf->SetFillColor(255,255,255);
                $this->pdf->Cell(90,5,utf8_decode($detalleproducto->nombre),'TBLR',0,'L',0);
                //$this->pdf->SetX($this->pdf->GetX() + 90);
                $this->pdf->Cell(22,5,$detalleproducto->precioUnitario,'TBLR',0,'C',0);
                //$this->pdf->SetX($this->pdf->GetX() + 112);
                $this->pdf->Cell(22,5,$detalleproducto->cantidad,'TBLR',0,'C',0);
                //$this->pdf->SetX($this->pdf->GetX() + 134);
                $this->pdf->Cell(24,5,$detalleproducto->descuento.'%','TBLR',0,'C',0);
                //$this->pdf->SetX($this->pdf->GetX() + 158);
                $this->pdf->Cell(22,5,$detalleproducto->importe,'TBLR',0,'C',0);
                //$this->pdf->SetX($this->pdf->GetX() + 180);
                $this->pdf->Ln(5);
            }
            $this->pdf->Ln(5);
            $this->pdf->Cell(134);
            $this->pdf->Cell(24,5,'TOTAL Bs.','TBLR',0,'C',0);
            $this->pdf->Cell(22,5,$venta_total,'TBLR',0,'C',0);

            $this->pdf->Ln(15);

            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,strtoupper(utf8_decode('Son: '.$letra.' '.$fraccion.' Bolivianos.')),'',2,'L',0);
            
            $this->pdf->Output("reporte".$idventas.".pdf","I"); //"D" para descargar - "I" para abrir en una nueva ventana
        }


        public function reporteRecientepdf(){

            $lista=$this->reporte_model->reporteReciente();
            foreach($lista->result() as $row){
                //$idventas=$row->id;
                $idventas = $row->id;
                $numeroComoCadena = strval($idventas);
                //$longitud = strlen($numeroComoCadena);
                if(strlen($numeroComoCadena) < 8){
                    $numeroComoCadena = str_pad($numeroComoCadena,8,'0', STR_PAD_LEFT);
                }
            }
            $listaventacliente=$this->reporte_model->reporteDatosVentaCliente($idventas);
            $listaventacliente=$listaventacliente->result();
            $listaventausuario=$this->reporte_model->reporteDatosVentaUsuario($idventas);
            $listaventausuario=$listaventausuario->result();
            $listadetalleproducto=$this->reporte_model->reporteDatosDetalleProducto($idventas);
            $listadetalleproducto=$listadetalleproducto->result();
            
            //$lista=$this->reporte_model->reporteDatos($idventas);
            //$lista=$lista->result();
            //CAPTURA DE DATOS PARA VENTA Y CLIENTE
            foreach ($listaventacliente as $ventacliente) {
                $idVenta = $ventacliente->id;
                $cliente_razonSocial = $ventacliente->nombre.' '.$ventacliente->primerApellido.' '.$ventacliente->razonSocial;
                $primerape = $ventacliente->primerApellido;
                $cliente_nit = $ventacliente->ciNit;
                $venta_total = $ventacliente->total;
                $fecha_venta = $ventacliente->fechaVenta;
            }
            //CONTROL DE APELLIDO
            if($primerape === ''){
                $cliente_razonSocial = 'Sin nombre';
            }//CONTROL DE CINIT
            if($cliente_nit === 'ANONIMO'){
                $cliente_nit = '';
            }
            //CAPTURA DE DATOS PARA USUARIO DE LA VENTA
            foreach ($listaventausuario as $ventausuario){
                $usuario = $ventausuario->nombre.' '.$ventausuario->primerApellido;
            }
            //CAPTURA DE DATOS PARA DETALLE DE VENTA Y PRODUCTO
            foreach ($listadetalleproducto as $detalleproducto){
                $producto_nombre = $detalleproducto->nombre;
                $producto_precioUnitario = $detalleproducto->precioUnitario;
                $detalle_cantidad = $detalleproducto->cantidad;
                $detalle_descuento = $detalleproducto->descuento;
                $detalle_importe = $detalleproducto->importe;
            }

            //generar texto de numeros
            $valor=$venta_total; //almacena el valor puro 
            $parte_entera = floor($valor); //capura de valor entero
            $parte_decimal = $valor - $parte_entera; //captura de decimal

            $fraccion = $parte_decimal."/100";

            $totalpagar=$parte_entera; //MANDAR EL NUMERO TOTAL

            //$totalpagar=48805.00;
            require_once APPPATH."cifrarAletras/CifrasEnLetras.php";
            $v=new CifrasEnLetras(); 
            //Convertimos el total en letras
            $letra=($v->convertirEurosEnLetras($totalpagar));

            $this->pdf=new Pdf(); //creacion de nuevo pdf
            $this->pdf->AddPage(); //agregando una pagina
            $this->pdf->AliasNbPages(); //paginacion
            $this->pdf->SetTitle("COMPROBANTE DE VENTA"); //titulo de reporte
            $this->pdf->SetLeftMargin(15); //margen izquierdo
            $this->pdf->SetRightMargin(15); //margen derecho

            //TITULO
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 20);
            $this->pdf->SetXY(67, 17);
            $this->pdf->Cell(89, 3,utf8_decode('COMPROBANTE DE VENTA'), '', 2, 'L', 0);
            //HASTA AQUI EL TITULO

            //importar imagenes
            $ruta=base_url()."img/logos/logomuebleria2.png"; //conocer la ruta de la imagen
            $this->pdf->Image($ruta, 17, 10, 25, 25); //Rescatar una imagen de la ruta anterior //coordenadas x pixeles //coordenada y pixeles hacia abajo // dimencianes para la imagen ancho y largo
            //configurar el tipo de letra - esto solo es texto
            
            //coordenadas para generar el numero de venta
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);
            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(165, 10);
            $this->pdf->Cell(89, 3,utf8_decode('N° '), '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(180, 10);
            $this->pdf->Cell(89, 3, $numeroComoCadena, '', 2, 'L', 0);

            $this->pdf->SetFont('Courier','B',10); //tipoi de letra, negrilla, tamaño
            $this->pdf->Ln(25);//salto de linea

            //listo para poner contenido - descripcion del negocio - estatico
            
            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,utf8_decode('MUEBLERIA LARA '),'R',2,'L',0); //100 de ancho, 3 de alto, el texto que tendra, margenes, TBLR , Aliniacion de texto a la izquierda L=izquierda | C=centro | R=derecha, 0 sin relleno 1 con relleno
            
            $this->pdf->Ln(0); //Salto de linea
            
            $this->pdf->SetFont('Courier','B',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(2);
            $this->pdf->Cell(89,3,utf8_decode('Av. Beiging entre Av. Tadeo Haenke.'),'R',2,'L',0);
            
            $this->pdf->Ln(0);
            
            $this->pdf->Cell(2);
            $this->pdf->Cell(89,3,'Cochabamba - Bolivia','R',2,'L',0);
            $this->pdf->SetFont('Courier','B',10);
            
            $this->pdf->Ln(0);
            
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,'Telefono/Celular: ','',0,'L',0);
            $this->pdf->SetFont('Courier','B',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(51,3,'+591 62701312', 'R',1,'L',0);  
            
            //COORDENDAS PARA MOSTRA EL EMPLEADO QUE ATENDIO EN LA VENTA
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);
            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(110, 40);
            $this->pdf->Cell(89, 3, 'Atendido por: ', '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(110, 47);
            $this->pdf->Cell(89, 0,utf8_decode($usuario), '', 2, 'L', 0);

            

            $this->pdf->Ln(5);

            $this->pdf->SetDrawColor(23,15,23); //color de margen
            $this->pdf->Cell(180,0,'','B',0,'C',1);

            $this->pdf->Ln(5);
            
            $this->pdf->SetFont('Courier','B',18);
            //$this->pdf->SetFillColor(51,204,51); //color de fondo
            $this->pdf->SetTextColor(0,0,0); //color de texto
            //$this->pdf->SetDrawColor(23,15,23); //color de margen
            $this->pdf->Cell(180,10,'DATOS DEL CLIENTE','',0,'C',0); //ancho, alto, titulo, margen, , Centrado, Relleno

            $this->pdf->Ln(12);

            $this->pdf->SetFont('Courier','B',10);

            $this->pdf->Ln(0); //interlineado
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,utf8_decode('Razón Social: '),'',0,'L',0);
            $this->pdf->SetFont('Courier','',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(52,3,utf8_decode($cliente_razonSocial), '',1,'L',0);

            $this->pdf->Ln(2); //salto de linea

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->Ln(0); //interlineado
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,'CI / NIT: ','',0,'L',0);
            $this->pdf->SetFont('Courier','',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(52,3,$cliente_nit, '',1,'L',0);

            $this->pdf->Ln(2); //salto de linea

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->Ln(0); //interlineado
            $this->pdf->Cell(2);
            $this->pdf->Cell(38,3,'Fecha de Venta: ','',0,'L',0);
            $this->pdf->SetFont('Courier','',9); //letra - sin negrilla - tamaño
            $this->pdf->Cell(52,3,$fecha_venta, '',1,'L',0);

            //diseño de tabla
            $this->pdf->Ln(5);
            //60   180
            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->SetFillColor(238,208,157);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetDrawColor(0,0,0);
            $this->pdf->Cell(90,5,'PRODUCTO','TBLR',0,'C',1);
            $this->pdf->Cell(22,5,'P/U','TBLR',0,'C',1);
            $this->pdf->Cell(22,5,'CANTIDAD','TBLR',0,'C',1);
            $this->pdf->Cell(24,5,'DESCUENTO %','TBLR',0,'C',1);
            $this->pdf->Cell(22,5,'IMPORTE','TBLR',0,'C',1);

            $this->pdf->Ln(5);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Courier','B',10);
            
            foreach ($listadetalleproducto as $detalleproducto){
                $this->pdf->SetFillColor(255,255,255);
                $this->pdf->Cell(90,5,utf8_decode($detalleproducto->nombre),'TBLR',0,'L',0);
                $this->pdf->Cell(22,5,$detalleproducto->precioUnitario,'TBLR',0,'C',0);
                $this->pdf->Cell(22,5,$detalleproducto->cantidad,'TBLR',0,'C',0);
                $this->pdf->Cell(24,5,$detalleproducto->descuento.'%','TBLR',0,'C',0);
                $this->pdf->Cell(22,5,$detalleproducto->importe,'TBLR',0,'C',0);
                $this->pdf->Ln(5);
            }
            $this->pdf->Ln(5);
            $this->pdf->Cell(134);
            $this->pdf->Cell(24,5,'TOTAL Bs.','TBLR',0,'C',0);
            $this->pdf->Cell(22,5,$venta_total,'TBLR',0,'C',0);

            $this->pdf->Ln(15);

            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,strtoupper(utf8_decode('Son: '.$letra.' '.$fraccion.' Bolivianos.')),'',2,'L',0);
            
            $this->pdf->Output("reporte".$idventas.".pdf","I"); //"D" para descargar - "I" para abrir en una nueva ventana
        }

        
    }