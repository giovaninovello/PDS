<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Escola_model extends CI_Model {

    

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
    public function get_escolas() {
        $query = $this->db->get('escola');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function create_escola($dados){

        $this->db->insert('escola',$dados);
        return $this->db->affected_rows()?true:false;
    }

    public  function  get_escola_id($id){
        $this->db->where('idescola', $id);

        $escola = $this->db->get('escola');

        if ($escola->num_rows()) {
            return $escola->row_array();
        } else {
            return false;
        }
    }


    //UPDATE CRUD
    public function update_escola($id,$escola_atualizado){
        $this->db->where('idescola',$id);
        $this->db->update('escola',$escola_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //DELECAO CRUD
    public function delete_escola($id){
        $this->db->where('idescola',$id);
        $this->db->delete('escola');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //cadastro CRUD








}
