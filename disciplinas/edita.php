<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';
  include_once '../model/disciplina.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
  $disciplinas;
  if ($_POST["id"] !== null) {
  		$disciplina = buscarDisciplina($conexao,$_POST["id"]);
  }else {
  		$disciplina = buscarDisciplina($conexao,0);
  }
?>
<div id="page-wrapper">
	<form action="../control/disciplinas/editar-disciplina.php" class="form-horizontal" method="post">
		<fieldset>
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
						 <input type="hidden" name="id" value="<?=$disciplina['ID_DISCIPLINA']?>">
                                          
						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<input type="text" class="form-control" placeholder="Nome" name="nome" value="<?=$disciplina["NOME"];?>"/>
							</div>
						</div>

						<!-- Descrição -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<textarea class="form-control" placeholder="Descrição" name="descricao" ><?=$disciplina["DESCRICAO"];?></textarea>
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