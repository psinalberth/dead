<?php
  include_once '../includes/common.inc.php';
  include_once '../model/perfil.php'; 
  include_once '../control/unidade-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<div class="col-lg-12">
		<h3 class="page-header">Unidades</h3>
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Data inicio</th>
					<th>Data fim</th>
					<th style="width: auto !important;"></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$unidades = index($conexao);
					 foreach($unidades as $unidade) :
	            ?>
				<tr>
					<td><?= $unidade['DATA-INICIO']?></td>
					<td><?= $unidade['DATA-FIM']?></td>
					<td style="width: auto !important">				
						<form action="../unidades/adicionar.php" method="POST">
							<input name="id" type="hidden" value="<?= $unidade['ID_UNIDADE'] ?>"/>
							<button class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></button>
						</form>
					</td>
					<td>
						<form action="../control/unidade-controller.php" method="POST">
							<input name="id_unidade" type="hidden" value="<?= $unidade['ID_UNIDADE'] ?>"/>
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
