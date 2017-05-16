<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_doc_model extends CI_Model {

    

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
    public function update_doc($id,$doc_atualizado){
        $this->db->where('idtipo_documento',$id);
        $this->db->update('tipo_documento',$doc_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //DELECAO CRUD
    public function delete_doc($id){

        $this->db->where('idtipo_documento',$id);
        $this->db->delete('tipo_documento');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //cadastro CRUD
    public function create_tipo_doc($dados){
        
        $this->db->insert('tipo_documento',$dados);
        return $this->db->affected_rows()?true:false;
    }

    public function get_tipo_doc() {
        $query = $this->db->get('tipo_documento');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_tipo_doc_id($id) {
        
        $this->db->where('idtipo_documento', $id);
        $doc = $this->db->get('tipo_documento');

        if ($doc->num_rows()) {
            return $doc->row_array();
        } else {
            return false;
        }
    }

    

}
