<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

class Base extends CI_Controller { //HERENCIA EN PHP la clase se llama Welcome

	public function index()//metodo pagina principal
	{
		$this->load->view('view_customer/desing/cabecera');
		$this->load->view('view_customer/desing/menu');
		$this->load->view('view_customer/inicio');
		$this->load->view('view_customer/desing/pie');
	}

	//metodo catalogo
	public function catalogue()
	{
		$this->load->view('view_customer/desing/cabecera');
		$this->load->view('view_customer/desing/menu');
		$this->load->view('view_customer/catalogo');
		$this->load->view('view_customer/desing/pie');
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
