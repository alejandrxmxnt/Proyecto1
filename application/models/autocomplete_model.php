<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
//CREACION DE CLASE
class Autocomplete_model extends CI_Model{
    //Crear un metodo GetUsers() que tome un solo parameto - valor a tomar
    function getUsers($postData){
        
        $response = array(); //crear una matriz para almacenar la lista de usuarios.
        if($postData['search']){ 
            //si la busqueda es POST obtenga todos los registros de la tabla y use $postData['search'] en la cláusula WHERE para buscar en el campo de nombre de usuario
            $this->db->select('*');
            $this->db->where('ciNit like "%'.$postData['search'].'%"'); //parametro de comparación 
            //$this->db->like('ciNit',$postData['search']);
            $records = $this->db->get('cliente')->result(); //nombre de la tabla

            foreach($records as $row){ 
                //Realice un bucle en los registros recuparados e inicialice la matriz $response con el valor y la clave de etiqueta
                $response[] = array( //retorna la matriz de respuesta
                    "value" => $row->id,
                    "label" => $row->ciNit.' - '.$row->nombre.' '.$row->primerApellido.''.$row->razonSocial
                );
            }
        }
        return $response;
    }
}