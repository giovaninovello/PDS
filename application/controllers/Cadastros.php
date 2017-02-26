<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastros extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('conta/entrar');
        }
    }
    
    public function form_cad_geral()
    {
        $dados = array(
            "view" => 'cadastros/form_cad_geral'
        );
        $this->load->view('template', $dados);
    }

   }