<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Baixa_model extends CI_Model {

    

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
    //PEGA TODOS OS UAURIOS LISTA SEM PARAMETROS

    //cadastro CRUD
    public function create_baixa($dados){

        $this->db->insert('baixas',$dados);
        return $this->db->affected_rows()?true:false;
    }







}
