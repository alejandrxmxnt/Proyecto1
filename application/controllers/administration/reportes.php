<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    class Reportes extends CI_Controller
    {
        public function index()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //muestra interfaz de opciones a generar de reportes
                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/reporte_lista');//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    //muestra interfaz de opciones a generar de reportes
                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/reporte_lista_View_Empleado');//ahi llega la informacion.
                    //$this->load->view('view_administration/reporte_lista');
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }


        // REPORTE GENERAL DE VENTAS POR FECHAS
        public function generalfiltro()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){ //TRAE EL REPORTE GENERAL
                    $Inicio=$_POST['inicio'];
                    $data['inicio']=$Inicio;
                    $Fin=$_POST['fin'];
                    $data['fin']=$Fin;
                    $fecha= $this->reporte_model->ventaFechasRango($Inicio,$Fin);
                    $data['fecha']=$fecha;
        
                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/reporte_general_filtro',$data);
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    //SOLO GENERA REPORTE POR RANGO DE FECHAS ESTABLECIDAD POR EL USUARIO
                    $idUsuario = $this->session->userdata('id');
                    $Inicio=$_POST['inicio'];
                    $data['inicio']=$Inicio;
                    $Fin=$_POST['fin'];
                    $data['fin']=$Fin;
                    $fecha= $this->reporte_model->ventaFechasRangoEmpleado($Inicio,$Fin,$idUsuario);
                    $data['fecha']=$fecha;
        
                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/reporte_general_filtro_View_Empleado',$data);
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            
        }

        public function generalfiltrocategoria()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){ //TRAE EL REPORTE GENERAL
                    $Inicio=$_POST['inicio'];
                    $data['inicio']=$Inicio;
                    $Fin=$_POST['fin'];
                    $data['fin']=$Fin;
                    $fecha= $this->reporte_model->ventaFechasRangoCategoria($Inicio,$Fin);
                    $data['fecha']=$fecha;
        
                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/reporte_general_filtro_categoria',$data);
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    //SOLO GENERA REPORTE POR RANGO DE FECHAS ESTABLECIDAD POR EL USUARIO
                    $idUsuario = $this->session->userdata('id');
                    $Inicio=$_POST['inicio'];
                    $data['inicio']=$Inicio;
                    $Fin=$_POST['fin'];
                    $data['fin']=$Fin;
                    $fecha= $this->reporte_model->ventaFechasRangoCategoriaEmpleado($Inicio,$Fin,$idUsuario);
                    $data['fecha']=$fecha;
        
                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/reporte_general_filtro_categoria_View_Empleado',$data);
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            
        }

        public function reporteGeneral()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){

                    $lista = $this->reporte_model->ventashistorial();
                    $data['fecha'] = $lista;

                    $lista = $this->reporte_model->reporteTotal();
                    $data['total'] = $lista;

                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/reporte_general',$data);
                    $this->load->view('view_administration/admidesing/foot');

                }else{
                    //PARA SACAR LA LISTA DE VENTAS DE ESE USUARIO
                    $idEmpleado = $this->session->userdata('id');
                    //Vista de reportes para el empleado
                    $listas = $this->reporte_model->ventashistorialEmpleado($idEmpleado);
                    $datas['fechas'] = $listas;

                    $lista = $this->reporte_model->reporteTotalEmpleado($idEmpleado);
                    $datas['total'] = $listas;

                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/reporte_general_View_Empleado',$datas);
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        public function reporteProducto(){
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){

                    $lista = $this->reporte_model->ventashistoriaRecaudacionporcategoria();
                    $data['fecha'] = $lista;

                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/reporte_general_producto',$data);
                    $this->load->view('view_administration/admidesing/foot');

                }else{
                    //PARA SACAR LA LISTA DE VENTAS DE ESE USUARIO
                    $idEmpleado = $this->session->userdata('id');
                    //Vista de reportes para el empleado
                    $listas = $this->reporte_model->ventashistoriaRecaudacionporcategoria2();
                    $datas['fecha'] = $listas;

                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/reporte_general_producto_Empleado',$datas);
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }


        public function generarPdf(){
            //TRAER EL ID DE SESION Y LUEGO CAPTURA EL ID PARA BUSCAR LA INFO DEL USUARIO Y RECUPERAR VALORES
            $idusuario= $this->session->userdata('id');
            $infousuario=$this->usuario_model->recuperarusuarios($idusuario);
            $infousuario=$infousuario->result();
            foreach ($infousuario as $info) {
                $idUsuario = $info->id;
                $usuario = $info->nombre.' '.$info->primerApellido;
            }
            //RECUPERA VALORES DE PROCESO DE VENTAS PARA HACI PODER GENERAR LA TABLA DE CADA UNO
            $historiaVenta = $this->reporte_model->ventashistorial();
            $historiaVenta = $historiaVenta->result();
            
            $totalGeneral = 0.00;
            foreach ($historiaVenta as $ventatotal) {
                $totalGeneral = $totalGeneral+($ventatotal->total);
            }
            $total=number_format($totalGeneral, 2,',','.');//para agregar los dos cecimales de centavos

            $valor = $totalGeneral;
            $parte_entera = floor($valor); //capura de valor entero
            $parte_decimal = $valor - $parte_entera; //captura de decimal

            $fraccion = $parte_decimal."/100";

            $totalpagar=$parte_entera; //MANDAR EL NUMERO TOTAL

            require_once APPPATH."cifrarAletras/CifrasEnLetras.php";
            $v=new CifrasEnLetras(); 
            //Convertimos el total en letras
            $letra=($v->convertirEurosEnLetras($totalpagar));

            //CREACION DEL REPORTE
            $this->pdf=new Pdf(); //creacion de nuevo pdf
            $this->pdf->AddPage(); //agregando una pagina
            $this->pdf->AliasNbPages(); //paginacion
            $this->pdf->SetTitle("REPORTE GENERAL DE VENTAS"); //titulo de reporte
            $this->pdf->SetLeftMargin(15); //margen izquierdo
            $this->pdf->SetRightMargin(15); //margen derecho

            //TITULO
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 20);
            $this->pdf->SetXY(52, 17);
            $this->pdf->Cell(89, 3,utf8_decode('REPORTE DE VENTAS GENERAL'), '', 2, 'L', 0);
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
            //$this->pdf->Cell(89, 3,utf8_decode('N° '), '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(180, 10);
            //$this->pdf->Cell(89, 3, $numeroComoCadena, '', 2, 'L', 0); VERIFICAR

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
            $this->pdf->Cell(89, 3, 'Generado por: ', '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(110, 47);
            $this->pdf->Cell(89, 0,utf8_decode($usuario), '', 2, 'L', 0);

            $this->pdf->Ln(10);

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->SetFillColor(238,208,157);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetDrawColor(0,0,0);
            $this->pdf->Cell(87,5,'RAZON SOCIAL','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'NIT','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'TOTAL','TBLR',0,'C',1);
            $this->pdf->Cell(41,5,'FECHA VENTA','TBLR',0,'C',1);
            //$this->pdf->Cell(22,5,'IMPORTE','TBLR',0,'C',1);

            $this->pdf->Ln(5);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Courier','B',10);
            
            foreach ($historiaVenta as $historia){
                $this->pdf->SetFillColor(255,255,255);
                $this->pdf->Cell(87,5,utf8_decode($historia->nombre.' '.$historia->primerApellido.' '.$historia->segundoApellido.' '.$historia->razonSocial),'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,$historia->ciNit,'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,number_format($historia->total, 2,',','.'),'TBLR',0,'R',0);//DIVIDIR CADA MIL CON UN .
                $this->pdf->Cell(41,5,$historia->fechaVenta,'TBLR',0,'C',0);
                $this->pdf->Ln(5);
            }

            $this->pdf->Ln(5);
            $this->pdf->Cell(1);
            $this->pdf->Cell(87,5,'TOTAL Bs.','TBL',0,'C',0);
            $this->pdf->Cell(52,5,$total,'TBR',0,'C',0);

            $this->pdf->Ln(15);

            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,strtoupper(utf8_decode('Son: '.$letra.' '.$fraccion.' Bolivianos.')),'',2,'L',0);
            
            $this->pdf->Output("reporte".$idUsuario.".pdf","I");
        }

        // PDF -> REPORTE GENERAL DE VENTAS POR FECHAS
        public function reporteFechasPdf(){
            
            $venta_total=0.00;
            
            if(strlen($_POST['inicio'])>0 and strlen($_POST['fin'])>0){
            
                $inicio=$_POST['inicio'];
                $fin=$_POST['fin'];
                $verInicio = date('Y/m/d', strtotime($inicio));
                $verFin = date('Y/m/d', strtotime($fin));
            }else{
                $inicio = '1111-01-01';
                $fin = '9999-12-30';
    
                $verInicio = '_/_/_'; //imprime la fecha inicio eliminando los valores de hora
                $verFin = '_/_/_'; //imprime la fecha fin eliminando los valores de hora
            }

            //TRAER EL ID DE SESION Y LUEGO CAPTURA EL ID PARA BUSCAR LA INFO DEL USUARIO Y RECUPERAR VALORES
            $idusuario= $this->session->userdata('id');
            $infousuario=$this->usuario_model->recuperarusuarios($idusuario);

            $infousuario=$infousuario->result();
            foreach ($infousuario as $info) {
                $idUsuario = $info->id;
                $usuario = $info->nombre.' '.$info->primerApellido;
            }

            $historiaVenta=$this->reporte_model->ventaFechasRango($verInicio, $verFin);
            $historiaVenta=$historiaVenta->result();

            foreach($historiaVenta as $historia){
                $venta_total = $venta_total + ($historia->total);
            }
            $ventaGeneral=number_format($venta_total, 2,',','.');

            $valor = $venta_total;
            $parte_entera = floor($valor); //capura de valor entero
            $parte_decimal = $valor - $parte_entera; //captura de decimal

            $fraccion = $parte_decimal."/100";

            $totalpagar=$parte_entera; //MANDAR EL NUMERO TOTAL

            require_once APPPATH."cifrarAletras/CifrasEnLetras.php";
            $v=new CifrasEnLetras(); 
            //Convertimos el total en letras
            $letra=($v->convertirEurosEnLetras($totalpagar));

            //CREACION DEL REPORTE
            $this->pdf=new Pdf(); //creacion de nuevo pdf
            $this->pdf->AddPage(); //agregando una pagina
            $this->pdf->AliasNbPages(); //paginacion
            $this->pdf->SetTitle("REPORTE GENERAL DE VENTAS"); //titulo de reporte
            $this->pdf->SetLeftMargin(15); //margen izquierdo
            $this->pdf->SetRightMargin(15); //margen derecho

            //TITULO
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 20);
            $this->pdf->SetXY(64, 16);
            $this->pdf->Cell(89, 3,utf8_decode('REPORTE DE VENTAS'), '', 2, 'L', 0);
            //HASTA AQUI EL TITULO
            
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);

            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(63, 22);
            $this->pdf->Cell(89, 3,utf8_decode('Desde: '.$verInicio.' Hasta: '.$verFin), '', 2, 'L', 0);

            //importar imagenes
            $ruta=base_url()."img/logos/logomuebleria2.png"; //conocer la ruta de la imagen
            $this->pdf->Image($ruta, 17, 10, 25, 25); //Rescatar una imagen de la ruta anterior //coordenadas x pixeles //coordenada y pixeles hacia abajo // dimencianes para la imagen ancho y largo
            //configurar el tipo de letra - esto solo es texto
            
            //coordenadas para generar el numero de venta
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);
            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(165, 10);
            //$this->pdf->Cell(89, 3,utf8_decode('N° '), '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(180, 10);
            //$this->pdf->Cell(89, 3, $numeroComoCadena, '', 2, 'L', 0); VERIFICAR

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
            $this->pdf->Cell(89, 3, 'Generado por: ', '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(110, 47);
            $this->pdf->Cell(89, 0,utf8_decode($usuario), '', 2, 'L', 0);

            $this->pdf->Ln(10);

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->SetFillColor(238,208,157);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetDrawColor(0,0,0);
            $this->pdf->Cell(87,5,'RAZON SOCIAL','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'NIT','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'TOTAL','TBLR',0,'C',1);
            $this->pdf->Cell(41,5,'FECHA VENTA','TBLR',0,'C',1);
            //$this->pdf->Cell(22,5,'IMPORTE','TBLR',0,'C',1);

            $this->pdf->Ln(5);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Courier','B',10);
            
            foreach ($historiaVenta as $historia){
                $this->pdf->SetFillColor(255,255,255);
                $this->pdf->Cell(87,5,utf8_decode($historia->nombre.' '.$historia->primerApellido.' '.$historia->segundoApellido.' '.$historia->razonSocial),'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,$historia->ciNit,'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,number_format($historia->total, 2,',','.'),'TBLR',0,'R',0);
                $this->pdf->Cell(41,5,$historia->fechaVenta,'TBLR',0,'C',0);
                $this->pdf->Ln(5);
            }
            

            $this->pdf->Ln(5);
            $this->pdf->Cell(1);
            $this->pdf->Cell(87,5,'TOTAL Bs.','TBL',0,'L',0);
            $this->pdf->Cell(52,5,$ventaGeneral,'TBR',0,'R',0);

            $this->pdf->Ln(15);

            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,strtoupper(utf8_decode('Son: '.$letra.' '.$fraccion.' Bolivianos.')),'',2,'L',0);
            
            $this->pdf->Output("reporte".$idUsuario.".pdf","I");

        }

        public function reporteFechasEmpleadoPdf(){
            
            $venta_total=0.00;
            
            if(strlen($_POST['inicio'])>0 and strlen($_POST['fin'])>0){
            
                $inicio=$_POST['inicio'];
                $fin=$_POST['fin'];
                $verInicio = date('Y/m/d', strtotime($inicio));
                $verFin = date('Y/m/d', strtotime($fin));
            }else{
                $inicio = '1111-01-01';
                $fin = '9999-12-30';
    
                $verInicio = '_/_/_'; //imprime la fecha inicio eliminando los valores de hora
                $verFin = '_/_/_'; //imprime la fecha fin eliminando los valores de hora
            }

            //TRAER EL ID DE SESION Y LUEGO CAPTURA EL ID PARA BUSCAR LA INFO DEL USUARIO Y RECUPERAR VALORES
            $idusuario= $this->session->userdata('id');
            $infousuario=$this->usuario_model->recuperarusuarios($idusuario);

            $infousuario=$infousuario->result();
            foreach ($infousuario as $info) {
                $idUsuario = $info->id;
                $usuario = $info->nombre.' '.$info->primerApellido;
            }

            $historiaVenta=$this->reporte_model->ventaFechasRangoEmpleado($verInicio, $verFin, $idusuario);
            $historiaVenta=$historiaVenta->result();

            foreach($historiaVenta as $historia){
                $venta_total = $venta_total + ($historia->total);
            }
            $ventaGeneral=number_format($venta_total, 2,',','.');

            $valor = $venta_total;
            $parte_entera = floor($valor); //capura de valor entero
            $parte_decimal = $valor - $parte_entera; //captura de decimal

            $fraccion = $parte_decimal."/100";

            $totalpagar=$parte_entera; //MANDAR EL NUMERO TOTAL

            require_once APPPATH."cifrarAletras/CifrasEnLetras.php";
            $v=new CifrasEnLetras(); 
            //Convertimos el total en letras
            $letra=($v->convertirEurosEnLetras($totalpagar));

            //CREACION DEL REPORTE
            $this->pdf=new Pdf(); //creacion de nuevo pdf
            $this->pdf->AddPage(); //agregando una pagina
            $this->pdf->AliasNbPages(); //paginacion
            $this->pdf->SetTitle("REPORTE GENERAL DE VENTAS"); //titulo de reporte
            $this->pdf->SetLeftMargin(15); //margen izquierdo
            $this->pdf->SetRightMargin(15); //margen derecho

            //TITULO
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 20);
            $this->pdf->SetXY(64, 16);
            $this->pdf->Cell(89, 3,utf8_decode('REPORTE DE VENTAS'), '', 2, 'L', 0);
            //HASTA AQUI EL TITULO
            
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);
            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(63, 22);
            $this->pdf->Cell(89, 3,utf8_decode('Desde: '.$verInicio.' Hasta: '.$verFin), '', 2, 'L', 0);

            //importar imagenes
            $ruta=base_url()."img/logos/logomuebleria2.png"; //conocer la ruta de la imagen
            $this->pdf->Image($ruta, 17, 10, 25, 25); //Rescatar una imagen de la ruta anterior //coordenadas x pixeles //coordenada y pixeles hacia abajo // dimencianes para la imagen ancho y largo
            //configurar el tipo de letra - esto solo es texto
            
            //coordenadas para generar el numero de venta
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 10);
            // Ajustar la coordenada X (posición horizontal)
            $this->pdf->SetXY(165, 10);
            //$this->pdf->Cell(89, 3,utf8_decode('N° '), '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(180, 10);
            //$this->pdf->Cell(89, 3, $numeroComoCadena, '', 2, 'L', 0); VERIFICAR

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
            $this->pdf->Cell(89, 3, 'Ventas generadas por: ', '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(110, 47);
            $this->pdf->Cell(89, 0,utf8_decode($usuario), '', 2, 'L', 0);

            $this->pdf->Ln(10);

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->SetFillColor(238,208,157);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetDrawColor(0,0,0);
            $this->pdf->Cell(87,5,'RAZON SOCIAL','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'NIT','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'TOTAL','TBLR',0,'C',1);
            $this->pdf->Cell(41,5,'FECHA VENTA','TBLR',0,'C',1);
            //$this->pdf->Cell(22,5,'IMPORTE','TBLR',0,'C',1);

            $this->pdf->Ln(5);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Courier','B',10);
            
            foreach ($historiaVenta as $historia){
                $this->pdf->SetFillColor(255,255,255);
                $this->pdf->Cell(87,5,utf8_decode($historia->nombre.' '.$historia->primerApellido.' '.$historia->segundoApellido.' '.$historia->razonSocial),'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,$historia->ciNit,'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,number_format($historia->total, 2,',','.'),'TBLR',0,'R',0);
                $this->pdf->Cell(41,5,$historia->fechaVenta,'TBLR',0,'C',0);
                $this->pdf->Ln(5);
            }
            

            $this->pdf->Ln(5);
            $this->pdf->Cell(1);
            $this->pdf->Cell(87,5,'TOTAL Bs.','TBL',0,'L',0);
            $this->pdf->Cell(52,5,$ventaGeneral,'TBR',0,'R',0);

            $this->pdf->Ln(15);

            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,strtoupper(utf8_decode('Son: '.$letra.' '.$fraccion.' Bolivianos.')),'',2,'L',0);
            
            $this->pdf->Output("reporte".$idUsuario.".pdf","I");

        }

        public function generarEmpleadoPdf(){
            //TRAER EL ID DE SESION Y LUEGO CAPTURA EL ID PARA BUSCAR LA INFO DEL USUARIO Y RECUPERAR VALORES
            $idusuario= $this->session->userdata('id');
            $infousuario=$this->usuario_model->recuperarusuarios($idusuario);
            $infousuario=$infousuario->result();
            foreach ($infousuario as $info) {
                $idUsuario = $info->id;
                $usuario = $info->nombre.' '.$info->primerApellido;
            }
            //RECUPERA VALORES DE PROCESO DE VENTAS PARA HACI PODER GENERAR LA TABLA DE CADA UNO
            $historiaVenta = $this->reporte_model->ventashistorialEmpleado($idusuario); //$idEmpleado
            $historiaVenta = $historiaVenta->result();
            
            $totalGeneral = 0.00;
            foreach ($historiaVenta as $ventatotal) {
                $totalGeneral = $totalGeneral+($ventatotal->total);
            }
            $total=number_format($totalGeneral, 2,',','.');//para agregar los dos cecimales de centavos

            $valor = $totalGeneral;
            $parte_entera = floor($valor); //capura de valor entero
            $parte_decimal = $valor - $parte_entera; //captura de decimal

            $fraccion = $parte_decimal."/100";

            $totalpagar=$parte_entera; //MANDAR EL NUMERO TOTAL

            require_once APPPATH."cifrarAletras/CifrasEnLetras.php";
            $v=new CifrasEnLetras(); 
            //Convertimos el total en letras
            $letra=($v->convertirEurosEnLetras($totalpagar));

            //CREACION DEL REPORTE
            $this->pdf=new Pdf(); //creacion de nuevo pdf
            $this->pdf->AddPage(); //agregando una pagina
            $this->pdf->AliasNbPages(); //paginacion
            $this->pdf->SetTitle("REPORTE GENERAL DE VENTAS"); //titulo de reporte
            $this->pdf->SetLeftMargin(15); //margen izquierdo
            $this->pdf->SetRightMargin(15); //margen derecho

            //TITULO
            $this->pdf->Cell(2); // Ajustar el espacio en blanco si es necesario
            $this->pdf->SetFont('Courier', 'B', 20);
            $this->pdf->SetXY(52, 17);
            $this->pdf->Cell(89, 3,utf8_decode('REPORTE DE VENTAS GENERAL'), '', 2, 'L', 0);
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
            //$this->pdf->Cell(89, 3,utf8_decode('N° '), '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(180, 10);
            //$this->pdf->Cell(89, 3, $numeroComoCadena, '', 2, 'L', 0); VERIFICAR

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
            $this->pdf->Cell(89, 3, 'Generado por: ', '', 2, 'L', 0);
            $this->pdf->SetFont('Courier', '', 10);
            // Ajustar la coordenada X para el valor de fecha
            $this->pdf->SetXY(110, 47);
            $this->pdf->Cell(89, 0,utf8_decode($usuario), '', 2, 'L', 0);

            $this->pdf->Ln(10);

            $this->pdf->SetFont('Courier','B',10);
            $this->pdf->SetFillColor(238,208,157);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetDrawColor(0,0,0);
            $this->pdf->Cell(87,5,'RAZON SOCIAL','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'NIT','TBLR',0,'C',1);
            $this->pdf->Cell(26,5,'TOTAL','TBLR',0,'C',1);
            $this->pdf->Cell(41,5,'FECHA VENTA','TBLR',0,'C',1);
            //$this->pdf->Cell(22,5,'IMPORTE','TBLR',0,'C',1);

            $this->pdf->Ln(5);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->SetFont('Courier','B',10);
            
            foreach ($historiaVenta as $historia){
                $this->pdf->SetFillColor(255,255,255);
                $this->pdf->Cell(87,5,utf8_decode($historia->nombre.' '.$historia->primerApellido.' '.$historia->segundoApellido.' '.$historia->razonSocial),'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,$historia->ciNit,'TBLR',0,'L',0);
                $this->pdf->Cell(26,5,number_format($historia->total, 2,',','.'),'TBLR',0,'R',0);//DIVIDIR CADA MIL CON UN .
                $this->pdf->Cell(41,5,$historia->fechaVenta,'TBLR',0,'C',0);
                $this->pdf->Ln(5);
            }

            $this->pdf->Ln(5);
            $this->pdf->Cell(1);
            $this->pdf->Cell(87,5,'TOTAL Bs.','TBL',0,'C',0);
            $this->pdf->Cell(52,5,$total,'TBR',0,'C',0);

            $this->pdf->Ln(15);

            $this->pdf->Cell(2); //celda en blanco 
            $this->pdf->Cell(89,3,strtoupper(utf8_decode('Son: '.$letra.' '.$fraccion.' Bolivianos.')),'',2,'L',0);
            
            $this->pdf->Output("reporte".$idUsuario.".pdf","I");
        }

    }