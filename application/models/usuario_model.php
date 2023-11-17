<?php
    class Usuario_model extends CI_Model{
        //Visualizacion de todos los usuarios presentes
        public function listausuarios()
        {
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('estado','1');
            return $this->db->get();
        } 

        //para validar usuarios-LOGIN
        public function validar($login,$password)
        {//usuario correctamente validado
            $this->db->select('*');
            $this->db->from('usuario');//conmo el BDD
            $this->db->where('estado',1); //usuario activo
            //BDD   |   $login y $password que esta llegando por el formulario
            $this->db->where('login',$login);//condiciones
            $this->db->where('password',$password);//condiciones
            return $this->db->get();
        } 

        public function agregarusuario($data){
            $this->db->insert('usuario',$data);
        }

        //ACTUALIZAR 
        //recibe el id y revibira los datos de este y que luego seran cargados a un data que luego pasara a modificarcliente.
        public function recuperarusuarios($idusuario)
        {
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('id',$idusuario);//se compara el id de tabla con id que recibe
            return $this->db->get();
        }
        //ACTUALIZAR - parte 2
        //con los valores cargados en el formulario este los enviara en una data para hacer el update.
        public function modificarusuario($idusuario,$data)
        {
            $this->db->where('id',$idusuario); //coinsida el id con el que le llega
            $this->db->update('usuario',$data);
        }

        public function modificarpassword($idusuario,$oldpassword,$newpassword)
        {
            //$query="CALL ufcUpdatePassword($idusuario,'$oldpassword','$newpassword')";
            $query="CALL ufcUpdatePassword($idusuario,MD5('$oldpassword'),MD5('$newpassword'))";
            //return $this->db->query($query);
        }
    }