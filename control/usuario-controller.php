<?php

	init();
	
	public function index($conexao) {

	}

	public function adicionar($conexao) {

	}

	public function editar($conexao) {
		
	}

	public function remover($conexao) {

	}

	public function init() {

		if (isset($_GET['acao'])) {

			switch ($_GET['acao']) {

				case 'index':
					index($conexao);
					break;

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
		}
	}
 ?>