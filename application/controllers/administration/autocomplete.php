<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//creacion de clase
class Autocomplete extends CI_Controller{
    //creacion de 3 metodos
    // __construct() - carga asistencia de URL y Autocomplete_model
    /*
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('autocomplete_model');
    }*/
    //Carga la vista autocomplete
    public function index(){
        $this->load->view('view_administration/autocomplete');
    }
    //metodo para manejar la solicitud en AJAX y devolver la respuesta
    public function userList(){
        //Lee los valores POST y pase $this->autocomplete_model->getUsers() para obtener la lista de clientes Array
        $postData = $this->input->post();
        $data = $this->autocomplete_model->getUsers($postData);
        //retorna la data del array en formato JSON
        echo json_encode($data);
    }
}