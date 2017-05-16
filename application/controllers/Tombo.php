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

        $this->load->model('fornecedores_model'); //chamo o model
        $fornecedores = $this->fornecedores_model->get_fornecedores(); //retorna  e popula o combo de fornecedores

        $this->load->model('escola_model');// model da escola
        $escola = $this->escola_model->get_escolas();// retorna todas as escolas cadastradas

        $stringdedata = "%Y-%m-%d";

        $exemplar = $this->tombo_model->get_ultimoexemplar($id_cat);

        $dados = array(
            "alerta"=>$alerta,
            "aqui" => $aquisicaotombo,
            "cat"=>$id_cat,
            "data" =>mdate($stringdedata),
            "exemplar" =>$exemplar,
            "forn"=>$fornecedores,
            "esc" =>$escola,
            "view" => 'tombo/cadastrar'

        );
        $this->load->view('template', $dados);
    }

    public function deletar($id)
    {
        $alerta = null;
        $id_tombo = (int)$id;
        if ($id) {
            $this->load->model('tombo_model');
            $existe = $this->tombo_model->get_tombo_delete($id);
            if ($existe) {
                $deletou = $this->tombo_model->delete_tombo($id_tombo);
                if ($deletou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "Tombo deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "Tombo  nao foi deletado!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'tombo/deletar'
                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o tombo nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o tombo informado esta incorreto!<br>" . validation_errors()
            );

        }
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
                    'fornecedor_idfornecedor' => $this->input->post('fornecedor'),
                    'obs' => '',
                    'aquisicao_idaquisicao' => $this->input->post('classificacao'),
                    "catalago_idcatalago"=>$id_cat,
                    "escola_idescola" => $this->input->post('escola'),
                    "locado" =>"N"
                );
                $this->load->model('catalago_model'); //chamo o model
                $catalagos = $this->catalago_model->get_tombo_limit($id); //retorno do model chamado com seu metodo

                $this->load->model('tombo_model');
                $cadastrou = $this->tombo_model->cadastrar_tombo($dados_tombo);

                    if ($cadastrou) {
                    $alerta = array(
                        "class" => "alert alert-success",
                        "mensagem" => "O Tombo foi Inserido com sucesso!<br>" . validation_errors()

                    );
                } else {
                    $alerta = array(
                        "class" => "alert alert-danger",
                        "mensagem" => "O tombo  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "O tombo  nao foi atualizado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "catalogo" => $catalagos,
            "view" => 'catalogo/mensagem_success'
        );


        $this->load->view('template', $dados);
       
        
    }

    public function pesquisa_ajax()
    {
        $acao =$_POST['acao'];



        switch ($acao):

            case'buscar':
                $termo =$_POST['termo'];
                $this->load->model('tombo_model'); //chamo o model
                $termoEncontrados = $this->tombo_model->get_tombo_like($termo); //retorno do model chamado com seu metodo
                if(!empty($termo)){
                    if(count($termoEncontrados) > 0){
                        foreach ($termoEncontrados as $busca){
                            echo ' <a href="#" class="btn btn-success small btn-block btn-flat" id="livro" data-target="'.$busca['idtombo'].'"  >'.'<br>TITULO DO EXEMPLAR:<br>'.$busca['titulo'].'<br>NUMERO DO TOMBO:<br>'.$busca['idtombo'].'</a>';

                        }

                    }else{
                        echo 'nao encontramos registros para ' .$termo;
                    }
                }else{
                    echo '<a href="#" class="btn btn-warning small btn-block btn-flat"</a>Digite uma pesquisa';
                }

                break;
            case 'retornar':
                $id=$_POST['idtombo'];
                $this->load->model('tombo_model'); //chamo o model
                $dadosUser=$this->tombo_model->get_tombo_id($id);
                
                if($dadosUser){
                    echo json_encode($dadosUser);
                    
                }else{
                    echo json_encode('nao encontrdo esse registro');
                }

                break;
        endswitch;






    }

    public function pesquisa_ajax_tombo()
    {
        $acao =$_POST['acao'];
        
        switch ($acao):

            case'buscar':
                $termo =$_POST['termo'];
                $this->load->model('tombo_model'); //chamo o model
                $termoEncontrados = $this->tombo_model->get_emprestimos($termo); //retorno do model chamado com seu metodo
                
                if(!empty($termo)){
                    if(count($termoEncontrados) > 0){

                        foreach ($termoEncontrados as $busca){


                            echo ' <a href="#" class="btn btn-success small btn-block btn-flat" id="emp" data-target="'.$busca['id_tombo'].'"<br>DATA DA DEVOLUCAO PREVISTA:<br>'.date("d-m-Y",strtotime($busca['datadev'])).'</a>';


                        }

                    }else{
                        echo '<a href="#" class="btn btn-danger small btn-block btn-flat"</a>Nao encontrado';

                    }
                }else{
                    echo '<a href="#" class="btn btn-warning small btn-block btn-flat"</a>Digite uma pesquisa';
                }

                break;
            case 'retornar':

                $id=$_POST['id_tombo'];
                $this->load->model('tombo_model'); //chamo o model
                $dadosUser=$this->tombo_model->get_tombo_id_dev($id);
                

                if($dadosUser){
                    echo json_encode($dadosUser);


                }else{
                    echo json_encode('nao encontramos esse registro');
                }

                break;
        endswitch;






    }




  


}


