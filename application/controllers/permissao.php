<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissao extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('conta/entrar');
        }
    }

    public  function cadastro(){



        $alerta = null;
        $this->load->model('permissao_model'); //chamo o model
        $itemmetodo = $this->permissao_model->get_metodo(); //retorno do model chamado com seu metodo
        $itemusuario = $this->permissao_model->get_usuario(); //retorno do model chamado com seu metodo


        $this->load->model('autor_model');
        $autor = $this->autor_model->get_autor();//pega o autores no get select

        $dados = array(
            "alerta"=>$alerta,
            "metodo" => $itemmetodo,
            "usuario" => $itemusuario,
            "aut"=>$autor,
            "view" => 'permissao/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function visualizar_todos()
    {
        $alerta = null;
        $todos = null;

        $this->load->model('permissao_model'); //chamo o model
        $todos = $this->permissao_model->get_permissao(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "permissao" => $todos,
            "view" => 'permissao/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {
       
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('metodo_form', 'METODO', 'required');
            $this->form_validation->set_rules('usuarios_form', 'USUARIO', 'required');

            if ($this->form_validation->run() === true) {
                $dados = array(
                    'id_metodo' => $this->input->post('metodo_form'),
                    'id_usuario' => $this->input->post('usuarios_form')

                );
                $this->load->model('permissao_model');
                $cadastrou = $this->permissao_model->cadastrar($dados);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "ui green message",
                        "mensagem" => "Permissao cadastrada com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "ui red message",
                        "mensagem" => "Permissao nao cadastrada!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "ui red message",
                    "mensagem" => "Formulario nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'permissao/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id_permissao)
    {
        $alerta = null;
        $id_permissao = (int)$id_permissao;
        if ($id_permissao) {
            $this->load->model('permissao_model');
            $existe = $this->permissao_model->get_permissao_id($id_permissao);
            if ($existe) {
                $deletou = $this->permissao_model->delete_permissao($id_permissao);
                if ($deletou) {
                    $alerta = array(
                        "class" => "success",
                        "mensagem" => "Permissao deletada com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "danger",
                        "mensagem" => "Permissao  nao foi deletada!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'permissao/deletar'
                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "ui red message",
                    "mensagem" => "Atençao o usuario nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "ui red message",
                "mensagem" => "Atençao o usuario informado esta incorreto!<br>" . validation_errors()
            );

        }
    }

    //METODOS CLASSE

    public function metodos()
    {
        $alerta = null;
        $todos = null;

        $this->load->model('permissao_model'); //chamo o model
        $todos = $this->permissao_model->get_metodo(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "metodos" => $todos,
            "view" => 'permissao/visualizar_metodos_todos'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id_metodo)
    {
        $alerta = null;
        $id_metodo = (int)$id_metodo;
        if ($id_metodo) {
            $this->load->model('permissao_model');
            $existe = $this->permissao_model->get_metodo_editar($id_metodo);

            if ($existe) {
                $metodo = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('conta/entrar');

                    $id_metodo_form = (int)$this->input->post('id_metodo');

                    if ($id_metodo !== $id_metodo_form) redirect('conta/entrar');
                    //definir regras de validação
                    $this->form_validation->set_rules('privado', 'PRIVADO', 'required');
                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $metodo_atualizado = array(

                            'privado' => $this->input->post('privado')

                        );
                        $atualizou = $this->permissao_model->update_metodo($this->input->post('id_metodo'), $metodo_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "ui green message",
                                "mensagem" => "O Metodo foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "ui red message",
                                "mensagem" => "O Metodo  nao foi atualizado!<br>" . validation_errors()
                            );
                        }
                    } else {
                        //formaulario invalido
                        $alerta = array(
                            "class" => "ui red message",
                            "mensagem" => "Atençao o formulario nao  foi validado!<br>" . validation_errors()
                        );
                    }
                }
            } else {
                $metodo = false;
                $alerta = array(
                    "class" => "ui red message",
                    "mensagem" => "Atençao o metodo nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "ui red message",
                "mensagem" => "Atençao o metodo informado esta incorreto!<br>" . validation_errors()
            );
        }
        $dados = array(
            "alerta" => $alerta,
            "metodo" => $metodo,
            "view" => 'permissao/editar'
        );
        $this->load->view('template', $dados);
    }




}