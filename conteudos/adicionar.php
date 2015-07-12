<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
  include_once '../model/programa.php';
  include_once '../model/conteudo.php';

  if (isset($_POST['id']) && is_numeric($_POST['id'])) {

  		$id = $_POST['id'];
  		$conteudo = buscarConteudos($conexao, $id);
  		$acao = 'edit';
  		
  } else {

  		$id = "";
  		$acao = 'add';
  }
?>
<div id="page-wrapper">
	<form action="../control/conteudos-controller.php" class="form-horizontal" method="post">
		<fieldset>
			<input type="hidden" name="acao" value= <?= $acao?>>
			<input type="hidden" name="id_conteudos" value = <?= $id ?>>
			<h3 class="page-header">Adicionar Conteúdo</h3>
			<div class="panel-group" id="accordion">
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<h2 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapsePersonal">
								Informações Pessoais
							</a>
						</h2>
					</div>
					<div class="panel-collapse collapse in">
					<div class="panel-body">
							<!-- Titulo -->
			<div class="form-group has-feedback has-feedback-left">
				<div class="col-md-10 col-sm-offset-1">
					<i class="form-control-feedback glyphicon glyphicon-user"></i>
					<input type="text" class="form-control" placeholder="Título" <?php 
			    					if (isset($conteudo)) 
			    						echo " value = '".$conteudo['TITULO']. "'";
			    				?>/>
				</div>
			</div>
				<!-- descricao -->
			<div class="form-group has-feedback has-feedback-left">
				<div class="col-md-10 col-sm-offset-1">
					<i class="form-control-feedback glyphicon glyphicon-user"></i>
					<textarea class="form-control" placeholder="Descrição" rows="6">
						<?= isset($conteudos) ? $conteudos['DESCRICAO'] : ""?>

					</textarea>
				</div>
			</div>
			<!-- Data -->
				<div class="form-group has-feedback has-feedback-left">
				<div class="col-md-10 col-sm-offset-1">
					<i class="form-control-feedback glyphicon glyphicon-date"></i>
					<input type="file" class="form-control" placeholder="Data envio" name="data" <?php 
			    					if (isset($conteudo)) 
			    						echo " value = '".$conteudo['DATA_ENVIO']. "'";
			    				?>/>
				</div>
			</div>

				</div>
			</div>
		</fieldset>
		<button class="btn btn-lg btn-primary">Salvar</button>
	</form>
</div>
<?php include_once '../partials/footer.inc.php'; ?>