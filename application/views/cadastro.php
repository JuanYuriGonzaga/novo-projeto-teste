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
		height: 400px;
		background: #fff;

		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;

		text-align: center;
	}

	body {
		margin: 0px;
	}

	input
	{
		width: 30%;
	}

	</style>
</head>
<body>

<?= form_open('cinicio/salvar', array('id' => 'formulario', 'name' => 'formulario', 'method' => 'post')); ?>
	
	<div class="container">
		<div class="box">
			<h1>Tela de Cadastro</h1>

			<p>Tela de início da aplicação, sistema básico de login.</p>

			<hr>

			<label for="nome_usuario"> Login: </label>
			<input type="text" name="nome_usuario" id="nome_usuario">

			<br>
			<br>

			<label for="senha_usuario"> Senha: </label>
			<input type="password" name="senha_usuario" id="senha_usuario">

			<br>
			<br>

			<label for="senha_usuario_confirmacao"> Conf Senha: </label>
			<input type="password" name="senha_usuario_confirmacao" id="senha_usuario_confirmacao">

			<br>
			<br>

			<label for="email_usuario"> E-mail: </label>
			<input type="text" name="email_usuario" id="email_usuario">

			<hr>

			<input type="submit" value="Cadastrar" style="width: 15%;">
			<a href="<?= site_url() ?>"> Voltar </a>

<?= form_close(); ?>

			<?php if(!empty($msg)): ?>
				<p><?php echo $status . " " . $msg;?></p>
			<?php endif; ?>

		</div>

	</div>

</body>
</html>