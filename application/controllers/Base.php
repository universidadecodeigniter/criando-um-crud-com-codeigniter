<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function Index()
	{
		$dados['contatos'] = $this->contatos_model->Listar();
		$this->load->view('home',$dados);
	}

	public function Salvar(){

		$dados['contatos'] = $this->contatos_model->Listar();
		$validacao = self::Validar();

		if($validacao){
			$contato = $this->input->post();
			$status = $this->contatos_model->Inserir($contato);
			if(!$status){
				$this->session->set_flashdata('error', '<p>Não foi possível inserir o contato.</p>');
			}else{
				$this->session->set_flashdata('success', '<p>Contato inserido com sucesso.</p>');
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}

		$this->load->view('home',$dados);

	}

	public function Editar(){
		$id = $this->uri->segment(2);
		if(is_null($id))
			redirect();

		$dados['contato'] = $this->contatos_model->GetById($id);

		$this->load->view('editar',$dados);

	}

	public function Atualizar(){

		$validacao = self::Validar('update');

		if($validacao){
			$contato = $this->input->post();
			$status = $this->contatos_model->Atualizar($contato['id'],$contato);
			if(!$status){
				$dados['contato'] = $this->contatos_model->GetById($contato['id']);
				$this->session->set_flashdata('error', '<p>Não foi possível atualizar o contato.</p>');
			}else{
				$this->session->set_flashdata('success', '<p>Contato atualizado com sucesso.</p>');
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}

		$this->load->view('editar',$dados);
	}

	public function Excluir(){
		$id = $this->uri->segment(2);
		if(is_null($id))
			redirect();

		$status = $this->contatos_model->Excluir($id);

		if($status){
			$this->session->set_flashdata('success', '<p>Contato excluído com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o contato.</p>');
		}

		redirect();
	}

	private function Validar($operacao = 'insert'){

		switch($operacao){
			case 'insert':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				break;
			case 'update':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email');
				break;
			default:
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				break;
		}

		$this->form_validation->set_rules('nome', 'Nome', $rules['nome']);
		$this->form_validation->set_rules('email', 'Email', $rules['email']);


		return $this->form_validation->run();
	}

}
