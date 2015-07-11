<?php
	include_once '../conecta.php';
	include_once '../model/programa.php';
	include_once '../model/curso.php';

	$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
	$id = isset($_POST['id_curso']) ? $_POST['id_programa'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaCursos($conexao);
	}

	function adicionar($conexao) {
		
		global $nome, $descricao;
		inserePrograma($conexao, $nome, $descricao);
		redirect();
	}

	function editar($conexao) {
		
		global $nome, $descricao, $id;
		alteraPrograma($conexao, $nome, $descricao, $id);	
		redirect();
	}

	function remover($conexao) {

		global $id;
		removePrograma($conexao, $id);
		redirect();
	}

	function redirect() {
		header("Location: ../cursos");
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
