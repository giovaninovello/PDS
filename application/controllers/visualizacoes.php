<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visualizacoes extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('conta/entrar');
        }
    }
    
    public function form_visualizar_geral()
    {
        $dados = array(
            "view" => 'visualizacoes/form_visualizar_geral'
        );
        $this->load->view('template', $dados);
    }

   }