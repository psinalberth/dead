<?php
  include_once '../includes/common.inc.php';
  include_once '../model/perfil.php'; 
  include_once '../control/programa-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<form action="" class="form-horizontal" method="post">
	<fieldset>
	<h3 class="page-header">Programas</h3>
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
				$programas = index($conexao);
				 foreach($programas as $programa) :
            ?>
			<tr>
				<td>
					<form action="../programas/adicionar.php" method="POST">
						<input name="id" type="hidden" value="<?= $programa['ID_PROGRAMA'] ?>"/>
						<button style="background: none; border: none"><?= $programa['NOME']?></button>
					</form>
				</td>
				<td><?= $programa['DESCRICAO']?></td>
				<td>				
					<form action="../programas/adicionar.php" method="POST">
						<input name="id" type="hidden" value="<?= $programa['ID_PROGRAMA'] ?>"/>
						<button class="btn btn-info btn-block">Editar</button>
					</form>
				</td>
				<td>
					<form action="../control/programa-controller.php" method="POST">
						<input name="id_programa" type="hidden" value="<?= $programa['ID_PROGRAMA'] ?>"/>
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
