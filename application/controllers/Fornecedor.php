<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller
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
        $fornecedores = null;

        $this->load->model('fornecedores_model'); //chamo o model
        $fornecedores = $this->fornecedores_model->get_fornecedores();
        
        $dados = array(
            "alerta" => $alerta,
            "fornecedor" => $fornecedores,
            "view" => 'fornecedor/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public  function cadastro(){
        $alerta = null;
        $this->load->model('cidade_model'); //chamo o model
        $cidade = $this->cidade_model->get_cidade(); //retorno do model chamado com seu metodo

        $dados = array(
            "alerta"=>$alerta,
            "cid" => $cidade,
            "view" => 'fornecedor/f_cadastrar'

        );
        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('Conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('nome', 'NOME', 'required');

            if ($this->form_validation->run() === true) {
                $dados_fornecedor = array(
                    'nome_f' => $this->input->post('nome'),
                    'endereco_f' => $this->input->post('endereco'),
                    'cidade_f' => $this->input->post('cid')

                );
                $this->load->model('fornecedores_model');
                $cadastrou = $this->fornecedores_model->create_fornecedor($dados_fornecedor);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "Fornecedor foi cadastrado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "Fornecedor  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => " Fornecedor  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'fornecedor/f_cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {

            $this->load->model('cidade_model');
            $cidade=$this->cidade_model->get_cidade();

            $this->load->model('fornecedores_model');
            $existe = $this->fornecedores_model->get_fornecedor($id);

            if ($existe) {
                $usuario = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('Conta/entrar');

                    $id_usuario_form = (int)$this->input->post('id_fornecedor');
                    if ($id !== $id_usuario_form) redirect('Conta/entrar');
                    //definir regras de validação
                    $this->form_validation->set_rules('nome', 'NOME', 'required');
                    $this->form_validation->set_rules('cid', 'CIDADE', 'required');

                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $usuario_atualizado = array(
                            'nome_f' => $this->input->post('nome'),
                            'endereco_f' => $this->input->post('endereco'),
                            'cidade_f' => $this->input->post('cid')


                        );
                        $atualizou = $this->fornecedores_model->update_fornecedor($this->input->post('id_fornecedor'), $usuario_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "alert alert-success",
                                "mensagem" => "O fornecedor foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "alert alert-danger",
                                "mensagem" => "O fornecedor  nao foi atualizado!<br>" . validation_errors()
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
                $usuario = false;
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o fornecedor nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "ui red message",
                "mensagem" => "Atençao o fornecedor informado esta incorreto!<br>" . validation_errors()
            );
        }
        $dados = array(
            "alerta" => $alerta,
            "usuario" => $usuario,
            "cid"=>$cidade,
            "view" => 'fornecedor/editar'
        );

        $this->load->view('template', $dados);
    }

    public function deletar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('fornecedores_model');
            $existe = $this->fornecedores_model->get_fornecedor($id);
            if ($existe) {
                $deletou = $this->fornecedores_model->delete_fornecedor($id);
                if ($deletou) {
                    $alerta = array(
                        "class" => "success",
                        "mensagem" => "O fornecedor foi deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "danger",
                        "mensagem" => "O fornedcedor  nao foi deletado!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'fornecedor/deletar'
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