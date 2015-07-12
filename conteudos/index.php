

<?php
  include_once '../includes/common.inc.php';
  include_once '../model/perfil.php'; 
  include_once '../control/conteudo-controller.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
<div id="page-wrapper">
	<div class="col-lg-12">
		<h3 class="page-header">Conteudos</h3>
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Data envio</th>
					<th style="width: auto !important;"></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$conteudos = index($conexao);
					 foreach($conteudos as $conteudo) :
	            ?>
				<tr>
					<td><?= $conteudo['TITULO']?></td>
					<td><?= $conteudo['DATA_ENVIO']?></td>
					<td style="width: auto !important">				
						<form action="../conteudos/adicionar.php" method="POST">
							<input name="id" type="hidden" value="<?= $conteudo['ID_CONTEUDO'] ?>"/>
							<button class="btn btn-info" title="Editar"><i class="fa fa-edit"></i></button>
						</form>
					</td>
					<td>
						<form action="../control/conteudo-controller.php" method="POST">
							<input name="ID_CONTEUDO" type="hidden" value="<?= $conteudo['ID_CONTEUDO'] ?>"/>
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
