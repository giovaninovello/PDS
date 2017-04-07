<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissao_model extends CI_Model {



    public function check_login($senha, $email) {

        $this->db->from('usuarios');
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $usuarios = $this->db->get();

        if ($usuarios->num_rows()) {
            $usuario = $usuarios->result_array();
            return $usuario[0];
        } else {
            return false;
        }
    }
    //pesquisas usando like
    function get_metodo() {

        $query = $this->db->get('metodos');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }

   }
    //pega o item para jogar no combobox do cadastro de catalagos
    public function get_usuario() {
        $query = $this->db->get('usuarios');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //crud
    public function cadastrar($dados){

        $this->db->insert('permissoes',$dados);
        return $this->db->affected_rows()?true:false;

    }
    //listya usuario
    function get_permissao() {

        $this->db->select('*');
        $this->db->from('permissoes');
        $this->db->join('metodos','metodos.id_metodo = permissoes.id_metodo');
        $this->db->join('usuarios','usuarios.idusuarios = permissoes.id_usuario');
        $query = $this->db->get();
        return $query->result_array();

    }
    //crud
    public function delete_permissao($id_permissao){
        $this->db->where('id_permissoes',$id_permissao);
        $this->db->delete('permissoes');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //lista permissao
    public function get_permissao_id($id_metodo) {
        $this->db->where('id_permissoes', $id_metodo);

        $metodo = $this->db->get('permissoes');

        if ($metodo->num_rows()) {
            return $metodo->row_array();
        } else {
            return false;
        }
    }
    //lista metodo
    public function get_metodo_editar($id_metodo) {
        $this->db->where('id_metodo', $id_metodo);

        $metodo = $this->db->get('metodos');

        if ($metodo->num_rows()) {
            return $metodo->row_array();
        } else {
            return false;
        }
    }
    //crud
    public function update_metodo($id_metodo,$metodo_atualizado){
        $this->db->where('id_metodo',$id_metodo);
        $this->db->update('metodos',$metodo_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

}
