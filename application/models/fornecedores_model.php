<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores_model extends CI_Model {

    

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
    //PEGA TODOS OS fornecedores LISTA SEM PARAMETROS
    public function get_fornecedores() {
        $query = $this->db->get('fornecedor'); //select * from fornecedores

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //PEGA ID DO USUARIO COM PARAMATRO
    public function get_fornecedor($id_fornecedor) {
        $this->db->where('idfornecedor', $id_fornecedor);

        $usuario = $this->db->get('fornecedor');

        if ($usuario->num_rows()) {
            return $usuario->row_array();
        } else {
            return false;
        }
    }
    //UPDATE CRUD
    public function update_fornecedor($id_usuario,$usuario_atualizado){
        $this->db->where('idfornecedor',$id_usuario);
        $this->db->update('fornecedor',$usuario_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //DELECAO CRUD
    public function delete_fornecedor($id){
        $this->db->where('idfornecedor',$id);
        $this->db->delete('fornecedor');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //cadastro CRUD
    public function create_fornecedor($dados_fornce){
        
        $this->db->insert('fornecedor',$dados_fornce);
        return $this->db->affected_rows()?true:false;
    }
    

}
