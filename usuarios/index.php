<?php
  include_once '../includes/common.inc.php';
  include_once '../model/perfil.php'; 
  include_once '../control/usuario-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<div class="col-lg-12">
		<h3 class="page-header">Usuários</h3>
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Perfil</th>
					<th>E-mail</th>
					<th>Programa</th>
					<th style="width: auto !important;"></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$usuarios = index($conexao);
					 foreach($usuarios as $usuario) :
	            ?>
				<tr>
					<td><?= $usuario['NOME']?></td>
					<td><?= $usuario['PERFIL']?></td>
					<td><?= $usuario['EMAIL']?></td>
					<td><?= $usuario['PROGRAMA']?></td>
					<td style="width: auto !important">				
						<form action="../usuarios/adicionar.php" method="POST">
							<input name="id" type="hidden" value="<?= $usuario['ID_USUARIO'] ?>"/>
							<button class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></button>
						</form>
					</td>
					<td>
						<form action="../control/usuario-controller.php" method="POST">
							<input name="id_usuario" type="hidden" value="<?= $usuario['ID_USUARIO'] ?>"/>
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
