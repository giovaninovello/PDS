<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tombo extends CI_Controller
{

    public function __construct()
    {
//verifica se esta logado no sistema se nao redirecina para pagina de login
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect('conta/entrar');
        }

    }
    // funcao para ega os item do banco e passar pro view  junto com o combobox populado
    public  function cadastro($id){
        $alerta = null;

        $id_cat = (int)$id;
        $alerta = null;
        $this->load->model('tombo_model'); //chamo o model
        $aquisicaotombo = $this->tombo_model->get_aqui(); //retorna  e popula o combo da aquiasicao
        $stringdedata = "%Y-%m-%d";
        $exemplar = $this->tombo_model->get_ultimoexemplar($id_cat);
        

        $dados = array(
            "alerta"=>$alerta,
            "aqui" => $aquisicaotombo,
            "cat"=>$id_cat,
            "data" =>mdate($stringdedata),
            "exemplar" =>$exemplar,
            "view" => 'tombo/cadastrar'

        );
        $this->load->view('template', $dados);
    }


    //em andamento
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
                        "class" => "ui green message",
                        "mensagem" => "O usuario foi cadastrado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "ui red message",
                        "mensagem" => "O usuario  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "ui red message",
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


  


}


