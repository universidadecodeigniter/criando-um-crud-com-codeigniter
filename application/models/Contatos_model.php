<?php

class Contatos_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'contatos';
    }

    function Listar() {
        $query = $this->db->get('contatos');
        if ($query->num_rows() > 0) {
          return self::formatar($query->result_array());
        } else {
          return false;
        }
    }

    function Formatar($contatos){
      if($contatos){
        for($i = 0; $i < count($contatos); $i++){
          $contatos[$i]['editar_url'] = base_url('editar')."/".$contatos[$i]['id'];
          $contatos[$i]['excluir_url'] = base_url('excluir')."/".$contatos[$i]['id'];
        }
        return $contatos;
      } else {
        return false;
      }
    }
}
