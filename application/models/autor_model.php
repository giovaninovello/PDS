<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autor_model extends CI_Model {

    

    public function check_login($senha, $email) {

        //definido parametro from
        $this->db->from('usuarios');
        //definindo paramentro where
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        //execurando query no banco
        $usuarios = $this->db->get();

        if ($usuarios->num_rows()) {
            $usuario = $usuarios->result_array();
            return $usuario[0];
        } else {
            return false;
        }
    }
    //PEGA TODOS OS AUTPRES LISTA SEM PARAMETROS
    public function get_autor() {
        $query = $this->db->get('autor'); //select * from autores

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function cadastrar_autor($dados_autor){

        $this->db->insert('autores_catalago',$dados_autor);
        return $this->db->affected_rows()?true:false;
    }

    public function get_autores_has_catalago(){
        $query = $this->db->get('autores_catalago'); //select * from autores_catalago

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    

}
