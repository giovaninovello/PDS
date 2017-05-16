<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimos extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('conta/entrar');
        }
    }



    public function emprestar()
    {
       
        $alerta = null;


        $dados = array(
            "alerta" => $alerta,
            "view" => 'emprestimos/emprestar'
        );


        $this->load->view('template', $dados);
    }

    public function emprestar_recibo()
    {

        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('id_aluno', 'ID ALUNO', 'required');
            $this->form_validation->set_rules('id_tombo', 'ID TOMBO', 'required');

            if ($this->form_validation->run() === true) {

                $stringdedata = "%Y-%m-%d";
                $dataret=mdate($stringdedata);
                $prazo = 7;

                $this->load->model('aluno_model');
                $this->load->model('tombo_model');
                $alunonome=$this->aluno_model->get_aluno_id($this->input->post('id_aluno'));
                $itemnome=$this->tombo_model->get_tombo_id($this->input->post('id_tombo'));

                $mostrarecibo= array(
                    'dataret' => $dataret,
                    'prazo' => $prazo,
                    'datadev' => date("Y-m-d", strtotime("+".$prazo." days", strtotime($dataret))),
                    'aluno_idaluno' => $alunonome->nome_aluno,
                    'id_tombo' => $itemnome->titulo

                );


                $dados_emprestimo = array(

                    'dataret' => $dataret,
                    'prazo' => $prazo,
                    'datadev' => date("Y-m-d", strtotime("+".$prazo." days", strtotime($dataret))),
                    'aluno_idaluno' => $this->input->post('id_aluno'),
                    'id_tombo' => $this->input->post('id_tombo'),
                    'status'=>"PE"



                );
                //pegar o nome do aluno do emprestimo para mostrar na tela


                $this->load->model('emprestimo_model');
                $cadastrou = $this->emprestimo_model->emprestar($dados_emprestimo);


                //fazer o mudança de status  do tombo para emprestado
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "O Emprestimo foi efetuado com sucesso!<br>" . validation_errors()
                    );

                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "O Emprestimo  nao foi efetuado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "O Emprestimo  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        
        $dados = array(
            "alerta" => $alerta,
            "recibo" =>$dados_emprestimo,
            "mostrarecibo"=>$mostrarecibo,
            "view" => 'emprestimos/recibo'
        );


        $this->load->view('template', $dados);
    }

    public function devolucao()
    {

        $alerta = null;


        $dados = array(
            "alerta" => $alerta,
            "view" => 'emprestimos/devolucao'
        );


        $this->load->view('template', $dados);
    }

    public function devolucao_recibo()
    {

        $alerta = null;
        if ($this->input->post('devolver') === "devolver") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');


            $stringdedata = "%Y-%m-%d";
            $datadev = mdate($stringdedata);
            $dados_emprestimo = array(

                'datadev' => $datadev,
                'id_tombo' => $this->input->post('id_tombo'),
                'aluno_idaluno' => $this->input->post('idaluno'),
                'datadevolucaoreal' => $this->input->post('datadevolucaoreal')


            );
           


            $this->load->model('emprestimo_model');
            $devolucao = $this->emprestimo_model->devolver($dados_emprestimo);//faz update na tabela emprestimos muda o status
            
                if ($dados_emprestimo['datadev'] > $dados_emprestimo['datadevolucaoreal']) {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "Aluno  nao devolveu no prazo!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "Devolucao efetuada com sucesso!<br>" . validation_errors()
                    );
                }


                 }else {
                        $alerta = array(
                            "class" => "alert alert-danger",
                            "mensagem" => "O Devolucao  nao foi efetuada!<br>" . validation_errors()
                        );

                }

        $dados = array(
            "alerta" => $alerta,
            "recibo" =>$dados_emprestimo,
            "view" => 'emprestimos/recibo_dev'
        );



        $this->load->view('template', $dados);
    }
   



}