<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autor extends CI_Controller
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
        $autores = null;

        $this->load->model('autor_model'); //chamo o model
        $autores = $this->autor_model->get_autor(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "autor" => $autores,
            "view" => 'autor/visualizar_todos'
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
                $dados_autor = array(
                    'nome_aut' => $this->input->post('nome')

                );
                $this->load->model('autor_model');
                $cadastrou = $this->autor_model->create_autor($dados_autor);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "Autor cadastrado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "Autor  nao cadastrado!<br>" . validation_errors()
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
            "view" => 'autor/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('autor_model');
            $existe = $this->autor_model->get_autor_delete($id);

            if ($existe) {
                $usuario = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('Conta/entrar');

                    $id_usuario_form = (int)$this->input->post('idautor');
                    if ($id !== $id) redirect('Conta/entrar');
                    //definir regras de validação
                    $this->form_validation->set_rules('nome', 'NOME', 'required');
                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $autor_atualizado = array(
                            'nome_aut' => $this->input->post('nome')
                        );
                        $atualizou = $this->autor_model->update_autor($this->input->post('id'), $autor_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "alert alert-success",
                                "mensagem" => "O autor foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "ui red message",
                                "mensagem" => "O autor  nao foi atualizado!<br>" . validation_errors()
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
                    "mensagem" => "Atençao o autor nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o autor informado esta incorreto!<br>" . validation_errors()
            );
        }
        $dados = array(
            "alerta" => $alerta,
            "autor" => $usuario,
            "view" => 'autor/editar'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id_autor)
    {
        $alerta = null;
        $id_autor = (int)$id_autor;
        if ($id_autor) {
            $this->load->model('autor_model');
            $existe = $this->autor_model->get_autor_delete($id_autor);
            if ($existe) {
                $deletou = $this->autor_model->delete_autor($id_autor);
                if ($deletou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "Autor deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "Autor  nao foi deletado!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'autor/deletar'
                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o autor nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o autor informado esta incorreto!<br>" . validation_errors()
            );

        }
    }




}