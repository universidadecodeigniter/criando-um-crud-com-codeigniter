<?php

class Contatos_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'contatos';
    }

    /**
    * Formata os contatos para exibição dos dados na home
    *
    * @param array $contatos Lista dos contatos a serem formatados
    *
    * @return array
    */
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
