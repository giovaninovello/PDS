<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalago_model extends CI_Model {



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
    function get_catalogo_like($termo) {

        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('classificacao','classificacao.idclassificacao = catalago.classificacao_idclassificacao');
        $this->db->join('tipo_documento','tipo_documento.idtipo_documento = catalago.tipo_documento_idtipo_documento');
        $this->db->like('titulo', $termo);
        $query= $this->db->get();
        return $query->result_array();

   }
    //pega o item tipo_documemto para jogar no combobox do cadastro de catalagos
    public function get_classificacao() {
        $query = $this->db->get('classificacao');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //pega o item classificacao para jogar no combobox do cadastro de catalagos
    public function get_cidade() {
        $query = $this->db->get('cidade');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //pega o item cidade para jogar no combobox do cadastro de catalagos
    public function get_doc() {
        $query = $this->db->get('tipo_documento');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //pega o item para jogar no combobox do cadastro de catalagos
    //CRUD CADASTRO
    public function create_catalago($dados_catalago){

        $this->db->insert('catalago',$dados_catalago);
        return $this->db->affected_rows()?true:false;

    }
    //crud insert
    public function get_catalago() {
        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('classificacao','classificacao.idclassificacao = catalago.classificacao_idclassificacao');
        $this->db->join('tipo_documento','tipo_documento.idtipo_documento = catalago.tipo_documento_idtipo_documento');
        $query= $this->db->get();

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    //lista os livros com nome
    public function get_item($id_item) {
        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('classificacao','classificacao.idclassificacao = catalago.classificacao_idclassificacao');
        $this->db->join('tipo_documento','tipo_documento.idtipo_documento = catalago.tipo_documento_idtipo_documento');
        $this->db->join('autores_catalago','autores_catalago.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('autor','autor.idautor = autores_catalago.autor_idautor');
        $this->db->join('cidade','cidade.idcidade = catalago.cidade_idcidade');
        //$this->db->join('tombo','tombo.catalago_idcatalago = catalago.idcatalago');
        //$this->db->join('aquisicao','aquisicao.idaquisicao = tombo.aquisicao_idaquisicao');
        $this->db->where('catalago.idcatalago', $id_item);
        $this->db->limit(1);

        $item = $this->db->get();

        if ($item->num_rows()) {
            return $item->result_array();
        } else {
            return false;
        }
    }
    //lista os tombos
    public function get_tombo($id_item) {
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
        $this->db->where('catalago.idcatalago', $id_item);


        $item = $this->db->get();

        if ($item->num_rows()) {
            return $item->result_array();
        } else {
            return false;
        }
    }
    //retorna a visualizcao do item com limit de 1 para nao mostrar todos quando cadastra o tombo
    public function get_tombo_limit($id_item) {
        $this->db->select('*');
        $this->db->from('catalago');
        $this->db->join('classificacao','classificacao.idclassificacao = catalago.classificacao_idclassificacao');
        $this->db->join('tipo_documento','tipo_documento.idtipo_documento = catalago.tipo_documento_idtipo_documento');
        $this->db->join('autores_catalago','autores_catalago.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('autor','autor.idautor = autores_catalago.autor_idautor');
        $this->db->join('cidade','cidade.idcidade = catalago.cidade_idcidade');
        $this->db->join('tombo','tombo.catalago_idcatalago = catalago.idcatalago');
        $this->db->join('aquisicao','aquisicao.idaquisicao = tombo.aquisicao_idaquisicao');
        $this->db->where('catalago.idcatalago', $id_item);
        $this->db->limit(1);



        $item = $this->db->get();

        if ($item->num_rows()) {
            return $item->result_array();
        } else {
            return false;
        }
    }
    //editar livros
    public function update_item($id_item,$item_atualizado){
        $this->db->where('idcatalago',$id_item);
        $this->db->update('catalago',$item_atualizado);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //pegar o ultimo livro cadastrado no banco
    public  function get_id_ultimo(){
             return $this->db->insert_id();

    }
    //DELECAO CRUD
    public function delete_catalago($id_item){
        $this->db->where('idcatalago',$id_item);
        $this->db->delete('catalago');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    //editar
    public function get_edit($id_cat) {
        $this->db->where('idcatalago', $id_cat);
        $catalago = $this->db->get('catalago');
        if ($catalago->num_rows()) {
            return $catalago->row_array();
        } else {
            return false;
        }
    }



}
