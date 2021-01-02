<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CInicio extends CI_Controller {

	public function index($dados = array())
	{
		//Carrega o Helper;
		$this->load->helper('form');

		if (empty($dados))
		{
			$dados["msg"] = "";
			$dados["status"] = "";
		}

		// Carrega view;
		$this->load->view('login', $dados);
	}

	public function verificaLogin()
	{
		// Carrega o model;
		$this->load->model("minicio");

		// Parâmetros enviados por POST;
		$nome_usuario = $this->input->post("nome_usuario");
		$senha_usuario = $this->input->post("senha_usuario");

		if (empty($nome_usuario) || empty($senha_usuario))
		{
			$dados["msg"] = "Nenhuma das informações pode ser vázia.";
			$dados["status"] = "Erro!";
			$this->index($dados);
			return;
		}

		// Pesquisa na base da dados;
		$retorno = $this->minicio->buscaDados($nome_usuario, $senha_usuario);

		// Verificação do retorno;
		if (!empty($retorno))
		{
			// Sucesso no login;
			$this->load->view("status_login/sucesso");
		}
		else
		{
			// Falha no login;
			$this->load->view("status_login/falha");
		}
	}

	public function cadastro($dados = array())
	{
		//Carrega o Helper;
		$this->load->helper('form', 'url');

		// Carrega view;
		$this->load->view('cadastro', $dados);
	}

	public function salvar()
	{
		//Carrega o Helper;
		$this->load->helper('form', 'url');

		//Carrega o Model;
		$this->load->model('minicio');

		// Parâmetros enviados por POST;
		$nome_usuario = $this->input->post("nome_usuario");
		$senha_usuario = $this->input->post("senha_usuario");
		$senha_usuario_confirmacao = $this->input->post("senha_usuario_confirmacao");
		$email_usuario = $this->input->post("email_usuario");

		if(empty($nome_usuario) || empty($senha_usuario) || empty($senha_usuario_confirmacao) || empty($email_usuario))
		{
			$dados = array("msg" => "Nenhum dos dados pode ser vázio", "status" => "Erro!");
			$this->cadastro($dados);
			return;
		}

		if ($senha_usuario != $senha_usuario_confirmacao)
		{
			$dados["msg"] = "As senhas necessitam de ser identicas.";
			$dados["status"] = "Erro!";
			$this->cadastro($dados);
			return;
		}

		// Envia os dados pro model;
		$retorno = $this->minicio->cadastraUsuario($nome_usuario, $senha_usuario, $senha_usuario, $email_usuario);

		// Verificação do retorno;
		if (!empty($retorno) && $retorno != false)
		{
			// Sucesso no cadastro;
			$this->load->view("status_cadastro/sucesso");
			return;
		}
		else
		{
			// Falha no cadastro;
			$this->load->view("status_cadastro/falha");
			return;
		}
	}
}
