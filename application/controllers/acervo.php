<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acervo extends CI_Controller
{
    public function WsGetData($termo_nome)
    {


        $this->load->model('Catalago_model');
        $catalagos = $this->Catalago_model->WsGetData($termo_nome);

        header('Content-type: application/json');
        ini_set('default_charset', 'utf-8');
        foreach ($catalagos as $item) {
            echo json_encode($item);
        }

    }
}