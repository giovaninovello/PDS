<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_doc extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('Conta/entrar');
        }
    }

    public function visualizar_todos()
    {
       

        $alerta = null;
        $tipo_doc = null;
        $modal = null;

        $this->load->model('tipo_doc_model'); //chamo o model
        $tipo_doc = $this->tipo_doc_model->get_tipo_doc(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "doc" => $tipo_doc,
            "modal"=>$modal,
            "view" => 'tipo_doc/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('Conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('descricao', 'DESCRICAO', 'required');

            if ($this->form_validation->run() === true) {
                $dados = array(
                    'descricao' => $this->input->post('descricao')

                );
                $this->load->model('tipo_doc_model');
                $cadastrou = $this->tipo_doc_model->create_tipo_doc($dados);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "Tipo de documento cadastrado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "Tipo de documento  nao cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => " O Autor  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'tipo_doc/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('tipo_doc_model');
            $existe = $this->tipo_doc_model->get_tipo_doc_id($id);

            if ($existe) {
                $doc = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('Conta/entrar');

                    $id_doc_form = (int)$this->input->post('id_tipo_doc');
                    if ($id !== $id_doc_form) redirect('Conta/entrar');
                    //definir regras de validação
                    $this->form_validation->set_rules('descricao', 'TIPO DE DOCUMENTO', 'required');

                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $doc_atualizado = array(
                            'descricao' => $this->input->post('descricao')

                        );
                        $atualizou = $this->tipo_doc_model->update_doc($this->input->post('id_tipo_doc'), $doc_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "alert alert-success",
                                "mensagem" => "O item foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "alert alert-danger",
                                "mensagem" => "O item  nao foi atualizado pois esta vinculado a outro registro!<br>" . validation_errors()
                            );
                        }
                    } else {
                        //formaulario invalido
                        $alerta = array(
                            "class" => "alert alert-danger",
                            "mensagem" => "Atençao o formulario nao  foi validado!<br>" . validation_errors()
                        );
                    }
                }
            } else {
                $doc = false;
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o item nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o item informado esta incorreto!<br>" . validation_errors()
            );
        }
        $dados = array(
            "alerta" => $alerta,
            "doc" => $doc,
            "view" => 'tipo_doc/editar'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id)
    {
        $alerta = null;
        $tipo_doc = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('tipo_doc_model');
            $existe = $this->tipo_doc_model->get_tipo_doc_id($id);
            if ($existe) {
                $deletou = $this->tipo_doc_model->delete_doc($id);
                if ($deletou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "Item deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "Item  nao foi deletado existem registros vinculados a esse item!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "modal"=>true,
                    "doc" => $tipo_doc,
                    "view" => 'tipo_doc/visualizar_todos'

                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o item nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o item informado esta incorreto!<br>" . validation_errors()
            );

        }
    }





}