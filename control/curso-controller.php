<?php
	include '../conecta.php';
	include_once '../model/curso.php';

	$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
	$programa = isset($_POST['programa']) ? $_POST['programa'] : "";
	$id = isset($_POST['id_curso']) ? $_POST['id_curso'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaCursos($conexao);
	}

	function adicionar($conexao) {
		
		global $nome, $descricao, $programa;
		insereCurso($conexao, $nome, $descricao, $programa);
		redirect();
	}

	function editar($conexao) {
		
		global $nome, $descricao, $id, $programa;
		alteraCurso($conexao, $nome, $descricao, $programa, $id);	
		redirect();
	}

	function remover($conexao) {

		global $id;
		RemoveCurso($conexao, $id);
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
