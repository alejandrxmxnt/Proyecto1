<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

    //VALORES PARA EL ENVIO DE CORREO
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    //HASTA AHI PARA CARGAR REQUERIMIENTOS DE ENVIO DE CORREOS

    class Usuario extends CI_Controller
    {
        //ESTRUCTURA PARA ENVIAR CORREO ELECTRONICO
        public function enviarDatos($correo,$nombreUsuario,$contraseniaSegura)
        {
            $mail = new PHPMailer(true); //para las escepciones

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'correomuevleria@gmail.com';                     //SMTP username
                $mail->Password   = 'jqdihuepqdkvwiap';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('correomuevleria@gmail.com', 'ENVIO DE CONTRASEÑA', false, 'UTF-8');//PERMITE CARACTERES ESPECIALES
                $mail->addAddress($correo, 'CORREO ELECTRONICO');     //Add a recipient
                /*
                $mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo('info@example.com', 'Information');       */
                $mail->addCC('adralemont@gmail.com'); //MODIFICACION PENDIENTE
                //$mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'CREDENCIALES DE ACCESO';
                $mail->Body    = 'NOMBRE DE USUARIO: <b>' . $nombreUsuario . '</b> <br>Contraseña de acceso: <b>' . $contraseniaSegura . '</b> <br> <b>RECUERDA UNA VEZ DENTRO PUEDES CONFIGURAR TU CONTRASEÑA</b>';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Envio de contraseña';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        //HASTA AQUI ES LA ESTRUCTURA
        
        //GENERAR NOMBRE DE USUARIO
        public function generarUsuario($nombre, $apellido1, $ci) {
            // eliminar espacios
            $nombre = (trim($nombre));
            $apellido = (trim($apellido1));
            $ci = (trim($ci));
            // Obtener la primera letra del nombre y el apellido
            $Nombre = substr($nombre, 0, 3);
            $Apellido = substr($apellido1, 0, 3);
            $numeroCi = substr($ci, 2, 5);
            // Generar el nombre de usuario
            $usuario = $Nombre . $Apellido . $numeroCi;
            return $usuario;
        }
        //GENERAR PASSWORD
        public function generarContrasenia ($long = 8, $nombre, $apellido1, $ci){//valores a recibir
            $caracteres=($nombre).strtoupper($apellido1).$ci;//para hacer todo mayusculas
            $cantidadCaracter = strlen($caracteres);//cantidad de caracteres
            $contrasenia = '';
            for($i = 0; $i < $long; $i++){
                $indice = random_int(0, $cantidadCaracter - 1);
                $contrasenia .=$caracteres[$indice];
            }
            return $contrasenia;
        }

        public function index()
        {
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero - redirecciona a una ventada de un usuario correctamente autentificado.
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //              modelo        metodo listausuarios
                    $lista=$this->usuario_model->listausuarios();
                    //      nombre de posicion usuarios
                    $data['usuarios']=$lista;

                    $this->load->view('view_administration/admidesing/headboard');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/usuario_lista',$data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {//falso volvera 
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        public function agregar()
        {
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero - redirecciona a una ventada de un usuario correctamente autentificado.
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    //mostar un formulario(vista) para agregar nuevo usuario.
                    $this->load->view('view_administration/admidesing/userFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/usuario_formulario');
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {//falso volvera 
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        public function iconos()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            //mostar un formulario(vista) para agregar nuevo usuario.
            /*
            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/iconos_lista');
            $this->load->view('view_administration/admidesing/foot');*/
        }


        public function agregarbd()
        {
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero - redirecciona a una ventada de un usuario correctamente autentificado.
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR') //agregar estado
                {
                    $this->form_validation->set_rules('nombre','Ingrese el nombre','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Ingrese el nombre','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación primer Apellido
                    $this->form_validation->set_rules('primerApellido','Ingrese un apellido','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Se requiere un apellido','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación segundo Apellido
                    $this->form_validation->set_rules('segundoApellido','Ingrese otro apellido','min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación Telefono
                    $this->form_validation->set_rules('telefono','Ingrese celular/telefono','min_length[0]|max_length[50]|regex_match[/^[0-9]+$/]',array('min_length'=>'debe ser mayor a 7 digitos','max_length'=>'Solo puedes registras 3 lineas de telefono o celular','regex_match'=>'Solo se perminten numeros'));
                    //validación ciNit
                    $this->form_validation->set_rules('ci','Ingrese cedula de indentidad','required|min_length[0]|max_length[20]|regex_match[/^[a-zA-Z0-9-]+$/]',array('required'=>'Se requiere CI','min_length'=>'Debe ser mayor a 7 caracteres','max_length'=>'capacidad maxima 20 caractes','regex_match'=>'Solo puede ingresar letras, numeros y guiones'));
                    //validación correo
                    $this->form_validation->set_rules('correo','correo@correo.com','required|min_length[5]|max_length[100]|regex_match[/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/]',array('required'=>'correo@correo.com','min_length'=>'Correo no valido','max_length'=>'Longitud maxima de correo de 100 caracteres','regex_match'=>'Puedes utilizar letras, números y puntos y la direccion de correo.'));

                    if($this->form_validation->run()==FALSE){
                        //SI NO SUPERA LA VALIDACION CARGA NUEVAMENTE EL FORMULARIO
                        $this->load->view('view_administration/admidesing/userFormHeader');
                        $this->load->view('view_administration/admidesing/menuSuperior');
                        $this->load->view('view_administration/admidesing/menuLateral');
                        $this->load->view('view_administration/usuario_formulario');
                        $this->load->view('view_administration/admidesing/foot');
                        
                    }else{
                        //$mailer = new EmailSender(true); 
                        //carga de valores para poder cargar las funciones de generar contrasenia y usuario
                        //variable | formulario
                        $nombre=$_POST['nombre'];
                        $apellido1=$_POST['primerApellido'];
                        $ci=$_POST['ci'];
                        $correo=$_POST['correo'];

                        //  atributo.  BDD = name de formulario
                        $data['nombre']=$_POST['nombre'];
                        $data['primerApellido']=$_POST['primerApellido'];
                        $data['segundoApellido']=$_POST['segundoApellido'];
                        $data['celular']=$_POST['telefono'];
                        $data['ci']=$_POST['ci'];
                        $data['correo']=$_POST['correo'];

                        //registrar nombre de usuario y contrasenia para luego agregar a la data y enviar a la base de datos
                        $nombreUsuario = $this->generarUsuario($nombre, $apellido1, $ci);
                        $contraseniaSegura = $this->generarContrasenia(8,substr($nombre,0,3), substr($apellido1,0,3), substr($ci,2,5));//envio de cartacteres recortados

                        //$mailer->enviarDatos($correo,$nombreUsuario,$contraseniaSegura);
                        $this->enviarDatos($correo,$nombreUsuario,$contraseniaSegura);

                        $data['login']= $nombreUsuario;
                        $data['password']=md5($contraseniaSegura);
                        /*
                        $data['login']=$_POST['userName'];
                        $data['password']=md5($_POST['password']);*/
                        $data['tipo']=$_POST['subject']; //el name es el mismo tanto para el css y el php

                        $this->usuario_model->agregarusuario($data); //hasta ahi ya guarda en BDD

                        redirect('administration/usuario/index','refresh');//con el refresh refrescamos de forma forsoza si es que hay problema 
                    }
                }
                else
                {
                    redirect('administration/empleado/index','refresh'); //carga panel de empleado
                }
            }
            else
            {//falso volvera 
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
                    $idusuario=$_POST['idusuario'];
                    //variable de transferencia de informacion 
                    $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario); //asi hago llegar el idcliente al modelo

                    //cargar la vista
                    $this->load->view('view_administration/admidesing/userFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/usuario_modificar',$data);//ahi llega la informacion.
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
                    $idusuario=$_POST['idusuario'];//almacena el id
                    // BDD              formulario
                    $data['nombre']=$_POST['nombre'];
                    $data['primerApellido']=$_POST['primerApellido'];
                    $data['segundoApellido']=$_POST['segundoApellido'];
                    $data['celular']=$_POST['telefono'];
                    $data['ci']=$_POST['ci'];
                    $data['correo']=$_POST['correo'];
                    //$data['login']=$_POST['userName'];
                    //$data['password']=md5($_POST['password']);
                    $data['tipo']=$_POST['subject']; //el name es el mismo tanto para el css y el php
                    //$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

                    $this->usuario_model->modificarusuario($idusuario,$data);

                    redirect('administration/usuario/index','refresh');
                    
                    
                    /*
                    //validación nombre
                    $this->form_validation->set_rules('nombre','Ingrese el nombre','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Ingrese el nombre','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación primer Apellido
                    $this->form_validation->set_rules('primerApellido','Ingrese un apellido','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Se requiere un apellido','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación segundo Apellido
                    $this->form_validation->set_rules('segundoApellido','Ingrese otro apellido','min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación Telefono
                    $this->form_validation->set_rules('telefono','Ingrese celular/telefono','min_length[7]|max_length[50]|regex_match[/^[0-9]+$/]',array('min_length'=>'debe ser mayor a 7 digitos','max_length'=>'Solo puedes registras 3 lineas de telefono o celular','regex_match'=>'Solo se perminten numeros'));
                    //validación ciNit
                    $this->form_validation->set_rules('ci','Ingrese cedula de indentidad','required|min_length[5]|max_length[20]|regex_match[/^[a-zA-Z0-9-]+$/]',array('required'=>'Se requiere CI','min_length'=>'Debe ser mayor a 7 caracteres','max_length'=>'capacidad maxima 20 caractes','regex_match'=>'Solo puede ingresar letras, numeros y guiones'));
                    //validación correo
                    $this->form_validation->set_rules('correo','correo@correo.com','required|min_length[5]|max_length[100]|regex_match[/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/]',array('required'=>'correo@correo.com','min_length'=>'Correo no valido','max_length'=>'Longitud maxima de correo de 100 caracteres','regex_match'=>'Puedes utilizar letras, números y puntos y la direccion de correo.'));
                    if($this->form_validation->run()==FALSE){
                        // variable         formulario
                        $idusuario=$_POST['idusuario'];
                        //variable de transferencia de informacion 
                        $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario); //asi hago llegar el idcliente al modelo
                        //cargar la vista
                        $this->load->view('view_administration/admidesing/userFormHeader');
                        $this->load->view('view_administration/admidesing/menuSuperior');
                        $this->load->view('view_administration/admidesing/menuLateral');
                        $this->load->view('view_administration/usuario_modificar',$data);//ahi llega la informacion.
                        $this->load->view('view_administration/admidesing/foot');
                        
                    }else{
                        // variable         formulario
                        $idusuario=$_POST['idusuario'];//almacena el id
                        // BDD              formulario
                        $data['nombre']=$_POST['nombre'];
                        $data['primerApellido']=$_POST['primerApellido'];
                        $data['segundoApellido']=$_POST['segundoApellido'];
                        $data['celular']=$_POST['telefono'];
                        $data['ci']=$_POST['ci'];
                        $data['correo']=$_POST['correo'];
                        //$data['login']=$_POST['userName'];
                        //$data['password']=md5($_POST['password']);
                        $data['tipo']=$_POST['subject']; //el name es el mismo tanto para el css y el php
                        //$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

                        $this->usuario_model->modificarusuario($idusuario,$data);

                        redirect('administration/usuario/index','refresh');
                    } */
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        /*
        public function modificarbd()
        {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                
                if($tipo=='ADMINISTRADOR'){
                    //validación nombre
                    $this->form_validation->set_rules('nombre','Ingrese el nombre','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Ingrese el nombre','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación primer Apellido
                    $this->form_validation->set_rules('primerApellido','Ingrese un apellido','required|min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('required'=>'Se requiere un apellido','min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación segundo Apellido
                    $this->form_validation->set_rules('segundoApellido','Ingrese otro apellido','min_length[1]|max_length[50]|regex_match[/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/]',array('min_length'=>'Por lo menos debe haber 2 letras','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'Solo se perminten letras'));
                    //validación Telefono
                    $this->form_validation->set_rules('telefono','Ingrese celular/telefono','min_length[0]|max_length[50]|regex_match[/^[0-9]+$/]',array('min_length'=>'debe ser mayor a 7 digitos','max_length'=>'Solo puedes registras 3 lineas de telefono o celular','regex_match'=>'Solo se perminten numeros'));
                    //validación ciNit
                    $this->form_validation->set_rules('ci','Ingrese cedula de indentidad','required|min_length[0]|max_length[20]|regex_match[/^[a-zA-Z0-9-]+$/]',array('required'=>'Se requiere CI','min_length'=>'Debe ser mayor a 7 caracteres','max_length'=>'capacidad maxima 20 caractes','regex_match'=>'Solo puede ingresar letras, numeros y guiones'));
                    //validación correo
                    $this->form_validation->set_rules('correo','correo@correo.com','required|min_length[5]|max_length[100]|regex_match[/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/]',array('required'=>'correo@correo.com','min_length'=>'Correo no valido','max_length'=>'Longitud maxima de correo de 100 caracteres','regex_match'=>'Puedes utilizar letras, números y puntos y la direccion de correo.'));
                    if(){

                    }else{

                    }
                    
                    
                    
                    
                    // variable         formulario
                    $idusuario=$_POST['idusuario'];//almacena el id
                    // BDD              formulario
                    $data['nombre']=$_POST['nombre'];
                    $data['primerApellido']=$_POST['apellido1'];
                    $data['segundoApellido']=$_POST['apellido2'];
                    $data['celular']=$_POST['celular'];
                    $data['ci']=$_POST['ci'];
                    $data['correo']=$_POST['correo'];
                    //$data['login']=$_POST['userName'];
                    //$data['password']=md5($_POST['password']);
                    $data['tipo']=$_POST['subject']; //el name es el mismo tanto para el css y el php
                    //$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

                    $this->usuario_model->modificarusuario($idusuario,$data);

                    redirect('administration/usuario/index','refresh');
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }
        */ 

        public function deshabilitarbd(){
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $idusuario=$_POST['idusuario'];
                    $data['estado']='0';

                    $this->usuario_model->modificarusuario($idusuario,$data);

                    redirect('administration/usuario/index','refresh');
                    
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        public function usuario_update_password(){
            //cargar la vista
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $this->load->view('view_administration/admidesing/updatePasswordFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/usuario_update_password');//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    $this->load->view('view_administration/admidesing/updatePasswordFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/usuario_update_password');//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            
        }

        public function datosPersonales(){
            //cargar la vista
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $idUsuario = $this->session->userdata('id');
                    $lista=$this->usuario_model->datosPersonalesUser($idUsuario);
                    //      nombre de posicion usuarios
                    $data['personal']=$lista;
                    $this->load->view('view_administration/admidesing/updatePasswordFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral');
                    $this->load->view('view_administration/datosPersonalesUsuario', $data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }else{
                    $idUsuario = $this->session->userdata('id');
                    $lista=$this->usuario_model->datosPersonalesUser($idUsuario);
                    //      nombre de posicion usuarios
                    $data['personal']=$lista;
                    $this->load->view('view_administration/admidesing/updatePasswordFormHeader');
                    $this->load->view('view_administration/admidesing/menuSuperior');
                    $this->load->view('view_administration/admidesing/menuLateral2');
                    $this->load->view('view_administration/datosPersonalesUsuario', $data);//ahi llega la informacion.
                    $this->load->view('view_administration/admidesing/foot');
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        public function updatepassword(){
            //cargar la vista
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){

                    $this->form_validation->set_rules('usuario','Ingrese su Contraseña','required|min_length[8]|max_length[50]|regex_match[/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9_]+$/]',array('required'=>'Ingrese su contraseña','min_length'=>'Su contraseña debe ser mayor a 8 caracteres','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'No se permite caracteres especiales %&/(-)='));
                    $this->form_validation->set_rules('password','Ingrese su Contraseña','required|min_length[8]|max_length[50]|regex_match[/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9_]+$/]',array('required'=>'Ingrese su contraseña','min_length'=>'Su contraseña debe ser mayor a 8 caracteres','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'No se permite caracteres especiales %&/(-)='));
                    $this->form_validation->set_rules('password2','Ingrese su Contraseña','required|min_length[8]|max_length[50]|regex_match[/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9_]+$/]',array('required'=>'Ingrese su contraseña','min_length'=>'Su contraseña debe ser mayor a 8 caracteres','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'No se permite caracteres especiales %&/(-)='));
                    
                    if($this->form_validation->run()==FALSE){
                        $this->load->view('view_administration/admidesing/updatePasswordFormHeader');
                        $this->load->view('view_administration/admidesing/menuSuperior');
                        $this->load->view('view_administration/admidesing/menuLateral');
                        $this->load->view('view_administration/usuario_update_password');//ahi llega la informacion.
                        $this->load->view('view_administration/admidesing/foot');
                    }else{
                        $idUsuario = $this->session->userdata('id');
                        $passwordanterior = md5($_POST['usuario']);
                        $hashmd5 = $_POST['hashResult'];
                        $passwordnew1 = md5($_POST['password']);
                        $passwordnew2 = md5($_POST['password2']);
            
                        if($passwordanterior == $hashmd5){
                            if($passwordnew1 == $passwordnew2){
                                $data['password'] = $passwordnew1;
                                $this->usuario_model->actualizarDatosUser($idUsuario, $data);
                                echo '<script>
                                swal("ÉXITO!", "CONTRASEÑA MODIFICADA CON EXITO", "success");
                                </script>';
                                redirect('administration/usuario/datosPersonales','refresh');
                            }
                            else{
                                redirect('administration/usuario/usuario_update_password','refresh');    
                            }
                        }else{
                            redirect('administration/usuario/usuario_update_password','refresh');
                        }
                    }       
                }else{

                    $this->form_validation->set_rules('usuario','Ingrese su Contraseña','required|min_length[8]|max_length[50]|regex_match[/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9_]+$/]',array('required'=>'Ingrese su contraseña','min_length'=>'Su contraseña debe ser mayor a 8 caracteres','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'No se permite caracteres especiales %&/(-)='));
                    $this->form_validation->set_rules('password','Ingrese su Contraseña','required|min_length[8]|max_length[50]|regex_match[/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9_]+$/]',array('required'=>'Ingrese su contraseña','min_length'=>'Su contraseña debe ser mayor a 8 caracteres','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'No se permite caracteres especiales %&/(-)='));
                    $this->form_validation->set_rules('password2','Ingrese su Contraseña','required|min_length[8]|max_length[50]|regex_match[/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9_]+$/]',array('required'=>'Ingrese su contraseña','min_length'=>'Su contraseña debe ser mayor a 8 caracteres','max_length'=>'Cantidad maxima 50 letras','regex_match'=>'No se permite caracteres especiales %&/(-)='));
                    
                    if($this->form_validation->run()==FALSE){
                        $this->load->view('view_administration/admidesing/updatePasswordFormHeader');
                        $this->load->view('view_administration/admidesing/menuSuperior');
                        $this->load->view('view_administration/admidesing/menuLateral2');
                        $this->load->view('view_administration/usuario_update_password');//ahi llega la informacion.
                        $this->load->view('view_administration/admidesing/foot');
                    }else{
                        $idUsuario = $this->session->userdata('id');
                        $passwordanterior = md5($_POST['usuario']);
                        $hashmd5 = $_POST['hashResult'];
                        $passwordnew1 = md5($_POST['password']);
                        $passwordnew2 = md5($_POST['password2']);
            
                        if($passwordanterior == $hashmd5){
                            if($passwordnew1 == $passwordnew2){
                                $data['password'] = $passwordnew1;
                                $this->usuario_model->actualizarDatosUser($idUsuario, $data);
                                echo '<script>
                                swal("ÉXITO!", "CONTRASEÑA MODIFICADA CON EXITO", "success");
                                </script>';
                                redirect('administration/usuario/datosPersonales','refresh');
                            }
                            else{
                                redirect('administration/usuario/usuario_update_password','refresh');    
                            }
                        }else{
                            redirect('administration/usuario/usuario_update_password','refresh');
                        }
                    }
                }
            }
            else
            {
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
        }
        
        public function datosUsuario() {
            if($this->session->userdata('login'))
            {
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    
                }else{
                    
                }
            }
        }
    }