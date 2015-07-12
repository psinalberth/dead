<?php
	include_once '../conecta.php';
	include_once '../model/Unidade.php';

	$dataInicio = isset($_POST['dataInicio']) ? $_POST['dataInicio'] : "";
	$dataFim = isset($_POST['dataFim']) ? $_POST['dataFim'] : "";
	$planoEnsino = isset($_POST['planoEnsino']) ? $_POST['planoEnsino'] : "";
	$id = isset($_POST['id_unidade']) ? $_POST['id_unidade'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaUnidades($conexao);
	}

	function adicionar($conexao) {
		
		global $dataInicio, $dataFim, $planoEnsino;
		insereUnidade($conexao, $dataInicio, $dataFim, $planoEnsino);
		redirect();
	}

	function editar($conexao) {
		
		global $dataInicio, $dataFim, $planoEnsino, $id;
		alteraUnidade($conexao, $id, $dataInicio, $dataFim, $planoEnsino);	
		redirect();
	}

	function remover($conexao) {

		global $id;
		removeUnidade($conexao, $id);
		redirect();
	}

	function redirect() {
		header("Location: ../Unidades");
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
