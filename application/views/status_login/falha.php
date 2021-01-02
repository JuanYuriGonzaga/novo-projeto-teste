<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Início</title>

	<style type="text/css">

	.container {
		width: 100vw;
		height: 100vh;
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: center;
	}

	.box {
		width: 500px;
		height: 300px;
		background: #fff;

		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;

		text-align: center;
	}

	.erro
	{
		width: 80%%;
		height: 25%;
		background: red;
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		text-align: center;
	}

	body {
		margin: 0px;
	}

	</style>
</head>
<body>
	
	<div class="container">
		<div class="box">

			<h1>Tela de Cadastro</h1>

			<p>Tela de início da aplicação, sistema básico de login.</p>

			<div class="erro">
				<p> Infelizmente ocorreu um erro durante o login! Tente novamente! </p>
			</div>

			<a href="<?php site_url(); ?>"> Voltar </a>

		</div>

	</div>

</body>
</html>