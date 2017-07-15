<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimo_model extends CI_Model {

    

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

    public function emprestar($dados){

        $this->db->insert('emprestimo',$dados);
        return $this->db->affected_rows()?true:false;
    }

    public function devolver($dados){

        $this->db->insert('devolucoes',$dados);
        return $this->db->affected_rows()?true:false;
    }

    public function get_emprestimos_adm() {
        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('status',"PE" );

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_emprestimos($session) {
        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('status',"PE" );
        $this->db->where('t.escola_idescola',$session);

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_emprestimos_total_pendentes() {
        $data = date ("Y-m-d");
        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('status',"PE" );
        $this->db->where('datadev <=',$data);

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_emprestimos_data_adm($datai,$dataf) {
        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('dataret >=',$datai );
        $this->db->where('dataret <=',$dataf );

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_emprestimos_data($datai,$dataf,$session) {
        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('dataret >=',$datai );
        $this->db->where('dataret <=',$dataf );
        $this->db->where('t.escola_idescola',$session);

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_emprestimos_aluno_adm($aluno){

        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->like('a.nome_aluno',$aluno);
        
        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_emprestimos_aluno($aluno,$session){

        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->like('a.nome_aluno',$aluno);
        $this->db->where('a.escola_idescola',$session);

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_emprestimos_aluno_id_adm($aluno){

        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('a.idaluno',$aluno);

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_emprestimos_aluno_id($aluno,$session){

        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('a.idaluno',$aluno);
        $this->db->where('a.escola_idescola',$session);

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_emprestimos_total() {
        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->join('tombo t', 't.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago = t.catalago_idcatalago');
        $this->db->where('status',"PE" );

        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    




  

    

}
