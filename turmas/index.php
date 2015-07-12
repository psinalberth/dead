<?php
  include_once '../includes/common.inc.php';
  include_once '../model/perfil.php'; 
  include_once '../control/turma-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<div class="col-lg-12">
		<h3 class="page-header">Turmas</h3>
		<table class="table table-condensed table-bordered">
			<thead>
				<th>Curso</th>
				<th>Ano de Início</th>
				<th>Semestre</th>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				<?php 
					$turmas = index($conexao);
					foreach($turmas as $turma) :		
				 ?>
				<tr>
					<td><?= $turma['CURSO'] ?></td>
					<td><?= $turma['ANO_INICIO'] ?></td>
					<td><?= $turma['SEMESTRE'] ?></td>
					<td style="width: auto !important">				
						<form action="../turmas/adicionar.php" method="POST">
							<input name="id" type="hidden" value="<?= $turma['ID_TURMA'] ?>"/>
							<button class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></button>
						</form>
					</td>
					<td>
						<form action="../control/turma-controller.php" method="POST">
							<input name="id_turma" type="hidden" value="<?= $turma['ID_TURMA'] ?>"/>
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
<?php include_once '../partials/footer.inc.php' ;?>