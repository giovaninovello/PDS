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

        $dados = array(
            "alerta" => $alerta,
            "view"=>'dashboard/index'
        );
        $this->load->view('template', $dados);
    }

}
