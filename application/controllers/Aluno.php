<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {

            redirect('conta/entrar');
        }
    }

    public function visualizar_todos()
    {


        $alerta = null;
        $usuario = null;

        $this->load->model('aluno_model'); //chamo o model
        $alunos = $this->aluno_model->get_alunos(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "aluno" => $alunos,
            "view" => 'aluno/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {

        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('nome', 'NOME', 'required');

            if ($this->form_validation->run() === true) {
                $dados_aluno = array(
                    'nome_aluno' => $this->input->post('nome'),
                    'serie_aluno' => $this->input->post('serie'),
                    'turma_aluno' => $this->input->post('turma'),
                    'pendente_aluno'=>0
                );
                $this->load->model('aluno_model');
                $cadastrou = $this->aluno_model->create_aluno($dados_aluno);
                if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "O aluno foi cadastrado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "O aluno  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "O aluno  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'aluno/cadastrar'
        );
        $this->load->view('template', $dados);
    }

    public function editar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('aluno_model');
            $existe = $this->aluno_model->get_aluno($id);

            if ($existe) {
                $usuario = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('conta/entrar');

                    $id_aluno_form = (int)$this->input->post('id_aluno');
                    if ($id !== $id_aluno_form) redirect('conta/entrar');
                    //até aqui
                    //definir regras de validação
                    $this->form_validation->set_rules('nome', 'NOME', 'required');

                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $usuario_atualizado = array(
                            'nome_aluno' => $this->input->post('nome'),
                            'turma_aluno' => $this->input->post('turma'),
                            'serie_aluno' => $this->input->post('serie')

                        );
                        $atualizou = $this->aluno_model->update_aluno($this->input->post('id_aluno'), $usuario_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "alert alert-success",
                                "mensagem" => "O aluno foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "alert alert-danger",
                                "mensagem" => "O aluno  nao foi atualizado!<br>" . validation_errors()
                            );
                        }
                    } else {
                        //formaulario invalido
                        $alerta = array(
                            "class" => "alert alert-danger",
                            "mensagem" => "Atençao o formulario nao  foi validado!<br>" . validation_errors()
                        );
                    }
                }
            } else {
                $usuario = false;
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o aluno nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "ui red message",
                "mensagem" => "Atençao o aluno informado esta incorreto!<br>" . validation_errors()
            );
        }
        $dados = array(
            "alerta" => $alerta,
            "usuario" => $usuario,
            "view" => 'aluno/editar'
        );
        $this->load->view('template', $dados);
    }

    public function deletar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('aluno_model');
            $existe = $this->aluno_model->get_aluno($id);
            if ($existe) {
                $deletou = $this->aluno_model->delete_aluno($id);
                if ($deletou) {
                    $alerta = array(
                        "class" => "success",
                        "mensagem" => "O aluno foi deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "danger",
                        "mensagem" => "O aluno  nao foi deletado!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'aluno/deletar'
                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o aluno nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "ui red message",
                "mensagem" => "Atençao o aluno informado esta incorreto!<br>" . validation_errors()
            );

        }
    }

    public function pesquisa_ajax()
    {
        $acao =$_POST['acao'];



        switch ($acao):

            case'buscar':
                $termo =$_POST['termo'];
                $this->load->model('aluno_model'); //chamo o model
                $termoEncontrados = $this->aluno_model->get_aluno_like($termo); //retorno do model chamado com seu metodo
                if(!empty($termo)){
                    if(count($termoEncontrados) > 0){
                        foreach ($termoEncontrados as $busca){
                            if($busca['pendente_aluno']==0){
                            echo ' <a href="#" class="btn btn-success small btn-block btn-flat" id="usuario" data-target="'.$busca['idaluno'].'"  >'.$busca['nome_aluno'].'</a>';
                        }else{
                                echo ' <a href="#" class="btn btn-danger small btn-block btn-flat"   data-target="'.$busca['idaluno'].'"  >'.$busca['nome_aluno'].'&nbsp <b>Usuario com Pendencias no Sistema Verifique os Emprestimos</b></a>';
                            }
                        }

                    }else{
                        echo 'nao encontramos registros para ' .$termo;
                    }
                }else{
                    echo '<a href="#" class="btn btn-warning small btn-block btn-flat"</a>Digite uma pesquisa';
                }

                break;
            case 'retornar':
                $id=$_POST['iduser'];
                $this->load->model('aluno_model'); //chamo o model
                $dadosUser=$this->aluno_model->get_aluno_id($id);

                if($dadosUser){
                    echo json_encode($dadosUser);
                }else{
                    echo json_encode('nao encontrdo esse registro');
                }

                break;
            endswitch;






    }



}