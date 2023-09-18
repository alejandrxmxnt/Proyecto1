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
            $this->load->view('view_administration/admidesing/headboard');
            $this->load->view('view_administration/admidesing/menuSuperior');
            $this->load->view('view_administration/admidesing/menuLateral');
            $this->load->view('view_administration/iconos_lista');
            $this->load->view('view_administration/admidesing/foot');
        }


        public function agregarbd()
        {
             
            
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero - redirecciona a una ventada de un usuario correctamente autentificado.
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR')
                {
                    
                    //$mailer = new EmailSender(true); 
                    //carga de valores para poder cargar las funciones de generar contrasenia y usuario
                    //variable | formulario
                    $nombre=$_POST['nombre'];
                    $apellido1=$_POST['apellido1'];
                    $ci=$_POST['ci'];
                    $correo=$_POST['correo'];

                    //  atributo.  BDD = name de formulario
                    $data['nombre']=$_POST['nombre'];
                    $data['primerApellido']=$_POST['apellido1'];
                    $data['segundoApellido']=$_POST['apellido2'];
                    $data['celular']=$_POST['celular'];
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
                else
                {
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {//falso volvera 
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }

        
/*
            //AGREGAR USUARIOS APLICANDO VALIDACIONES
        public function agregarbd()
        {
             
            
            if($this->session->userdata('login'))//controla si existe esta variable.
            {//verdadero - redirecciona a una ventada de un usuario correctamente autentificado.
                $tipo= $this->session->userdata('tipo');
                if($tipo=='ADMINISTRADOR'){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('nombre','Nombres','min_length[2]|max_length[50]|regex_match[/^*+¿()\?/&%$#"!@]+/]',
                            array(
                            //'required'=>'Llene este parametro',
                            'min_length'=>'Nombre no valido demasiado corto',
                            'max_length'=>'Nombre demasiado largo',
                            'regex_match'=>'No se permiten caracteres especiales'));

                    $this->form_validation->set_rules('apellido1','Primer Apellido','min_length[2]|max_length[50]|regex_match[/^[^*+¿()\?/&%$#"!@]+$/]',
                            array(
                            //'required'=>'Llene bien el formulario',
                            'min_length'=>'Apellido no valido demasiado corto',
                            'max_length'=>'Escriba bien sus credenciales',
                            'regex_match'=>'No se permiten caracteres especiales'));

                    $this->form_validation->set_rules('apellido2','Segundo Apellido','regex_match[/^[^*+¿()\?/&%$#"!@]+$/]',
                            array(
                            'regex_match'=>'No se permiten caracteres especiales'));

                    $this->form_validation->set_rules('celular','Telefono/Celular','|min_length[7]|max_length[20]|regex_match[/^[^*¿()\?/&%$#"!@]+$/]',
                            array(
                            'min_length'=>'numero telefono demaciado corto',
                            'max_length'=>'Verifique sus credenciales',
                            'regex_match'=>'No se permiten caracteres especiales'));      



                    if($this->form_validation->run()==FALSE){
                        redirect('administration/usuario/agregar','refresh');
                        /*
                        $this->load->view('view_administration/admidesing/userFormHeader');
                        $this->load->view('view_administration/admidesing/menuSuperior');
                        $this->load->view('view_administration/admidesing/menuLateral');
                        $this->load->view('view_administration/usuario_formulario');
                        $this->load->view('view_administration/admidesing/foot');
                        //$this->load->view('view_administration/login');//redirecciona a formulario
                    }
                    else
                    {
                       //$mailer = new EmailSender(true); 
                        //carga de valores para poder cargar las funciones de generar contrasenia y usuario
                        //variable | formulario
                        $nombre=$_POST['nombre'];
                        $apellido1=$_POST['apellido1'];
                        $ci=$_POST['ci'];
                        $correo=$_POST['correo'];

                        //  atributo.  BDD = name de formulario
                        $data['nombre']=$_POST['nombre'];
                        $data['primerApellido']=$_POST['apellido1'];
                        $data['segundoApellido']=$_POST['apellido2'];
                        $data['celular']=$_POST['celular'];
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
                        $data['password']=md5($_POST['password']);
                        $data['tipo']=$_POST['subject']; //el name es el mismo tanto para el css y el php

                        $this->usuario_model->agregarusuario($data); //hasta ahi ya guarda en BDD

                        redirect('administration/usuario/index','refresh');//con el refresh refrescamos de forma forsoza si es que hay problema 
                    }
                    
                }else{
                    redirect('administration/empleado/index','refresh'); //si no hay sesion abierta direcciona al login
                }
            }
            else
            {//falso volvera 
                redirect('administration/usuarios/index','refresh');//cargara el login
            }
            
        }*/

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
/*
        public function modificarbd()
        {
            //carga de valores para poder cargar las funciones de generar contrasenia y usuario
            //variable | formulario
            $nombre=$_POST['nombre'];
            $apellido1=$_POST['apellido1'];
            $ci=$_POST['ci'];
            
            // variable         formulario
            $idusuario=$_POST['idusuario'];//almacena el id
            // BDD              formulario
            $data['nombre']=$_POST['nombre'];
            $data['primerApellido']=$_POST['apellido1'];
            $data['segundoApellido']=$_POST['apellido2'];
            $data['celular']=$_POST['celular'];
            $data['ci']=$_POST['ci'];
            $data['correo']=$_POST['correo'];

            $nombreUsuario = generarUsuario($nombre, $apellido1, $ci);
            $contraseniaSegura = generarContrasenia(8,substr($nombre,0,3), substr($apellido1,0,3), substr($ci,2,5));//envio de cartacteres recortados
            
            //$data['login']=$_POST['userName'];
            //$data['password']=md5($_POST['password']);
            $data['login']=$nombreUsuario;
            $data['password']=$contraseniaSegura;
            $data['tipo']=$_POST['subject']; //el name es el mismo tanto para el css y el php
            //$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

            $this->usuario_model->modificarusuario($idusuario,$data);

            redirect('administration/usuario/index','refresh');
        }*/

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
        

        
    }