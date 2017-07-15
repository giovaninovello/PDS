<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    

    public function check_login($senha, $email) {

        //definido parametro from
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.email', $email);
        $this->db->where('usuarios.senha', $senha);

        //execurando query no banco

        $usuarios = $this->db->get();

        if ($usuarios->num_rows()) {
            $usuario = $usuarios->result_array();
            return $usuario[0];
        } else {
            return false;
        }
    }

    public function check_escola($termo) {

        //definido parametro from
        $this->db->select('*');
        $this->db->from('escola');
        $this->db->where('escola.idescola',$termo);

        $query = $this->db->get();

        if ($query->num_rows()) {
            $query = $query->result_array();
            return $query[0];
        } else {
            return false;
        }
    }
    
    //PEGA TODOS OS UAURIOS LISTA SEM PARAMETROS
    public function get_usuarios() {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->join('escola','escola.idescola = usuarios.escola_idescola');
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //PEGA ID DO USUARIO COM PARAMATRO
    public function get_usuario($id_usuario) {
        $this->db->where('idusuarios', $id_usuario);
        $usuario = $this->db->get('usuarios');

        if ($usuario->num_rows()) {
            return $usuario->row_array();
        } else {
            return false;
        }
    }
    

    //UPDATE CRUD
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
    public function delete_usuario($id_usuario){
        $this->db->where('idusuarios',$id_usuario);
        $this->db->delete('usuarios');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //cadastro CRUD
    public function create_usuario($dados_usuario){
        
        $this->db->insert('usuarios',$dados_usuario);
        return $this->db->affected_rows()?true:false;
    }


    
    

}
