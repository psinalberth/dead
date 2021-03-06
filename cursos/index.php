<?php
  include_once '../includes/common.inc.php';
  include_once '../model/perfil.php'; 
  include_once '../control/curso-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<div class="col-lg-12">
		<h3 class="page-header">Cursos</h3>
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Código</th>
					<th>Descrição</th>
					<th>Programa</th>
					<th style="width: auto !important;"></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$cursos = index($conexao);
					 foreach($cursos as $curso) :
	            ?>
				<tr>
					<td><?= $curso['NOME']?></td>
					<td><?= $curso['CODIGO']?></td>
					<td><?= $curso['DESCRICAO']?></td>
					<td><?= $curso['PROGRAMA']?></td>
					<td style="width: auto !important">				
						<form action="../cursos/adicionar.php" method="POST">
							<input name="id" type="hidden" value="<?= $curso['ID_CURSO'] ?>"/>
							<button class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></button>
						</form>
					</td>
					<td>
						<form action="../control/curso-controller.php" method="POST">
							<input name="id_curso" type="hidden" value="<?= $curso['ID_CURSO'] ?>"/>
							<input name="acao" type="hidden" value="delete"/>
							<button class="btn btn-danger" title="Excluir"><i class="fa fa-trash-o"></i></button>
						</form>					
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?php include_once '../partials/footer.inc.php'; ?>
