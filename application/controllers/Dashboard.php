<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect('Conta/entrar');
        }
        
    }

    public function index() {
        $alerta = null;
        $catalagos = null;

        $this->load->model('catalago_model'); //chamo o model
        $catalagos = $this->Catalago_model->get_catalago_limit(); //retorno do model chamado com seu metodo
        $this->load->model('emprestimo_model');
        $emprestimos = $this->emprestimo_model->get_emprestimos_total();
        $pendentes = $this->emprestimo_model->get_emprestimos_total_pendentes();



        $dados = array(
            "alerta" => $alerta,
            "catalogo" => $catalagos,
            "emprestimo"=>$emprestimos,
            "pendente"=>$pendentes,
            "view"=>'dashboard/index'


        );
       
        $this->load->view('template', $dados);
    }

}
