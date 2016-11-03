<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tombo_model extends CI_Model {



    public function check_login($senha, $email) {

        $this->db->from('usuarios');
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $usuarios = $this->db->get();

        if ($usuarios->num_rows()) {
            $usuario = $usuarios->result_array();
            return $usuario[0];
        } else {
            return false;
        }
    }


//retorna as aquidições do item todos *
    public function get_aqui() {
        $query = $this->db->get('aquisicao');

        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_ultimoexemplar($id_item){
        $this->db->select_max('tombo.exemplar');
        $this->db->from('tombo');
        $this->db->join('catalago','tombo.catalago_idcatalago = catalago.idcatalago');
        $this->db->where('catalago.idcatalago', $id_item);

        $query = $this->db->get();


        if ($query->num_rows()) {
            return $query->row_array();
        } else {
            return false;
        }




        
    }

}
