<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tombo_model extends CI_Model {



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
    //retorna as aquidições do item todos *
    public function get_aqui() {
        $query = $this->db->get('aquisicao');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //pesquisa ultimo exemplar para somar + 1 no tombo na hora de inserir
    public function get_ultimoexemplar($id_item){

        $this->db->select_max('tombo.exemplar');
        $this->db->from('tombo');
        $this->db->join('catalago','tombo.catalago_idcatalago = catalago.idcatalago');
        $this->db->where('catalago.idcatalago', $id_item);

        $query = $this->db->get();



        if ($query->num_rows()) {
            return $query->row_array();
        } else {
            return false;
        }

    }
    //crud
    public function cadastrar_tombo($dados_tombo){

        $this->db->insert('tombo',$dados_tombo);
        return $this->db->affected_rows()?true:false;

    }
//apenas faz um update como baixado  pois existem relatprios que contem esse tombo
    public function baixa_tombo($id,$dados){
        $this->db->where('idtombo',$id);
        $this->db->update('tombo',$dados);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_tombo_delete($id) {
        $this->db->where('idtombo', $id);

        $tombo = $this->db->get('tombo');

        if ($tombo->num_rows()) {
            return $tombo->row_array();
        } else {
            return false;
        }
    }
    //pesquisa pelo tombo
    public function get_tombo_like($termo,$session) {


        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('classificacao','classificacao.idclassificacao = catalago.classificacao_idclassificacao');
        $this->db->join('tipo_documento','tipo_documento.idtipo_documento = catalago.tipo_documento_idtipo_documento');
        $this->db->join('autores_catalago','autores_catalago.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('autor','autor.idautor = autores_catalago.autor_idautor');
        $this->db->join('cidade','cidade.idcidade = catalago.cidade_idcidade');
        $this->db->join('tombo','tombo.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('fornecedor','fornecedor.idfornecedor = tombo.fornecedor_idfornecedor');
        $this->db->join('aquisicao','aquisicao.idaquisicao = tombo.aquisicao_idaquisicao');
        $this->db->like('catalago.titulo', $termo);
        $this->db->where('locado',"N");
        $this->db->where('tombo.baixado', null);
        $this->db->where('tombo.escola_idescola', $session);
        $query= $this->db->get();
        return $query->result_array();
    }
    public function get_tombo_like_adm($termo) {


        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('classificacao','classificacao.idclassificacao = catalago.classificacao_idclassificacao');
        $this->db->join('tipo_documento','tipo_documento.idtipo_documento = catalago.tipo_documento_idtipo_documento');
        $this->db->join('autores_catalago','autores_catalago.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('autor','autor.idautor = autores_catalago.autor_idautor');
        $this->db->join('cidade','cidade.idcidade = catalago.cidade_idcidade');
        $this->db->join('tombo','tombo.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('fornecedor','fornecedor.idfornecedor = tombo.fornecedor_idfornecedor');
        $this->db->join('aquisicao','aquisicao.idaquisicao = tombo.aquisicao_idaquisicao');
        $this->db->like('catalago.titulo', $termo);
        $this->db->where('locado',"N");
        $this->db->where('tombo.baixado', null);
        $query= $this->db->get();
        return $query->result_array();
    }

    public function get_tombo_id($id_item) {
        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('tombo','tombo.catalago_idcatalago = catalago.idcatalago');
        $this->db->where('idtombo', $id_item);
        $item = $this->db->get();

        if ($item->num_rows()) {
            return $item->row_object();
        } else {
            return false;
        }
    }

    public function get_emprestimos($termo) {
        $this->db->select('*');
        $this->db->from('emprestimo e');
        $this->db->join('tombo t','t.idtombo = e.id_tombo');
        $this->db->join('catalago c','c.idcatalago =  t.catalago_idcatalago');
        $this->db->like('c.titulo', $termo);
        $this->db->where('locado','S');
        $this->db->where('status','PE');

        $query= $this->db->get();
        return $query->result_array();
    }

    public function get_tombo_id_dev($id_item) {
        $this->db->select('*');
        $this->db->from('catalago c');
        $this->db->join('tombo t','t.catalago_idcatalago = c.idcatalago');
        $this->db->join('emprestimo e','e.id_tombo = t.idtombo');
        $this->db->join('aluno a','a.idaluno = e.aluno_idaluno');
        $this->db->where('e.id_tombo', $id_item);
        $this->db->where('locado','S');
        $this->db->where('status','PE');
        $item = $this->db->get();

        if ($item->num_rows()) {
            return $item->row_object();
        } else {
            return false;
        }
    }

    public function get_baixados() {
        $this->db->select('*');
        $this->db->from('baixas');
        $this->db->join('tombo','tombo.idtombo = baixas.tombo_idtombo');
        $this->db->join('escola','escola.idescola = tombo.escola_idescola');
        $this->db->join('catalago','catalago.idcatalago = tombo.catalago_idcatalago');

        $query = $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function get_baixados_count() {
        $this->db->select('*');
        $this->db->from('baixas');
        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_inventario() {
        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('classificacao','classificacao.idclassificacao = catalago.classificacao_idclassificacao');
        $this->db->join('tipo_documento','tipo_documento.idtipo_documento = catalago.tipo_documento_idtipo_documento');
        $this->db->join('autores_catalago','autores_catalago.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('autor','autor.idautor = autores_catalago.autor_idautor');
        $this->db->join('cidade','cidade.idcidade = catalago.cidade_idcidade');
        $this->db->join('tombo','tombo.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('fornecedor','fornecedor.idfornecedor = tombo.fornecedor_idfornecedor');
        $this->db->join('aquisicao','aquisicao.idaquisicao = tombo.aquisicao_idaquisicao');
        $this->db->join('escola','escola.idescola = tombo.escola_idescola');
        $this->db->join('baixas b','b.tombo_idtombo= tombo.idtombo','left');

        $item = $this->db->get();

        if ($item->num_rows()) {
            return $item->result_array();
        } else {
            return false;
        }
    }

    public function update_tombo($id,$tbo_atualizado){
        $this->db->where('idtombo',$id);
        $this->db->update('tombo',$tbo_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }



}
