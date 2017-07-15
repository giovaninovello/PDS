<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimos extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('Conta/entrar');
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
            if ($this->input->post('captcha')) redirect('Conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('id_aluno', 'ID ALUNO', 'required');
            $this->form_validation->set_rules('id_tombo', 'ID TOMBO', 'required');

            if ($this->form_validation->run() === true) {

                $stringdedata = "%Y-%m-%d";
                $dataret=mdate($stringdedata);
                $prazo = 6;

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
            if ($this->input->post('captcha')) redirect('Conta/cadastrar');

            $this->form_validation->set_rules('idaluno', 'ID ALUNO', 'required');
            if ($this->form_validation->run() === true) {

                $stringdedata = "%Y-%m-%d";
                $datadev = mdate($stringdedata);
                $dados_emprestimo = array(

                    'datadev' => $datadev,
                    'id_tombo' => $this->input->post('id_tombo'),
                    'aluno_idaluno' => $this->input->post('idaluno'),
                    'datadevolucaoreal' => $this->input->post('datadevolucaoreal')


                );

                $this->load->model('tombo_model');
                $titulo = $this->tombo_model->get_tombo_id($dados_emprestimo['id_tombo']);

                $this->load->model('aluno_model');
                $aluno = $this->aluno_model->get_aluno_id($dados_emprestimo['aluno_idaluno']);

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


            } else {
                //PESQUISANO BANCO
                $stringdedata = "%Y-%m-%d";
                $datadev = mdate($stringdedata);
                $termo = $this->input->post('id_tombo');
                $this->load->model('aluno_model');
                $aluno = $this->aluno_model->get_aluno_tombo($termo);

                $this->load->model('tombo_model');
                $titulo = $this->tombo_model->get_tombo_id($termo);
                $dados_emprestimo = array(

                    'datadev' => $datadev,
                    'id_tombo' => $termo,
                    'aluno_idaluno' => $aluno->idaluno,
                    'datadevolucaoreal' => $aluno->datadev


                );
                
                $this->load->model('emprestimo_model');
                $devolucao = $this->emprestimo_model->devolver($dados_emprestimo);//faz update na tabela emprestimos muda o status


                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "O Devolucao  nao foi efetuada!<br>" . validation_errors()
                );

            }


            $dados = array(
                "alerta" => $alerta,
                "recibo" => $dados_emprestimo,
                "titulo" => $titulo,
                "aluno" => $aluno,
                "view" => 'emprestimos/recibo_dev'
            );



            $this->load->view('template', $dados);
        }
    }

    public function v_emprestado()
    {


        $alerta = null;
        $escola = null;

        $this->load->model('emprestimo_model'); //chamo o model
        if($_SESSION['tipo']==1) {
            $escola = $this->emprestimo_model->get_emprestimos_adm();


            $dados = array(
                "alerta" => $alerta,
                "escola" => $escola,
                "view" => 'emprestimos/v_emprestado'
            );

            $this->load->view('template', $dados);
        }else{
            $escola = $this->emprestimo_model->get_emprestimos($_SESSION['idsession']);


            $dados = array(
                "alerta" => $alerta,
                "escola" => $escola,
                "view" => 'emprestimos/v_emprestado'
            );

            $this->load->view('template', $dados);
        }
    }

    public  function form_pesquisa_data(){


        $alerta = null;

        $dados = array(
            "alerta"=>$alerta,
            "view" => 'emprestimos/form_pesquisa_data'

        );
        $this->load->view('template', $dados);
    }

    public function v_emprestado_data()
    {


        $alerta = null;
        $escola = null;
        $datai =implode('-',array_reverse(explode('/',$this->input->post('datai'))));
        $dataf =implode('-',array_reverse(explode('/',$this->input->post('dataf'))));

        $this->load->model('emprestimo_model'); //chamo o model
        if($_SESSION['tipo']==1) {
            $escola = $this->emprestimo_model->get_emprestimos_data_adm($datai, $dataf);


            $dados = array(
                "alerta" => $alerta,
                "escola" => $escola,
                "view" => 'emprestimos/v_emprestado_data'
            );


            $this->load->view('template', $dados);
        }else{
            $escola = $this->emprestimo_model->get_emprestimos_data($datai, $dataf,$_SESSION['idsession']);


            $dados = array(
                "alerta" => $alerta,
                "escola" => $escola,
                "view" => 'emprestimos/v_emprestado_data'
            );


            $this->load->view('template', $dados);
        }
    }

    public  function form_pesquisa_aluno(){


        $alerta = null;

        $dados = array(
            "alerta"=>$alerta,
            "view" => 'emprestimos/form_pesquisa_aluno'

        );
        $this->load->view('template', $dados);
    }

    public function v_emprestado_aluno(){

        $alerta=null;
        $escolha = $_POST['radio'];

        if($escolha =='1') {
            $aluno = $this->input->post('pesquisar');
            $alerta = null;
            $catalagos = null;

            $this->load->model('emprestimo_model'); //chamo o model
            if($_SESSION['tipo']==1) {
                $escola = $this->emprestimo_model->get_emprestimos_aluno_adm($aluno);

                $dados = array(
                    "alerta" => $alerta,
                    "escola" => $escola,
                    "view" => 'emprestimos/v_emprestado_aluno'
                );
            }else{
                $escola = $this->emprestimo_model->get_emprestimos_aluno($aluno,$_SESSION['idsession']);

                $dados = array(
                    "alerta" => $alerta,
                    "escola" => $escola,
                    "view" => 'emprestimos/v_emprestado_aluno'
                );
            }

        }else{


            $alerta = null;
            $catalagos = null;
            $aluno = $this->input->post('pesquisar');
            $this->load->model('emprestimo_model'); //chamo o model
            if($_SESSION['tipo']==1) {
                $escola = $this->emprestimo_model->get_emprestimos_aluno_id_adm($aluno);

                $dados = array(
                    "alerta" => $alerta,
                    "escola" => $escola,
                    "view" => 'emprestimos/v_emprestado_aluno'
                );
            }else{
                $escola = $this->emprestimo_model->get_emprestimos_aluno_id($aluno,$_SESSION['idsession']);

                $dados = array(
                    "alerta" => $alerta,
                    "escola" => $escola,
                    "view" => 'emprestimos/v_emprestado_aluno'
                );
            }

        }
        $this->load->view('template', $dados);


    }





}