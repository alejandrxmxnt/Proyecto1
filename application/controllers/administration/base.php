<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

class Base extends CI_Controller { //HERENCIA EN PHP la clase se llama Welcome

	public function index()//metodo pagina principal
	{
		$this->load->view('view_administration/admidesing/cabecera');
		$this->load->view('view_administration/admidesing/inicio');
		$this->load->view('view_administration/admidesing/menu');
		//$this->load->view('view_administration/iconos_lista');
		$this->load->view('view_administration/pruebaVista');
		$this->load->view('view_administration/admidesing/pie');
	}


	public function index2()//metodo pagina principal
	{
		$this->load->view('view_administration/admidesing/cabecera');
		$this->load->view('view_administration/admidesing/inicio');
		$this->load->view('view_administration/admidesing/menu');
		//$this->load->view('view_administration/iconos_lista');
		$this->load->view('view_administration/pruebaVista2');
		$this->load->view('view_administration/admidesing/pie');
	}

	//metodo catalogo
	public function catalogue()
	{//lista es una varible que almacena todo lo que tiene $this
		$lista=$this->usuario_model->listausuarios();//ejecutar usuario_model el metodo listausuarios
		$data['usuarios']=$lista;//el data va contener bastante informacion
		$this->load->view('view_customer/desing/cabecera');
		$this->load->view('view_customer/desing/menu');
		$this->load->view('view_customer/catalogo',$data);
		$this->load->view('view_customer/desing/pie');
	}

	public function iconos()
	{
		$this->load->view('view_administration/admidesing/headboard');
		$this->load->view('view_administration/admidesing/menuSuperior');
		$this->load->view('view_administration/admidesing/menuLateral');
		$this->load->view('view_administration/iconos_lista');
		$this->load->view('view_administration/admidesing/foot');
	}
	//metodo informacion del negocio
	public function info()
	{
		$this->load->view('view_customer/desing/cabecera');
		$this->load->view('view_customer/desing/menu');
		$this->load->view('view_customer/informacion');
		$this->load->view('view_customer/desing/pie');
	}
	//PRUEBA DE CONEXION
	public function pruebabd(){
		//para ver si hay conexion a la base de datos
		$query=$this->db->get('usuario');//Consulta 
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
}
