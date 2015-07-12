<?php
	include '../conecta.php';
	include_once '../model/disciplina.php';

	$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
	$id = isset($_POST['id_disciplina']) ? $_POST['id_disciplina'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaDisciplinas($conexao);
	}

	function adicionar($conexao) {
		
		global $nome, $descricao;
		insereDisciplina($conexao, $nome, $descricao);
		redirect();
	}

	function editar($conexao) {
		
		global $nome, $descricao, $id;
		alterarDisciplina($conexao, $id, $nome, $descricao);	
		redirect();
	}

	function remover($conexao) {

		global $id;
		RemoveDisciplina($conexao, $id);
		redirect();
	}

	function redirect() {
		header("Location: ../disciplinas");
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
