<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MInicio extends CI_Model{
	// nome_usuario = Exatamente o nome cadastrado no sistema.
	// senha_usuario = Exatamente a senha que o usuário digitar.
	public function buscaDados($nome_usuario = "", $senha_usuario = "")
	{
		$this->db->select("usuarios.*");
		$this->db->from("usuarios");

		if (!empty($nome_usuario))
		{
			$this->db->where("us_nome", $nome_usuario);
		}

		if (!empty($senha_usuario))
		{
			$this->db->where("us_senha", md5($senha_usuario));
		}

		return $this->db->get()->result();
	}

	// nome_usuario = Nome desejado a ser configurado na base de dados.
	// senha_usuario = Senha desejada a ser configurada na base de dados.
	// email_usuario = E-mail desejado a ser configurado na base de dados.
	public function cadastraUsuario($nome_usuario, $senha_usuario, $email_usuario)
	{

		if (empty($nome_usuario) || empty($senha_usuario) || empty($email_usuario))
		{
			return false;
		}

		// Parâmetros de cadastro;
		$this->db->set("usuarios.us_nome", $nome_usuario);
		$this->db->set("usuarios.us_senha", md5($senha_usuario));
		$this->db->set("usuarios.us_email", $email_usuario);

		// Retorno e Insert na base de dados;
		return $this->db->insert("usuarios");
	}
}
