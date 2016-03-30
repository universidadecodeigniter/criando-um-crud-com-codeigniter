<?php

class Contatos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function Get($id){
      if($id)
        return $this->db->where('id',$id)->limit(1)->get('contatos')->row();
      else
        return FALSE;
    }

    function Listar() {
        $query = $this->db->get('contatos');
        if ($query->num_rows() > 0) {
          $contatos = self::formatar($query->result_array());
          return $contatos;
        } else {
          return FALSE;
        }
    }

    function Inserir($data) {
        return $this->db->insert('contatos', $data);
    }

    function Atualizar($contato){
      return $this->db->where('id', $contato['id'])->update('contatos', $contato);
    }

    function Excluir($id){
      return $this->db->where('id', $id)->delete('contatos');
    }

    function Formatar($contatos){
      if($contatos){
        for($i = 0; $i < count($contatos); $i++){
          $contatos[$i]['editar_url'] = base_url('editar')."/".$contatos[$i]['id'];
          $contatos[$i]['excluir_url'] = base_url('excluir')."/".$contatos[$i]['id'];
        }
        return $contatos;
      } else {
        return FALSE;
      }
    }
}
