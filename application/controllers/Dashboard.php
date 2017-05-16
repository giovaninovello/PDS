<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect('conta/entrar');
        }
        
    }

    public function index() {
        $alerta = null;
        $catalagos = null;

        $this->load->model('catalago_model'); //chamo o model
        $catalagos = $this->catalago_model->get_catalago(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "catalogo" => $catalagos,
            "view"=>'dashboard/index'


        );
       
        $this->load->view('template', $dados);
    }

}
