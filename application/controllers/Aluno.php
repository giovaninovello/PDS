<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect('Conta/entrar');
        }
    }

    public function visualizar_todos()
    {

        $alerta = null;
        $usuario = null;

        $this->load->model('aluno_model'); //chamo o model
        $this->load->model('escola_model');// model da escola

        if($_SESSION['tipo']==2){
        $alunos = $this->aluno_model->get_alunos($_SESSION['idsession']); //retorno do model chamado com seu metodo
        $escola = $this->escola_model->get_escolas();// retorna todas as escolas cadastradas

        $dados = array(
            "alerta" => $alerta,
            "aluno" => $alunos,
            "esc"=>$escola,
            "view" => 'aluno/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }else{
            $alunos = $this->aluno_model->get_alunos_adm(); //retorno do model chamado com seu metodo
            $escola = $this->escola_model->get_escolas();// retorna todas as escolas cadastradas

            $dados = array(
                "alerta" => $alerta,
                "aluno" => $alunos,
                "esc"=>$escola,
                "view" => 'aluno/visualizar_todos'
            );
            $this->load->view('template', $dados);
        }
    }

    public function cadastrar()
    {
        $this->load->model('escola_model');// model da escola
        $escola = $this->escola_model->get_escolas();// retorna todas as escolas cadastradas
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('Conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('nome', 'NOME', 'required');

            if ($this->form_validation->run() === true) {
                //faz a upload do arquivo
                $config['upload_path'] = FCPATH . "assets/uploads";
                $config['allowed_types'] = "jpg|gif|png";
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload("nome_arquivo")) {
                    $info_arquivo = $this->upload->data();
                    $nome_imagem = $info_arquivo["file_name"];


                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "O Livro  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
                $dados_aluno = array(
                    'nome_aluno' => $this->input->post('nome'),
                    'serie_aluno' => $this->input->post('serie'),
                    'turma_aluno' => $this->input->post('turma'),
                    'escola_idescola' => $this->input->post('escola'),
                    'pendente_aluno' => 0,//nao esta pendente se for 0
                    'nome_imagem' => $nome_imagem,
                    'status_a' => 1//ativo
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
            "esc" =>$escola,
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

            $this->load->model('escola_model');// model da escola
            $escola = $this->escola_model->get_escolas();// retorna todas as escolas cadastradas


            if ($existe) {
                $usuario = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('Conta/entrar');

                    $id_aluno_form = (int)$this->input->post('id_aluno');
                    if ($id !== $id_aluno_form) redirect('Conta/entrar');
                    //até aqui
                    //definir regras de validação
                    $this->form_validation->set_rules('nome', 'NOME', 'required');

                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {

                        $config['upload_path'] = FCPATH."assets/uploads";
                        $config['allowed_types']="jpg|gif|png";
                        $config['encrypt_name'] =TRUE;

                        $this->load->library('upload',$config);
                        if($this->upload->do_upload("nome_arquivo")){
                            $info_arquivo = $this->upload->data();
                            $nome_imagem = $info_arquivo["file_name"];


                        }else {
                            $nome_imagem =  $usuario['nome_imagem'];
                        }
                        $usuario_atualizado = array(
                            'nome_aluno' => $this->input->post('nome'),
                            'turma_aluno' => $this->input->post('turma'),
                            'serie_aluno' => $this->input->post('serie'),
                            'escola_idescola'=>$this->input->post('escola'),
                            'nome_imagem'=> $nome_imagem

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
            "esc"=>$escola,
            "view" => 'aluno/editar'
        );

        $this->load->view('template', $dados);
    }

    public function desativar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('aluno_model');
            $existe = $this->aluno_model->get_aluno($id);
            $atualiza = array(
                'status_a' => 0//desativado 1 ativado

            );
            if ($existe) {
                $deletou = $this->aluno_model->desativa_aluno($id,$atualiza);
                if ($deletou) {
                    $alerta = array(
                        "class" => "success",
                        "mensagem" => "O aluno foi desativado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "danger",
                        "mensagem" => "O aluno  nao foi desativado!<br>" . validation_errors()
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
    public function ativar($id)
    {
        $alerta = null;
        $id = (int)$id;
        if ($id) {
            $this->load->model('aluno_model');
            $existe = $this->aluno_model->get_aluno($id);
            $atualiza = array(
                'status_a' => 1//0 desativado 1 ativado

            );
            if ($existe) {
                $deletou = $this->aluno_model->desativa_aluno($id,$atualiza);
                if ($deletou) {
                    $alerta = array(
                        "class" => "success",
                        "mensagem" => "O aluno foi Ativado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "danger",
                        "mensagem" => "O aluno  nao foi desativado!<br>" . validation_errors()
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
                if($_SESSION['tipo']==1) {
                    $termoEncontrados = $this->aluno_model->get_aluno_like_adm($termo); //retorno do model chamado com seu metodo
                    if (!empty($termo)) {
                        if (count($termoEncontrados) > 0) {
                            foreach ($termoEncontrados as $busca) {
                                if ($busca['pendente_aluno'] == 0) {
                                    echo ' <a href="#" class="btn bg-green  btn-lg btn-flat btn-block" id="usuario" data-target="' . $busca['idaluno'] . '"  >' . $busca['nome_aluno'] . '</a>';
                                } else {
                                    echo ' <a href="#" class="btn btn-warning btn-lg btn-block btn-flat"   data-target="' . $busca['idaluno'] . '"  >' . $busca['nome_aluno'] . '&nbsp possui emprestimos</a>';
                                }
                            }

                        } else {
                            echo 'nao encontramos registros para ' . $termo;
                        }
                    } else {
                        echo '<a href="#" class="btn btn-warning btn-lg btn-block btn-flat"</a>Digite uma pesquisa';
                    }
                }else{
                    $termoEncontrados = $this->aluno_model->get_aluno_like($termo,$_SESSION['idsession']); //retorno do model chamado com seu metodo
                    if (!empty($termo)) {
                        if (count($termoEncontrados) > 0) {
                            foreach ($termoEncontrados as $busca) {
                                if ($busca['pendente_aluno'] == 0) {
                                    echo ' <a href="#" class="btn bg-green  btn-lg btn-flat btn-block" id="usuario" data-target="' . $busca['idaluno'] . '"  >' . $busca['nome_aluno'] . '</a>';
                                } else {
                                    echo ' <a href="#" class="btn btn-warning btn-lg btn-block btn-flat"   data-target="' . $busca['idaluno'] . '"  >' . $busca['nome_aluno'] . '&nbsp possui emprestimos</a>';
                                }
                            }

                        } else {
                            echo 'nao encontramos registros para ' . $termo;
                        }
                    } else {
                        echo '<a href="#" class="btn btn-warning btn-lg btn-block btn-flat"</a>Digite uma pesquisa';
                    }
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

    public function gera_car()
    {


        $alerta = null;
        $alunos = null;

        $this->load->model('aluno_model'); //chamo o model
        if($_SESSION['tipo']==2){
            $alunos = $this->aluno_model->get_alunos($_SESSION['idsession']); //retorno do model chamado com seu metodo


            $dados = array(
                "alerta" => $alerta,
                "alunos" => $alunos,
                "view" => 'aluno/carteira'
            );


            $this->load->view('template', $dados);
        }else{
            $alunos = $this->aluno_model->get_alunos_adm(); //retorno do model chamado com seu metodo


            $dados = array(
                "alerta" => $alerta,
                "alunos" => $alunos,
                "view" => 'aluno/carteira'
            );


            $this->load->view('template', $dados);
        }
    }
    public function gerar()
    {

        $alerta = null;
        $carteira= $_POST['modulo'];


        $dados = array(
            "alerta" => $alerta,
            "carteira"=>$carteira,
            "view" => 'aluno/visualizar_cart'
        );






        $this->load->view('template', $dados);
    }




}