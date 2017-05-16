<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao_model extends CI_Model {

    

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



    public function update_usuario($id_usuario,$usuario_atualizado){
        $this->db->where('idusuarios',$id_usuario);
        $this->db->update('usuarios',$usuario_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //DELECAO CRUD
    public function delete_cla($id){
        $this->db->where('idclassificacao',$id);
        $this->db->delete('classificacao');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //cadastro CRUD
    public function create_classificacao($dados){
        
        $this->db->insert('classificacao',$dados);
        return $this->db->affected_rows()?true:false;
    }

    public function get_classificacao() {
        $query = $this->db->get('classificacao'); 

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_classificacao_id($id) {
        $this->db->where('idclassificacao', $id);

        $cla = $this->db->get('classificacao');

        if ($cla->num_rows()) {
            return $cla->row_array();
        } else {
            return false;
        }
    }

    public function update_cla($id,$classificacao_atualizado){
        $this->db->where('idclassificacao',$id);
        $this->db->update('classificacao',$classificacao_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

}
