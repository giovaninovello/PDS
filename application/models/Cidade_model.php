<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends CI_Model {

    

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

    //UPDATE CRUD
    public function update_cidade($id,$cidade_atualizado){
        $this->db->where('idcidade',$id);
        $this->db->update('cidade',$cidade_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //DELECAO CRUD
    public function delete_cidade($id){
        $this->db->where('idcidade', $id);
        $this->db->delete('cidade');
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }

    }
    //cadastro CRUD
    public function create_cidade($dados){
        
        $this->db->insert('cidade',$dados);
        return $this->db->affected_rows()?true:false;
    }

    public function get_cidade() {
        $query = $this->db->get('cidade');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_cidade_id($id) {
        $this->db->where('idcidade', $id);
        $cidade = $this->db->get('cidade');

        if ($cidade->num_rows()) {
            return $cidade->row_array();
        } else {
            return false;
        }
    }



    

}
