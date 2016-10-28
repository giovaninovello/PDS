<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo extends CI_Controller
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
    public  function cadastro(){
        $alerta = null;
        $this->load->model('catalago_model'); //chamo o model
        $itemcatalago = $this->catalago_model->get_itemcatalago(); //retorno do model chamado com seu metodo
        $cidadecatalago = $this->catalago_model->get_cidade(); //retorno do model chamado com seu metodo
        $classificacaocatalago = $this->catalago_model->get_cla(); //retorno do model chamado com seu metodo

        $this->load->model('autor_model');
        $autor = $this->autor_model->get_autor();//pega o autores no get select

        $dados = array(
            "alerta"=>$alerta,
            "tipo" => $itemcatalago,
            "cid" => $cidadecatalago,
            "cla"=>$classificacaocatalago,
            "aut"=>$autor,
            "view" => 'catalogo/cadastrar'

        );
        $this->load->view('template', $dados);
    }


    public function visualizar_todos()
    {
        $alerta = null;
        $catalagos = null;

        $this->load->model('catalago_model'); //chamo o model
        $catalagos = $this->catalago_model->get_catalago(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "catalogo" => $catalagos,
            "view" => 'catalogo/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public function pesquisar(){

        $termo = $this->input->post('pesquisar');
        $this->load->model('catalago_model'); //chamo o model
        $catalago = $this->catalago_model->get_catalogo_like($termo); //retorno do model chamado com seu metodo


        $dados = array(
            "catalogo" => $catalago,
            "view" => 'catalogo/visualizar_todos'
        );
        $this->load->view('template', $dados);
    }

    public function cadastrar()
    {
        //inicializa a variacvel alerta como null
        $alerta = null;
        //verifica se o input do form é igual a cadastrar senao for redireciona para cadastro
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('cuter', 'CUTTER', 'required');
            $this->form_validation->set_rules('titulo', 'TITULO', 'required');

            if ($this->form_validation->run() === true) {

                //faz a upload do arquivo
                $config['upload_path'] = FCPATH."assets/uploads";
                $config['allowed_types']="jpg|gif|png";
                $config['encrypt_name'] =TRUE;

                $this->load->library('upload',$config);
                if($this->upload->do_upload("nome_arquivo")){
                    $info_arquivo = $this->upload->data();
                    $nome_imagem = $info_arquivo["file_name"];


                }else {
                    $alerta = array(
                        "class" => "ui red message",
                        "mensagem" => "O Livro  nao foi cadastrado!<br>" . validation_errors()
                    );
                }

                $this->load->model('catalago_model');
                $dados_catalago = array(
                    'cutter' => $this->input->post('cuter'),
                    'titulo' => $this->input->post('titulo'),
                    'subtitulo' => $this->input->post('subtitulo'),
                    'edicao' => $this->input->post('edicao'),
                    'total_pag' => $this->input->post('totalpagina'),
                    'volume' => $this->input->post('volume'),
                    'nota_serie' => $this->input->post('nota_serie'),
                    'isbn' => $this->input->post('isbn'),
                    'editora' => $this->input->post('editora'),
                    'data_public' => $this->input->post('datapub'),
                    'observacoes' => $this->input->post('obs'),
                    'fasciculo' => $this->input->post('fasciculo'),
                    'Tipo_Documento_idtipo_documento' => $this->input->post('tipo'),
                    'issn' => $this->input->post('issn'),
                    'cidade_idcidade' => $this->input->post('cid'),
                    'classificacao_idclassificacao' => $this->input->post('classificacao'),
                    'nome_imagem'=> $nome_imagem


                );

                $cadastrou = $this->catalago_model->create_catalago($dados_catalago);//cadastra o livro
                $valor = $this->catalago_model->get_id_ultimo();//pega o id inserido ultimo

                $this->load->model('autor_model');//abre o model
                //larga no array os dados das chaves compostas da id doc atalago e do autor
                $dados_autor = array(
                    'catalago_idcatalago' =>$valor,
                    'autor_idautor' =>$this->input->post('aut')
                );

                //chama o model do autor e cadastra na tabela composta e a varialvel cadastrou 2 recebe os true o  false
                $cadastrou2 = $this->autor_model->cadastrar_autor($dados_autor);
                //verifica  se cadastrou os dois dados com sucesso e da a mensgem de sucesso!!
                if ($cadastrou && $cadastrou2) {
                    $alerta = array(
                        "class" => "ui green message",
                        "mensagem" => "O Livro foi cadastrado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "ui red message",
                        "mensagem" => "O Livro  nao foi cadastrado!<br>" . validation_errors()
                    );
                }
            } else {
                $alerta = array(
                    "class" => "ui red message",
                    "mensagem" => "O Livro  nao foi validado!<br>" . validation_errors()
                );
            }
        }
        $dados = array(
            "alerta" => $alerta,
            "view" => 'catalogo/cadastrar'


        );
        $this->load->view('template', $dados);
    }

    public function editar($id_cat)
    {
        $alerta = null;
        $inicio = true;
        $id_cat = (int)$id_cat;
        if ($id_cat) {
            $this->load->model('catalago_model');
            $this->load->model('autor_model');
            $existe = $this->catalago_model->get_edit($id_cat);
            $cidadecatalago = $this->catalago_model->get_cidade(); //retorno do model chamado com seu metodo
            $classificacaocatalago = $this->catalago_model->get_classificacao();
            $doccatalago = $this->catalago_model->get_doc();


            //pega a lista de autores
            $autores= $this->autor_model->get_autor();
            $autores_has_catalago =$this->autor_model->get_autores_has_catalago();



            if ($existe) {
                $item = $existe;
                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('conta/entrar');

                    $id_item_form = (int)$this->input->post('id_cat');
                    if ($id_cat !== $id_item_form) redirect('conta/entrar');
                    //definir regras de validação
                    $this->form_validation->set_rules('cuter', 'CUTTER', 'required');
                    $this->form_validation->set_rules('titulo', 'TITULO', 'required');

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
                            $alerta = array(
                                "class" => "ui red message",
                                "mensagem" => "O formulario  nao foi validado!<br>" . validation_errors()
                            );
                        }

                        $dados_atualizado = array(
                            'cutter' => $this->input->post('cuter'),
                            'titulo' => $this->input->post('titulo'),
                            'subtitulo' => $this->input->post('subtitulo'),
                            'edicao' => $this->input->post('edicao'),
                            'total_pag' => $this->input->post('totalpagina'),
                            'volume' => $this->input->post('volume'),
                            'nota_serie' => $this->input->post('nota_serie'),
                            'isbn' => $this->input->post('isbn'),
                            'editora' => $this->input->post('editora'),
                            'data_public' => $this->input->post('datapub'),
                            'observacoes' => $this->input->post('obs'),
                            'fasciculo' => $this->input->post('fasciculo'),
                            'tipo_documento_idtipo_documento' => $this->input->post('tipo'),
                            'issn' => $this->input->post('issn'),
                            'cidade_idcidade' => $this->input->post('cid'),
                            'classificacao_idclassificacao' => $this->input->post('classificacao'),
                            'nome_imagem'=> $nome_imagem

                        );

                        $idatualizado=$this->input->post('id_cat');
                        $atualizou = $this->catalago_model->update_item($idatualizado, $dados_atualizado);


                        if ($atualizou) {
                            $inicio=false;
                            $alerta = array(
                                "class" => "ui green message",
                                "mensagem" => "O Item foi atualizado com sucesso!<br>" . validation_errors(),
                                "view" => 'catalogo/visualizar_item',
                            );
                        } else {
                            $alerta = array(
                                "class" => "ui red message",
                                "mensagem" => "O Item  nao foi atualizado!<br>" . validation_errors()
                            );
                        }
                    } else {
                        //formaulario invalido
                        $alerta = array(
                            "class" => "ui red message",
                            "mensagem" => "Atençao o formulario nao  foi validado!<br>" . validation_errors()
                        );
                    }
                }
            } else {

                $alerta = array(
                    "class" => "ui red message",
                    "mensagem" => "Atençao o Item nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "ui red message",
                "mensagem" => "Atençao o Item informado esta incorreto!<br>" . validation_errors()
            );
        }
        //se  o botao clicado for editar ele abre a edicao e seta os campos
        if($inicio==true) {
            $dados = array(
                "alerta" => $alerta,
                "item" => $item,
                "cid" => $cidadecatalago,
                "cla" => $classificacaocatalago,
                "tipo" => $doccatalago,
                "aut" => $autores,
                "autores_has" => $autores_has_catalago,
                "view" => 'catalogo/editar'
            );
            $this->load->view('template', $dados);
// se  for clicado em salvar alterações ou cadastrar caoi na tela de edica mostrtando um intem
        }else {
            $id_item = (int)$id_cat;
            $this->load->model('catalago_model'); //chamo o model
            $catalagos = $this->catalago_model->get_item($id_item); //retorno do model chamado com seu metodo
            $dados = array(
                "alerta" => $alerta,
                "catalogo" => $catalagos,
                "view" => 'catalogo/visualizar_item'
            );
            $this->load->view('template', $dados);
        }

    }

    public function visualizar_item($id_item){

        $id_item = (int)$id_item;
        $alerta = null;
        $catalagos = null;

        $this->load->model('catalago_model'); //chamo o model
        $catalagos = $this->catalago_model->get_item($id_item); //retorno do model chamado com seu metodo

        $dados = array(
            "alerta" => $alerta,
            "catalogo" => $catalagos,
            "view" => 'catalogo/visualizar_item'
        );
        $this->load->view('template', $dados);

    }

    public  function pesquisa_cat(){
        $alerta = null;

        $dados = array(
            "alerta"=>$alerta,
            "view" => 'catalogo/pesquisa_cat'

        );
        $this->load->view('template', $dados);
    }

    public function deletar($id_item)
    {
        $alerta = null;
        $id_item = (int)$id_item;
        if ($id_item) {
            $this->load->model('catalago_model');
            $existe = $this->catalago_model->get_item($id_item);
            if ($existe) {
                $deletou = $this->catalago_model->delete_catalago($id_item);
                if ($deletou) {
                    $alerta = array(
                        "class" => "ui green message",
                        "mensagem" => "O Livro foi deletado com sucesso!<br>" . validation_errors()
                    );
                } else {
                    $alerta = array(
                        "class" => "ui red message",
                        "mensagem" => "O Livro  nao foi deletado!<br>" . validation_errors()
                    );
                }
                $dados = array(
                    "alerta" => $alerta,
                    "view" => 'catalogo/deletar'
                );
                $this->load->view('template', $dados);
            } else {
                $alerta = array(
                    "class" => "ui red message",
                    "mensagem" => "Atençao o Livro nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "ui red message",
                "mensagem" => "Atençao o Livro informado esta incorreto!<br>" . validation_errors()
            );

        }
    }


}


