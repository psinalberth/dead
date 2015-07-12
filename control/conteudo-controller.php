<?php
	include '../conecta.php';
	include_once '../model/conteudo.php';

	$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
	$data = isset($_POST['data']) ? $_POST['data'] : "";
	$id = isset($_POST['id_conteudo']) ? $_POST['id_conteudo'] : "";

	init($conexao);
	
	function index($conexao) {
		return ListaConteudos($conexao);
	}

	function adicionar($conexao) {
		
		global $titulo, $descricao, $data;
		insereConteudo($conexao, $titulo, $descricao, $data);
		redirect();
	}

	function editar($conexao) {
		
		global $titulo, $descricao, $id, $data;
		alteraConteudo($conexao, $titulo, $descricao, $data, $id);	
		redirect();
	}

	function remover($conexao) {

		global $id;
		RemoveConteudo($conexao, $id);
		redirect();
	}

	function redirect() {
		header("Location: ../conteudos");
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
