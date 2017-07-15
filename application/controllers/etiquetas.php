<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Etiquetas extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('Conta/entrar');
        }
    }

    public function get_etq()
    {

        $alerta = null;
        $etq = null;
        $datai =implode('-',array_reverse(explode('/',$this->input->post('datai'))));
        $dataf =implode('-',array_reverse(explode('/',$this->input->post('dataf'))));

        $this->load->model('catalago_model'); //chamo o model
        if($_SESSION['tipo']==1) {
            $etq = $this->catalago_model->get_tombo_data_adm($datai, $dataf); //retorno do model chamado com seu metodo

            $dados = array(
                "alerta" => $alerta,
                "etiqueta" => $etq,
                "view" => 'etiqueta/gera_etq'
            );


            $this->load->view('template', $dados);
        }else{
            $etq = $this->catalago_model->get_tombo_data($datai, $dataf,$_SESSION['idsession']); //retorno do model chamado com seu metodo

            $dados = array(
                "alerta" => $alerta,
                "etiqueta" => $etq,
                "view" => 'etiqueta/gera_etq'
            );


            $this->load->view('template', $dados);
        }
    }

    public function gerar()
    {

        $alerta = null;
        $barcode= $_POST['modulo'];
        
        $dados = array(
            "alerta" => $alerta,
            "barcode"=>$barcode,
            "view" => 'etiqueta/visualizar_etq'
        );
       
        
        

        $this->load->view('template', $dados);
    }


    public function index()
    {
        $alerta = null;
        $etiqueta = null;

        $dados = array(
            "alerta" => $alerta,
            "etq" => $etiqueta,
            "view" => 'etiqueta/indexetq'
        );
        $this->load->view('template', $dados);
    }








}