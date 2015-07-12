<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';
  include_once '../model/programa.php';
  include_once '../model/perfil.php';
  include_once '../model/usuario.php'; 

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';

  if (isset($_POST['id']) && is_numeric($_POST['id'])) {

  		$id = $_POST['id'];
  		$usuario = buscarUsuario($conexao, $id);
  		$acao = 'edit';
  		
  } else {

  		$id = "";
  		$acao = 'add';
  }
?>
	<div id="page-wrapper">
		<form action="../control/usuario-controller.php" class="form-horizontal" method="post">
			<fieldset>
				<input type="hidden" name="acao" value= <?= $acao?>>
				<input type="hidden" name="id_usuario" value = <?= $id ?>>
				<h3 class="page-header">Adicionar Usuário</h3>
				<div class="panel-group" id="accordion">
					<div class="panel panel-green">

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
			    					if (isset($usuario)) 
			    						echo " value = '".$usuario['NOME']. "'";
			    				?> />
									</div>
								</div>

								<!-- Endereço -->

								<div class="form-group has-feedback has-feedback-left">
									<div class="col-md-10 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="Endereço" name="endereco"			    				
			    				<?php 
			    					if (isset($usuario)) 
			    						echo " value = '".$usuario['ENDERECO']. "'";
			    				?> />
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">

									<!-- Formação -->

									<div class="col-md-5 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="Formação" name="formacao"			    				
			    				<?php 
			    					if (isset($usuario)) 
			    						echo " value = '".$usuario['FORMACAO']. "'";
			    				?> />
									</div>

									<!-- Titulação -->

									<div class="col-md-5">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="Titulação" name="titulacao"			    				
			    				<?php 
			    					if (isset($usuario)) 
			    						echo " value = '".$usuario['TITULACAO']. "'";
			    				?> />
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">

									<!-- CPF -->

									<div class="col-md-5 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="CPF" name="cpf"			    				
			    				<?php 
			    					if (isset($usuario)) 
			    						echo " value = '".$usuario['CPF']. "'";
			    				?> />
									</div>

									<!-- RG -->

									<div class="col-md-5">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="RG" name="rg"			    				
			    				<?php 
			    					if (isset($usuario)) 
			    						echo " value = '".$usuario['RG']. "'";
			    				?> />
									</div>
								</div>

								<!-- E-mail -->

								<div class="form-group has-feedback has-feedback-left">
									<div class="col-md-10 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="E-mail" name="email"			    				
			    				<?php 
			    					if (isset($usuario)) 
			    						echo " value = '".$usuario['EMAIL']. "'";
			    				?> />
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left"							
				    				<?php 
				    					if (isset($usuario)) 
				    						echo "style = \"display: none;\"";
				    				?>
								>
									
									<!-- Login -->

									<div class="col-sm-4 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="Login" name="login" />
									</div>

									<!-- Senha -->

									<div class="col-sm-3">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="password" class="form-control" placeholder="Senha" name="senha" />
									</div>

									<!-- Confirmar Senha -->

									<div class="col-sm-3">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="password" class="form-control" placeholder="Confirmar Senha" name="confirmar_senha" />
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-primary">

						<div class="panel-heading">
							<h2 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseEad">
									Gerenciamento EAD
								</a>
							</h2>
						</div>
						<div class="panel-collapse collapse in" id="collapseEad">
							<div class="panel-body">
								<div class="form-group has-feedback has-feedback-left">

									<!-- Perfil de Usuário -->

									<div class="col-md-6">
									<i class="form-control-feedback glyphicon glyphicon-ok"></i>

										<select type="text" class="form-control" placeholder="Perfil" name="perfil">
											<?php
		                                        $perfis = ListaPerfis($conexao);
		                                        foreach($perfis as $perfil) :
		                                        	if (isset($usuario)) {
		                                        		if ($perfil['NOME'] === $usuario['PERFIL']) {
		                                        			echo "<option selected value=".$perfil['ID_PERFIL'].">" .$perfil['NOME']."</option>";
		                                        			continue;
		                                        		}
		                                        	} 
		                                        		echo "<option value=".$perfil['ID_PERFIL'].">" .$perfil['NOME']."</option>";
		                                        endforeach;
		                                    ?>
								</select>
								</div>

									<!-- Programa Relacionado -->

									<div class="col-md-6">
									<i class="form-control-feedback glyphicon glyphicon-ok"></i>

										<select type="text" class="form-control" placeholder="Programa" name="programa">
											<?php
		                                        $programas = ListaProgramas($conexao);
		                                        foreach($programas as $programa) :
		                                        	if (isset($usuario)) {
		                                        		if ($programa['NOME'] === $usuario['PROGRAMA']) {
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
	<button class="btn btn-lg btn-primary" id="salvar" name="salvar">Salvar</button>
</form>
</div>
<?php include_once '../partials/footer.inc.php'; ?>