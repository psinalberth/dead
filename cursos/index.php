<?php
  include_once '../includes/common.inc.php';
  include_once '../model/perfil.php'; 
  include_once '../control/curso-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<form action="" class="form-horizontal" method="post">
	<fieldset>
	<h3 class="page-header">Cursos</h3>
	<table class="table table-bordered table-condensed" style="width: 100% !important;">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Programa</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$cursos = index($conexao);
				 foreach($cursos as $curso) :
            ?>
			<tr>
				<td>
					<form action="../cursos/adicionar.php" method="POST">
						<input name="id" type="hidden" value="<?= $curso['ID_CURSO'] ?>"/>
						<button style="background: none; border: none"><?= $curso['NOME']?></button>
					</form>
				</td>
				<td><?= $curso['DESCRICAO']?></td>
				<td><?= $curso['PROGRAMA']?></td>
				<td>				
					<form action="../cursos/adicionar.php" method="POST">
						<input name="id" type="hidden" value="<?= $curso['ID_CURSO'] ?>"/>
						<button class="btn btn-info btn-block">Editar</button>
					</form>
				</td>
				<td>
					<form action="../control/curso-controller.php" method="POST">
						<input name="id_curso" type="hidden" value="<?= $curso['ID_CURSO'] ?>"/>
						<input name="acao" type="hidden" value="delete"/>
						<button class="btn btn-danger btn-block">Excluir</button>
					</form>					
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</fieldset>
	</form>
</div>

<?php include_once '../partials/footer.inc.php'; ?>
