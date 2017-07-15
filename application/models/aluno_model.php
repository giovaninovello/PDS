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
    public function get_alunos($session) {

            $this->db->select('*');
            $this->db->from('aluno a');
            $this->db->join('escola e','e.idescola = a.escola_idescola');
            $this->db->where('escola_idescola',$session);
            $this->db->where('status_a',1);
            $query= $this->db->get();

            if ($query->num_rows()) {
                return $query->result_array();
            } else {
                return false;
            }
    }
    public function get_alunos_adm() {

        $this->db->select('*');
        $this->db->from('aluno a');
        $this->db->join('escola e','e.idescola = a.escola_idescola');
       // $this->db->where('status_a',1);
        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
   
    //PEGA ID DO USUARIO COM PARAMATRO
    function get_aluno_like($termo,$session) {

        $this->db->select('*');
        $this->db->from('aluno');
        $this->db->like('nome_aluno', $termo);
        $this->db->where('escola_idescola',$session);
        $this->db->where('status_a',1);
        $query= $this->db->get();
        return $query->result_array();

    }
    function get_aluno_like_adm($termo) {

        $this->db->select('*');
        $this->db->from('aluno');
        $this->db->like('nome_aluno', $termo);
        $this->db->where('status_a',1);
        $query= $this->db->get();
        return $query->result_array();

    }

    //UPDATE CRUD
    public function update_aluno($id_usuario,$usuario_atualizado){
        $this->db->where('idaluno',$id_usuario);
        $this->db->update('aluno',$usuario_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //DELECAO CRUD
    public function desativa_aluno($id_usuario,$atualiza){
        $this->db->where('idaluno',$id_usuario);
        $this->db->update('aluno',$atualiza);

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

    //retorna o id do aluno pesquisado como um objeto
    public function get_aluno_id($id_item) {
        $this->db->select('*');
        $this->db->from('aluno');
        $this->db->where('idaluno', $id_item);
        $item = $this->db->get();

        if ($item->num_rows()) {
            return $item->row_object();
        } else {
            return false;
        }
    }

    public function get_aluno($id) {
    $this->db->where('idaluno', $id);

    $aluno = $this->db->get('aluno');

    if ($aluno->num_rows()) {
        return $aluno->row_array();
    } else {
        return false;
    }
}
    public  function get_aluno_tombo($termo){
        $this->db->select('*');
        $this->db->from('tombo t');
        $this->db->join('emprestimo e','e.id_tombo = t.idtombo');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');

        $this->db->where('t.idtombo', $termo);
        $this->db->where('e.status ', 'PE');

        $query = $this->db->get();

        if ($query->num_rows()) {
            return $query->row_object();
        } else {
            return false;
        }
    }

    public function getnome($dados)
    {
        $this->db->select('*');
        $this->db->from('aluno');
        $this->db->where('idaluno', $dados);


        $query = $this->db->get();

        if ($query->num_rows()) {
            return $query->row_object();
        } else {
            return false;
        }
    }








}
