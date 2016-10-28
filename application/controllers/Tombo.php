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


        $dados = array(
            "alerta"=>$alerta,
            "aqui" => $aquisicaotombo,
            "cat"=>$id_cat,
            "view" => 'tombo/cadastrar'

        );
        $this->load->view('template', $dados);
    }


  


}


