<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
  include_once '../model/programa.php';
  include_once '../model/curso.php';

  if (isset($_POST['id']) && is_numeric($_POST['id'])) {

  		$id = $_POST['id'];
  		$curso = buscarCurso($conexao, $id);
  		$acao = 'edit';
  		
  } else {

  		$id = "";
  		$acao = 'add';
  }
?>
<div id="page-wrapper">
	<form action="../control/curso-controller.php" class="form-horizontal" method="post">
		<fieldset>
			<input type="hidden" name="acao" value= <?= $acao?>>
			<input type="hidden" name="id_curso" value = <?= $id ?>>
			<h3 class="page-header">Adicionar Curso</h3>
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

						<!-- Nome -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<input type="text" class="form-control" placeholder="Nome" name="nome"			    				
			    				<?php 
			    					if (isset($curso)) 
			    						echo " value = ".$curso['NOME'];
			    				?> >
			    				</input> 	
							</div>
						</div>

						<!-- Descrição -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				<textarea class="form-control" placeholder="Descrição" name="descricao"
			    				><?= isset($curso) ? $curso['DESCRICAO'] : ""?></textarea>
							</div>
						</div>
						
						<!-- Programa -->

						<div class="form-group has-feedback has-feedback-left">
							<div class="col-md-10 col-sm-offset-1">
			    				<i class="form-control-feedback glyphicon glyphicon-user"></i>
			    				 
			    				<select type="text" class="form-control" placeholder="Programa" name="programa">
									<?php
                                        $programas = ListaProgramas($conexao);
                                        foreach($programas as $programa) :
                                        	if (isset($curso)) {
                                        		if ($programa['NOME'] === $curso['PROGRAMA']) {
                                        			echo "<option selected value=".$programa['ID_PROGRAMA'].">" .$programa['NOME']."</option>";
                                        			continue;
                                        		}
                                        	} 
                                        		echo "<option value=".$programa['ID_PROGRAMA'].">" .$programa['NOME']."</option>";
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