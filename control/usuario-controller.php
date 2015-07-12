<?php
	include '../conecta.php';
	include_once '../model/usuario.php';

	$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
	$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "";
	$formacao = isset($_POST['formacao']) ? $_POST['formacao'] : "";
	$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
	$rg = isset($_POST['rg']) ? $_POST['rg'] : "";
	$titulacao = isset($_POST['titulacao']) ? $_POST['titulacao'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$login = isset($_POST['login']) ? $_POST['login'] : "";
	$senha = isset($_POST['senha']) ? $_POST['senha'] : "";
	$programa = isset($_POST['programa']) ? $_POST['programa'] : "";
	$perfil = isset($_POST['perfil']) ? $_POST['perfil'] : "";
	$id = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaUsuarios($conexao);
	}

	function adicionar($conexao) {
		
		global $nome, $endereco, $formacao, $cpf, $rg, $titulacao, $email, $login, $senha, $programa, $perfil, $id;
		$senha = md5($senha);
		insereUsuario($conexao, $nome, $endereco, $formacao, $cpf, $rg, $titulacao, $email, $login, $senha, $perfil, $programa, $id);
		redirect();
	}

	function editar($conexao) {
		
		global $nome, $endereco, $formacao, $cpf, $rg, $titulacao, $email, $login, $senha, $programa, $perfil, $id;
		alterarUsuario($conexao, $nome, $endereco, $formacao, $cpf, $rg, $titulacao, $email, $perfil, $programa, $id);
		redirect();
	}

	function remover($conexao) {

		global $id;
		RemoveUsuario($conexao, $id);
		redirect();
	}

	function redirect() {
		header("Location: ../usuarios");
	}

	function init($conexao) {

		if (isset($_POST['acao'])) {

			switch ($_POST['acao']) {

				case 'add':
					adicionar($conexao);
					break;

				case 'edit':
					editar($conexao);
					break;

				case 'delete':
					remover($conexao);
					break;
			}

		} else {

			index($conexao);
		}
	}
