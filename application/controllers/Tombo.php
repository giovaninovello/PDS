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
    
    public function cadastrar($id)
    {
        $id_cat = (int)$id;
        $catalagos = null;
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('fornecedor', 'FORNECEDOR', 'required');
            $this->form_validation->set_rules('exemplar', 'EXEMPLAR', 'required');

            if ($this->form_validation->run() === true) {
                $dados_tombo = array(

                    'idtombo' => $this->input->post('tbo'),
                    'data_tombo' => $this->input->post('data'),
                    'exemplar' => $this->input->post('exemplar'),
                    'fornecedor' => $this->input->post('fornecedor'),
                    'obs' => '',
                    'aquisicao_idaquisicao' => $this->input->post('classificacao'),
                    "catalago_idcatalago"=>$id_cat
                );
                $this->load->model('catalago_model'); //chamo o model
                $catalagos = $this->catalago_model->get_tombo_limit($id); //retorno do model chamado com seu metodo

                $this->load->model('tombo_model');
                $cadastrou = $this->tombo_model->cadastrar_tombo($dados_tombo);

                    if ($cadastrou) {
                    $alerta = array(
                        "class" => "ui green message",
                        "mensagem" => "O Tombo foi Inserido com sucesso!<br>" . validation_errors()

                    );
                } else {
                    $alerta = array(
                        "class" => "ui red message",
                        "mensagem" => "O tombo  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "ui red message",
                    "mensagem" => "O tombo  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "catalogo" => $catalagos,
            "view" => 'catalogo/visualizar_item'
        );


        $this->load->view('template', $dados);
       
        
    }


  


}


