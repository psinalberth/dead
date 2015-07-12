<?php
  include_once '../conecta.php'; 
  include_once '../includes/common.inc.php';
  include_once '../model/programa.php';
  include_once '../model/perfil.php'; 

  include_once '../partials/header.inc.php';
  include_once '../partials/sidebar.inc.php';
?>
	<div id="page-wrapper">
		<form action="control/usuarios/add-usuarios.php" class="form-horizontal" method="post">
			<fieldset>
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
										<input type="text" class="form-control" placeholder="Nome" name="nome" />
									</div>
								</div>

								<!-- Endereço -->

								<div class="form-group has-feedback has-feedback-left">
									<div class="col-md-10 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="Endereço" name="endereco" />
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">

									<!-- Formação -->

									<div class="col-md-5 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="Formação" name="formacao" />
									</div>

									<!-- Titulação -->

									<div class="col-md-5">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="Titulação" name="titulacao" />
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">

									<!-- CPF -->

									<div class="col-md-5 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="CPF" name="cpf" />
									</div>

									<!-- RG -->

									<div class="col-md-5">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="RG" name="rg" />
									</div>
								</div>

								<!-- E-mail -->

								<div class="form-group has-feedback has-feedback-left">
									<div class="col-md-10 col-sm-offset-1">
										<i class="form-control-feedback glyphicon glyphicon-ok"></i>
										<input type="text" class="form-control" placeholder="E-mail" name="email" />
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">

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
						<div class="panel-collapse collapse" id="collapseEad">
							<div class="panel-body">
								<div class="form-group has-feedback has-feedback-left">

									<!-- Perfil de Usuário -->

									<div class="col-md-6">
									<i class="form-control-feedback glyphicon glyphicon-ok"></i>

										<select type="text" class="form-control" placeholder="Perfil" name="perfil">
											<?php
											$perfils = ListaPerfils($conexao);
											foreach($perfils as $perfil) :
												?>
											<option value="<?= $perfil['ID_PERFIL'] ?>"> <?=$perfil['NOME']?></option>
										<?php    endforeach ?>
									
								</select>
								</div>

									<!-- Programa Relacionado -->

									<div class="col-md-6">
									<i class="form-control-feedback glyphicon glyphicon-ok"></i>

										<select type="text" class="form-control" placeholder="Programa" name="programa">
											<?php
											$programas = ListaProgramas($conexao);
											foreach($programas as $programa) :
												?>
											<option value="<?= $programa['ID_PROGRAMA'] ?>"> <?=$programa['NOME']?></option>
										<?php    endforeach ?>
									
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