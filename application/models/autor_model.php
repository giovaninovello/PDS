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
    //faz o cadastro na tabela autores_catalogo quando tombamos um item  (mesmo livro)
    public function cadastrar_autor($dados_autor){

        $this->db->insert('autores_catalago',$dados_autor);
        return $this->db->affected_rows()?true:false;
    }
    //cadastros de autores
    public function create_autor($dados_autor){

        $this->db->insert('autor',$dados_autor);
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
    //PEGA ID DO AUTOR COM PARAMATRO
    public function get_autor_delete($id_autor) {
        $this->db->where('idautor', $id_autor);

        $autor = $this->db->get('autor');

        if ($autor->num_rows()) {
            return $autor->row_array();
        } else {
            return false;
        }
    }
    //DELECAO CRUD
    public function delete_autor($id_autor){
        $this->db->where('idautor',$id_autor);
        $this->db->delete('autor');

        if($this->db->affected_rows()){
            return true;
        }else{
            return $this->db->_error_number();
        }
    }

    

}
