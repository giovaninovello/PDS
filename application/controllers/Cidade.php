<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends CI_Controller
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
        $usuario = null;

        $this->load->model('cidade_model'); //chamo o model
        $cidade = $this->cidade_model->get_cidade(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "cidade" => $cidade,
            "view" => 'cidade/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {
       
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('nome_cidade', 'NOME', 'required');
            $this->form_validation->set_rules('uf_cidade', 'UF', 'required');

            if ($this->form_validation->run() === true) {
                $dados = array(
                    'nome' => $this->input->post('nome_cidade'),
                    'uf' => $this->input->post('uf_cidade')
                );
                $this->load->model('cidade_model');
                $cadastrou = $this->cidade_model->create_cidade($dados);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "A cidade foi cadastrada com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "A cidade  nao foi cadastrada!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "A cidade  nao foi atualizada!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'cidade/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('cidade_model');
            $existe = $this->cidade_model->get_cidade_id($id);

            if ($existe) {
                $cidade = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('conta/entrar');

                    $id_aluno_form = (int)$this->input->post('id_cidade');
                    if ($id !== $id_aluno_form) redirect('conta/entrar');
                    //até aqui
                    //definir regras de validação
                    $this->form_validation->set_rules('nome', 'NOME DA CIDADE', 'required');
                    $this->form_validation->set_rules('uf', 'UF', 'required');
                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $cidade_atualizado = array(
                            'nome' => $this->input->post('nome'),
                            'uf' => $this->input->post('uf')

                        );
                        $atualizou = $this->cidade_model->update_cidade($this->input->post('id_cidade'), $cidade_atualizado);

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
            "cidade" => $cidade,
            "view" => 'cidade/editar'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('cidade_model');
            $existe = $this->cidade_model->get_cidade_id($id);

            if ($existe) {

                $deletou = $this->cidade_model->delete_cidade($id);
                

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
                    "view" => 'cidade/deletar'
                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o fornecedor nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o fornedcedor informado esta incorreto!<br>" . validation_errors()
            );

        }
    }


   



}