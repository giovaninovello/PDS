<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
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

        $this->load->model('usuarios_model'); //chamo o model
        $usuarios = $this->usuarios_model->get_usuarios(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "usuarios" => $usuarios,
            "view" => 'usuario/visualizar_todos'
        );

        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {
       


        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email|is_unique[usuarios.email]');
            $this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('confirmar_senha', 'CONFIRMAR_SENHA', 'required|min_length[3]|max_length[20]|matches[senha]');

            if ($this->form_validation->run() === true) {
                $dados_usuario = array(
                    'nome' => $this->input->post('nome'),
                    'email' => $this->input->post('email'),
                    'senha' => $this->input->post('senha'),
                    'tipo_usu' => $this->input->post('tipo')
                );
                $this->load->model('usuarios_model');
                $cadastrou = $this->usuarios_model->create_usuario($dados_usuario);
                if ($cadastrou) {

                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "O usuario foi cadastrado com sucesso!<br>" . validation_errors()
                    );
                    
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "O usuario  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "O usuario  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'usuario/cadastrar'
        );

        $this->load->view('template', $dados);
    }
    
    public function editar($id_usuario)
{
    $alerta = null;
    $id_usuario = (int)$id_usuario;
    if ($id_usuario) {
        $this->load->model('usuarios_model');
        $existe = $this->usuarios_model->get_usuario($id_usuario);

        if ($existe) {
            $usuario = $existe;
            if ($this->input->post('editar') === 'editar') {
                if ($this->input->post('captcha')) redirect('conta/entrar');

                $id_usuario_form = (int)$this->input->post('id_usuario');
                if ($id_usuario !== $id_usuario_form) redirect('conta/entrar');
                //definir regras de validação
                $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
                $this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[3]|max_length[20]');
                $this->form_validation->set_rules('confirmar_senha', 'CONFIRMAR_SENHA', 'required|min_length[3]|max_length[20]|matches[senha]');
                //verificar se as regra sao atendidas
                if ($this->form_validation->run() === true) {
                    $usuario_atualizado = array(
                        'nome' => $this->input->post('nome'),
                        'email' => $this->input->post('email'),
                        'senha' => $this->input->post('senha'),
                        'tipo_usu' => $this->input->post('tipo')

                    );
                    $atualizou = $this->usuarios_model->update_usuario($this->input->post('id_usuario'), $usuario_atualizado);

                    if ($atualizou) {
                        $alerta = array(
                            "class" => "alert alert-success",
                            "mensagem" => "O usuario foi atualizado com sucesso!<br>" . validation_errors()
                        );
                    } else {
                        $alerta = array(
                            "class" => "alert alert-danger",
                            "mensagem" => "O usuario  nao foi atualizado!<br>" . validation_errors()
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
                "mensagem" => "Atençao o usuario nao esta cadastrado!<br>" . validation_errors()
            );
        }
    } else {
        $alerta = array(
            "class" => "alert alert-danger",
            "mensagem" => "Atençao o usuario informado esta incorreto!<br>" . validation_errors()
        );
    }
    $dados = array(
        "alerta" => $alerta,
        "usuario" => $usuario,
        "view" => 'usuario/editar'
    );
    $this->load->view('template', $dados);
}

    public function editar_permissao($id_usuario)
    {
        $alerta = null;
        $id_usuario = (int)$id_usuario;
        $id_metodo = 1;


        if ($id_usuario) {

            $this->load->model('usuarios_model');
            $existe = $this->usuarios_model->get_permissao_edit($id_usuario,$id_metodo);



            if ($existe) {
                $usuario = $existe;

                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('conta/entrar');
                    
                    //definir regras de validação
                    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
                    $this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[3]|max_length[20]');
                    $this->form_validation->set_rules('confirmar_senha', 'CONFIRMAR_SENHA', 'required|min_length[3]|max_length[20]|matches[senha]');
                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $usuario_atualizado = array(
                            'nome' => $this->input->post('nome'),
                            'email' => $this->input->post('email'),
                            'senha' => $this->input->post('senha')
                            

                        );
                        $atualizou = $this->usuarios_model->update_usuario($this->input->post('id_usuario'), $usuario_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "ui green message",
                                "mensagem" => "O usuario foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "ui red message",
                                "mensagem" => "O usuario  nao foi atualizado!<br>" . validation_errors()
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
                $usuario = false;
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
        $dados = array(
            "alerta" => $alerta,
            "usuario_metodo" => $usuario,
            "view" => 'usuario/editar_permissao'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id_usuario)
    {
        $alerta = null;
        $id_usuario = (int)$id_usuario;
        if ($id_usuario) {
            $this->load->model('usuarios_model');
            $existe = $this->usuarios_model->get_usuario($id_usuario);
            if ($existe) {
                $deletou = $this->usuarios_model->delete_usuario($id_usuario);
                if ($deletou) {
                    $alerta = array(
                        "class" => "success",
                        "mensagem" => "O usuario foi deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "danger",
                        "mensagem" => "O usuario  nao foi deletado!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'usuario/deletar'
                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o usuario nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o usuario informado esta incorreto!<br>" . validation_errors()
            );

        }
    }
    
    public function permissao(){


        $f = new Auth();
        $f->CheckAuth($this->router->fetch_class(), $this->router->fetch_method());
        
        $alerta = null;
        $dados = array(
            "alerta"=>$alerta,
            "view" => 'usuario/tela_permissao'
        );
        $this->load->view('template', $dados);
    }





}