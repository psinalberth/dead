<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
  include_once '../model/curso.php';
  include_once '../model/turma.php';

  if (isset($_POST['id']) && is_numeric($_POST['id'])) {

  		$id = $_POST['id'];
  		$turma = buscarTurma($conexao, $id);
  		$acao = 'edit';
  		
  } else {

  		$id = "";
  		$acao = 'add';
  }
?>
<div id="page-wrapper">
	<form action="../control/turma-controller.php" class="form-horizontal" method="post">
		<fieldset>
			<input type="hidden" name="acao" value= <?= $acao?>>
			<input type="hidden" name="id_turma" value = <?= $id ?>>
			<h3 class="page-header">Adicionar Turma</h3>
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

						<!-- Ano de Início -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<input type="number" class="form-control" placeholder="Ano de Início" name="ano_inicio" min="1900" max="2199"			    				
			    				<?php 
			    					if (isset($turma)) 
			    						echo " value = '".$turma['ANO_INICIO']. "'";
			    				?> />
			    				
							</div>
						</div>

						<!-- Semestre -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<input type="number" class="form-control" placeholder="Semestre" name="semestre" min="1" max="2"
			    				<?php 
			    					if (isset($turma)) 
			    						echo " value = '".$turma['SEMESTRE']. "'";
			    				?> />
			    				
							</div>
						</div>
						
						<!-- Curso -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				 
			    				<select type="text" class="form-control" placeholder="Curso" name="curso">
									<?php
                                        $cursos = ListaCursos($conexao);
                                        foreach($cursos as $curso) :
                                        	if (isset($turma)) {
                                        		if ($curso['NOME'] === $turma['CURSO']) {
                                        			echo "<option selected value=".$curso['ID_CURSO'].">" .$curso['NOME']."</option>";
                                        			continue;
                                        		}
                                        	} 
                                        		echo "<option value=".$curso['ID_CURSO'].">" .$curso['NOME']."</option>";
                                        endforeach;
                                    ?>
			    				</select>
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