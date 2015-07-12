<?php
	include_once '../conecta.php';
	include_once '../model/turma.php';

	$ano_inicio = isset($_POST['ano_inicio']) ? $_POST['ano_inicio'] : "";
	$semestre = isset($_POST['semestre']) ? $_POST['semestre'] : "";
	$curso = isset($_POST['curso']) ? $_POST['curso'] : "";
	$id = isset($_POST['id_turma']) ? $_POST['id_turma'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaTurmas($conexao);
	}

	function adicionar($conexao) {
		
		global $ano_inicio, $semestre, $curso;
		insereTurma($conexao, $ano_inicio, $semestre, $curso);
		redirect();
	}

	function editar($conexao) {
		
		global $ano_inicio, $semestre, $curso, $id;
		alteraTurma($conexao, $ano_inicio, $semestre, $curso, $id);
		redirect();
	}

	function remover($conexao) {

		global $id;
		removeTurma($conexao, $id);
		redirect();
	}

	function redirect() {
		header("Location: ../turmas");
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
