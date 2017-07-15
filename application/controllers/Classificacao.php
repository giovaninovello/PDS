<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao extends CI_Controller
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
        $cla = null;

        $this->load->model('classificacao_model'); //chamo o model
        $cla = $this->classificacao_model->get_classificacao(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "cla" => $cla,
            "view" => 'classificacao/visualizar_todos'
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
            $this->form_validation->set_rules('numero', 'NUMERO', 'required');

            if ($this->form_validation->run() === true) {
                $dados = array(
                    'descricao_cla' => $this->input->post('descricao'),
                    'numero_cla' => $this->input->post('numero')
                );
                $this->load->model('classificacao_model');
                $cadastrou = $this->classificacao_model->create_classificacao($dados);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => " alert alert-success",
                        "mensagem" => "Classificacao foi cadastrada com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => " alert alert-danger",
                        "mensagem" => "Classificacao  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => " alert alert-danger",
                    "mensagem" => "Classificacao  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'classificacao/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('classificacao_model');
            $existe = $this->classificacao_model->get_classificacao_id($id);

            if ($existe) {
                $usuario = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('Conta/entrar');

                    $id_cla_form = (int)$this->input->post('id_cla');
                    if ($id !== $id_cla_form) redirect('Conta/entrar');
                    //até aqui
                    //definir regras de validação
                    $this->form_validation->set_rules('descricao', 'DESCRICAO', 'required');
                    $this->form_validation->set_rules('numero', 'NUMERO', 'required');
                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $classificacao_atualizado = array(
                            'descricao_cla' => $this->input->post('descricao'),
                            'numero_cla' => $this->input->post('numero')


                        );
                        $atualizou = $this->classificacao_model->update_cla($this->input->post('id_cla'), $classificacao_atualizado);


                        if ($atualizou) {
                            $alerta = array(
                                "class" => "alert alert-success",
                                "mensagem" => "Atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "alert alert-danger",
                                "mensagem" => "Nao foi possivel atuaalizar !<br>" . validation_errors()
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
                    "mensagem" => "Classificacao nao cadastrada!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao a classificacao informada esta incorreta!<br>" . validation_errors()
            );
        }
        $dados = array(
            "alerta" => $alerta,
            "cla" => $usuario,
            "view" => 'classificacao/editar'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('classificacao_model');
            $existe = $this->classificacao_model->get_classificacao($id);
            if ($existe) {
                $deletou = $this->classificacao_model->delete_cla($id);
                if ($deletou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "O item foi deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "O item  nao foi deletado!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'classificacao/deletar'
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