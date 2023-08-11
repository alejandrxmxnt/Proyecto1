<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //linea de seguridad - no admite ejecucion directa de scrips

class Welcome extends CI_Controller { //HERENCIA EN PHP la clase se llama Welcome

	public function index()//METODO se llama index
	{
		$this->load->view('welcome_message');
	}

	public function holamundo(){
		$this->load->view('saludo');
	}
}
