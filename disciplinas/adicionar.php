<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';
  include_once '../model/disciplina.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
  
  if (isset($_POST['id']) && is_numeric($_POST['id'])) {

  		$id = $_POST['id'];
  		$disciplina = buscarDisciplina($conexao, $id);
  		$acao = 'edit';
  		
  } else {

  		$id = "";
  		$acao = 'add';
  }
?>
<div id="page-wrapper">
	<form action="../control/disciplina-controller.php" class="form-horizontal" method="post">
		<fieldset>
			<input type="hidden" name="acao" value= <?= $acao?>>
			<input type="hidden" name="id_disciplina" value = <?= $id ?>>
			<h3 class="page-header">Adicionar Disciplina</h3>
			<div class="panel-group" id="accordion">
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<h2 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapsePersonal">
								Informações Pessoais
							</a>
						</h2>
					</div>
					<div class="panel-collapse collapse in" id="collapsePersonal">
					<div class="panel-body">

						<!-- Nome -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<input type="text" class="form-control" placeholder="Nome" name="nome"			    				
			    				<?php 
			    					if (isset($disciplina)) 
			    						echo " value = '".$disciplina['NOME']. "'";
			    				?> />
							</div>
						</div>

						<!-- Descrição -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<textarea class="form-control" placeholder="Descrição" name="descricao"
			    				><?= isset($disciplina) ? $disciplina['DESCRICAO'] : ""?></textarea>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</fieldset>
		<button class="btn btn-lg btn-primary">Salvar</button>
	</form>
</div>
<?php include_once '../partials/footer.inc.php'; ?>