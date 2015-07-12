<?php
  include_once '../includes/common.inc.php';
  include_once '../control/perfil-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<div class="col-lg-12">
		<h3 class="page-header">Perfis</h3>
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$perfis = index($conexao);
					 foreach($perfis as $perfil) :
	            ?>
				<tr>
					<td><?= $perfil['NOME']?></td>
					<td><?= $perfil['DESCRICAO']?></td>
					<td>				
						<form action="../perfis/adicionar.php" method="POST">
							<input name="id" type="hidden" value="<?= $perfil['ID_PERFIL'] ?>"/>
							<button class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></button>
						</form>
					</td>
					<td>
						<form action="../control/perfil-controller.php" method="POST">
							<input name="id_perfil" type="hidden" value="<?= $perfil['ID_PERFIL'] ?>"/>
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
