<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Escola extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('conta/entrar');
        }
    }

    public function visualizar_todos()
    {
        
        
        $alerta = null;
        $escola = null;

        $this->load->model('escola_model'); //chamo o model
        $escola = $this->escola_model->get_escolas(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "escola" => $escola,
            "view" => 'escola/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {
       
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('nome_escola', 'NOME', 'required');

            if ($this->form_validation->run() === true) {
                $dados = array(
                    'nome_escola' => $this->input->post('nome_escola'),
                    'endereco_escola' => $this->input->post('endereco_escola'),
                    'telefone_escola'=> $this->input->post('telefone')
                );
                $this->load->model('escola_model');
                $cadastrou = $this->escola_model->create_escola($dados);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "A Escola foi cadastrada com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "A escola  nao foi cadastrada!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "A escola  nao foi atualizada!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'escola/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('escola_model');
            $existe = $this->escola_model->get_escola_id($id);

            if ($existe) {
                $escola = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('conta/entrar');

                    $id_escola_form = (int)$this->input->post('id_escola');
                    if ($id !== $id_escola_form) redirect('conta/entrar');
                    //até aqui
                    //definir regras de validação
                    $this->form_validation->set_rules('nome_escola', 'NOME DA ESCOLA', 'required');
                    $this->form_validation->set_rules('telefone_escola', 'FONE', 'required');
                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $escola_atualizado = array(
                            'nome_escola' => $this->input->post('nome_escola'),
                            'endereco_escola' => $this->input->post('endereco_escola'),
                            'telefone_escola' => $this->input->post('telefone_escola')

                        );

                        $atualizou = $this->escola_model->update_escola($this->input->post('id_escola'), $escola_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "alert alert-success",
                                "mensagem" => "O item foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "alert alert-danger",
                                "mensagem" => "O item  nao foi atualizado!<br>" . validation_errors()
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
                $cidade = false;
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
            "escola" => $escola,
            "view" => 'escola/editar'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('escola_model');
            $existe = $this->escola_model->get_escola_id($id);
            if ($existe) {
                $deletou = $this->escola_model->delete_escola($id);

               
                if ($deletou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "O item foi deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "O item  nao foi deletado pois existem registros vinculados nesse item!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'escola/deletar'
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