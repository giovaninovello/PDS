<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_model extends CI_Model {

    

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
    public function get_alunos() {
        $query = $this->db->get('aluno'); //select * from alunos

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
    public function create_aluno($dados_aluno){
        
        $this->db->insert('aluno',$dados_aluno);
        return $this->db->affected_rows()?true:false;
    }

    

}
