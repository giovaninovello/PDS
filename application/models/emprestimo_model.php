<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimo_model extends CI_Model {

    

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

    public function emprestar($dados){

        $this->db->insert('emprestimo',$dados);
        return $this->db->affected_rows()?true:false;
    }

    public function devolver($dados){

        $this->db->insert('devolucoes',$dados);
        return $this->db->affected_rows()?true:false;
    }




  

    

}
