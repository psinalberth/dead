<?php
	include_once '../conecta.php';
	include_once '../model/perfil.php';

	$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
	$id = isset($_POST['id_perfil']) ? $_POST['id_perfil'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaPerfis($conexao);
	}

	function adicionar($conexao) {
		
		global $nome, $descricao;
		inserePerfil($conexao, $nome, $descricao);
		redirect();
	}

	function editar($conexao) {
		
		global $nome, $descricao, $id;
		alterarPerfil($conexao, $id, $nome, $descricao);	
		redirect();
	}

	function remover($conexao) {

		global $id;
		RemovePerfil($conexao, $id);
		redirect();
	}

	function redirect() {
		header("Location: ../perfis");
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
