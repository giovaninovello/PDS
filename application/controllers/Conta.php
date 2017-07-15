<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        if ($this->session->userdata('logado')) {
            if(!$this->uri->segment(2)=='sair')
                
            redirect('dashboard');
        }

    }

    public function Entrar() {

        $alerta = null;
        if ($this->input->post('entrar') === 'entrar') {
            if ($this->input->post('captcha'))
                redirect('Conta/entrar');
            $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[6]|max_length[20]');

            if ($this->form_validation->run() === TRUE) {

                $email = $this->input->post('email');
                $senha = $this->input->post('senha');


                $this->load->model('Usuarios_model');
                $login_existe = $this->Usuarios_model->check_login($senha, $email);
                $login_escola = $this->Usuarios_model->check_escola($login_existe['escola_idescola']);

                $this->load->model('Catalago_model'); //chamo o model
                $catalagos = $this->Catalago_model->get_catalago_count();
                $this->load->model('Tombo_model');
                $baixados = $this->Tombo_model->get_baixados_count();


                if ($login_existe) {
                    $usuario = $login_existe;
                    //configura a sessao
                    $session = array(
                        'nome'=> $usuario['nome'],
                        'logado' => TRUE,
                        'email' => $usuario['email'],
                        'id_usuario'=> $usuario['idusuarios'],
                        'tipo'=>$usuario['tipo_usu'],
                        'escola'=>$login_escola['nome_escola'],
                        'idsession'=>$login_escola['idescola'],
                        'catalago'=>$catalagos,
                        'baixa'=>$baixados

                    );



                    //inicializa a sessao
                    $this->session->set_userdata($session);
                    redirect('dashboard');


                } else {
                    //login invalido
                    $alerta = array(
                        "class" => "ui red message",
                        "mensagem" => "Atençao login invalido ou email incorreto."
                    );
                }
            } else {
                $alerta = array(
                    "class" => "danger",
                    "mensagem" => "Atençao falha na validação do formulario!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view"=>'Conta/entrar',
            "hidemenu"=>true


        );

        $this->load->view('template', $dados);

       
    }
    

    public function sair() {

        $this->session->sess_destroy();
        redirect('Conta/entrar');
    }
    
}
