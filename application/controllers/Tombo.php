<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tombo extends CI_Controller
{

    public function __construct()
    {
//verifica se esta logado no sistema se nao redirecina para pagina de login
        parent::__construct();
        $session=null;
        $session= $_SESSION['idsession'];
        if (!$this->session->userdata('logado')) {
            redirect('Conta/entrar');
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

    public function baixar()
    {
        $alerta = null;
        $id_tombo = $_POST['tombo'];


        $dados_baixa = array(

            'motivo_baixa' => $this->input->post('motivo'),
            'datab'=>date('Y-m-d'),
            'tombo_idtombo' => $this->input->post('tombo'),
            'tombo_escola_idescola' => $this->input->post('escola')
        );
        $dados=array(
            'baixado'=>'S'
        );


        if ($id_tombo) {
            $this->load->model('tombo_model');
            $existe = $this->tombo_model->get_tombo_delete($id_tombo);

            if ($existe) {
                $baixou = $this->tombo_model->baixa_tombo($id_tombo,$dados);

                if ($baixou) {
                    $this->load->model('baixa_model');
                    $cadastrou = $this->baixa_model->create_baixa($dados_baixa);
                    if ($cadastrou) {

                        $alerta = array(
                            "class" => "alert alert-success",
                            "mensagem" => "Baixa efetuada com sucesso!<br>" . validation_errors()
                        );
                    } else {
                        $alerta = array(
                            "class" => "alert alert-danger",
                            "mensagem" => "baixa  nao foi efetuada!<br>" . validation_errors()
                        );
                    }
                    $dados = array(
                        "alerta" => $alerta,
                        "view" => 'catalogo/pesquisa_cat'
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


    }

    public function cadastrar($id)
    {
        $id_cat = (int)$id;
        $catalagos = null;
        $alerta = null;
        if ($this->input->post('cadastrar') === "cadastrar") {
            if ($this->input->post('captcha')) redirect('Conta/cadastrar');
            //regras de validacao
            $this->form_validation->set_rules('fornecedor', 'FORNECEDOR', 'required');
            $this->form_validation->set_rules('exemplar', 'EXEMPLAR', 'required');

            if ($this->form_validation->run() === true) {
                $dados_tombo = array(

                    'idtombo' => $this->input->post('tbo'),
                    'data_tombo' => implode('-',array_reverse(explode('/',$this->input->post('data')))),
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
            "view" => 'tombo/mensagem_success'
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
                if($_SESSION['tipo']==1) {
                    $termoEncontrados = $this->tombo_model->get_tombo_like_adm($termo); //retorno do model chamado com seu metodo


                    if (!empty($termo)) {
                        if (count($termoEncontrados) > 0) {
                            foreach ($termoEncontrados as $busca) {
                                ?>

                                <table class="table table-responsive ">
                                    <tr>
                                        <th></th>
                                        <th>Titulo</th>
                                        <th>Tombo</th>
                                    </tr>
                                    <tr>
                                        <td><img alt="150x100" width="50" height="80"
                                                 src="<?php echo base_url('assets/uploads/' . $busca['nome_imagem']); ?>">
                                        </td>
                                        <td><?php echo $busca['titulo']; ?></td>
                                        </td>
                                        <td><?php echo $busca['idtombo']; ?></td>
                                        <td><a class="btn bg-green  btn-lg btn-flat btn-block" id="livro"
                                               data-target="<?php echo $busca['idtombo']; ?>"</a>Selecionar
                                        </td>
                                    </tr>
                                </table>


                                <?php

                            }

                        } else {
                            echo 'nao encontramos registros para ' . $termo;
                        }
                    } else {
                        echo '<a href="#" class="btn btn-warning small btn-block btn-flat"</a>Digite uma pesquisa';
                    }
                }else{
                    $termoEncontrados = $this->tombo_model->get_tombo_like($termo,$_SESSION['idsession']); //retorno do model chamado com seu metodo


                    if (!empty($termo)) {
                        if (count($termoEncontrados) > 0) {
                            foreach ($termoEncontrados as $busca) {
                                ?>

                                <table class="table table-responsive ">
                                    <tr>
                                        <th></th>
                                        <th>Titulo</th>
                                        <th>Tombo</th>
                                    </tr>
                                    <tr>
                                        <td><img alt="150x100" width="50" height="80"
                                                 src="<?php echo base_url('assets/uploads/' . $busca['nome_imagem']); ?>">
                                        </td>
                                        <td><?php echo $busca['titulo']; ?></td>
                                        </td>
                                        <td><?php echo $busca['idtombo']; ?></td>
                                        <td><a class="btn bg-green  btn-lg btn-flat btn-block" id="livro"
                                               data-target="<?php echo $busca['idtombo']; ?>"</a>Selecionar
                                        </td>
                                    </tr>
                                </table>


                                <?php

                            }

                        } else {
                            echo 'nao encontramos registros para ' . $termo;
                        }
                    } else {
                        echo '<a href="#" class="btn btn-warning small btn-block btn-flat"</a>Digite uma pesquisa';
                    }
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

                        foreach ($termoEncontrados as $busca) {

                            echo ' <a href="#" class="btn bg-green  btn-lg btn-flat btn-block"  style="text-align: center" id="emp" data-target="' . $busca['id_tombo'] . '"<br>Data da Devoluçao: ' . date("d/m/Y", strtotime($busca['datadev'])) .'<br>Numero do Tombo: ' . $busca['id_tombo'] . '</a>'
                            ?>

                            <td><img  alt="150x100" width="70" height="110" style="margin-top: 5px"
                                     src="<?php echo base_url('assets/uploads/' . $busca['nome_imagem']); ?>"></td>
                            <?php


                        }

                    }else {

                        echo '<a href="#" class="btn bg-danger  btn-lg btn-flat btn-block"</a>Nao encontrado';
                    }

                }else{
                    echo '<a href="#" class="btn bg-warning  btn-lg btn-flat btn-block"</a>Digite uma pesquisa';
                }

                break;
            case 'retornar':

                $id=$_POST['id_tombo'];
                $this->load->model('tombo_model'); //chamo o model
                $dadosUser = $this->tombo_model->get_tombo_id_dev($id);


                if($dadosUser){
                    echo json_encode($dadosUser);


                }else{
                    echo json_encode('nao encontramos esse registro');
                }

                break;
        endswitch;






    }

    public function pesquisar(){

        $alerta=null;
        $escolha = $_POST['radio'];

        if($escolha =='1') {
            $termo_nome = $this->input->post('pesquisar');
            $alerta = null;
            $catalagos = null;
            $this->load->model('catalago_model'); //chamo o model
            if($_SESSION['tipo']==2){
                $catalagos = $this->catalago_model->get_tombo_nome($termo_nome,$_SESSION['idsession']); //retorno do model chamado com seu metodo

                $dados = array(
                    "alerta" => $alerta,
                    "catalogo" => $catalagos,
                    "view" => 'catalogo/exemplares'
                );

            }else{
                $catalagos = $this->catalago_model->get_tombo_nome_adm($termo_nome); //retorno do model chamado com seu metodo

                $dados = array(
                    "alerta" => $alerta,
                    "catalogo" => $catalagos,
                    "view" => 'catalogo/exemplares'
                );


            }

            

        }else{


            $alerta = null;
            $catalagos = null;
            $termo = $this->input->post('pesquisar');
            $this->load->model('catalago_model'); //chamo o model
            if($_SESSION['tipo']==2){
            $catalagos = $this->catalago_model->get_tombo($termo,$_SESSION['idsession']); //retorno do model chamado com seu metodo

            $dados = array(
                "alerta" => $alerta,
                "catalogo" => $catalagos,
                "view" => 'catalogo/exemplares'
            );


        }else{
                $catalagos = $this->catalago_model->get_tombo_adm($termo); //retorno do model chamado com seu metodo



                $dados = array(
                    "alerta" => $alerta,
                    "catalogo" => $catalagos,
                    "view" => 'catalogo/exemplares'
                );
               

            }
        }
        $this->load->view('template', $dados);


    }

    public function editar($id)
    {
        $alerta = null;
        $this->load->model('fornecedores_model');
        $this->load->model('tombo_model');
        $this->load->model('escola_model');

        $forne = $this->fornecedores_model->get_fornecedores();
        $aqui = $this->tombo_model->get_aqui();
        $escola = $this->escola_model->get_escolas();
        $id = $id;
        if ($id) {

            $existe = $this->tombo_model->get_tombo_id($id);

            if ($existe) {
                $tbo = $existe;

                if ($this->input->post('editar') === 'editar') {
                    if ($this->input->post('captcha')) redirect('Conta/entrar');

                    $id_tbo_form = $this->input->post('idtombo');
                    if ($id !== $id_tbo_form) redirect('Conta/entrar');
                    //definir regras de validação
                    $this->form_validation->set_rules('tbo', 'NUMERO DO TOMBO', 'required');

                    //verificar se as regra sao atendidas
                    if ($this->form_validation->run() === true) {
                        $tbo_atualizado = array(
                            'idtombo' => $this->input->post('tbo'),
                            'data_tombo' => implode('-',array_reverse(explode('/',$this->input->post('data')))),
                            'exemplar' => $this->input->post('exemplar'),
                            'fornecedor_idfornecedor' => $this->input->post('fornecedor'),
                            'aquisicao_idaquisicao' => $this->input->post('classificacao'),
                            "escola_idescola" => $this->input->post('escola')
                        );
                        $atualizou = $this->tombo_model->update_tombo($this->input->post('idtombo'), $tbo_atualizado);

                        if ($atualizou) {
                            $alerta = array(
                                "class" => "alert alert-success",
                                "mensagem" => "O item foi atualizado com sucesso!<br>" . validation_errors()
                            );
                        } else {
                            $alerta = array(
                                "class" => "alert alert-danger",
                                "mensagem" => "O item  nao foi atualizado pois esta vinculado a outro registro!<br>" . validation_errors()
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
                $tbo = false;
                $alerta = array(
                    "class" => "alert alert-danger",
                    "mensagem" => "Atençao o item nao esta cadastrado!<br>" . validation_errors()
                );
            }
        } else {
            $alerta = array(
                "class" => "alert alert-danger",
                "mensagem" => "Atençao o item informado esta incorreto!<br>" . validation_errors()
            );
        }
        $dados = array(
            "alerta" => $alerta,
            "tbo" => $tbo,
            "forn" =>$forne,
            "aqui" =>$aqui,
            "esc"=>$escola,
            "view" => 'tombo/editar'
        );
        


        $this->load->view('template', $dados);
    }

    public function baixados()
    {
        $alerta = null;
        $baixados = null;

        $this->load->model('tombo_model'); //chamo o model
        $baixados = $this->tombo_model->get_baixados();


        $dados = array(
            "alerta" => $alerta,
            "baixas" => $baixados,
            "view" => 'tombo/visualizar_baixados'
        );
        $this->load->view('template', $dados);
    }

    public function inventario()
    {
        $alerta = null;
        $catalagos = null;

        $this->load->model('tombo_model'); //chamo o model
        $inventario = $this->tombo_model->get_inventario(); //retorno do model chamado com seu metodo


        $dados = array(
            "alerta" => $alerta,
            "inventario" => $inventario,
            "view" => 'tombo/inventario'
        );
       
        

        $this->load->view('template', $dados);
    }
    
    


    











}


